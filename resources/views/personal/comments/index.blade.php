@extends('personal/layouts/main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Comments</h1>
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
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>View</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($comments) > 0)
                                            @foreach ($comments as $comment)
                                                <tr>
                                                    <td>{{ $comment->message }}</td>
                                                    <td>
                                                        <a href="{{ route('personal.comment.edit', ['comment' => $comment]) }}">
                                                            <i class="fas fa-pen-alt"></i>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('personal.comment.delete', ['comment' => $comment]) }}" method="post">
                                                            @csrf

                                                            <button type="submit" class="border-0 bg-transparent">
                                                                <i class="fas fa-trash text-danger" role="button"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="10">No data</td>
                                            </tr>
                                        @endif
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
