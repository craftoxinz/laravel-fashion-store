<x-layouts.admin>
    <x-slot:title>Halaman Pegawai</x-slot:title>

    <div>
        {{-- Navbar Start --}}
        <x-navbar />
        {{-- Navbar End --}}

        {{-- Table Start --}}
        <div class="container mt-5">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="fw-semibold mb-0">Tabel Pegawai</h3>

                <button
                    class="btn btn-dark fw-medium px-3"
                    type="button"
                    data-bs-toggle="modal"
                    data-bs-target="#createEmployeeModal"
                >
                    Tambah
                </button>
            </div>

            <div class="card border-0 shadow mt-4">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr class="table-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No.Hp</th>
                                    <th scope="col">Posisi</th>
                                    <th scope="col">Gaji</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    /**
                                     * @var \Illuminate\Database\Eloquent\Collection<App\Models\Employee> $employees
                                     */
                                @endphp

                                @forelse ($employees as $employee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ $employee->position }}</td>
                                        <td>{{ $employee->salary }}</td>

                                        <td class="d-flex gap-2">
                                            <button
                                                class="btn btn-warning btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editEmployeeModal{{ $employee->id }}"
                                            >
                                                Edit
                                            </button>

                                            <form
                                                action="{{ route('admin.employees.destroy', $employee) }}"
                                                method="POST"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                >
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    {{-- Modal Edit Start --}}
                                    <div
                                        class="modal fade"
                                        id="editEmployeeModal{{ $employee->id }}"
                                        tabindex="-1"
                                        aria-labelledby="editEmployeeModalLabel"
                                        aria-hidden="true"
                                    >
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h1 class="modal-title fs-5">
                                                        Edit Pegawai
                                                    </h1>

                                                    <button
                                                        type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close"
                                                        data-bs-theme="dark"
                                                    ></button>
                                                </div>

                                                <form
                                                    action="{{ route('admin.employees.update', $employee) }}"
                                                    method="POST"
                                                >
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="mb-3">
                                                            <label for="inputEmployeeName" class="form-label">
                                                                Nama
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="inputEmployeeName"
                                                                name="name"
                                                                required
                                                                value="{{ $employee->name }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputEmployeeEmail" class="form-label">
                                                                Email
                                                            </label>

                                                            <input
                                                                type="email"
                                                                class="form-control"
                                                                id="inputEmployeeEmail"
                                                                name="email"
                                                                required
                                                                value="{{ $employee->email }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputEmployeePhone" class="form-label">
                                                                No.Hp
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="inputEmployeePhone"
                                                                name="phone"
                                                                required
                                                                value="{{ $employee->phone }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputEmployeePosition" class="form-label">
                                                                Posisi
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="inputEmployeePosition"
                                                                name="position"
                                                                required
                                                                value="{{ $employee->position }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputEmployeeSalary" class="form-label">
                                                                Gaji
                                                            </label>

                                                            <input
                                                                type="number"
                                                                class="form-control"
                                                                id="inputEmployeeSalary"
                                                                name="salary"
                                                                required
                                                                value="{{ $employee->salary }}"
                                                            >
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button
                                                            type="button"
                                                            class="btn btn-outline-dark"
                                                            data-bs-dismiss="modal"
                                                        >
                                                            Close
                                                        </button>

                                                        <button type="submit" class="btn btn-dark">
                                                            Save changes
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal Edit End --}}
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-3 text-muted">
                                            Belum ada data pegawai tersedia.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- Table End --}}

        {{-- Modal Create Start --}}
        <div
            class="modal fade"
            id="createEmployeeModal"
            tabindex="-1"
            aria-labelledby="createEmployeeModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h1 class="modal-title fs-5">
                            Tambah Pegawai
                        </h1>

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            data-bs-theme="dark"
                        ></button>
                    </div>

                    <form action="{{ route('admin.employees.store') }}" method="POST">
                        <div class="modal-body">
                            @csrf

                            <div class="mb-3">
                                <label for="inputEmployeeName" class="form-label">
                                    Nama
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputEmployeeName"
                                    name="name"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputEmployeeEmail" class="form-label">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    class="form-control"
                                    id="inputEmployeeEmail"
                                    name="email"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputEmployeePhone" class="form-label">
                                    No.Hp
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputEmployeePhone"
                                    name="phone"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputEmployeePosition" class="form-label">
                                    Posisi
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputEmployeePosition"
                                    name="position"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputEmployeeSalary" class="form-label">
                                    Gaji
                                </label>

                                <input
                                    type="number"
                                    class="form-control"
                                    id="inputEmployeeSalary"
                                    name="salary"
                                    required
                                >
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-outline-dark"
                                data-bs-dismiss="modal"
                            >
                                Close
                            </button>

                            <button type="submit" class="btn btn-dark">
                                Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Modal Create End --}}
    </div>

    {{-- Inline Styles Start --}}
    <x-slot:styles>
        <style>
            .modal .form-control:focus {
                border-color: #444;
                box-shadow: 0 0 0 0.25rem rgba(0, 0, 0, 0.15);
            }
        </style>
    </x-slot:styles>
    {{-- Inline Styles End --}}
</x-layouts.admin>
