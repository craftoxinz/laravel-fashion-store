<x-bootstrap.layouts.page>
    <x-slot:pageTitle>Halaman Supplier</x-slot:pageTitle>

    <div>
        {{-- Navbar Start --}}
        <x-bootstrap.navbar />
        {{-- Navbar End --}}

        {{-- Table Start --}}
        <div class="container mt-5">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="fw-semibold mb-0">Tabel Supplier</h3>

                <button
                    class="btn btn-dark fw-medium px-3"
                    type="button"
                    data-bs-toggle="modal"
                    data-bs-target="#createSupplierModal"
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
                                    <th scope="col">Nama Supplier</th>
                                    <th scope="col">PIC</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No.Hp</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Kota</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    /**
                                     * @var \Illuminate\Database\Eloquent\Collection<App\Models\Supplier> $suppliers
                                     */
                                @endphp

                                @forelse ($suppliers as $supplier)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $supplier->name }}</td>
                                        <td>{{ $supplier->pic_name }}</td>
                                        <td>{{ $supplier->email }}</td>
                                        <td>{{ $supplier->phone }}</td>
                                        <td>{{ $supplier->address }}</td>
                                        <td>{{ $supplier->city }}</td>

                                        <td class="d-flex gap-2">
                                            <button
                                                class="btn btn-warning btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editSupplierModal{{ $supplier->id }}"
                                            >
                                                Edit
                                            </button>

                                            <form
                                                action="{{ route('admin.suppliers.destroy', $supplier) }}"
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
                                        id="editSupplierModal{{ $supplier->id }}"
                                        tabindex="-1"
                                        aria-labelledby="editSupplierModalLabel"
                                        aria-hidden="true"
                                    >
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h1 class="modal-title fs-5">
                                                        Edit Supplier
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
                                                    action="{{ route('admin.suppliers.update', $supplier) }}"
                                                    method="POST"
                                                >
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="mb-3">
                                                            <label for="inputSupplierName" class="form-label">
                                                                Nama Supplier
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="inputSupplierName"
                                                                name="name"
                                                                required
                                                                value="{{ $supplier->name }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputSupplierPicName" class="form-label">
                                                                Nama PIC
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="inputSupplierPicName"
                                                                name="pic_name"
                                                                required
                                                                value="{{ $supplier->pic_name }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputSupplierEmail" class="form-label">
                                                                Email
                                                            </label>

                                                            <input
                                                                type="email"
                                                                class="form-control"
                                                                id="inputSupplierEmail"
                                                                name="email"
                                                                required
                                                                value="{{ $supplier->email }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputSupplierPhone" class="form-label">
                                                                No.Hp
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="inputSupplierPhone"
                                                                name="phone"
                                                                required
                                                                value="{{ $supplier->phone }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputSupplierAddress" class="form-label">
                                                                Alamat
                                                            </label>

                                                            <textarea
                                                                class="form-control"
                                                                id="inputSupplierAddress"
                                                                name="address"
                                                                required
                                                            >{{ $supplier->address }}</textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputSupplierCity" class="form-label">
                                                                Kota
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="inputSupplierCity"
                                                                name="city"
                                                                required
                                                                value="{{ $supplier->city }}"
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
                                        <td colspan="8" class="text-center py-3 text-muted">
                                            Belum ada data supplier tersedia.
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
            id="createSupplierModal"
            tabindex="-1"
            aria-labelledby="createSupplierModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h1 class="modal-title fs-5">
                            Tambah Supplier
                        </h1>

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            data-bs-theme="dark"
                        ></button>
                    </div>

                    <form action="{{ route('admin.suppliers.store') }}" method="POST">
                        <div class="modal-body">
                            @csrf

                            <div class="mb-3">
                                <label for="inputSupplierName" class="form-label">
                                    Nama Supplier
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputSupplierName"
                                    name="name"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputSupplierPicName" class="form-label">
                                    Nama PIC
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputSupplierPicName"
                                    name="pic_name"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputSupplierEmail" class="form-label">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    class="form-control"
                                    id="inputSupplierEmail"
                                    name="email"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputSupplierPhone" class="form-label">
                                    No.Hp
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputSupplierPhone"
                                    name="phone"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputSupplierAddress" class="form-label">
                                    Alamat
                                </label>

                                <textarea
                                    class="form-control"
                                    id="inputSupplierAddress"
                                    name="address"
                                    required
                                ></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="inputSupplierCity" class="form-label">
                                    Kota
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputSupplierCity"
                                    name="city"
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
            .modal .form-control:focus,
            .modal textarea:focus {
                border-color: #444;
                box-shadow: 0 0 0 0.25rem rgba(0, 0, 0, 0.15);
            }
        </style>
    </x-slot:styles>
    {{-- Inline Styles End --}}
</x-bootstrap.layouts.page>