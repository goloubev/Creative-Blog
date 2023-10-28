@php
    use App\Models\User;use Carbon\Carbon;
@endphp

@extends('admin/layouts/main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-5">User: {{ $user->name }}</h1>
                        <a href="{{ route('admin.user.edit', $user->id) }}"><i class="fas fa-edit"></i></a>
                    </div>
                </div>

                <x-topsuccess/>
                <x-toperrors/>
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
                                        <th>ID</th>
                                        <td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Role</th>
                                        <td>{{ User::getRole($user->role) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Created date</th>
                                        <td>
                                            {{ Carbon::parse($user->created_at)->format('j F Y, H:i:s') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Updated date</th>
                                        <td>
                                            {{ Carbon::parse($user->updated_at)->format('j F Y, H:i:s') }}
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
