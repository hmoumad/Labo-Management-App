@extends('layouts.appuser')

<link rel="icon" href="../img/fplogo.png">
<link rel="stylesheet" href="/pages/Alert/Alert.css">
<script src="/pages/Alert/Alert.js"></script>
<?php require('pages/Alert/Alert.html'); ?>

@section('title', 'Add Rapport')
@section('content')
<div style="width: 98%; margin: auto">
<div style="border: 1px solid rgba(0, 0, 0, 0.125);border-bottom: 0px; background: rgba(0, 0, 0, 0.03); color: ; height: 65px;" class="modal-header text-center">
    <h1 style="margin-left: 30px" class="modal-title" id="exampleModalLabel">Add New Rapport</h1>
    </div>
    <div style="border: 1px solid rgba(0, 0, 0, 0.125);" class="modal-body">
    <form method="post" action="{{ route('simple.user.traitement.rapport') }}" enctype="multipart/form-data">
                @csrf
                    <table class="grid" style="width: 70%; margin-left: 50px;">
                        <tr style="height: 80px">
                            <td><label style="margin-left: 0px;" for="fname" class="form-label"><b>Name Of Responsible :</b></label></td>
                            <td>
                                <input style="margin-bottom: 5px;" id="fname" name="name_responsible" type="text" class="form-control">
                                <span style="color: red">
                                    @error('name_responsible')  {{ $message }}  @enderror
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 80px">
                            <td><label style="margin-left: 0px;" for="email" class="form-label"><b>Email Of Responsible :</b></label></td>
                            <td>
                                <input style="margin-bottom: 5px;" id="email" name="email_responsible" type="text" class="form-control">
                                <span style="color: red">
                                    @error('email_responsible')  {{ $message }}  @enderror
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 80px">
                            <td><label style="margin-left: 0px;" for="equipe" class="form-label"><b>Directing Team :</b></label></td>
                            <td>
                                <input style="margin-bottom: 5px;" id="equipe" name="team" type="text" class="form-control">
                                <span style="color: red">
                                    @error('team')  {{ $message }}  @enderror
                                </span>
                            </td>
                        </tr>
                        <tr  style="height: 80px">
                            <td><label style="margin-left: 0px; margin-bottom: 100px;" for="description" class="form-label"><b>Descriptif Message :</b></label></td>
                            <td>
                                <textarea style="margin-bottom: 20px; margin-top: 20px;" class="form-control" name="description_message" id="description" cols="25" rows="5"></textarea>
                                <span style="color: red">
                                    @error('description_message')  {{ $message }}  @enderror
                                </span>
                            </td>
                        </tr>
                        <tr  style="height: 80px">
                            <td><label style="margin-left: 0px;" for="fileR" class="form-label"><b>Rapport File :</b></label></td>
                            <td>
                                <input style="margin-bottom: 5px;" id="fileR" name="file_rapport" type="file" class="form-control">
                                <span style="color: red">
                                    @error('file_rapport')  {{ $message }}  @enderror
                                </span>
                            </td>
                            <tr>
                                <td></td>
                                <td><button  style="margin-right: 30px; font-weight: bold;" name="insert" type="submit" class="btn btn-success">Add Rapport</button></td>
                            </tr>
                        </tr>
                    </table>
                    <!-- ----------------------show Success Message -------------------------------------- -->
                    <?php

                        if(Session::get('Ajout_Rapport')){
                            $message = Session::get('Ajout_Rapport');
                            echo "<script>
                                ShowAlert('".$message."','rgba(95,196,9,0.8)','#79E71C');
                            </script>";
                        } 
                    ?>
                </div>                    
        </form>  
    </div>
</div>

@endsection