{{-- index.blade.php --}}

<x-layouts.admin>
    <x-slot:title>Halaman Kategori</x-slot:title>
    <div>
        {{-- Navbar Start --}}

        <x-navbar />

        {{-- Navbar End --}}

        {{-- Table Start --}}

        <div class="container mt-5">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="fw-semibold mb-0">Tabel Kategori</h3>
                <button class="btn btn-dark fw-medium px-3" type="button" data-bs-toggle="modal" data-bs-target="#createCategoryModal">Tambah</button>
            </div>

            <div class="card border-0 shadow mt-4">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr class="table-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                     /**
                                     * @var \Illuminate\Database\Eloquent\Collection<App\Models\Category> $categories
                                     */
                                @endphp
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td class="d-flex gap-2">
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $category->id }}">
                                                Edit
                                            </button>

                                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    {{-- Modal Edit Start --}}
                                    <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h1 class="modal-title fs-5" id="editPCategoryodalLabel">Tambah Kategori</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-theme="dark"></button>
                                                </div>
                                                <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="inputCategoryName" class="form-label">Kategori</label>
                                                            <input type="text" class="form-control"
                                                                id="inputCategoryName"
                                                                name="name"
                                                                required
                                                                value="{{ $category->name }}"
                                                            >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inputCategorySlug" class="form-label">Slug</label>
                                                            <input type="text" class="form-control"
                                                                id="inputCategorySlug"
                                                                name="slug"
                                                                required
                                                                value="{{ $category->slug }}"
                                                            >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inputCategoryDescription" class="form-label">Deskripsi</label>
                                                            <input type="text" class="form-control"
                                                                id="inputCategoryDescription"
                                                                name="description"
                                                                required
                                                                value="{{ $category->description }}"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-dark">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal Edit End --}}
                                @empty
                                     <tr>
                                        <td colspan="7" class="text-center py-3 text-muted">
                                            Belum ada kategori tersedia.
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

        <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h1 class="modal-title fs-5" id="createCategoryModalLabel">Tambah Produk</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-theme="dark"></button>
                    </div>
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3">
                                <label for="inputCategoryName" class="form-label">Kategori</label>
                                <input type="text" class="form-control" id="inputCategoryName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputCategorySlug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="inputCategorySlug" name="slug" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputCategoryDescription" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" id="inputCategoryDescription" name="description" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Modal Create End --}}
    </div>

    {{-- Inline Styles Start --}}

    @pushOnce('styles')
        <style></style>
    @endPushOnce

    {{-- Inline Styles End --}}
</x-layouts.admin>

{{-- index.blade.php --}}
