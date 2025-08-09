@extends('layouts.app')

@section('title', 'Detail Order')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Order</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Order</a></div>
                    <div class="breadcrumb-item">Detail</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title mt-5">Order</h2>
                <div class="card">
                    <div class="card-header d-md-flex justify-content-between align-items-center">
                        <h5>Detail Order</h5>
                        <a class="btn btn-primary " href="{{ route('print', $order->id) }}" target="_blank"><i
                                class="fas fa-print mr-2"></i>Print</a>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-2">Trx Id</dt>
                            <dd class="col-sm-10">: {{ $order->trx_id }}</dd>
                            <dt class="col-sm-2">Name</dt>
                            <dd class="col-sm-10">: {{ $order->address->name }}</dd>
                            <dt class="col-sm-2">Address</dt>
                            <dd class="col-sm-10">: {{ $order->address->full_address }} ,
                                {{ $order->address->postal_code }}
                            </dd>
                            <dt class="col-sm-2">Subtotal</dt>
                            <dd class="col-sm-10">: Rp. {{ number_format($order->subtotal) }}</dd>
                            <dt class="col-sm-2">Shipping Cost</dt>
                            <dd class="col-sm-10">: Rp. {{ number_format($order->shipping_cost) }}</dd>
                            <dt class="col-sm-2">Total Cost</dt>
                            <dd class="col-sm-10 font-weight-bold">: Rp. {{ number_format($order->total_cost) }}</dd>
                            <!-- tambahkan item lainnya sesuai kebutuhan -->
                        </dl>
                        <div class="table-responsive">
                            <table class="table-striped table">
                                <tr>
                                    <th>Name Product</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                @foreach ($order->orderitems as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>
                                            @if (Str::startsWith($item->product->image, ['http://', 'https://']))
                                                <img src="{{ $item->product->image }}" width="50" alt="">
                                            @else
                                                <img src="{{ asset('storage/products/' . $item->product->image) }}"
                                                    width="50" alt="">
                                            @endif
                                        </td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>Rp. {{ number_format($item->quantity * $item->product->price) }}</td>
                                    </tr>
                                @endforeach


                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
