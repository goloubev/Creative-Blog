@php
    use App\Models\Category;
@endphp

@extends('layouts/main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title">Blog</h1>

            <section class="featured-posts-section">
                @if($posts->count() > 0)
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-4 blog-post">
                                <div class="blog-post-thumbnail-wrapper">
                                    <a href="{{ route('post.show', $post->id) }}">
                                        <img src="{{ Storage::url($post->preview_image) }}" alt="blog post">
                                    </a>
                                </div>
                                <div>
                                    <p class="blog-post-category">{{ Category::getCategoryName($post->category_id) }}</p>

                                    @auth()
                                        <form method="post" action="{{ route('post.like.store', $post->id) }}">
                                            @csrf

                                            <button type="submit" class="btn btn-default btn-sm" style="border-color:#948c8c;">
                                                @if(auth()->user()->likedPosts->contains($post->id))
                                                    <i class="fas fa-thumbs-up"></i> Like
                                                @else
                                                    <i class="far fa-thumbs-up"></i> Like
                                                @endif
                                            </button>

                                            {{ $post->liked_users_count }} likes
                                        </form>
                                    @endauth

                                    @guest()
                                        {{ $post->liked_users_count }} likes
                                    @endguest
                                </div>
                                <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{ $post->title }}</h6>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div style="margin-bottom:150px;">
                            {{-- Pagination --}}
                            {{ $posts->links() }}
                        </div>
                    </div>
                @endif
            </section>
        </div>
    </main>
@endsection
