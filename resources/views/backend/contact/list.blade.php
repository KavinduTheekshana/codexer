@extends('layouts.backend')

@section('content')

    <div class="dashboard-main-body">




    @section('page_name', 'Contact Us')
    @include('backend.components.breadcrumb')

    @include('backend.components.alert')

    <div class="card basic-data-table">

        <div class="card-body">
            <table class="table bordered-table mb-0 text-left-table" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Role</th>
                        <th>Product</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                            <td>{{ $contact->company }}</td>
                            <td>{{ $contact->role }}</td>
                            <td>{{ $contact->product_design }}</td>
                            <td>
                                @if ($contact->status)
                                    <span
                                        class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                @else
                                    <span
                                        class="bg-warning-focus text-warning-main px-24 py-4 rounded-pill fw-medium text-sm">Deactive</span>
                                @endif
                            </td>
                            <td>{{ $contact->created_at->format('d M Y') }}</td>
                            <td>

                                @if (!$contact->status)
                                    <form class="status-form" data-action="{{ route('contacts.activate', $contact->id) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        <button type="button"
                                            class="btn btn-success btn-sm status-btn">Activate</button>
                                    </form>
                                @else
                                    <!-- Deactivate Button -->
                                    <form class="status-form"
                                        data-action="{{ route('contacts.deactivate', $contact->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button type="button"
                                            class="btn btn-secondary btn-sm status-btn">Deactivate</button>
                                    </form>
                                @endif

                                <a href="#" class="btn btn-info btn-sm view-btn"
                                    data-id="{{ $contact->id }}">View</a>


                                <form class="delete-form" data-action="{{ route('contacts.destroy', $contact->id) }}"
                                    method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm delete-btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content radius-16 bg-base">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Project Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Content will be loaded here via JavaScript -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}

<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content radius-16 bg-base">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">Contact Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="contactDetails">
                    <!-- Contact details will be loaded here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
<script>
    let table = new DataTable('#dataTable');
</script>

<script>
    $(document).ready(function() {
        // Set the CSRF token in the header for every AJAX request
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Click event for View button
        $('.view-btn').on('click', function(e) {
            e.preventDefault();
            var contactId = $(this).data('id');
            $.ajax({
                url: "{{ route('contacts.show', '') }}/" + contactId, // Build URL dynamically
                type: 'GET',
                success: function(response) {
                    $('#contactDetails').html(`
                        <p><strong>First Name:</strong> ${response.first_name}</p>
                        <p><strong>Last Name:</strong> ${response.last_name}</p>
                        <p><strong>Email:</strong> ${response.email}</p>
                        <p><strong>Phone:</strong> ${response.phone}</p>
                        <p><strong>Company:</strong> ${response.company}</p>
                        <p><strong>Role:</strong> ${response.role}</p>
                        <p><strong>Product Design:</strong> ${response.product_design}</p>
                        <p><strong>Project Description:</strong> ${response.project_description}</p>
                        <p><strong>Status:</strong> ${response.status ? 'Active' : 'Inactive'}</p>
                        <p><strong>Date:</strong> {{ $contact->created_at->format('d M Y') }}</p>
                    `);
                    $('#contactModal').modal('show');
                },
                error: function(xhr) {
                    alert('An error occurred while fetching the contact details.');
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Example date string from server
        var isoDate = '2024-09-04T13:55:37.000000Z';
        var date = new Date(isoDate);

        // Format date as 'dd MMM yyyy, HH:mm'
        var formattedDate = date.toLocaleString('en-GB', {
            day: '2-digit',
            month: 'short',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });

        // Display in the modal
        $('#contactDetails').append('<p><strong>Date:</strong> ' + formattedDate + '</p>');
    });
</script>

<script>
    $(document).ready(function() {
        $('.status-btn').on('click', function() {
            var form = $(this).closest('form');
            var actionUrl = form.data('action');
            var actionType = $(this).text().trim();
            var confirmationMessage = actionType === 'Activate' ?
                'Are you sure you want to activate this project?' :
                'Are you sure you want to deactivate this project?';

            Swal.fire({
                title: 'Are you sure?',
                text: confirmationMessage,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, proceed',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: actionUrl,
                        method: 'POST',
                        data: form.serialize(),
                        success: function(response) {
                            Swal.fire(
                                'Success!',
                                'Project status has been updated.',
                                'success'
                            ).then(() => {
                                window.location
                                    .reload(); // Reload the page to reflect changes
                            });
                        },
                        error: function() {
                            Swal.fire(
                                'Error!',
                                'An error occurred while changing the status.',
                                'error'
                            );
                        }
                    });
                }
            });
        });

        $('.delete-btn').on('click', function() {
            var form = $(this).closest('form');
            var actionUrl = form.data('action');

            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you really want to delete this project?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: actionUrl,
                        method: 'POST',
                        data: form.serialize(),
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'Project has been deleted.',
                                'success'
                            ).then(() => {
                                window.location
                                    .reload(); // Reload the page to reflect changes
                            });
                        },
                        error: function() {
                            Swal.fire(
                                'Error!',
                                'An error occurred while deleting the project.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
