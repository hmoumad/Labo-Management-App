@extends('layouts.app')
@section('title', 'Projets')
<link rel="stylesheet" href="pages/Projet.css">
@section('content')

<!-- show message after searching -->
@if(Session::get('searched_massage'))
    <div style="padding:10px;  text-align: center; font-size: large;" id="messageshow" class="alert alert-danger" role="alert">
        {{ Session::get('searched_massage') }}
    </div>
@endif

<!-- show message after inserting data -->
@if(Session::get('success'))
    <div style="padding:10px;  text-align: center; font-size: large;" id="messageshow" class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
@endif

@if(Session::get('fail'))
    <div id="errorshow" style="padding:10px; text-align: center; font-size: large;" class="alert alert-danger" role="alert">
        {{ Session::get('fail') }}
    </div>
@endif

<!-- show message after deleting data -->
@if(Session::get('Data_Deleted'))
    <div style="padding:10px;  text-align: center; font-size: large;" id="messageshow" class="alert alert-success" role="alert">
        {{ Session::get('Data_Deleted') }}
    </div>
@endif

@if(Session::get('Data_No_Deleted'))
    <div id="errorshow" style="padding:10px; text-align: center; font-size: large;" class="alert alert-danger" role="alert">
        {{ Session::get('Data_No_Deleted') }}
    </div>
