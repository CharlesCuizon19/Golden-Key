@extends('layouts.admin')

@section('title', 'Unit Locations')

@section('content')
<h1 class="text-2xl font-semibold mb-6">UNIT LOCATIONS</h1>

<!-- Table -->
<div class="overflow-x-auto bg-white border rounded-lg shadow">
    <table class="table-fixed w-full border-collapse" id="locations-table">
        <thead>
            <tr class="bg-[#1a1a1a] text-white text-sm font-semibold">
                <th class="px-10 py-3 rounded-tl-lg text-center w-1/4">City</th>
                <th class="px-10 py-3 w-1/4 text-center">Total Units</th>
                <th class="px-10 py-3 w-1/4 text-center">Image</th>
                <th class="px-10 py-3 rounded-tr-lg text-center w-1/4">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($locations as $location)
            <tr class="border-t hover:bg-gray-50 transition align-middle">

                {{-- City --}}
                <td class="px-10 py-3 text-center">
                    {{ $location->city }}
                </td>

                {{-- Unit count --}}
                <td class="px-10 py-3 text-center">
                    {{ $location->units_count }}
                </td>

                {{-- Image --}}
                <td class="px-10 py-3 text-center">
                    @if ($location->image)
                    <img src="{{ asset($location->image) }}" class="w-24 h-14 object-cover rounded shadow mx-auto">
                    @else
                    <span class="text-gray-500">No Image</span>
                    @endif
                </td>

                {{-- Actions --}}
                <td class="px-6 py-3 whitespace-nowrap align-middle">
                    <div class="flex justify-center items-center gap-2">
                        <a href="{{ route('admin.unit-location.edit', $location->id) }}"
                            class="px-3 py-1 rounded text-white bg-blue-500 hover:bg-blue-600 transition">
                            Edit
                        </a>

                        <form action="{{ route('admin.unit-location.destroy', $location->id) }}"
                            method="POST" class="inline delete-form">
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
                <td colspan="4" class="text-center py-6 text-gray-500">No locations found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#locations-table').DataTable({
            ordering: false,
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search locations...",
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
                    targets: 2,
                    className: "text-center"
                },
                {
                    targets: 3,
                    className: "text-center"
                }
            ]
        });

        // SweetAlert delete
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            let form = $(this).closest('form');
            Swal.fire({
                title: "Are you sure?",
                text: "This location will be permanently deleted.",
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