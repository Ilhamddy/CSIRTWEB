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
                <h1>Photos</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Gallery</a></div>
                    <div class="breadcrumb-item">Photos</div>
                </div>
            </div>
            <div class="section-body">


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>All Photos</h4>
                                <div class="section-header-button">
                                    <a href="{{ route('foto.create') }}" class="btn btn-primary">Add New</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET" action="{{ route('foto.index') }}">
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
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($photos as $photo)
                                            <tr class="">
                                                <td>{{ $loop->iteration + ($photos->currentPage() - 1) * $photos->perPage() }}
                                                <td>{{ $photo->title }}
                                                </td>

                                                <td>
                                                    @if (Str::startsWith($photo->image, ['http://', 'https://']))
                                                        <img src="{{ $photo->image }}" width="50" alt="">
                                                    @else
                                                        <img src="{{ asset('storage/' . $photo->image_path) }}"
                                                            width="80" height="50" alt="{{ $photo->title }}"
                                                            class="">
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center ">
                                                        <a href='{{ route('foto.edit', $photo->id) }}'
                                                            class="btn btn-sm btn-warning btn-icon mr-2">
                                                            <i class="fas fa-edit"></i>
                                                            {{-- Edit --}}
                                                        </a>
                                                        <a href="{{ route('foto.destroy', $photo->id) }}"
                                                            title="Delete data {{ $photo->title }}"
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
                                    {{ $photos->withQueryString()->links() }}
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
