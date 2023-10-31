@extends('layouts/main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title">Categories</h1>

            <section class="featured-posts-section">
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-md-4 blog-post">
                            <a href="{{ route('category.post.index', $category->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $category->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@endsection
