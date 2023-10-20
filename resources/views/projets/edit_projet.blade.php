@extends('layouts.app')
<link rel="stylesheet" href="pages/Projet.css">
<link rel="icon" href="img/fplogo.png">

@section('title', 'Edit Doctorant')
@section('content')

<div style="width: 98%; margin: auto">
<div style="background-color: #D9FFFF; color: ; height: 65px;" class="modal-header text-center">
                <h2 style="margin-left: 30px;" class="modal-title" id="exampleModalLabel">Edit Projets</h2>
                <a style="margin-right: 30px;" href="{{route('Add_projet')}}" class="btn btn-danger">Back To all Projects</a>
                <!-- <button style="color:red;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <form method="post" action="Edition_projet/{{ $projet['id'] }}">
                @csrf
                 <input type="hidden" name="identifiant" value="{{ $projet['id'] }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">   
                <div style="background-color: #DEDEDE" class="modal-body">

                    <!-- show message after deleting data -->
                    @if(Session::get('data_updated'))
                        <div style="padding:10px;  text-align: center; font-size: large;" id="messageshow" class="alert alert-success" role="alert">
                            {{ Session::get('data_updated') }}
                        </div>
                    @endif
                    @if(Session::get('data_no_updated'))
                        <div id="errorshow" style="padding:10px; text-align: center; font-size: large;" class="alert alert-danger" role="alert">
                            {{ Session::get('data_no_updated') }}
                        </div>
                    @endif
                    <table class="grid" style="width: 85%;">
                        <tr style="height: 90px">
                            <td><label style="margin-left: 0px;" for="cine" class="form-label"><b>Intitule Du Projet :</b></label></td>
                            <td>
                                <input value="{{ $projet['Intitul_Projet'] }}" style="margin-bottom: 5px;" id="cine" name="intitule" type="text" class="form-control" aria-label="First name">
                                <span style="color: red">
                                    @error('intitule')  {{ $message }}  @enderror
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 90px">
                            <td><label style="margin-left: 0px;" for="cine" class="form-label"><b>Domaine Du Projet :</b></label></td>
                            <td>
                                <input value="{{ $projet['Id_Theme'] }}" style="margin-bottom: 5px;" id="cine" name="domaine" type="text" class="form-control" aria-label="First name">
                                <span style="color: red">
                                    @error('domaine')  {{ $message }}  @enderror
                                </span>
                            </td>
                        </tr>
                        <tr  style="height: 90px">
                            <td><label style="margin-left: 0px; margin-bottom: 100px;" for="cine" class="form-label"><b>Description Du Projet :</b></label></td>
                            <td>
                                <textarea style="margin-bottom: 20px; margin-top: 20px;" class="form-control" aria-label="First name" name="description" id="" cols="30" rows="5">{{ $projet['Description_Projet'] }}</textarea>
                                <span style="color: red">
                                    @error('description')  {{ $message }}  @enderror
                                </span>
                            </td>
                        </tr>
                        <tr  style="height: 90px">
                            <td><label style="margin-left: 0px;" for="cine" class="form-label"><b>Image Du Projet :</b></label></td>
                            <td>
                                <input style="margin-bottom: 5px;" id="cine" name="image_projet" type="file" class="form-control" aria-label="First name">
                                <span style="color: red">
                                    @error('profile_projet')  {{ $message }}  @enderror
                                </span>
                            </td>
                            <tr>
                                <td></td>
                                <td>
                                    <img style="border: solid #2e4444; border-radius: 8px;" src="{{ url('Profiles_Projet/'.$projet->Img_Projet) }}" width="400" height="250" alt="">
                                </td>
                            </tr>
                        </tr>
                    </table>
                </div>

                <div style="background-color: #D9FFFF;padding-bottom: 6px; padding-right: 15px; padding-top: 10px; height: 65px;" class="modal-footer">
                    
                    <button  style="margin-right: 30px; font-weight: bold;" name="insert" type="submit" class="btn btn-success">Edite Project</button>
                </div>
        </form>
</div>
<script>
     setTimeout(() => {
        messageshow = document.getElementById("messageshow");
        messageshow.style.display = "none";
    }, 5000);

    setTimeout(() => {
        errorshow = document.getElementById("errorshow");
        errorshow.style.display = "none";
    }, 5000);
</script>

@endsection