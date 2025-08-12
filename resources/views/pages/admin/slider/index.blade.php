@extends('layouts.app')

@section('title', 'Sliders')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Slider</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Slider</a></div>
                    <div class="breadcrumb-item">Slider</div>
                </div>
            </div>
            <div class="section-body">


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>All Slider</h4>
                                <div class="section-header-button">
                                    <a href="{{ route('slider.create') }}" class="btn btn-primary">Add New</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET" action="{{ route('slider.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="search">
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
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Sort Order</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($sliders as $slider)
                                            <tr class="">
                                                <td>{{ $loop->iteration + ($sliders->currentPage() - 1) * $sliders->perPage() }}
                                                <td>{{ $slider->title }}
                                                </td>
                                                <td>{{ $slider->description }}
                                                </td>

                                                <td>
                                                    <img src="{{ asset('storage/' . $slider->image) }}" width="80"
                                                        height="50" alt="{{ $slider->title }}" class="">

                                                </td>
                                                <td>{{ $slider->sort_order }}
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center ">
                                                        <a href='{{ route('slider.edit', $slider->id) }}'
                                                            class="btn btn-sm btn-warning btn-icon mr-2">
                                                            <i class="fas fa-edit"></i>
                                                            {{-- Edit --}}
                                                        </a>
                                                        <a href="{{ route('slider.destroy', $slider->id) }}"
                                                            title="Delete data {{ $slider->title }}"
                                                            class="btn btn-sm btn-danger btn-icon action-confirm"
                                                            data-method="delete">
                                                            <i class="fas fa-trash"></i>
                                                        </a>


                                                    </div>
                                                </td>

                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $sliders->withQueryString()->links() }}
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
    <script src="{{ asset('js/page/features-photos.js') }}"></script>
    <script>
        // Notifikasi untuk sukses
        @if (session('success'))
            Swal.fire({
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#28a745',
                timer: 4000,
                timerProgressBar: true,
                showConfirmButton: true
            });
        @endif

        // Notifikasi untuk error
        @if (session('error'))
            Swal.fire({
                title: 'Gagal!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#dc3545'
            });
        @endif



        // Konfirmasi sebelum submit (opsional)
    </script>
@endpush
