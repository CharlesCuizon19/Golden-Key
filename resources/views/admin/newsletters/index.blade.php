@extends('layouts.admin')

@section('title', 'Newsletter')

@section('content')
<!-- Page Title -->
<h1 class="text-2xl font-semibold mb-6 text-[#ecc467]">NEWSLETTER</h1>

<!-- Newsletter Table -->
<div class="overflow-x-auto bg-[#1a1a1a] border border-[#2c2c2c] rounded-lg shadow">
    <table class="table-fixed w-full border-collapse text-center" id="newsletter-table">
        <thead>
            <tr class="bg-[#121212] text-[#ecc467] text-sm font-semibold">
                <th class="px-6 py-3 rounded-tl-lg w-16">ID</th>
                <th class="px-6 py-3 w-1/3">Email</th>
                <th class="px-6 py-3 rounded-tr-lg w-40">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($newsletters as $subscriber)
            <tr class="border-t border-[#2c2c2c] hover:bg-[#2c2c2c] transition">
                <td class="px-6 py-3">{{ $subscriber->id }}</td>
                <td class="px-6 py-3">{{ $subscriber->email }}</td>
                <td class="px-6 py-3">
                    <button onclick="confirmDelete({{ $subscriber->id }})"
                        class="px-3 py-1 rounded text-white bg-red-500 hover:bg-red-600 transition">
                        Delete
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center py-6 text-gray-400">No subscribers found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#newsletter-table').DataTable({
            ordering: false,
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search email...",
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
            }]
        });
    });

    async function confirmDelete(id) {
        const result = await Swal.fire({
            title: 'Are you sure?',
            text: "Delete this subscriber? This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#6B7280',
            confirmButtonText: 'Yes, delete it!'
        });

        if (!result.isConfirmed) return;

        try {
            const response = await fetch("{{ route('admin.newsletters.destroy', '') }}/" + id, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                // Remove row from DataTable
                const table = $('#newsletter-table').DataTable();
                table.row($(`button[onclick="confirmDelete(${id})"]`).parents('tr')).remove().draw();

                Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: 'Subscriber deleted successfully.',
                    timer: 2000,
                    showConfirmButton: false
                });
            } else {
                Swal.fire('Error', 'Failed to delete subscriber.', 'error');
            }
        } catch (e) {
            Swal.fire('Error', 'Something went wrong.', 'error');
            console.error(e);
        }
    }
</script>

@if(session('Success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ session('Success') }}",
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif
@endpush