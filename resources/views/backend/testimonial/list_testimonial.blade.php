@extends('layouts.backend')

@section('content')

    <div class="dashboard-main-body">




    @section('page_name', 'Testimonial List')
    @include('backend.components.breadcrumb')

    @include('backend.components.alert')

    <div class="card basic-data-table">
        <div class="card-header d-flex">
            <a href="{{ route('testimonials.add') }}" type="button"
                class="btn btn-neutral-900 text-base radius-8 px-20 py-11 d-flex align-items-center gap-2 ml-auto">
                <iconify-icon icon="ic:baseline-plus"></iconify-icon> ADD TESTIMONIAL
            </a>

        </div>
        <div class="card-body">
            <table class="table bordered-table mb-0 text-left-table" id="dataTable" data-page-length='10'>
                <thead>
                    <tr>
                        <th>Image</th> <!-- New Image Column -->
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Company</th>
                        <th>Message</th>
                        <th>Rating</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonials as $testimonial)
                        <tr>
                            <td>
                                @if ($testimonial->image)
                                    <img src="{{ asset('storage/' . $testimonial->image) }}"
                                        alt="{{ $testimonial->name }}"
                                        class="w-56-px h-56-px rounded-circle object-fit-cover">
                                @else
                                    <img src="{{ asset('images/default-image.png') }}" alt="No image available"
                                        class="w-64-px h-64-px rounded-circle object-fit-cover">
                                @endif
                            </td>
                            <td>{{ $testimonial->name }}</td>
                            <td>{{ $testimonial->designation }}</td>
                            <td>{{ $testimonial->company }}</td>
                            <td>{{ Str::limit($testimonial->message, 50) }}</td>
                            <td>{{ $testimonial->rating }}</td>
                            <td>
                                {{-- <a href="{{ route('testimonials.show', $testimonial->id) }}"
                                    class="btn btn-info btn-sm">View</a> --}}
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#testimonialModal" data-id="{{ $testimonial->id }}"
                                    data-name="{{ $testimonial->name }}"
                                    data-designation="{{ $testimonial->designation }}"
                                    data-company="{{ $testimonial->company }}"
                                    data-message="{{ $testimonial->message }}"
                                    data-rating="{{ $testimonial->rating }}" data-image="{{ $testimonial->image }}">
                                    View
                                </button>
                                <a href="{{ route('testimonials.edit', $testimonial->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>

                                        <form class="delete-form" data-action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" style="display:inline;">
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


<div class="modal fade" id="testimonialModal" tabindex="-1" role="dialog" aria-labelledby="testimonialModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content radius-16 bg-base">
            <div class="modal-header py-16 px-24 border border-top-0 border-start-0 border-end-0">
                <h1 class="modal-title fs-5" id="testimonialModalLabel">Testimonial Details</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"> <span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div id="modalContent">
                    <!-- Content will be populated by JavaScript -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    $('#testimonialModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id'); // Extract info from data-* attributes
        var name = button.data('name');
        var designation = button.data('designation');
        var company = button.data('company');
        var message = button.data('message');
        var rating = button.data('rating');
        var image = button.data('image');

        var modal = $(this);
        modal.find('.modal-title').text('Testimonial Details');
        modal.find('#modalContent').html(`
            <p><strong>Name:</strong> ${name}</p>
            <p><strong>Designation:</strong> ${designation}</p>
            <p><strong>Company:</strong> ${company}</p>
            <p><strong>Message:</strong> ${message}</p>
            <p><strong>Rating:</strong> ${'★'.repeat(rating)}${'☆'.repeat(5-rating)}</p>
            ${image ? `<img src="/storage/${image}" alt="${name}" style="max-width: 100%; height: auto;">` : ''}
        `);
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const form = button.closest('.delete-form');
                const actionUrl = form.getAttribute('data-action');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.setAttribute('action', actionUrl);
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endpush
