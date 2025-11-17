@extends('layouts.admin')

@section('title', 'Contact Messages')

@section('content')
@php use Illuminate\Support\Str; @endphp

<!-- Page Title -->
<h1 class="text-2xl font-semibold mb-6 text-[#ecc467]">CONTACT MESSAGES</h1>

<!-- Contact Messages Table -->
<div class="overflow-x-auto bg-[#1a1a1a] border border-[#2c2c2c] rounded-lg shadow">
    <table class="table-fixed w-full border-collapse text-center" id="contacts-table">
        <thead>
            <tr class="bg-[#121212] text-[#ecc467] text-sm font-semibold">
                <th class="px-6 py-3 rounded-tl-lg w-16">ID</th>
                <th class="px-6 py-3 w-1/5">Full Name</th>
                <th class="px-6 py-3 w-1/5">Email</th>
                <th class="px-6 py-3 w-1/5">Subject</th>
                <th class="px-6 py-3 w-1/5">Message</th>
                <th class="px-6 py-3 rounded-tr-lg w-40">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
            <tr class="border-t border-[#2c2c2c] hover:bg-[#2c2c2c] transition">
                <td class="px-6 py-3 text-center">{{ $contact->id }}</td>
                <td class="px-6 py-3 text-center">{{ $contact->full_name ?? '—' }}</td>
                <td class="px-6 py-3">{{ $contact->email ?? '—' }}</td>
                <td class="px-6 py-3">{{ $contact->subject ?? '—' }}</td>
                <td class="px-6 py-3 text-center">{{ Str::limit(strip_tags($contact->message), 80) }}</td>
                <td class="px-6 py-3 whitespace-nowrap">
                    <div class="flex justify-center items-center gap-2">
                        <button type="button"
                            onclick="confirmDelete({{ $contact->id }})"
                            class="px-3 py-1 rounded text-white bg-red-500 hover:bg-red-600 transition">
                            Delete
                        </button>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-6 text-gray-400">No contact messages found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#contacts-table').DataTable({
            ordering: false,
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search messages...",
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

    async function confirmDelete(contactId) {
        const result = await Swal.fire({
            title: 'Are you sure?',
            text: "Delete this message? This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#6B7280',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        });

        if (result.isConfirmed) {
            try {
                const response = await fetch('{{ route("admin.contact-us.destroy", "") }}/' + contactId, {
                    method: 'DELETE',

                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    // Remove row from DataTable
                    const table = $('#contacts-table').DataTable();
                    table
                        .row($(`button[onclick="confirmDelete(${contactId})"]`).parents('tr'))
                        .remove()
                        .draw();

                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: data.message,
                        timer: 2000,
                        showConfirmButton: false
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: data.message
                    });
                }
            } catch (err) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong.'
                });
                console.error(err);
            }
        }
    }

    @if(session('success'))
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        timer: 2000,
        showConfirmButton: false
    });
    @endif
</script>
@endpush