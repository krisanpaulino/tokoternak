@extends('template.front');
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Cart</h1>
    </div>
    <!-- Single Page Header End -->
    <!-- Cart Page Start -->
    <div class="container-fluid py-5">
        @if ($detail != null)
            <div class="container py-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Products</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detail as $r)
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            @if (isset($r->hewan->hewan_gambar))
                                                <img src="{{ Storage::disk('public')->exists($r->hewan->hewan_gambar) ? asset('storage/' . $r->hewan->hewan_gambar) : asset('storage/hewan/default.jpg') }}"
                                                    class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;"
                                                    alt="">
                                            @endif

                                        </div>
                                    </th>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $r->hewan->hewan_nama }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">Rp{{ number_format($r->hewan->hewan_harga) }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4">{{ $r->jumlah_beli }}</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4"></p>Rp{{ number_format($r->harga_detail) }}</p>
                                    </td>
                                    <td>
                                        <form action="{{ route('cart.delete') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="detailtransaksi_id"
                                                value="{{ $r->detailtransaksi_id }}">
                                            <button type="submit" class="btn btn-md rounded-circle bg-light border mt-4">
                                                <i class="fa fa-times text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row g-4 justify-content-end">
                    <div class="col-8"></div>
                    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                        <div class="bg-light rounded">
                            <div class="p-4">
                                <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p class="mb-0">Rp{{ number_format($transaksi->total_bayar) }}</p>
                                </div>
                            </div>
                            <a class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                                href="{{ route('checkout', $transaksi->transaksi_id) }}">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!-- Cart Page End -->
@endsection
