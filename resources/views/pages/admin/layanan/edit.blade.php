@extends('layouts.app')

@section('title', 'Edit Layanan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit layanan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Layanan</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Layanan</h2>
                <div class="card">
                    <form action="{{ route('layanan.update', $layanan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <div class="card-header">
                            <h4>Input Text</h4>
                        </div> --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text"
                                    class="form-control @error('title')
                                is-invalid
                            @enderror"
                                    name="title" value="{{ $layanan->title }}">
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
                                    value="{{ $layanan->subtitle ?? old('subtitle') }}" name="subtitle">
                                @error('subtitle')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label>Icon</label>
                                <div class="col-sm-9 position-relative">
                                    <input type="file" id="image" class="form-control"
                                        accept="image/jpeg,image/jpg,image/png" name="icon"
                                        @error('icon') is-invalid @enderror onchange="previewImage(event)">

                                    <div style="position: relative; display: inline-block; margin-top:10px;">
                                        <img id="preview"
                                            src="{{ $layanan->icon ? asset('storage/' . $layanan->icon) : '#' }}"
                                            alt="Preview"
                                            style="max-height:200px; {{ $layanan->icon ? '' : 'display:none;' }}"
                                            data-old="{{ $layanan->icon ? asset('storage/' . $layanan->icon) : '' }}">

                                        <button type="button" id="removePreview"
                                            style="position:absolute; top:0; right:0; background:red; color:white; border:none; border-radius:50%; width:24px; height:24px; cursor:pointer; display:{{ $layanan->image ? 'block' : 'none' }}">
                                            ×
                                        </button>
                                    </div>
                                </div>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="">Content</label>
                                <div class="col-12 ">
                                    <textarea class="summernote" name="description">
                                        {{ $layanan->description }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text"
                                    class="form-control @error('link')
                                is-invalid
                            @enderror"
                                    name="link" value="{{ $layanan->link }}">
                                <p>*Jika tidak ada link, biarkan kosong</p>
                                @error('link')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="is_active" value=1 class="selectgroup-input"
                                            {{ old('is_active', $layanan->is_active ?? '') == true ? 'checked' : '' }}>
                                        <span class="selectgroup-button">Active</span>
                                    </label>

                                    <label class="selectgroup-item">
                                        <input type="radio" name="is_active" value=0 class="selectgroup-input"
                                            {{ old('is_active', $layanan->is_active ?? '') == false ? 'checked' : '' }}>
                                        <span class="selectgroup-button">Non Active</span>
                                    </label>
                                </div>
                                @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('layanan.index') }}" class="btn btn-secondary ml-2">Cancel</a>
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
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('preview');
            const removeBtn = document.getElementById('removePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    removeBtn.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        document.getElementById('removePreview').addEventListener('click', function() {
            const preview = document.getElementById('preview');
            const input = document.getElementById('image');
            const oldImage = preview.getAttribute('data-old');

            input.value = ''; // reset file input
            if (oldImage) {
                preview.src = oldImage; // kembali ke gambar lama
            } else {
                preview.style.display = 'none'; // hide jika tidak ada gambar lama
            }
        });
    </script>
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
            var content = $('.summernote').summernote('code');
            if (!content || content.trim() === '' || content === '<p><br></p>') {
                Swal.fire({
                    title: 'Peringatan!',
                    text: 'Content tidak boleh kosong!',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#ffc107'
                });
                return;
            }

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
