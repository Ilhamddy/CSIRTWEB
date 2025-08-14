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
                <h1>Kontak</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Pengaturan</a></div>
                    <div class="breadcrumb-item">Kontak</div>
                </div>
            </div>

            <div class="section-body">
                <div class="card">
                    <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data" id="postForm">
                        @csrf
                        <div class="card-header">
                            <h4>Kontak</h4>
                        </div>
                        <div class="card-body row">
                            <div class="col-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="email" value="{{ $contact->email ?? old('email') }}"
                                            required
                                            class="form-control email @error('email')
                                is-invalid
                                            @enderror">
                                    </div>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="phone" value="{{ $contact->phone ?? old('phone') }}"
                                            required
                                            class="form-control phone-number @error('phone')
                                is-invalid
                                            @enderror">
                                    </div>
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Fax</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="fax" value="{{ $contact->fax ?? old('fax') }}"
                                            class="form-control phone-number @error('fax')
                                is-invalid
                                            @enderror">
                                    </div>
                                    @error('fax')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="address" id="address"
                                        class="form-control   @error('address')
                                is-invalid @enderror" data-height="150">
                                         {{ $contact->address ?? old('address') }}
                                    </textarea>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Latitude</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-location-arrow"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="latitude"
                                            value="{{ $contact->latitude ?? old('latitude') }}" required
                                            class="form-control  @error('latitude')
                                is-invalid
                                            @enderror">
                                    </div>
                                    @error('latitude')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>longitude</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-location-arrow"></i>
                                            </div>
                                        </div>
                                        <input type="text" name="longitude"
                                            value="{{ $contact->longitude ?? old('longitude') }}" required
                                            class="form-control  @error('longitude')
                                is-invalid
                                            @enderror">
                                    </div>
                                    @error('longitude"')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>




                            </div>
                            <div class="col-12 col-md-12 col-lg-6">
                                <div class="form-group">
                                    <label>Whatsapp</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa-brands fa-whatsapp"></i>
                                            </div>
                                        </div>
                                        <input type="text" placeholder="Input Url" name="whatsapp"
                                            value="{{ $contact->whatsapp ?? old('whatsapp') }}"
                                            class="form-control  @error('whatsapp')
                                is-invalid
                                            @enderror">
                                    </div>
                                    @error('whatsapp"')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa-brands fa-instagram"></i>
                                            </div>
                                        </div>
                                        <input type="text" placeholder="Input Url" name="instagram"
                                            value="{{ $contact->instagram ?? old('instagram') }}"
                                            class="form-control  @error('instagram')
                                is-invalid
                                            @enderror">
                                    </div>
                                    @error('instagram"')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Telegram</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa-brands fa-telegram"></i>
                                            </div>
                                        </div>
                                        <input type="text" placeholder="Input Url" name="telegram"
                                            value="{{ $contact->telegram ?? old('telegram') }}"
                                            class="form-control  @error('telegram')
                                is-invalid
                                            @enderror">
                                    </div>
                                    @error('telegram"')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa-brands fa-facebook"></i>
                                            </div>
                                        </div>
                                        <input type="text" placeholder="Input Url" name="facebook"
                                            value="{{ $contact->facebook ?? old('facebook') }}"
                                            class="form-control  @error('facebook')
                                is-invalid
                                            @enderror">
                                    </div>
                                    @error('facebook"')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Youtube</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa-brands fa-youtube"></i>
                                            </div>
                                        </div>
                                        <input type="text" placeholder="Input Url" name="youtube"
                                            value="{{ $contact->youtube ?? old('youtube') }}"
                                            class="form-control  @error('youtube')
                                is-invalid
                                            @enderror">
                                    </div>
                                    @error('youtube"')
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
