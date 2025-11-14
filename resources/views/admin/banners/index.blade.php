@extends('layouts.admin')

@section('title', 'Homepage Banner')

@section('content')
<h1 class="text-2xl font-semibold mb-6">HOMEPAGE BANNER</h1>

<!-- Top Bar -->
<div class="flex justify-end items-center mb-6">
    <!-- Create Button -->
    <a href="{{ route('admin.banners.create') }}"
        class="inline-flex items-center gap-2 text-sm bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        Create Banner
    </a>
</div>

<!-- Table -->
<div class="overflow-x-auto bg-white border rounded-lg shadow">
    <table class="table-fixed w-full border-collapse" id="banners-table">
        <thead>
            <tr class="bg-[#1a1a1a] text-white text-sm font-semibold">
                <th class="px-10 py-3 rounded-tl-lg text-center w-16">ID</th>
                <th class="px-10 py-3 w-1/4 ">Title</th>
                <th class="px-10 py-3 w-1/4 text-center">Image</th>
                <th class="px-10 py-3 rounded-tr-lg text-center w-40">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($banners as $banner)
            <tr class="border-t hover:bg-gray-50 transition align-middle">
                <td class="px-10 py-3 text-center ">{{ $banner->id }}</td>
                <td class="px-10 py-3 ">{{ $banner->title }}</td>
                <td class="px-10 py-3 text-center align-middle">
                    <div class="flex justify-center">
                        <img src="{{ asset($banner->image) }}" class="w-24 h-14 object-cover rounded shadow" alt="Banner">
                    </div>
                </td>
                <td class="px-6 py-3 whitespace-nowrap align-middle">
                    <div class="flex justify-center items-center gap-2">
                        <a href="{{ route('admin.banners.edit', $banner->id) }}"
                            class="px-3 py-1 rounded text-white bg-blue-500 hover:bg-blue-600 transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                class="delete-btn px-3 py-1 rounded text-white bg-red-500 hover:bg-red-600 transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="5" class="text-center py-6 text-gray-500">No banners found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#banners-table').DataTable({
            ordering: false,
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search banners...",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                paginate: {
                    previous: "Previous",
                    next: "Next"
                }
            },
            columnDefs: [{
                    targets: "_all",
                    className: "align-middle"
                },
                {
                    targets: 3,
                    className: "text-center"
                }, // Image column
                {
                    targets: 4,
                    className: "text-center"
                } // Actions column
            ]
        });

        // SweetAlert Delete
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            let form = $(this).closest('form');
            Swal.fire({
                title: "Are you sure?",
                text: "This banner will be permanently deleted.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) form.submit();
            });
        });
    });
</script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif
@endpush