@extends('layouts.app')
@section('title', 'Registration')

<link rel="stylesheet" href="/pages/Alert/Alert.css">
<script src="/pages/Alert/Alert.js"></script>
<?php require('pages/Alert/Alert.html'); ?>

@section('content')
<div style="margin-top: 0px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary text-white"><h4>Creat New Admin</h4></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('Registration') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end"><b>{{ __('Full Name : ') }}</b></label>
                                <div style="margin-left: 50px" class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end"><b>{{ __('Email Address : ') }}</b></label>
                                <div style="margin-left: 50px" class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end"><b>{{ __('Password : ') }}</b></label>
                                <div style="margin-left: 50px" class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end"><b>{{ __('Confirm Password : ') }}</b></label>
                                <div style="margin-left: 50px" class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button  style="margin-left: 50px; background: #424e83; border: 1px #424e83;width: 130px;height: 45px;" type="submit" class="btn btn-primary">
                                        {{ __('Create Account') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div style="height: 40px" class="card-footer"><small style="float:right">&copy by hamza & radouan</small></div>
            </div>
        </div>
    </div>
</div>
<!-- ----------------------show Success Message -------------------------------------- -->
<?php
        if(Session::get('SuccessCreation')){
            $message = Session::get('SuccessCreation');
            echo "<script>
                ShowAlert('".$message."','rgba(95,196,9,0.8)','#79E71C');
            </script>";
        } 
    ?>
@endsection
