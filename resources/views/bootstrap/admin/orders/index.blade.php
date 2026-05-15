<x-bootstrap.layouts.page>
    <x-slot:pageTitle>Halaman Order</x-slot:pageTitle>

    <div>
        {{-- Navbar Start --}}
        <x-bootstrap.navbar />
        {{-- Navbar End --}}

        {{-- Table Start --}}
        <div class="container mt-5">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="fw-semibold mb-0">Tabel Order</h3>

                <button
                    class="btn btn-dark fw-medium px-3"
                    type="button"
                    data-bs-toggle="modal"
                    data-bs-target="#createOrdersModal"
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
                                    <th scope="col">Kode Order</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">No.Hp</th>
                                    <th scope="col">Alamat Pengiriman</th>
                                    <th scope="col">Total Jumlah</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    /**
                                     * @var \Illuminate\Database\Eloquent\Collection<App\Models\Order> $orders
                                     */
                                @endphp

                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->order_code }}</td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->customer_phone }}</td>
                                        <td>{{ $order->shipping_address }}</td>
                                        <td>{{ $order->total_amount }}</td>

                                        <td>
                                            @if ($order->status == 'pending')
                                                <span class="badge bg-warning text-dark">
                                                    Pending
                                                </span>

                                            @elseif ($order->status == 'processing')
                                                <span class="badge bg-primary">
                                                    Processing
                                                </span>

                                            @elseif ($order->status == 'cancelled')
                                                <span class="badge bg-danger">
                                                    Cancelled
                                                </span>
                                            @endif
                                        </td>

                                        <td class="d-flex gap-2">
                                            <button
                                                class="btn btn-warning btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editOrderModal{{ $order->id }}"
                                            >
                                                Edit
                                            </button>

                                            <form
                                                action="{{ route('admin.orders.destroy', $order) }}"
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
                                        id="editOrderModal{{ $order->id }}"
                                        tabindex="-1"
                                        aria-labelledby="editOrderModalLabel"
                                        aria-hidden="true"
                                    >
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h1 class="modal-title fs-5">
                                                        Edit Order
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
                                                    action="{{ route('admin.orders.update', $order) }}"
                                                    method="POST"
                                                >
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="mb-3">
                                                            <label for="inputOrderCode" class="form-label">
                                                                Kode Order
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="inputOrderCode"
                                                                name="order_code"
                                                                required
                                                                value="{{ $order->order_code }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputOrderCustomerName" class="form-label">
                                                                Nama Pelanggan
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="inputOrderCustomerName"
                                                                name="customer_name"
                                                                required
                                                                value="{{ $order->customer_name }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputOrderCustomerPhone" class="form-label">
                                                                No.Hp
                                                            </label>

                                                            <input
                                                                type="number"
                                                                class="form-control"
                                                                id="inputOrderCustomerPhone"
                                                                min="0"
                                                                name="customer_phone"
                                                                required
                                                                value="{{ $order->customer_phone }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputOrderShippingAddress" class="form-label">
                                                                Alamat Pengiriman
                                                            </label>

                                                            <textarea
                                                                class="form-control"
                                                                id="inputOrderShippingAddress"
                                                                name="shipping_address"
                                                                required
                                                            >{{ $order->shipping_address }}</textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputOrderTotalAmount" class="form-label">
                                                                Total Jumlah
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="inputOrderTotalAmount"
                                                                name="total_amount"
                                                                required
                                                                value="{{ $order->total_amount }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputOrderStatus" class="form-label">
                                                                Status
                                                            </label>

                                                            <select
                                                                class="form-select"
                                                                id="inputOrderStatus"
                                                                name="status"
                                                                required
                                                            >
                                                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>
                                                                    Pending
                                                                </option>

                                                                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                                                    Processing
                                                                </option>

                                                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                                                                    Cancelled
                                                                </option>
                                                            </select>
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
                                            Belum ada order tersedia.
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
            id="createOrdersModal"
            tabindex="-1"
            aria-labelledby="createOrderModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h1 class="modal-title fs-5">
                            Tambah Order
                        </h1>

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            data-bs-theme="dark"
                        ></button>
                    </div>

                    <form action="{{ route('admin.orders.store') }}" method="POST">
                        <div class="modal-body">
                            @csrf

                            <div class="mb-3">
                                <label for="inputOrderCode" class="form-label">
                                    Kode Order
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputOrderCode"
                                    name="order_code"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputOrderCustomerName" class="form-label">
                                    Nama Pelanggan
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputOrderCustomerName"
                                    name="customer_name"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputOrderCustomerPhone" class="form-label">
                                    No.Hp
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputOrderCustomerPhone"
                                    name="customer_phone"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputOrderShippingAddress" class="form-label">
                                    Alamat Pengiriman
                                </label>

                                <textarea
                                    class="form-control"
                                    id="inputOrderShippingAddress"
                                    name="shipping_address"
                                    required
                                ></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="inputOrderTotalAmount" class="form-label">
                                    Total Jumlah
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputOrderTotalAmount"
                                    name="total_amount"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputOrderStatus" class="form-label">
                                    Status
                                </label>

                                <select
                                    class="form-select"
                                    id="inputOrderStatus"
                                    name="status"
                                    required
                                >
                                    <option value="">
                                        --- Pilih Status ---
                                    </option>

                                    <option value="pending">
                                        Pending
                                    </option>

                                    <option value="processing">
                                        Processing
                                    </option>

                                    <option value="cancelled">
                                        Cancelled
                                    </option>
                                </select>
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
            .modal .form-select:focus {
                border-color: #444;
                box-shadow: 0 0 0 0.25rem rgba(0, 0, 0, 0.15);
            }
        </style>
    </x-slot:styles>
    {{-- Inline Styles End --}}
</x-bootstrap.layouts.page>