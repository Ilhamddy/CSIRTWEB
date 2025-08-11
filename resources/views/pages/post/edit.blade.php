@extends('layouts.app')

@section('title', 'Edit User')

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
                <h1>Edit post</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Post</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Posts</h2>
                <div class="card">
                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text"
                                    class="form-control @error('title')
                                is-invalid
                            @enderror"
                                    name="title" value="{{ $post->title }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Category</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="type" value="berita" class="selectgroup-input"
                                            {{ old('type', $post->type ?? '') == 'berita' ? 'checked' : '' }}>
                                        <span class="selectgroup-button">Berita</span>
                                    </label>

                                    <label class="selectgroup-item">
                                        <input type="radio" name="type" value="pengumuman" class="selectgroup-input"
                                            {{ old('type', $post->type ?? '') == 'pengumuman' ? 'checked' : '' }}>
                                        <span class="selectgroup-button">Pengumuman</span>
                                    </label>

                                    <label class="selectgroup-item">
                                        <input type="radio" name="type" value="kegiatan" class="selectgroup-input"
                                            {{ old('type', $post->type ?? '') == 'kegiatan' ? 'checked' : '' }}>
                                        <span class="selectgroup-button">Kegiatan</span>
                                    </label>
                                </div>
                                @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



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
                                <label>Image</label>
                                <div class="col-sm-9 position-relative">
                                    <input type="file" id="image" class="form-control" accept="jpeg,jpg,png"
                                        name="image" @error('image') is-invalid @enderror onchange="previewImage(event)">

                                    <div style="position: relative; display: inline-block; margin-top:10px;">
                                        <img id="preview"
                                            src="{{ $post->image ? asset('storage/' . $post->image) : '#' }}"
                                            alt="Preview"
                                            style="max-height:200px; {{ $post->image ? '' : 'display:none;' }}"
                                            data-old="{{ $post->image ? asset('storage/' . $post->image) : '' }}">

                                        <button type="button" id="removePreview"
                                            style="position:absolute; top:0; right:0; background:red; color:white; border:none; border-radius:50%; width:24px; height:24px; cursor:pointer; display:{{ $post->image ? 'block' : 'none' }}">
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
                                    <textarea class="summernote" name="content" required>

                                        {{ $post->content }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Source</label>
                                <input type="text"
                                    class="form-control @error('source')
                                is-invalid
                            @enderror"
                                    name="source" value="{{ $post->source }}">
                                @error('source')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tags</label>

                                <input type="text"
                                    class="form-control @error('tags')
                                is-invalid
                            @enderror"
                                    name="tags" value="{{ $post->tags }}">
                                <p>*jika lebih dari satu pisahkan dengan koma(,) exp: tag1,tag2</p>
                                @error('tags')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror


                            </div>
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="published" class="selectgroup-input"
                                            {{ old('status', $post->status ?? '') == 'published' ? 'checked' : '' }}>
                                        <span class="selectgroup-button">Published</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="draft" class="selectgroup-input"
                                            {{ old('status', $post->status ?? '') == 'draft' ? 'checked' : '' }}>
                                        <span class="selectgroup-button">Draft</span>
                                    </label>

                                </div>
                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label>Price</label>
                                <input type="number"
                                    class="form-control @error('price')
                                is-invalid
                            @enderror"
                                    name="price" value="{{ $post->price }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number"
                                    class="form-control @error('stock')
                                is-invalid
                            @enderror"
                                    name="stock" value="{{ $post->stock }}">
                                @error('stock')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Category</label>
                                <select name="category_id"
                                    class="form-control selectric @error('category_id')
                                    is-invalid  @enderror"
                                    id="">
                                    <option value="">-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $post->category->id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Photo post</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="image"
                                        @error('image') is-invalid @enderror>
                                </div>
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                            <a href="{{ route('posts.index') }}" class="btn btn-secondary ml-2">Cancel</a>
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
