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
                        <th>ID</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>




@endsection

@push('scripts')
<script>
    let table = new DataTable('#dataTable');
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    // Select all delete buttons
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default button action

            // Find the closest form to the clicked button
            const form = this.closest('.delete-form');

            // Show the SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form if confirmed
                    form.submit();
                }
            });
        });
    });
});


</script>
@endpush
