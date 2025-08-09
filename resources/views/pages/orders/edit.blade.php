@extends('layouts.app')

@section('title', 'Edit Order')

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
                <h1>Edit Order</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Order</a></div>
                    <div class="breadcrumb-item">Edit Resi</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title mt-5">Order</h2>
                <div class="card">
                    <form action="{{ route('order.update', $order) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select name="status"
                                    class="form-control selectric @error('status')
                                    is-invalid  @enderror"
                                    id="">
                                    <option value="">-- Select Status --</option>
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Success</option>
                                    <option value="expired" {{ $order->status == 'expired' ? 'selected' : '' }}>Expired
                                    </option>
                                    <option value="failed" {{ $order->status == 'failed' ? 'selected' : '' }}>Failed
                                    </option>
                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>
                                        Delivered
                                    </option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>
                                        Processing</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Category</label>
                                <select name="shipping_service" {{-- value="{{ $order->shipping_service }} --}}
                                    class="form-control
                                    selectric
                                    @error('shipping_service')
                                    is-invalid  @enderror">
                                    <option value="">-- Select Status --</option>
                                    <option value="jne" {{ $order->shipping_service == 'jne' ? 'selected' : '' }}>
                                        JNE</option>
                                    <option value="jnt" {{ $order->shipping_service == 'jnt' ? 'selected' : '' }}>
                                        JNT</option>
                                    <option value="pos" {{ $order->shipping_service == 'pos' ? 'selected' : '' }}>
                                        POS</option>
                                    <option value="sicepat" {{ $order->shipping_service == 'sicepat' ? 'selected' : '' }}>
                                        SI CEPAT</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Resi</label>
                                <input type="text"
                                    class="form-control @error('shipping_resi')
                                is-invalid
                            @enderror"
                                    name="shipping_resi" value="{{ $order->shipping_resi }}" placeholder="Input Resi">
                                @error('shipping_resi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
