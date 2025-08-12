@extends('layouts.app')

@section('title', 'Edit Agenda')

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
                <h1>Edit Agenda</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Agenda</a></div>
                    <div class="breadcrumb-item">Update</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Agenda</h2>
                <div class="card">
                    <form action="{{ route('agenda.update', $agenda) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text"
                                    class="form-control @error('title')
                                is-invalid
                            @enderror"
                                    name="title" value="{{ $agenda->title }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control selectric @error('category_id') is-invalid @enderror"
                                    name="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $agenda->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" required
                                    class="form-control @error('description')
                                is-invalid
                            @enderror"
                                    value="{{ $agenda->description ? $agenda->description : old('description') }}"
                                    name="description">
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                {{-- //Date Agenda --}}
                                <label>Start Date</label>
                                <input type="text"
                                    class="form-control datetimepicker @error('start_date') is-invalid @enderror"
                                    name="start_date" value="{{ $agenda->start_date }}" required>
                                @error('start_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                {{-- //End Date Agenda --}}
                                <label>End Date</label>
                                <input type="text"
                                    class="form-control datetimepicker @error('end_date') is-invalid @enderror"
                                    name="end_date" value="{{ $agenda->end_date }}" required>
                                @error('end_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                                <a href="{{ route('agenda.index') }}" class="btn btn-secondary ml-2">Cancel</a>
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
