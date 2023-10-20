@extends('layouts.app')
@section('title', 'Doctorant Login')

<link rel="icon" href="/img/fplogo.png">
<link rel="stylesheet" href="/pages/Alert/Alert.css">
<script src="/pages/Alert/Alert.js"></script>
<?php require('pages/Alert/Alert.html'); ?>

@section('content')
<div style="margin-top: 20px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div style="border-radius: 10px;" class="card">
                <div style="background: #424e83; border-radius: 10px 10px 0px 0px;margin: -1px;  height: 55px" class="card-header text-white"><h2 style=";margin-left: 10px;">Doctorant Login</h2></div>

                <div style="padding:10px" class="card-body">
                <div style="display: flex;justify-content: center;">
                    <img src="../img/iconlogin.jpg" width="150" height="150" style="border-radius: 50%;margin-bottom: 20px; margin-top: 10px; border: 5px solid #424e83">
                </div>
                    <?php
                        if(Session::get('Error')){
                            $message = Session::get('Error');
                            echo "<script>
                                ShowAlert('".$message."','rgba(240,45,45,0.8)','rgb(220,3,3)');
                            </script>";
                        } 
                    ?>
                    
                    <form method="POST" action="{{ route('simple.user.CHeckLogin') }}">
                        @csrf

                        <div style="margin-bottom: 30px !important;" class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end"><b>{{ __('Email Address') }} :</b></label>

                            <div style="margin-left: 10px;" class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Doctorant Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div style="margin-bottom: 30px !important;" class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end"><b>{{ __('Password') }} :</b></label>

                            <div style="margin-left: 10px; " class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Doctorant Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div style="margin-bottom: 20px !important;" class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        <b>{{ __('Remember Me') }}</b>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div  style="margin-bottom: 20px !important;" class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button style="margin-right: 50px; background: #424e83; border: 1px #424e83;width: 80px;height: 40px;" type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <div style="border-radius: 0px 0px 10px 10px; margin: -1px; height: 40px" class="card-footer"><small style="float:right">&copy by hamza & radouan</small></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.body.style.backgroundImage = "url('../bg/bg1.jpg')"; 
</script>
@endsection
