@php
    use App\Models\Category;
    use App\Models\User;
	use Carbon\Carbon;
@endphp

@extends('layouts/main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title">{{ $post->title }}</h1>

            <p class="edica-blog-post-meta">
                {{ $postDate }} - {{ $commentsCount }} {{ $commentsCount > 1 ? 'comments' : 'comment' }}
            </p>

            <x-topsuccess/>
            <x-toperrors/>

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
                    <section class="related-posts">
                        <h2 class="section-title mb-4">Related posts</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4">
                                    <a href="{{ route('post.show', $relatedPost->id) }}">
                                        <img src="{{ Storage::url($relatedPost->preview_image) }}" alt="related post"
                                             class="post-thumbnail"/>
                                    </a>
                                    <p class="post-category">{{ Category::getCategoryName($relatedPost->category_id) }}</p>
                                    <h5 class="post-title">{{ $relatedPost->title }}</h5>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if($post->comments->count() > 0)
                        <h2 class="section-title mb-5">Comments ({{ $post->comments->count() }})</h2>

                        <section class="comment-list mb-5">
                            @foreach($post->comments as $comment)
                                <div class="comment-text mb-5">
                                    <span class="username">
                                        <div>{{ User::getUserName($comment->user_id) }}</div>
                                        <span class="text-muted float-right">
                                            {{ $comment->createdDateAsCarbon }}
                                        </span>
                                    </span>
                                    {{ $comment->message }}
                                </div>
                            @endforeach
                        </section>
                    @endif

                    @auth()
                        <section class="comment-section">
                            <h2 class="section-title mb-5">Leave a comment</h2>

                            <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="message" class="sr-only">Comment</label>
                                        <textarea name="message" id="message" class="form-control" placeholder="Comment" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" value="Add you comment" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                </div>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
        </div>
    </main>
@endsection
