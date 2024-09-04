@extends('layouts.backend')

@section('content')

    <div class="dashboard-main-body">




    @section('page_name', 'Testimonial List')
    @include('backend.components.breadcrumb')

    @include('backend.components.alert')

    <div class="card basic-data-table">
        <div class="card-header d-flex">
            <a href="{{ route('projects.add') }}" type="button"
                class="btn btn-neutral-900 text-base radius-8 px-20 py-11 d-flex align-items-center gap-2 ml-auto">
                <iconify-icon icon="ic:baseline-plus"></iconify-icon> ADD PROJECT
            </a>

        </div>
        <div class="card-body">
            <table class="table bordered-table mb-0 text-left-table" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th>Image</th> <!-- New Image Column -->
                        <th>Title</th>
                        <th>Category</th>
                        <th>Industry</th>
                        <th>Ststus</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>
                                @if ($project->image)
                                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}"
                                        class="w-56-px h-56-px rounded-8 object-fit-cover">
                                @else
                                    <img src="{{ asset('images/default-image.png') }}" alt="No image available"
                                        class="w-64-px h-64-px rounded-8 object-fit-cover">
                                @endif
                            </td>
                            <td>{{ Str::limit($project->title, 50) }}</td>
                            <td>{{ $project->category }}</td>
                            <td>{{ $project->industry }}</td>
                            <td>
                                @if ($project->status)
                                    <span
                                        class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                @else
                                    <span
                                        class="bg-warning-focus text-warning-main px-24 py-4 rounded-pill fw-medium text-sm">Deactive</span>
                                @endif
                            </td>
                            <td>
                                @if (!$project->status)
                                    <form class="status-form"
                                        data-action="{{ route('projects.activate', $project->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button type="button"
                                            class="btn btn-success btn-sm status-btn">Activate</button>
                                    </form>
                                @else
                                    <!-- Deactivate Button -->
                                    <form class="status-form"
                                        data-action="{{ route('projects.deactivate', $project->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        <button type="button"
                                            class="btn btn-secondary btn-sm status-btn">Deactivate</button>
                                    </form>
                                @endif

                                <button type="button" class="btn btn-info btn-sm view-btn"
                                    data-id="{{ $project->id }}">View</button>
                                <a href="{{ route('projects.edit', $project->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>

                                <form class="delete-form" data-action="{{ route('projects.destroy', $project->id) }}"
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


<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
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
</div>



@endsection

@push('scripts')
<script>
    let table = new DataTable('#dataTable');
</script>

<script>
    $(document).ready(function() {
        $('.view-btn').on('click', function() {
            var projectId = $(this).data('id');

            $.ajax({
                url: '/projects/show/' + projectId,
                method: 'GET',
                success: function(data) {
                    $('#viewModal .modal-body').html(`
                    <p><strong>Title:</strong> ${data.title}</p>
                    <p><strong>Category:</strong> ${data.category}</p>
                    <p><strong>Client:</strong> ${data.client}</p>
                    <p><strong>Industry:</strong> ${data.industry}</p>
                    <p><strong>Stack:</strong> ${data.stack}</p>
                    <p><strong>Message:</strong> ${data.message}</p>
                    <p><strong>Status:</strong> ${data.status ? 'Active' : 'Inactive'}</p>
                    ${data.image ? `<p><strong>Image:</strong><br><img src="/storage/${data.image}" alt="Project Image" style="max-height: 420px; height: auto;"></p>` : ''}
                `);
                    $('#viewModal').modal('show');
                },
                error: function() {
                    alert('An error occurred while fetching project details.');
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.status-btn').on('click', function() {
            var form = $(this).closest('form');
            var actionUrl = form.data('action');
            var actionType = $(this).text().trim();
            var confirmationMessage = actionType === 'Activate' ? 'Are you sure you want to activate this project?' : 'Are you sure you want to deactivate this project?';

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
                                window.location.reload(); // Reload the page to reflect changes
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
                                window.location.reload(); // Reload the page to reflect changes
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
