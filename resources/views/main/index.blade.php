@php use App\Models\Category; @endphp
@extends('layouts/main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title">Blog</h1>

            <section class="featured-posts-section">
                <div class="widget widget-post-list">
                    <h5 class="widget-title">Popular posts</h5>
                    <ul class="post-list">
                        @foreach($likedPosts as $post)
                            <li class="post">
                                <a href="#" class="post-permalink media">
                                    <img src="{{ Storage::url($post->preview_image) }}" alt="blog post">
                                    <div class="media-body">
                                        <h6 class="post-title">{{ $post->title }}</h6>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ Storage::url($post->preview_image) }}" alt="blog post">
                            </div>
                            <p class="blog-post-category">{{ Category::getCategoryName($post->category_id) }}</p>
                            <a href="#" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div style="margin-bottom:150px;">
                        {{ $posts->links() }}
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
