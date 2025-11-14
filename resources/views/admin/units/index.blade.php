@extends('layouts.admin')

@section('title', 'Units')

@section('content')

<!-- Page Title -->
<h1 class="text-2xl font-semibold mb-6 text-[#ecc467]">UNITS</h1>

<!-- Top Bar -->
<div class="flex justify-end items-center mb-6">
    <a href="{{ route('admin.units.create') }}"
        class="inline-flex items-center gap-2 text-sm bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        Create Unit
    </a>
</div>

<!-- Alerts -->
@if(session('success'))
<div class="mb-4 bg-green-600 text-white p-3 rounded-lg">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="mb-4 bg-red-600 text-white p-3 rounded-lg">
    {{ session('error') }}
</div>
@endif

<!-- Units Table -->
<div class="overflow-x-auto bg-[#1a1a1a] border border-[#2c2c2c] rounded-lg shadow">
    <table class="table-fixed w-full border-collapse text-center" id="units-table">
        <thead>
            <tr class="bg-[#121212] text-[#ecc467] text-sm font-semibold">
                <th class="px-6 py-3">Title</th>
                <th class="px-6 py-3">Agent</th>
                <th class="px-6 py-3">Type</th>
                <th class="px-6 py-3">Price</th>
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3 w-20 rounded-tl-lg">Unit Images</th>
                <th class="px-6 py-3 w-40 rounded-tr-lg">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($units as $unit)
            <tr class="border-t border-[#2c2c2c] hover:bg-[#2c2c2c] transition">
                <td class="px-6 py-3">{{ $unit->title }}</td>
                <td class="px-6 py-3">{{ $unit->agent->name ?? 'N/A' }}</td>
                <td class="px-6 py-3">{{ $unit->type->name ?? 'N/A' }}</td>

                <!-- Price -->
                <td class="px-6 py-3 text-[#ecc467] font-semibold">
                    ₱{{ number_format($unit->price, 2) }}
                </td>

                <!-- Status Badge -->
                <td class="px-6 py-3">
                    <span class="px-3 py-1 rounded-lg text-sm text-white 
                        {{ $unit->status == 'available' ? 'bg-green-600' : ($unit->status == 'sold' ? 'bg-red-600' : 'bg-yellow-500') }}">
                        {{ ucfirst($unit->status) }}
                    </span>
                </td>

                <!-- Image -->
                <td class="px-6 py-3">
                    @if($unit->images->first())
                    <img src="{{ asset($unit->images->first()->image_path) }}"
                        class="h-12 w-16 object-cover mx-auto rounded-md border border-gray-700">
                    @else
                    <span class="text-gray-400">—</span>
                    @endif
                </td>

                <!-- Action Buttons -->
                <td>
                    <div class="flex justify-center items-center gap-2">
                        <a href="{{ route('admin.units.edit', $unit->id) }}"
                            class="px-3 py-1 rounded text-white bg-blue-500 hover:bg-blue-600 transition">
                            Edit
                        </a>

                        <button onclick="confirmDelete({{ $unit->id }})"
                            class="px-3 py-1 rounded text-white bg-red-500 hover:bg-red-600 transition">
                            Delete
                        </button>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center py-6 text-gray-400">No units found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection

@push('scripts')
<script>
    function confirmDelete(unitId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete this unit? This action cannot be undone.",
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
                form.action = `/admin/units/${unitId}`;

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

    $(document).ready(function() {
        $('#units-table').DataTable({
            ordering: false,
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search units...",
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
</script>
@endpush