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
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Post</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Post</a></div>
                    <div class="breadcrumb-item">Create</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Post</h2>



                <div class="card">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Form Post</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" required
                                    class="form-control @error('title')
                                is-invalid
                            @enderror"
                                    name="title">
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
                                <div class="col-sm-9">
                                    <input type="file" id="image" class="form-control" accept="jpeg,jpg,png"
                                        name="image" @error('image') is-invalid @enderror onchange="previewImage(event)">
                                    <img id="preview" src="#" alt="Preview"
                                        style="display:none; margin-top:10px; max-height:200px;">
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
                                    <textarea class="summernote" name="content" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Source</label>
                                <input type="text"
                                    class="form-control @error('source')
                                is-invalid
                            @enderror"
                                    name="source">
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
                                    name="tags">
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
                                            checked="">
                                        <span class="selectgroup-button">Published</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="status" value="draft" class="selectgroup-input">
                                        <span class="selectgroup-button">Draft</span>
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
@endpush
