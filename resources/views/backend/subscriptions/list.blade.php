@extends('layouts.backend')

@section('content')

    <div class="dashboard-main-body">




    @section('page_name', 'Subscriptions')
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
                    @foreach ($subscriptions as $subscription)
                        <tr>
                            <td>{{ $subscription->id }}</td>
                            <td>{{ $subscription->email }}</td>
                            <td>{{ $subscription->created_at->format('d M Y') }}</td>
                            <td>
                                {{-- <a href="{{ route('subscriptions.delete', $subscription->id) }}"
                                    class="btn btn-danger btn-sm">Delete</a> --}}
                                    <form class="delete-form" action="{{ route('subscriptions.delete', $subscription->id) }}" method="POST" style="display:inline;">
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
