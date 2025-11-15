@extends('layouts.admin')

@section('title', 'Product Inquiries')

@section('content')
@php use Illuminate\Support\Str; @endphp

<!-- Page Title -->
<h1 class="text-2xl font-semibold mb-6 text-[#ecc467]">PRODUCT INQUIRIES</h1>

<!-- Product Inquiries Table -->
<div class="overflow-x-auto bg-[#1a1a1a] border border-[#2c2c2c] rounded-lg shadow">
    <table class="table-fixed w-full border-collapse text-center" id="inquiries-table">
        <thead>
            <tr class="bg-[#121212] text-[#ecc467] text-sm font-semibold">
                <th class="px-6 py-3 rounded-tl-lg w-16">ID</th>
                <th class="px-6 py-3 w-1/5">Full Name</th>
                <th class="px-6 py-3 w-1/5">Email</th>
                <th class="px-6 py-3 w-1/5">Phone</th>
                <th class="px-6 py-3 w-1/5">Interested In</th>
                <th class="px-6 py-3 w-1/5">Message</th>
                <th class="px-6 py-3 rounded-tr-lg w-40">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($inquiries as $inquiry)
            <tr class="border-t border-[#2c2c2c] hover:bg-[#2c2c2c] transition">
                <td class="px-6 py-3 text-center">{{ $inquiry->id }}</td>
                <td class="px-6 py-3">{{ $inquiry->full_name }}</td>
                <td class="px-6 py-3">{{ $inquiry->email }}</td>
                <td class="px-6 py-3">{{ $inquiry->phone ?? '—' }}</td>
                <td class="px-6 py-3 text-left">{{ Str::limit(strip_tags($inquiry->interested_in), 80) }}</td>
                <td class="px-6 py-3 text-left">{{ Str::limit(strip_tags($inquiry->message), 80) }}</td>
                <td class="px-6 py-3 whitespace-nowrap">
                    <div class="flex justify-center items-center gap-2">
                        <button type="button"
                            onclick="confirmDelete({{ $inquiry->id }})"
                            class="px-3 py-1 rounded text-white bg-red-500 hover:bg-red-600 transition">
                            Delete
                        </button>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center py-6 text-gray-400">No inquiries found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#inquiries-table').DataTable({
            ordering: false,
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search inquiries...",
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

    function confirmDelete(inquiryId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete this inquiry? This action cannot be undone.",
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
                form.action = "/admin/inquiries/" + inquiryId;

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