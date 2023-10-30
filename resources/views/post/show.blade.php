@php
    use App\Models\Category;
@endphp

@extends('layouts/main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta">
                {{ $postDate }}
                - {{ $commentsCount }} {{ $commentsCount > 1 ? 'comments' : 'comment' }}
            </p>
            <section class="blog-post-featured-img">
                <img src="{{ Storage::url($post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="comment-section">
                        <h2 class="section-title mb-5">Leave a reply</h2>
                        <form action="/" method="post">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="comment" id="comment" class="form-control" placeholder="Comment" rows="10">Comment</textarea>
                                </div>
                            </div>
                            {{--<div class="row">
                                <div class="form-group col-md-4">
                                    <label for="name" class="sr-only">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name*">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                           placeholder="Email*" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="website" class="sr-only">Website</label>
                                    <input type="url" name="website" id="website" class="form-control"
                                           placeholder="Website*">
                                </div>
                            </div>--}}
                            <div class="row">
                                <div class="col-12">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4">Related posts</h2>
                        <div class="row">
                            @foreach($relatedPosts as $post)
                                <div class="col-md-4">
                                    <a href="{{ route('post.show', $post->id) }}">
                                        <img src="{{ Storage::url($post->preview_image) }}" alt="related post" class="post-thumbnail" />
                                    </a>
                                    <p class="post-category">{{ Category::getCategoryName($post->category_id) }}</p>
                                    <h5 class="post-title">{{ $post->title }}</h5>
                                </div>
                            @endforeach
                        </div>
                    </section>

                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </main>
@endsection
