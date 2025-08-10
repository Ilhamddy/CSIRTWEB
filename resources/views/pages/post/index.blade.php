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
                <h1>Posts</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Product</a></div>
                    <div class="breadcrumb-item">All Post</div>
                </div>
            </div>
            <div class="section-body">
                {{-- <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div> --}}
                {{-- <h2 class="section-title">Product</h2>
                <p class="section-lead">
                    You can manage all Product, such as editing, deleting and more.
                </p> --}}


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>All Posts</h4>
                                <div class="section-header-button">
                                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Add New</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET" action="{{ route('posts.index') }}">
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
                                            <th>Type</th>
                                            <th>Content</th>
                                            <th>Status</th>
                                            {{-- <th>Image</th> --}}
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $loop->iteration + ($posts->currentPage() - 1) * $posts->perPage() }}
                                                <td>{{ $post->title }}
                                                </td>
                                                <td>{{ $post->type }}
                                                </td>
                                                <td class="text-truncate" style="max-width: 200px;">
                                                    {{ $post->content }}
                                                </td>
                                                <td>
                                                    @if ($post->status == 'draft')
                                                        <span class="badge badge-warning">Draft</span>
                                                    @elseif ($post->status == 'published')
                                                        <span class="badge badge-success">Published</span>
                                                    @else
                                                        <span class="badge badge-secondary">Unknown</span>
                                                    @endif
                                                </td>

                                                {{-- <td>
                                                    @if (Str::startsWith($post->image, ['http://', 'https://']))
                                                        <img src="{{ $post->image }}" width="50" alt="">
                                                    @else
                                                        <img src="{{ asset('storage/posts/' . $post->image) }}"
                                                            width="50" alt="">
                                                    @endif
                                                </td> --}}
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('posts.edit', $post->id) }}'
                                                            class="btn btn-sm btn-warning btn-icon mr-2">
                                                            <i class="fas fa-edit"></i>
                                                            {{-- Edit --}}
                                                        </a>
                                                        <a href="{{ route('posts.destroy', $post->id) }}"
                                                            title="Delete data {{ $post->title }}"
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
                                    {{ $posts->withQueryString()->links() }}
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
