@extends('layouts.app')
@section('title', 'Chercheurs')
@section('content')
<div style="margin-top: 0px" class="container">
    <div class="row justify-content-center">
        <div class="col-md-32">
            <div class="card">
                <div class="card-header bg-secondary text-white"><h4>Add New Chercheur</h4></div>
                <div style="margin-bottom: 20px" class="card-body">
                    <form method="post" action="{{ route('AddDoctoratant') }}">
                        @csrf
                        <div style="margin-top:0px;" class="row">
                            <div class="col">
                                <label style="margin-left: 0px;" for="cine" class="form-label">CIN Doctorant :</label>
                                <input style="margin-bottom: 20px;" id="cine" name="CIN" type="text" class="form-control" placeholder="Your CIN" aria-label="First name">
                            </div>
                            <div class="col">
                                <label style="margin-left: 0px;" for="cnee" class="form-label">CNE Doctorant :</label>
                                <input style="margin-bottom: 20px;" id="cnee" name="CNE" type="text" class="form-control" placeholder="Your CNE" aria-label="First name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label style="margin-left: 0px;" for="nomae" class="form-label">Nom Doctorant :</label>
                                <input style="margin-bottom: 20px;" id="nomae" name="nom" type="text" class="form-control" placeholder="first name" aria-label="First name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label style="margin-left: 0px;" for="prenomae" class="form-label">Prenom Doctorant :</label>
                                <input style="margin-bottom: 20px;" id="prenomae" name="prenom" type="text" class="form-control" placeholder="Last name" aria-label="Last name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label style="margin-left: 0px;" for="datenaissance" class="form-label">Date Naissance :</label>
                                <input style="margin-bottom: 20px;" name="datenaiss" type="date" class="form-control" id="datenaissance" placeholder="date naissance">
                            </div>
                            <div class="col">
                                <label style="margin-left: 0px;" for="lieufr" class="form-label">lieux Naissance :</label>
                                <input style="margin-bottom: 20px;" name="liuenaiss" type="text" class="form-control" id="lieufr"  placeholder="lieux naissance ">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label style="margin-left: 0px;" for="formationf" class="form-label">E-mail Doctorant :</label>
                                <input style="margin-bottom: 20px;" name="Email_D" type="text" class="form-control" id="formationf"  placeholder="E-mail">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label style="margin-left: 0px;" for="etablissement" class="form-label">Equipe :</label>
                                <input style="margin-bottom: 0px;" name="equipe" type="text" class="form-control" id="etablissement" placeholder="equipe">
                            </div>
                        </div>
                        <div><button type="submit" style="float: right; background: #424e83; border: 1px #424e83;width: 130px;height: 45px; margin-top: 20px" class="btn btn-primary">Add Chercher</button></div>
                    </form>
                </div>
                <div style="height: 40px" class="card-footer"><small style="float:right">&copy by hamza & radouan</small></div>
            </div>
        </div>
    </div>
</div>
@endsection
