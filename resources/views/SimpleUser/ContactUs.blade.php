@extends('layouts.appuser')

<link rel="icon" href="../img/fplogo.png">
<link rel="stylesheet" href="/pages/Alert/Alert.css">
<link rel="stylesheet" href="/pages/contact.css">
<script src="/pages/Alert/Alert.js"></script>
<?php require('pages/Alert/Alert.html'); ?>

@section('title', 'Contact Us')
@section('content')
<div class="content">
    <div class="PartieLogin">
        <div class="modal-header text-center">
            <h1 style="margin-left: 30px" class="modal-title" id="exampleModalLabel">Contact Us</h1>
        </div>
        <div class="modal-body">
            <div class="FormContact">
                <form action="{{ route('simple.user.Message') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="equipe" class="form-label"><b>Full Name :</b></label>
                        <input id="equipe" name="name" type="text" class="form-control" placeholder="Ex: Hamza Moumad">
                        <p style="color:red">@error('name')  {{ $message }}  @enderror</p>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label"><b>E-mail :</b></label>
                        <input id="email" name="email" type="text" class="form-control" placeholder="Ex: hamza@gmail.com">
                        <p style="color:red">@error('email')  {{ $message }}  @enderror</p>
                    </div>
                    <div class="form-group">
                        <label for="message" class="form-label"><b>Message :</b></label>
                        <textarea id="message" class="form-control" name="messagee" id="description" cols="25" rows="5" placeholder="Enter Your Message Here"></textarea>                
                        <p style="color:red">@error('messagee')  {{ $message }}  @enderror</p>
                    </div>
                    <div class="buttonSub">
                        <button class="btn btn-primary" type="submit">Contacter</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <small>&copy By Hamza & Radouane</small>
        </div>
    </div>
    <div class="image">
        <img class="imageContact" src="/img/cc.png" alt="" srcset="">
    </div>

    <!-- ----------------------show Success Message -------------------------------------- -->
    <?php
        if(Session::get('Ajout_Contact')){
            $message = Session::get('Ajout_Contact');
            echo "<script>
                ShowAlert('".$message."','rgba(95,196,9,0.8)','#79E71C');
            </script>";
        } 
    ?>
</div>

@endsection