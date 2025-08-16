@extends('layouts.app')

@section('title', 'Product Create')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Layanan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Layanan</a></div>
                    <div class="breadcrumb-item">Create</div>
                </div>
            </div>

            <div class="section-body">
                {{-- <h2 class="section-title">Layanan</h2> --}}



                <div class="card">
                    <form action="{{ route('layanan.store') }}" method="POST" enctype="multipart/form-data" id="postForm">
                        @csrf
                        <div class="card-header">
                            <h4>Form Layanan</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" required
                                    class="form-control @error('title')
                                is-invalid
                            @enderror"
                                    value="{{ old('title') }}" name="title">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Subtitle</label>
                                <input type="text" required
                                    class="form-control @error('subtitle')
                                is-invalid
                            @enderror"
                                    value="{{ old('subtitle') }}" name="subtitle">
                                @error('subtitle')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label class="form-label">Category</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="type" value="berita" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">Berita</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="type" value="pengumuman" class="selectgroup-input">
                                        <span class="selectgroup-button">Pengumuman</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="type" value="kegiatan" class="selectgroup-input">
                                        <span class="selectgroup-button">Kegiatan</span>
                                    </label>

                                </div>
                                @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}


                            {{-- <div class="form-group">
                                <label class="form-label">Category</label>
                                <select name="category_id"
                                    class="form-control selectric @error('category_id')
                                    is-invalid  @enderror"
                                    id="">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="form-group">
                                <label>Icon</label>
                                <div class="col-12">
                                    <input type="file" id="image" class="form-control"
                                        accept="image/jpeg,image/jpg,image/png" name="icon"
                                        @error('icon') is-invalid @enderror onchange="previewImage(event)">
                                    <img id="preview" src="#" alt="Preview"
                                        style="display:none; margin-top:10px; max-height:200px;">
                                </div>
                                @error('icon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text"
                                    class="form-control @error('link')
                                is-invalid
                            @enderror"
                                    name="link" value="{{ old('link') }}">
                                <p>*Jika tidak ada link, biarkan kosong</p>
                                @error('link')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="">Content</label>
                                <div class="col-12 ">
                                    <textarea class="summernote" name="description">
                                        {{ old('description') }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value=true class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">Aktif</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value=false class="selectgroup-input">
                                        <span class="selectgroup-button">Non Aktif</span>
                                    </label>

                                </div>
                                @error('status')
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
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('library/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('js/summernote.js') }}"></script>
    <script src="{{ asset('js/preview-img.js') }}"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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

        // Notifikasi untuk validation errors
        @if ($errors->any())
            let errorMessages = '';
            @foreach ($errors->all() as $error)
                errorMessages += '• {{ addslashes($error) }}<br>';
            @endforeach

            Swal.fire({
                title: 'Validasi Error!',
                html: '<div style="text-align: left;">' + errorMessages + '</div>',
                icon: 'warning',
                confirmButtonText: 'OK',
                confirmButtonColor: '#ffc107',
                width: '500px'
            });
        @endif

        // Konfirmasi sebelum submit (opsional)
        document.getElementById('postForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Validasi summernote content
            // var content = $('.summernote').summernote('code');
            // if (!content || content.trim() === '' || content === '<p><br></p>') {
            //     Swal.fire({
            //         title: 'Peringatan!',
            //         text: 'Content tidak boleh kosong!',
            //         icon: 'warning',
            //         confirmButtonText: 'OK',
            //         confirmButtonColor: '#ffc107'
            //     });
            //     return;
            // }

            Swal.fire({
                title: 'Simpan Post?',
                text: "Post akan disimpan ke database!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Simpan!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Tampilkan loading
                    Swal.fire({
                        title: 'Menyimpan...',
                        text: 'Mohon tunggu sebentar',
                        icon: 'info',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Submit form
                    this.submit();
                }
            });
        });
    </script>
@endpush