@endif


            <div style="width: 97%; margin: auto">
                <div style=" border: 1px solid rgba(0, 0, 0, 0.125); background: rgba(0, 0, 0, 0.03); color: ; height: 65px; width: 100%;" class="modal-header text-center">
                    <div>
                        <h1 style="margin-top: 8px;">List Des Projet Present</h1>
                    </div>
                    <div>
                        <button class="ButtonAdd" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Ajouter Un Projet
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div style="border: 1px solid rgba(0, 0, 0, 0.125); border-top: 0px;" class="modal-body bg-white">

                    <!-- partie Search -->
                    <form action="{{route('Search_Projet')}}" method="get">
                        @csrf
                        <div class="searchdiv">
                            <input type="text" class="form-control" name="search_domain" id="searchinput" placeholder="Search By Domaine">
                            <input type="text" class="form-control" name="search_name" id="searchinput" placeholder="Search By Project Name">
                            <button name="buttonsearch" id="searchbutton" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <?php $i = 0; ?>
                    <div id="cardid">
                    @foreach($projets as $projet)
                        <div id="cardelement" class="card" style="">
                            <img src="{{ url('Profiles_Projet/'.$projet->Img_Projet) }}" class="card-img-top" style="height: 210px;">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <b>Projet :</b>{{ $projet['Intitul_Projet'] }}    
                                </h5>
                                <p class="card-text">{{ $projet['Description_Projet'] }}</p>
                                <a style="margin-right: 15px;" href="#" class="btn btn-primary">More Details</a>
                                <li class="list-inline-item">
                                    <a style="border-radius: 5px !important; margin-right: 8px;" href='Edit_Projet/<?php echo $projet['id'] ; ?>' class="btn btn-success btn-sm rounded-0 iconsboot" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a style="border-radius: 5px !important;" href="/<?php echo $projet['id'] ; ?>" onclick="ShowModal('Data Deletion','Do you really want to delete this Doctorant', '{{ $projet['id'] }}','Yes', 'No');
                                            return false;" class="btn btn-danger btn-sm rounded-0 iconsboot" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg"
                                             width="25" height="25" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                            </svg><i class="fa fa-trash"></i>
                                    </a>
                                </li>
                            </div>
                        </div>
                        <?php $i++; ?>
                    @endforeach
                    </div>

                    <!-- pagination links -->
                    <div style="justify-content: center" class="d-flex">
                        {!! $projets->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal To Add Projets-->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div style="width:50%; height:90%; margin: auto; border-raduis:5px;" class="modal-content">
            <div style="background-color: #D9FFFF; color: ; height: 67px;" class="modal-header text-center">
                <h2 class="modal-title" id="exampleModalLabel">Add Projet</h2>
                <button style="color:red;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('Add_projet') }}" enctype="multipart/form-data">
                @csrf
                <div style="background-color: #DEDEDE; height: 500px; padding-top: 20px" class="modal-body">
                    <div style="margin-top:0px;" class="row">
                        <div style="margin-bottom: 15px;" class="col">
                            <label style="margin-left: 0px;" for="cine" class="form-label"><b>Intitule Projet :</b></label>
                            <input style="margin-bottom: 20px;" id="cine" name="intitule" type="text" class="form-control" placeholder="Your CIN" aria-label="First name">
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin-bottom: 15px;" class="col">
                            <label style="margin-left: 0px;" for="nomae" class="form-label"><b>theme Projet :</b></label>
                            <!-- <input style="margin-bottom: 20px;" id="nomae" name="domaine" type="text" class="form-control" placeholder="first name" aria-label="First name"> -->
                            <select class="form-select" id="nomae" name="domaine">
                                <option value="selectHeure" disabled selected>Choose theme</option>
                                @foreach($themes as $theme)
                                    <option value="{{ $theme['id'] }}">{{ $theme['id'] }} {{ $theme['domain_theme'] }}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin-bottom: 15px;" class="col">
                            <label style="margin-left: 0px;" for="prenomae" class="form-label"><b>Description Projet :</b></label>
                            <textarea style="margin-bottom: 20px; height: 90px;" id="prenomae" name="description" class="form-control" aria-label="Last name">Description Here</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin-bottom: 15px;" class="col">
                            <label style="margin-left: 0px;" for="formationf" class="form-label"><b>Choose File :</b></label>
                            <input style="margin-bottom: 20px; background-color: #FFB2DC;" name="imageprojet" type="file" class="form-control" id="formationf"  placeholder="E-mail">
                        </div>
                    </div>
                </div>

                <div style="background-color: #D9FFFF;padding-bottom: 6px; padding-right: 15px; padding-top: 10px; height: 65px;" class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    <button name="insert" type="submit" class="btn btn-success">Add</button>
                </div>
        </form>
    </div>
    </div>
</div>

<!-- Information of Admin -->
<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header">
        <h2 class="offcanvas-title" id="offcanvasScrollingLabel">Welcome Admin</h2>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div style="display: flex; justify-content: center">
            <img src="img/iconelogin1.png" width="200" height="200">  
        </div>  
        <h4 style="text-align: center; margin: 20px">Information About Admin</h4><hr>
        <h5><b>Full Name &nbsp &nbsp &nbsp &nbsp:</b> &nbsp Hamza moumad</h5> <hr>
        <h5><b>Email &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp:</b> &nbsp hamzamoumad@gmail.com</h5><hr>
        <h5><b>Date Creation :</b>&nbsp 2022-04-09 18:31:49</h5>
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

    var ModalWrap = null;

    //don't creat multiple modal
    if(ModalWrap !== null){
    modal.remove();
    }

    const ShowModal = (title, description, value, btnyes, btnNO) => {
        ModalWrap = document.createElement('div');
        ModalWrap.innerHTML = `
            <div style=" background-color:rgba(0,0,0,0.5); position: absolute;" class="modal fade" tabindex="-1">
                <div style="width:50%; height:30%; z-index: -1; border-raduis:3px;" class="modal-dialog bg-light">
                    <form method="post" action="{{route('DeleteProjet')}}">
                        @csrf
                        <div class="modal-content">
                            <div style="height:50px" class="modal-header bg-light">
                                <h3 class="modal-title">${title}</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div style="margin-top: 10px; height:120px" class="modal-body">
                                <input style="margin-bottom: 10px; width: 50px; padding-left: 16px;" type="text" name="delete_id" value="${value}" class="form-control" id="important">
                                <h4 style="font-weight: bold; margin-bottom:10px;">${description}</h4>
                            </div>
                            <div style="height:50px; margin:-1px" class="modal-footer bg-light">
                                <button style="margin-top: -5px;" type="button" class="btn btn-success" data-bs-dismiss="modal">${btnNO}</button>
                                <button type="submit" style="margin-top: -5px; margin-left: 15px;" class="btn btn-danger">${btnyes}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        `;

        document.body.append(ModalWrap);
        var modal = new bootstrap.Modal(ModalWrap.querySelector('.modal'));
        modal.show();
    }


</script>

@endsection
