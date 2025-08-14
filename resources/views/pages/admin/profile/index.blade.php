@extends('layouts.app')

@section('title', 'Profile')

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
                <h1>Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Pengaturan</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data" id="postForm">
                        @csrf
                        <div class="card-header">
                            <h4>Profile</h4>
                        </div>
                        <div class="card-body row">
                            <div class="col-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label>Visi</label>
                                    <input type="text" required
                                        class="form-control @error('visi')
                                is-invalid
                            @enderror"
                                        value="{{ $profile->visi ?? old('visi') }}" name="visi">
                                    @error('visi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Misi</label>
                                    <textarea name="misi" id="misi"
                                        class="form-control   @error('misi')
                                is-invalid @enderror" data-height="150">
                                      {{ $profile->misi ?? old('misi') }}
                                    </textarea>
                                    <span>*pisahkan dengan koma (,) jika lebih dari satu</span>
                                    @error('misi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Logo</label>
                                    <div class="col-12">
                                        <input type="file" id="logo" class="form-control"
                                            accept="image/jpeg,image/jpg,image/png" name="logo"
                                            @error('logo') is-invalid @enderror onchange="previewImage(event)">
                                        <div style="position: relative; display: inline-block; margin-top:10px;">
                                            <img id="preview"
                                                src="{{ $profile->logo ? asset('storage/' . $profile->logo) : '#' }}""
                                                alt="Preview"
                                                style="{{ $profile->logo ? '' : 'display:none;' }}; margin-top:10px; max-height:200px;"
                                                data-old="{{ $profile->logo ? asset('storage/' . $profile->logo) : '' }}">

                                            <button type="button" id="removePreview"
                                                style="position:absolute; top:0; right:0; background:red; color:white; border:none; border-radius:50%; width:24px; height:24px; cursor:pointer; display:{{ $profile->logo ? 'block' : 'none' }}">
                                                ×
                                            </button>
                                        </div>
                                    </div>
                                    @error('logo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label>Tupoksi</label>
                                    <textarea name="tupoksi" id="tupoksi"
                                        class="form-control   @error('tupoksi')
                                is-invalid @enderror" data-height="150">
                                         {{ $profile->sejarah ?? old('sejarah') }}
                                    </textarea>
                                    <span>*pisahkan dengan koma (,) jika lebih dari satu</span>
                                    @error('tupoksi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Struktur Organisasi</label>
                                    <div class="col-12">
                                        <input type="file" id="struktur_organisasi" class="form-control"
                                            accept="image/jpeg,image/jpg,image/png" name="struktur_organisasi"
                                            @error('struktur_organisasi') is-invalid @enderror
                                            onchange="previewImageTwo(event)">
                                        {{-- <img id="preview-2" src="#" alt="Preview"
                                            style="display:none; margin-top:10px; max-height:200px;"> --}}
                                        <div style="position: relative; display: inline-block; margin-top:10px;">
                                            <img id="preview-2"
                                                src="{{ $profile->struktur_organisasi ? asset('storage/' . $profile->struktur_organisasi) : '#' }}""
                                                alt="Preview"
                                                style="{{ $profile->struktur_organisasi ? '' : 'display:none;' }}; margin-top:10px; max-height:200px;"
                                                data-oldd="{{ $profile->struktur_organisasi ? asset('storage/' . $profile->struktur_organisasi) : '' }}">

                                            <button type="button" id="removePreview-2"
                                                style="position:absolute; top:0; right:0; background:red; color:white; border:none; border-radius:50%; width:24px; height:24px; cursor:pointer; display:{{ $profile->struktur_organisasi ? 'block' : 'none' }}">
                                                ×
                                            </button>
                                        </div>
                                    </div>
                                    @error('struktur_organisasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
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
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/summernote.js') }}"></script>
    {{-- <script src="{{ asset('js/preview-img.js') }}"></script> --}}
    <script src="{{ asset('js/notif.js') }}"></script>
    <!-- SweetAlert2 JS -->


    <script>
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
    </script>
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
            const input = document.getElementById('logo');
            const oldImage = preview.getAttribute('data-old');

            input.value = ''; // reset file input
            if (oldImage) {
                preview.src = oldImage; // kembali ke gambar lama
            } else {
                preview.style.display = 'none'; // hide jika tidak ada gambar lama
            }
        });

        function previewImageTwo(event) {
            const input = event.target;
            const preview = document.getElementById('preview-2');
            const removeBtn = document.getElementById('removePreview-2');

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

        document.getElementById('removePreview-2').addEventListener('click', function() {
            const preview = document.getElementById('preview-2');
            const input = document.getElementById('struktur_organisasi');
            const oldImage = preview.getAttribute('data-oldd');

            input.value = ''; // reset file input
            if (oldImage) {
                preview.src = oldImage; // kembali ke gambar lama
            } else {
                preview.style.display = 'none'; // hide jika tidak ada gambar lama
            }
        });
    </script>
@endpush
