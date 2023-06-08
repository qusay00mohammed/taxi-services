@extends('layouts.master_admin')

@section('title', 'Social Media')

@section('content')

<div class="container">
    <h1 class="text-center">Social Media</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST" class="form-horizontal">
        @csrf
        <!-- Start facebook field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Facebook <span class="required">*</span></label>
            <div class="col-sm-10">
                <input type="text" name="facebook" class="form-control" required value="{{ $social->facebook }}">
                @error('facebook')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!-- End facebook field -->

        <!-- Start twitter field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Twitter <span class="required">*</span></label>
            <div class="col-sm-10">
                <input type="text" name="twitter" class="form-control" required value="{{ $social->twitter }}">
                @error('twitter')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!-- End twitter field -->

        <!-- Start instagram field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Instagram <span class="required">*</span></label>
            <div class="col-sm-10">
                <input type="text" name="instagram" class="form-control" required value="{{ $social->instagram }}">
                @error('twitter')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!-- End instagram field -->

        <!-- Start whatsapp field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Whatsapp <span class="required">*</span></label>
            <div class="col-sm-10">
                <input type="text" name="whatsapp" class="form-control" required value="{{ $social->whatsapp }}">
                @error('whatsapp')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!-- End whatsapp field -->

        <!-- Start linkedin field -->
        <div class="form-group form-group-lg">
            <label for="" class="col-sm-2 control-label">Linkedin <span class="required">*</span></label>
            <div class="col-sm-10">
                <input type="text" name="linkedin" class="form-control" required value="{{ $social->linkedin }}">
                @error('linkedin')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <!-- End linkedin field -->



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
