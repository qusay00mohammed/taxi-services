@extends('layouts.master_admin')

@section('title', 'edit user')

@section('content')

<div class="container">
    <h1 class="text-center">Edit Admin</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST" class="form-horizontal">
        @csrf
        <!-- Start username field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Username <span class="required">*</span></label>
            <div class="col-sm-10">
                <input type="text" name="username" class="form-control" required value="{{ $user->username }}">
                @error('username')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!-- End username field -->

        <!-- Start password field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" class="form-control pass">
                <i class="fa fa-eye show-pass"></i>
            </div>
        </div>
        <!-- End passowd field -->

        <!-- Start email field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Email <span class="required">*</span></label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" required value="{{ $user->email }}">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!-- End email field -->

        <!-- Start Full Name field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Full Name <span class="required">*</span></label>
            <div class="col-sm-10">
                <input type="text" name="fullname" class="form-control" required value="{{ $user->fullname }}">
                @error('fullname')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!-- End Full Name field -->

        <!-- Start visibility field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10">
                <input type="radio" id="active" name="groupId" {{ $user->regStatus == 1 ? 'checked' : '' }} value="1">
                <label for="active">Active</label>
                <br>
                <input type="radio" id="inactive" name="groupId" {{ $user->regStatus == 0 ? 'checked' : '' }}  value="0">
                <label for="inactive">Inactive</label>
            </div>
        </div>
        <!-- End visibility field -->

        <!-- Start submit field -->
        <div class="form-group form-group-lg">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="Update" class="btn btn-primary btn-lg">
            </div>
        </div>
        <!-- End submit field -->
    </form>
</div>

@endsection
