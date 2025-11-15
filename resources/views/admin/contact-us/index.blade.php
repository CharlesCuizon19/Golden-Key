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
                <td class="px-6 py-3 text-left">{{ $contact->full_name ?? '—' }}</td>
                <td class="px-6 py-3">{{ $contact->email ?? '—' }}</td>
                <td class="px-6 py-3">{{ $contact->subject ?? '—' }}</td>
                <td class="px-6 py-3 text-left">{{ Str::limit(strip_tags($contact->message), 80) }}</td>
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

    function confirmDelete(contactId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete this message? This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#6B7280',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = "/admin/contact_us/" + contactId;

                let csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = "{{ csrf_token() }}";

                let method = document.createElement('input');
                method.type = 'hidden';
                method.name = '_method';
                method.value = 'DELETE';

                form.appendChild(csrf);
                form.appendChild(method);
                document.body.appendChild(form);
                form.submit();
            }
        });
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