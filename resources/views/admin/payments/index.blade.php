{{-- index.blade.php --}}

<x-layouts.admin>
    <x-slot:title>Halaman Pembayaran</x-slot:title>

    <div>
        {{-- Navbar Start --}}
        <x-navbar />
        {{-- Navbar End --}}

        {{-- Table Start --}}
        <div class="container mt-5">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="fw-semibold mb-0">Tabel Pembayaran</h3>

                <button
                    class="btn btn-dark fw-medium px-3"
                    type="button"
                    data-bs-toggle="modal"
                    data-bs-target="#createPaymentModal"
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
                                    <th scope="col">Kode Pembayaran</th>
                                    <th scope="col">Kode Order</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Metode</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Dibayar Pada</th>
                                    <th scope="col">Catatan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    /**
                                     * @var \Illuminate\Database\Eloquent\Collection<App\Models\Payment> $payments
                                     */
                                @endphp

                                @forelse ($payments as $payment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $payment->payment_code }}</td>
                                        <td>{{ $payment->order_code }}</td>
                                        <td>{{ $payment->amount }}</td>
                                        <td>{{ $payment->method }}</td>
                                        <td>{{ $payment->status }}</td>
                                        <td>{{ $payment->paid_at }}</td>
                                        <td>{{ $payment->notes }}</td>

                                        <td class="d-flex gap-2">
                                            <button
                                                class="btn btn-warning btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editPaymentModal{{ $payment->id }}"
                                            >
                                                Edit
                                            </button>

                                            <form
                                                action="{{ route('admin.payments.destroy', $payment) }}"
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
                                        id="editPaymentModal{{ $payment->id }}"
                                        tabindex="-1"
                                        aria-labelledby="editPaymentModalLabel"
                                        aria-hidden="true"
                                    >
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h1 class="modal-title fs-5">
                                                        Edit Pembayaran
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
                                                    action="{{ route('admin.payments.update', $payment) }}"
                                                    method="POST"
                                                >
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="mb-3">
                                                            <label for="inputPaymentCode{{ $payment->id }}" class="form-label">
                                                                Kode Pembayaran
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="inputPaymentCode{{ $payment->id }}"
                                                                name="payment_code"
                                                                required
                                                                value="{{ $payment->payment_code }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputOrderCode{{ $payment->id }}" class="form-label">
                                                                Kode Order
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="inputOrderCode{{ $payment->id }}"
                                                                name="order_code"
                                                                required
                                                                value="{{ $payment->order_code }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputAmount{{ $payment->id }}" class="form-label">
                                                                Jumlah
                                                            </label>

                                                            <input
                                                                type="number"
                                                                class="form-control"
                                                                id="inputAmount{{ $payment->id }}"
                                                                name="amount"
                                                                required
                                                                value="{{ $payment->amount }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputMethod{{ $payment->id }}" class="form-label">
                                                                Metode
                                                            </label>

                                                            <select
                                                                class="form-select"
                                                                id="inputMethod{{ $payment->id }}"
                                                                name="method"
                                                                required
                                                            >
                                                                <option value="cash" {{ $payment->method === 'cash' ? 'selected' : '' }}>
                                                                    Cash
                                                                </option>

                                                                <option value="bank_transfer" {{ $payment->method === 'bank_transfer' ? 'selected' : '' }}>
                                                                    Bank Transfer
                                                                </option>

                                                                <option value="e_wallet" {{ $payment->method === 'e_wallet' ? 'selected' : '' }}>
                                                                    E-Wallet
                                                                </option>

                                                                <option value="credit_card" {{ $payment->method === 'credit_card' ? 'selected' : '' }}>
                                                                    Credit Card
                                                                </option>

                                                                <option value="debit_card" {{ $payment->method === 'debit_card' ? 'selected' : '' }}>
                                                                    Debit Card
                                                                </option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputStatus{{ $payment->id }}" class="form-label">
                                                                Status
                                                            </label>

                                                            <select
                                                                class="form-select"
                                                                id="inputStatus{{ $payment->id }}"
                                                                name="status"
                                                                required
                                                            >
                                                                <option value="pending" {{ $payment->status === 'pending' ? 'selected' : '' }}>
                                                                    Pending
                                                                </option>

                                                                <option value="paid" {{ $payment->status === 'paid' ? 'selected' : '' }}>
                                                                    Paid
                                                                </option>

                                                                <option value="failed" {{ $payment->status === 'failed' ? 'selected' : '' }}>
                                                                    Failed
                                                                </option>

                                                                <option value="cancelled" {{ $payment->status === 'cancelled' ? 'selected' : '' }}>
                                                                    Cancelled
                                                                </option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputPaidAt{{ $payment->id }}" class="form-label">
                                                                Dibayar Pada
                                                            </label>

                                                            <input
                                                                type="datetime-local"
                                                                class="form-control"
                                                                id="inputPaidAt{{ $payment->id }}"
                                                                name="paid_at"
                                                                value="{{ $payment->paid_at }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputNotes{{ $payment->id }}" class="form-label">
                                                                Catatan
                                                            </label>

                                                            <textarea
                                                                class="form-control"
                                                                id="inputNotes{{ $payment->id }}"
                                                                name="notes"
                                                                rows="3"
                                                            >{{ $payment->notes }}</textarea>
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
                                        <td colspan="9" class="text-center py-3 text-muted">
                                            Belum ada data pembayaran tersedia.
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
            id="createPaymentModal"
            tabindex="-1"
            aria-labelledby="createPaymentModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h1 class="modal-title fs-5">
                            Tambah Pembayaran
                        </h1>

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            data-bs-theme="dark"
                        ></button>
                    </div>

                    <form action="{{ route('admin.payments.store') }}" method="POST">
                        <div class="modal-body">
                            @csrf

                            <div class="mb-3">
                                <label for="inputPaymentCode" class="form-label">
                                    Kode Pembayaran
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputPaymentCode"
                                    name="payment_code"
                                    required
                                >
                            </div>

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
                                <label for="inputAmount" class="form-label">
                                    Jumlah
                                </label>

                                <input
                                    type="number"
                                    class="form-control"
                                    id="inputAmount"
                                    name="amount"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputMethod" class="form-label">
                                    Metode
                                </label>

                                <select
                                    class="form-select"
                                    id="inputMethod"
                                    name="method"
                                    required
                                >
                                    <option value="">
                                        Pilih metode pembayaran
                                    </option>

                                    <option value="cash">
                                        Cash
                                    </option>

                                    <option value="bank_transfer">
                                        Bank Transfer
                                    </option>

                                    <option value="e_wallet">
                                        E-Wallet
                                    </option>

                                    <option value="credit_card">
                                        Credit Card
                                    </option>

                                    <option value="debit_card">
                                        Debit Card
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="inputStatus" class="form-label">
                                    Status
                                </label>

                                <select
                                    class="form-select"
                                    id="inputStatus"
                                    name="status"
                                    required
                                >
                                    <option value="">
                                        Pilih status pembayaran
                                    </option>

                                    <option value="pending">
                                        Pending
                                    </option>

                                    <option value="paid">
                                        Paid
                                    </option>

                                    <option value="failed">
                                        Failed
                                    </option>

                                    <option value="cancelled">
                                        Cancelled
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="inputPaidAt" class="form-label">
                                    Dibayar Pada
                                </label>

                                <input
                                    type="datetime-local"
                                    class="form-control"
                                    id="inputPaidAt"
                                    name="paid_at"
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputNotes" class="form-label">
                                    Catatan
                                </label>

                                <textarea
                                    class="form-control"
                                    id="inputNotes"
                                    name="notes"
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
            .modal .form-select:focus {
                border-color: #444;
                box-shadow: 0 0 0 0.25rem rgba(0, 0, 0, 0.15);
            }
        </style>
    </x-slot:styles>
    {{-- Inline Styles End --}}
</x-layouts.admin>

{{-- index.blade.php --}}