@extends('admin/layouts/main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit user</h1>
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
                        <form action="{{ route('admin.user.update', $user->id) }}" name="form" id="form" method="post" class="pl-2">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">
                                <x-error name="name" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
                                <x-error name="email" />
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control select2" style="width:100%;">
                                    <option value="">Select...</option>

                                    @foreach($roles as $role_id => $role_name)
                                        <option
                                            value="{{ $role_id }}"
                                            {{ $role_id == $user->role ? 'selected' : '' }}
                                        >{{ $role_name }}</option>
                                    @endforeach
                                </select>
                                <x-error name="role" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>

                            <input type="hidden" name="user_id" value="{{ $user->id }}" />
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
