@extends('layouts.admin')

@section('title', 'Unit Types')

@section('content')
@php use Illuminate\Support\Str; @endphp

<div x-data="unitTypeHandler()">

    <!-- Page Title -->
    <h1 class="text-2xl font-semibold mb-6 text-[#ecc467]">UNIT TYPES</h1>

    <!-- Top Bar -->
    <div class="flex justify-end items-center mb-6">
        <!-- Create Button -->
        <button
            class="inline-flex items-center gap-2 text-sm bg-gradient-to-r from-[#f37021] to-[#f58b42] text-white px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200"
            @click="openCreateModal = true">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Create Unit Type
        </button>
    </div>

    <!-- Unit Types Table -->
    <div class="overflow-x-auto bg-[#1a1a1a] border border-[#2c2c2c] rounded-lg shadow">
        <table class="table-fixed w-full border-collapse text-center" id="unit-types-table">
            <thead>
                <tr class="bg-[#121212] text-[#ecc467] text-sm font-semibold">
                    <th class="px-6 py-3 rounded-tl-lg w-16">ID</th>
                    <th class="px-6 py-3 w-2/3 text-left">Type Name</th>
                    <th class="px-6 py-3 rounded-tr-lg w-40">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($types as $type)
                <tr class="border-t border-[#2c2c2c] hover:bg-[#2c2c2c] transition">
                    <td class="px-6 py-3 text-center">{{ $type->id }}</td>
                    <td class="px-6 py-3 text-center">{{ $type->name ?? '—' }}</td>
                    <td class="px-6 py-3 whitespace-nowrap">
                        <div class="flex justify-center items-center gap-2">
                            <!-- Edit Button triggers modal -->
                            <button type="button"
                                @click="openEdit({{ $type->id }}, '{{ $type->name }}')"
                                class="px-3 py-1 rounded text-white bg-blue-500 hover:bg-blue-600 transition">
                                Edit
                            </button>
                            <!-- Delete Button -->
                            <button type="button"
                                @click="confirmDelete({{ $type->id }})"
                                class="px-3 py-1 rounded text-white bg-red-500 hover:bg-red-600 transition">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center py-6 text-gray-400">No unit types found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Create Modal -->
    <div x-show="openCreateModal" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60 backdrop-blur-sm" @click.self="openCreateModal = false">
        <div x-transition.scale.duration.300ms class="bg-[#1a1a1a] text-white rounded-2xl shadow-2xl w-96 p-6 border-t-4 border-gradient-to-r from-[#f37021] to-[#f58b42]">
            <h2 class="text-2xl font-bold mb-4 text-[#ecc467] drop-shadow-lg">Create Unit Type</h2>
            <form action="{{ route('admin.unit-type.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block mb-2 font-medium text-gray-300">Unit Type Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-4 py-2 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#f37021] bg-[#121212] text-white transition duration-200 shadow-sm"
                        placeholder="Enter type name" required>
                </div>
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" @click="openCreateModal = false"
                        class="px-5 py-2 rounded-lg bg-gray-700 hover:bg-gray-600 transition transform hover:scale-105 shadow-md">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-5 py-2 rounded-lg bg-gradient-to-r from-[#f37021] to-[#f58b42] hover:from-[#f58b42] hover:to-[#f37021] transition transform hover:scale-105 shadow-lg text-white font-semibold">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div x-show="openEditModal" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60 backdrop-blur-sm" @click.self="openEditModal = false">
        <div x-transition.scale.duration.300ms class="bg-[#1a1a1a] text-white rounded-2xl shadow-2xl w-96 p-6 border-t-4 border-gradient-to-r from-[#4facfe] to-[#00f2fe]">
            <h2 class="text-2xl font-bold mb-4 text-[#4facfe] drop-shadow-lg">Edit Unit Type</h2>
            <form :action="`{{ url('admin/unit-type') }}/${editId}`" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="edit_name" class="block mb-2 font-medium text-gray-300">Unit Type Name</label>
                    <input type="text" name="name" id="edit_name" x-model="editName"
                        class="w-full px-4 py-2 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4facfe] bg-[#121212] text-white transition duration-200 shadow-sm"
                        placeholder="Enter type name" required>
                </div>
                <div class="flex justify-end gap-3 mt-6">
                    <button type="button" @click="openEditModal = false"
                        class="px-5 py-2 rounded-lg bg-gray-700 hover:bg-gray-600 transition transform hover:scale-105 shadow-md">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-5 py-2 rounded-lg bg-gradient-to-r from-[#4facfe] to-[#00f2fe] hover:from-[#00f2fe] hover:to-[#4facfe] transition transform hover:scale-105 shadow-lg text-white font-semibold">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>


</div>

@endsection

@push('scripts')
<script>
    function unitTypeHandler() {
        return {
            openCreateModal: false,
            openEditModal: false,
            editId: null,
            editName: '',

            openEdit(id, name) {
                this.editId = id;
                this.editName = name;
                this.openEditModal = true;
            },

            confirmDelete(typeId) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete this unit type? This action cannot be undone.",
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
                        form.action = `/admin/unit-type/${typeId}`;

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
        }
    }

    $(document).ready(function() {
        $('#unit-types-table').DataTable({
            ordering: false,
            pageLength: 10,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search unit types...",
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