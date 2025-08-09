@extends('layouts.app')

@section('title', 'Categories')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Orders</h1>
                {{-- <div class="section-header-button">
                    <a href="{{ route('order.create') }}" class="btn btn-primary">Add New</a>
                </div> --}}
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Product</a></div>
                    <div class="breadcrumb-item">All Orders</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Orders</h2>
                {{-- <p class="section-lead">
                    You can manage all Product, such as editing, deleting and more.
                </p> --}}


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>All Posts</h4>
                                <a href="{{ route('order.export') }}" class="ml-3 btn btn-md btn-success btn-icon">
                                    <i class="fa fa-file-excel"></i>
                                    Export
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET" action="{{ route('order.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="trx_id">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>

                                            <th>No</th>
                                            <th>Transaction Id</th>
                                            <th>Shipping Name</th>
                                            <th>Subtotal</th>
                                            <th>Transaction Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $order->trx_id }}
                                                </td>
                                                <td>{{ Str::upper($order->shipping_service) }}
                                                </td>
                                                <td>Rp. {{ number_format($order->total_cost) }}
                                                </td>
                                                <td>{{ $order->created_at->setTimezone('Asia/Jakarta') }}
                                                </td>
                                                <td>
                                                    @if ($order->status == 'paid' || $order->status == 'processing' || $order->status == 'delivered')
                                                        <span
                                                            class="badge badge-success">{{ camel_case($order->status) }}</span>
                                                    @elseif ($order->status == 'pending')
                                                        <span class="badge badge-warning">{{ 'Pending' }}</span>
                                                    @elseif ($order->status == 'failed' || $order->status == 'expired')
                                                        <span class="badge badge-danger">{{ $order->status }}</span>
                                                    @else
                                                        <span class="badge badge-info">{{ $order->status }}</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('order.edit', $order->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        <a href='{{ route('order.show', $order->id) }}'
                                                            class="ml-3 btn
                                                            btn-sm btn-warning btn-icon">
                                                            <i class="fas fa-info"></i>
                                                            Detail
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $orders->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
