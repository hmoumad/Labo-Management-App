@extends('layouts.app')
<link rel="stylesheet" href="pages/doctorant.css">
<link rel="icon" href="img/fplogo.png">

@section('title', 'Edit Doctorant')
@section('content')

<div style="width: 90%; margin: auto">
<div style="background-color: #D9FFFF; color: ; height: 65px;" class="modal-header text-center">
                <h2 style="margin-left: 30px" class="modal-title" id="exampleModalLabel">Edit Doctorants</h2>
                <a href="{{route('doctorant')}}" class="btn btn-danger">Back To All Doctorant</a>
            </div>
            <form method="post" action="Edition_Doctorant/{{ $doctorant['id'] }}">
                @csrf
                <div style="background-color: #DEDEDE" class="modal-body">
                    <div style="margin-top:0px;" class="row">
                        <input type="hidden" name="identifiant" value="{{ $doctorant['id'] }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div style="margin-bottom: 20px;" class="col">
                            <label style="margin-left: 0px;" for="cine" class="form-label">CIN Doctorant :</label>
                            <input value="{{ $doctorant['CIN_D'] }}" style="margin-bottom: 5px;" id="cine" name="CIN" type="text" class="form-control" placeholder="Your CIN" aria-label="First name">
                            <span style="color: red">
                                @error('CIN')  {{ $message }}  @enderror
                            </span>
                        </div>
                        <div style="margin-bottom: 20px;" class="col">
                            <label style="margin-left: 0px;" for="cnee" class="form-label">CNE Doctorant :</label>
                            <input value="{{ $doctorant['CNE_D'] }}" style="margin-bottom: 5px;" id="cnee" name="CNE" type="text" class="form-control" placeholder="Your CNE" aria-label="First name">
                            <span style="color: red">
                                @error('CNE')  {{ $message }}  @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin-bottom: 20px;" class="col">
                            <label style="margin-left: 0px;" for="nomae" class="form-label">Nom Doctorant :</label>
                            <input value="{{ $doctorant['Nom_D'] }}" style="margin-bottom: 5px;" id="nomae" name="nom" type="text" class="form-control" placeholder="first name" aria-label="First name">
                            <span style="color: red">
                                @error('nom')  {{ $message }}  @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin-bottom: 20px;" class="col">
                            <label style="margin-left: 0px;" for="prenomae" class="form-label">Prenom Doctorant :</label>
                            <input value="{{ $doctorant['Prenom_D'] }}" style="margin-bottom: 5px;" id="prenomae" name="prenom" type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                            <span style="color: red">
                                @error('prenom')  {{ $message }}  @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin-bottom: 20px;" class="col">
                            <label style="margin-left: 0px;" for="datenaissance" class="form-label">Date Naissance :</label>
                            <input value="{{ $doctorant['Date_Naiss_D'] }}" style="margin-bottom: 5px;" name="datenaiss" type="date" class="form-control" id="datenaissance" placeholder="date naissance">
                            <span style="color: red">
                                @error('datenaiss')  {{ $message }}  @enderror
                            </span>
                        </div>
                        <div style="margin-bottom: 20px;" class="col">
                            <label style="margin-left: 0px;" for="lieufr" class="form-label">lieux Naissance :</label>
                            <input value="{{ $doctorant['Lieu_Naiss_D'] }}" style="margin-bottom: 5px;" name="liuenaiss" type="text" class="form-control" id="lieufr"  placeholder="lieux naissance ">
                            <span style="color: red">
                                @error('liuenaiss')  {{ $message }}  @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin-bottom: 20px;" class="col">
                            <label style="margin-left: 0px;" for="formationf" class="form-label">E-mail Doctorant :</label>
                            <input value="{{ $doctorant['Email_D'] }}" style="margin-bottom: 5px;" name="Email_D" type="text" class="form-control" id="formationf"  placeholder="E-mail">
                            <span style="color: red">
                                @error('Email_D')  {{ $message }}  @enderror
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin-bottom: 10px;" class="col">
                            <label style="margin-left: 0px;" for="etablissement" class="form-label">Equipe :</label>
                            <input  value="{{ $doctorant['Id_Equipe'] }}" style="margin-bottom: 5px;" name="equipe" type="text" class="form-control" id="etablissement" placeholder="equipe">
                            <span style="color: red">
                                @error('equipe')  {{ $message }}  @enderror
                            </span>
                        </div>
                    </div>
                </div>

                <div style="background-color: #D9FFFF;padding-bottom: 6px; padding-right: 15px; padding-top: 10px; height: 70px;" class="modal-footer">
                    <button style="margin-right: 20px" name="insert" type="submit" class="btn btn-success">Edite Doctorant</button>
                </div>
        </form>
</div>

@endsection