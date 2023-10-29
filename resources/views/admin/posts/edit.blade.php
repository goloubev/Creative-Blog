@extends('admin/layouts/main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit post</h1>
                    </div>
                </div>

                <x-topsuccess />
                <x-toperrors />
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <form action="{{ route('admin.post.update', $post) }}" name="form" id="form" method="post" class="pl-2" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" value="{{ $post->title ?? old('title') }}" class="form-control" placeholder="Title">
                                <x-error name="title" />
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" id="summernote">{{ $post->content ?? old('content') }}</textarea>
                                <x-error name="content" />
                            </div>
                            <div class="form-group">
                                <label>Preview image</label>

                                @if($post->preview_image != null && Storage::exists($post->preview_image))
                                    <p><img src="{{ Storage::url($post->preview_image) }}" style="height:60px;" alt="" /></p>
                                @endif

                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="preview_image" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <x-error name="preview_image" />
                            </div>
                            <div class="form-group">
                                <label>Main image</label>

                                @if($post->main_image != null && Storage::exists($post->main_image))
                                    <p><img src="{{ Storage::url($post->main_image) }}" style="height:60px;" alt="" /></p>
                                @endif

                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="main_image" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <x-error name="main_image" />
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control select2" style="width:100%;">
                                    <option value="">Select...</option>

                                    @foreach($categories as $category)
                                        <option
                                            value="{{ $category->id }}"
                                            {{ $category->id == old('category_id') || $category->id == $post->category_id ? 'selected' : '' }}
                                        >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                <x-error name="category_id" />
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <select name="tag_ids[]" class="select2" multiple="multiple" data-placeholder="Select your tags" style="width:100%;">
                                    @foreach($tags as $tag)
                                        <option
                                            value="{{ $tag->id }}"
                                            {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '' }}
                                        >{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                                <x-error name="tag_id" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
