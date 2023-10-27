@php use Illuminate\Support\Facades\Storage; @endphp
@extends('admin/layouts/main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-5">Post: {{ $post->title }}</h1>
                        <a href="{{ route('admin.post.edit', $post->id) }}"><i class="fas fa-edit"></i></a>
                    </div>
                </div>

                <x-topsuccess />
                <x-toperrors />
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>{{ $post->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Title</td>
                                            <td>{{ $post->title }}</td>
                                        </tr>
                                        <tr>
                                            <td>Content</td>
                                            <td>{!! $post->content !!}</td>
                                        </tr>
                                        <tr>
                                            <td>Category</td>
                                            <td>
                                                {{--{{ $categories[$post->category_id]->title }}--}}
                                                {{ $post->category_id }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Preview image</td>
                                            <td>
                                                @if($post->preview_image != null && Storage::exists($post->preview_image))
                                                    <img src="{{ Storage::url($post->preview_image) }}" style="height:60px;" alt="" />
                                                @else
                                                    No image
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Main image</td>
                                            <td>
                                                @if($post->main_image != null && Storage::exists($post->main_image))
                                                    <img src="{{ Storage::url($post->main_image) }}" style="height:60px;" alt="" />
                                                @else
                                                    No image
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
