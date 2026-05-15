{{-- index.blade.php --}}

<x-layouts.admin>
    <x-slot:title>Halaman Ukuran</x-slot:title>

    <div>
        {{-- Navbar Start --}}
        <x-navbar />
        {{-- Navbar End --}}

        {{-- Table Start --}}
        <div class="container mt-5">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="fw-semibold mb-0">Tabel Ukuran</h3>

                <button
                    class="btn btn-dark fw-medium px-3"
                    type="button"
                    data-bs-toggle="modal"
                    data-bs-target="#createSizeModal"
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
                                    <th scope="col">Tipe</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    /**
                                     * @var \Illuminate\Database\Eloquent\Collection<App\Models\Size> $sizes
                                     */
                                @endphp

                                @forelse ($sizes as $size)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $size->name }}</td>
                                        <td>{{ $size->type }}</td>
                                        <td>{{ $size->description }}</td>

                                        <td class="d-flex gap-2">
                                            <button
                                                class="btn btn-warning btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editSizeModal{{ $size->id }}"
                                            >
                                                Edit
                                            </button>

                                            <form
                                                action="{{ route('admin.sizes.destroy', $size) }}"
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
                                        id="editSizeModal{{ $size->id }}"
                                        tabindex="-1"
                                        aria-hidden="true"
                                    >
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h1 class="modal-title fs-5">
                                                        Edit Ukuran
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
                                                    action="{{ route('admin.sizes.update', $size) }}"
                                                    method="POST"
                                                >
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="mb-3">
                                                            <label class="form-label">
                                                                Nama
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                name="name"
                                                                required
                                                                value="{{ $size->name }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">
                                                                Tipe
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                name="type"
                                                                required
                                                                value="{{ $size->type }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">
                                                                Deskripsi
                                                            </label>

                                                            <textarea
                                                                class="form-control"
                                                                name="description"
                                                                rows="3"
                                                            >{{ $size->description }}</textarea>
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

                                                        <button
                                                            type="submit"
                                                            class="btn btn-dark"
                                                        >
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
                                        <td colspan="5" class="text-center py-3 text-muted">
                                            Belum ada data ukuran tersedia.
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
            id="createSizeModal"
            tabindex="-1"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h1 class="modal-title fs-5">
                            Tambah Ukuran
                        </h1>

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            data-bs-theme="dark"
                        ></button>
                    </div>

                    <form action="{{ route('admin.sizes.store') }}" method="POST">
                        <div class="modal-body">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">
                                    Nama
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Tipe
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    name="type"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Deskripsi
                                </label>

                                <textarea
                                    class="form-control"
                                    name="description"
                                    rows="3"
                                ></textarea>
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
</x-layouts.admin>

{{-- index.blade.php --}}
