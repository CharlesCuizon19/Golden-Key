@extends('layouts.admin')

@section('title', 'Agents')

@section('content')

<!-- Page Title -->
<h1 class="text-2xl font-semibold mb-6 text-[#ecc467]">AGENTS</h1>

<!-- Top Bar -->
<div class="flex justify-end items-center mb-6">
    <a href="{{ route('admin.agents.create') }}"
        class="inline-flex items-center gap-2 text-sm bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        Create Agent
    </a>
</div>

<!-- Agents Table -->
<div class="overflow-x-auto bg-[#1a1a1a] border border-[#2c2c2c] rounded-lg shadow">
    <table class="table-fixed w-full border-collapse text-center" id="agents-table">
        <thead>
            <tr class="bg-[#121212] text-[#ecc467] text-sm font-semibold">
                <th class="px-6 py-3 rounded-tl-lg w-16">ID</th>
                <th class="px-6 py-3 w-1/3">Name</th>
                <th class="px-6 py-3 w-1/3">Position</th>
                <th class="px-6 py-3 w-1/6">Image</th>
                <th class="px-6 py-3 rounded-tr-lg w-40">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($agents as $agent)
            <tr class="border-t border-[#2c2c2c] hover:bg-[#2c2c2c] transition">
                <td class="px-6 py-3">{{ $agent->id }}</td>
                <td class="px-6 py-3">{{ $agent->name }}</td>
                <td class="px-6 py-3">{{ $agent->position }}</td>
                <td class="px-6 py-3">
                    @if($agent->image)
                    <img src="{{ asset($agent->image) }}" alt="{{ $agent->name }}"
                        class="h-12 w-12 object-cover mx-auto rounded-full border border-gray-600">
                    @else
                    <span class="text-gray-400">—</span>
                    @endif
                </td>
                <td class="px-6 py-3 whitespace-nowrap align-middle">
                    <div class="flex justify-center items-center gap-2">
                        <a href="{{ route('admin.agents.edit', $agent->id) }}"
                            class="px-3 py-1 rounded text-white bg-blue-500 hover:bg-blue-600 transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.agents.destroy', $agent->id) }}" method="POST" class="inline delete-form">
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
                <td colspan="5" class="text-center py-6 text-gray-400">No agents found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection

@push('scripts')
<script>
    function confirmDelete(agentId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete this agent? This action cannot be undone.",
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
                form.action = `/admin/agents/${agentId}`;

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
        $('#agents-table').DataTable({
            ordering: false,
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search agents...",
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