{{-- index.blade.php --}}

<x-layouts.admin>
    <x-slot:title>Halaman Pelanggan</x-slot:title>
    <div>
        {{-- Navbar Start --}}

        <x-navbar />

        {{-- Navbar End --}}

        {{-- Table Start --}}

        <div class="container mt-5">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="fw-semibold mb-0">Tabel Pelanggan</h3>
                <button class="btn btn-dark fw-medium px-3" type="button" data-bs-toggle="modal" data-bs-target="#createCustomerModal">Tambah</button>
            </div>

            <div class="card border-0 shadow mt-4">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr class="table-dark">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pelanggan</th>
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
                                     * @var \Illuminate\Database\Eloquent\Collection<App\Models\Customer> $customers
                                     */
                                @endphp
                                @forelse ($customers as $customer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->city }}</td>
                                        <td class="d-flex gap-2">
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCustomerModal{{ $customer->id }}">
                                                Edit
                                            </button>

                                            <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    {{-- Modal Edit Start --}}
                                    <div class="modal fade" id="editCustomerModal{{ $customer->id }}" tabindex="-1" aria-labelledby="editCustomerModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h1 class="modal-title fs-5" id="editCustomerModalLabel">Tambah Pelanggan</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-theme="dark"></button>
                                                </div>
                                                <form action="{{ route('admin.customers.update', $customer) }}" method="POST">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="inputCustomerName" class="form-label">Nama Pelanggan</label>
                                                            <input type="text" class="form-control"
                                                                id="inputCustomerName"
                                                                name="name"
                                                                required
                                                                value="{{ $customer->name }}"
                                                            >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inputCustomerEmail" class="form-label">Email</label>
                                                            <input type="email" class="form-control"
                                                                id="inputCustomerEmail"
                                                                name="email"
                                                                required
                                                                value="{{ $customer->email }}"
                                                            >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inputCustomerPhone" class="form-label">No.Hp</label>
                                                            <input type="tel" class="form-control"
                                                                id="inputCustomerPhone"
                                                                name="phone"
                                                                required
                                                                value="{{ $customer->phone }}"
                                                            >
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inputCustomerAddress" class="form-label">Alamat</label>
                                                            <textarea class="form-control"
                                                                id="inputCustomerAddress"
                                                                name="address"
                                                                required
                                                            >{{ $customer->address }}   
                                                            </textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inputCustomerCity" class="form-label">Kota</label>
                                                            <input type="text" class="form-control"
                                                                id="inputCustomerCity"
                                                                name="city"
                                                                required
                                                                value="{{ $customer->city }}"
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
                                            Belum ada pelanggan tersedia.
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

        <div class="modal fade" id="createCustomerModal" tabindex="-1" aria-labelledby="createCustomerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h1 class="modal-title fs-5" id="createCustomerModalLabel">Tambah Pelanggan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-bs-theme="dark"></button>
                    </div>
                    <form action="{{ route('admin.customers.store') }}" method="POST">
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3">
                                <label for="inputCustomerName" class="form-label">Nama Pelanggan</label>
                                <input type="text" class="form-control" id="inputCustomerName" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputCustomerEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputCustomerEmail" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputCustomerPhone" class="form-label">No.Hp</label>
                                <input type="tel" class="form-control" id="inputCustomerPhone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputCustomerAddress" class="form-label">Alamat</label>
                                <textarea class="form-control" id="inputCustomerAddress" name="address" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="inputCustomerCity" class="form-label">Kota</label>
                                <input type="text" class="form-control" id="inputCustomerCity" name="city" required>
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
