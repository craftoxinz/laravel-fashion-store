{{-- index.blade.php --}}

<x-layouts.admin>
    <x-slot:title>Halaman Promo</x-slot:title>

    <div>
        {{-- Navbar Start --}}
        <x-navbar />
        {{-- Navbar End --}}

        {{-- Table Start --}}
        <div class="container mt-5">
            <div class="d-flex align-items-center justify-content-between">
                <h3 class="fw-semibold mb-0">Tabel Promo</h3>

                <button
                    class="btn btn-dark fw-medium px-3"
                    type="button"
                    data-bs-toggle="modal"
                    data-bs-target="#createPromotionModal"
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
                                    <th scope="col">Nama Promo</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Tipe Diskon</th>
                                    <th scope="col">Nilai Diskon</th>
                                    <th scope="col">Minimum Belanja</th>
                                    <th scope="col">Tanggal Mulai</th>
                                    <th scope="col">Tanggal Selesai</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    /**
                                     * @var \Illuminate\Database\Eloquent\Collection<App\Models\Promotion> $promotions
                                     */
                                @endphp

                                @forelse ($promotions as $promotion)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $promotion->name }}</td>
                                        <td>{{ $promotion->code }}</td>
                                        <td>{{ $promotion->discount_type }}</td>
                                        <td>{{ $promotion->discount_value }}</td>
                                        <td>{{ $promotion->minimum_purchase }}</td>
                                        <td>{{ $promotion->start_date }}</td>
                                        <td>{{ $promotion->end_date }}</td>

                                        <td class="d-flex gap-2">
                                            <button
                                                class="btn btn-warning btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editPromotionModal{{ $promotion->id }}"
                                            >
                                                Edit
                                            </button>

                                            <form
                                                action="{{ route('admin.promotions.destroy', $promotion) }}"
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
                                        id="editPromotionModal{{ $promotion->id }}"
                                        tabindex="-1"
                                        aria-labelledby="editPromotionModalLabel"
                                        aria-hidden="true"
                                    >
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h1 class="modal-title fs-5">
                                                        Edit Promo
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
                                                    action="{{ route('admin.promotions.update', $promotion) }}"
                                                    method="POST"
                                                >
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="mb-3">
                                                            <label for="inputPromotionName" class="form-label">
                                                                Nama Promo
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="inputPromotionName"
                                                                name="name"
                                                                required
                                                                value="{{ $promotion->name }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputPromotionCode" class="form-label">
                                                                Kode
                                                            </label>

                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                id="inputPromotionCode"
                                                                name="code"
                                                                required
                                                                value="{{ $promotion->code }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputPromotionDiscountType" class="form-label">
                                                                Tipe Diskon
                                                            </label>

                                                            <select
                                                                class="form-select"
                                                                id="inputPromotionDiscountType"
                                                                name="discount_type"
                                                                required
                                                            >
                                                                <option
                                                                    value="percentage"
                                                                    {{ $promotion->discount_type === 'percentage' ? 'selected' : '' }}
                                                                >
                                                                    Percentage
                                                                </option>

                                                                <option
                                                                    value="fixed"
                                                                    {{ $promotion->discount_type === 'fixed' ? 'selected' : '' }}
                                                                >
                                                                    Fixed
                                                                </option>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputPromotionDiscountValue" class="form-label">
                                                                Nilai Diskon
                                                            </label>

                                                            <input
                                                                type="number"
                                                                class="form-control"
                                                                id="inputPromotionDiscountValue"
                                                                name="discount_value"
                                                                required
                                                                value="{{ $promotion->discount_value }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputPromotionMinimumPurchase" class="form-label">
                                                                Minimum Belanja
                                                            </label>

                                                            <input
                                                                type="number"
                                                                class="form-control"
                                                                id="inputPromotionMinimumPurchase"
                                                                name="minimum_purchase"
                                                                value="{{ $promotion->minimum_purchase }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputPromotionStartDate" class="form-label">
                                                                Tanggal Mulai
                                                            </label>

                                                            <input
                                                                type="date"
                                                                class="form-control"
                                                                id="inputPromotionStartDate"
                                                                name="start_date"
                                                                required
                                                                value="{{ $promotion->start_date }}"
                                                            >
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="inputPromotionEndDate" class="form-label">
                                                                Tanggal Selesai
                                                            </label>

                                                            <input
                                                                type="date"
                                                                class="form-control"
                                                                id="inputPromotionEndDate"
                                                                name="end_date"
                                                                required
                                                                value="{{ $promotion->end_date }}"
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
                                        <td colspan="9" class="text-center py-3 text-muted">
                                            Belum ada data promo tersedia.
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
            id="createPromotionModal"
            tabindex="-1"
            aria-labelledby="createPromotionModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h1 class="modal-title fs-5">
                            Tambah Promo
                        </h1>

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            data-bs-theme="dark"
                        ></button>
                    </div>

                    <form action="{{ route('admin.promotions.store') }}" method="POST">
                        <div class="modal-body">
                            @csrf

                            <div class="mb-3">
                                <label for="inputPromotionName" class="form-label">
                                    Nama Promo
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputPromotionName"
                                    name="name"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputPromotionCode" class="form-label">
                                    Kode
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="inputPromotionCode"
                                    name="code"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputPromotionDiscountType" class="form-label">
                                    Tipe Diskon
                                </label>

                                <select
                                    class="form-select"
                                    id="inputPromotionDiscountType"
                                    name="discount_type"
                                    required
                                >
                                    <option value="">Pilih tipe diskon</option>
                                    <option value="percentage">Percentage</option>
                                    <option value="fixed">Fixed</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="inputPromotionDiscountValue" class="form-label">
                                    Nilai Diskon
                                </label>

                                <input
                                    type="number"
                                    class="form-control"
                                    id="inputPromotionDiscountValue"
                                    name="discount_value"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputPromotionMinimumPurchase" class="form-label">
                                    Minimum Belanja
                                </label>

                                <input
                                    type="number"
                                    class="form-control"
                                    id="inputPromotionMinimumPurchase"
                                    name="minimum_purchase"
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputPromotionStartDate" class="form-label">
                                    Tanggal Mulai
                                </label>

                                <input
                                    type="date"
                                    class="form-control"
                                    id="inputPromotionStartDate"
                                    name="start_date"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="inputPromotionEndDate" class="form-label">
                                    Tanggal Selesai
                                </label>

                                <input
                                    type="date"
                                    class="form-control"
                                    id="inputPromotionEndDate"
                                    name="end_date"
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
            .modal .form-select:focus {
                border-color: #444;
                box-shadow: 0 0 0 0.25rem rgba(0, 0, 0, 0.15);
            }
        </style>
    </x-slot:styles>
    {{-- Inline Styles End --}}
</x-layouts.admin>

{{-- index.blade.php --}}
