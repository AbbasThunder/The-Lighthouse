@extends('layouts.dashboard',['title' => "Create User Page"])
@section('content')
    <div class="card">
        <form action="{{route('users.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="card-header">
                <strong>Create User</strong><small> Form</small><br>
            </div>
            <div class="card-body card-block">
                @include('partials.validation-errors')
                <div class="form-group"><label for="name"  class=" form-control-label">Name</label><input required type="text" name="name" id="name" placeholder="Enter username" class="form-control"></div>
                <div class="form-group"><label for="email" class=" form-control-label">Email</label><input required type="email" name="email" id="email" placeholder="john@example.com" class="form-control"></div>
                <div class="form-group"><label for="password" class=" form-control-label">Password</label><input required type="password" name="password" id="password"  class="form-control"></div>
                <div class="form-group"><label for="password_confirmation" class=" form-control-label">Password Confirmation</label><input required type="password" name="password_confirmation" id="password_confirmation"  class="form-control"></div>
                <div class="form-group"><label for="is_admin" class=" form-control-label">Admin</label><input type="checkbox" id="is_admin" name="role" value="1"></div>
                <div class="form-group"><label for="image" class=" form-control-label">Avatar</label><input type="file" id="avatar" name="avatar" class="form-control"></div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </form>

    </div>
@endsection
