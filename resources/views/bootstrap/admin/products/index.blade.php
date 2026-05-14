<x-bootstrap.layouts.page>
    <x-slot:pageTitle>Dashboard</x-slot:pageTitle>
    <div>
        {{-- Navbar Start --}}
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand" href="#">Fashion</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}" href="#">Produk</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        {{-- Navbar End --}}

        {{-- Table Start --}}
        <div class="container mt-5">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="fw-semibold mb-0">Tabel Produk</h3>
                <button class="btn btn-dark fw-medium px-3" type="button" data-bs-toggle="modal" data-bs-target="#createProductsModal">Tambah</button>
            </div>

            <div class="card border-0 shadow mt-4">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr class="table-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Sku</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                     /**
                                     * @var \Illuminate\Database\Eloquent\Collection<App\Models\Product> $products
                                     */
                                @endphp
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td class="d-flex gap-2">
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $product->id }}">
                                                Edit
                                            </button>

                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    {{-- Modal Edit Start --}}
                                    <div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h1 class="modal-title fs-5" id="editProductModalLabel">Tambah Produk</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-theme="dark"></button>
                                                </div>
                                                <form action="{{ route('admin.products.update', $product) }}" method="POST">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="inputProductName" class="form-label">Nama Produk</label>
                                                            <input type="text" class="form-control"
                                                                id="inputProductName"
                                                                name="name"
                                                                required
                                                                value="{{ $product->name }}"
                                                            >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inputProductDescription" class="form-label">Deskripsi</label>
                                                            <input type="text" class="form-control"
                                                                id="inputProductDescription"
                                                                name="description"
                                                                required
                                                                value="{{ $product->description }}"
                                                            >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inputProductPrice" class="form-label">Harga</label>
                                                            <input type="number" class="form-control"
                                                                id="inputProductPrice"
                                                                min="0"
                                                                name="price"
                                                                required
                                                                value="{{ $product->price }}"
                                                            >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inputProductStock" class="form-label">Stok</label>
                                                            <input type="number" class="form-control"
                                                                id="inputProductStock"
                                                                min="0"
                                                                name="stock"
                                                                required
                                                                value="{{ $product->stock }}"
                                                            >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inputProductSku" class="form-label">Sku</label>
                                                            <input type="text" class="form-control"
                                                                id="inputProductSku"
                                                                name="sku"
                                                                required
                                                                value="{{ $product->sku }}"
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
                                            Belum ada produk tersedia.
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
        <div class="modal fade" id="createProductsModal" tabindex="-1" aria-labelledby="createProductModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h1 class="modal-title fs-5" id="createProductModalLabel">Tambah Produk</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-theme="dark"></button>
                    </div>
                    <form action="{{ route('admin.products.store') }}" method="POST">
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3">
                                <label for="inputProductName" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" id="inputProductName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputProductDescription" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" id="inputProductDescription" name="description" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputProductPrice" class="form-label">Harga</label>
                                <input type="number" class="form-control" id="inputProductPrice" min="0" name="price" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputProductStock" class="form-label">Stok</label>
                                <input type="number" class="form-control" id="inputProductStock" min="0" name="stock" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputProductSku" class="form-label">Sku</label>
                                <input type="text" class="form-control" id="inputProductSku" name="sku" required>
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
    <x-slot:styles>
        <style>
            .modal .form-control:focus {
                border-color: #444;
                box-shadow: 0 0 0 0.25rem rgba(0, 0, 0, 0.15);
            }
        </style>
    </x-slot:styles>
    {{-- Inline Styles End --}}
</x-bootstrap.layouts.page>
