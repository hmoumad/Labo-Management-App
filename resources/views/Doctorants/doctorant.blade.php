@extends('layouts.app')
<link rel="stylesheet" href="pages/doctorant.css">
<link rel="icon" href="img/fplogo.png">

@section('title', 'Doctorants')
@section('content')
<div class="content1">

    
    <!-- Button trigger modal to import excel file -->
    <div style="display: flex;" class="grouper">
        <button type="button" class="ButtonAdd" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Import Excel File
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel-fill" viewBox="0 0 16 16">
            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64z"/>
            </svg>
        </button>

        <!-- shpw error message -->
        <h5 style="color: red; margin-top: 20px;">@error('import_excel')  {{ $message }}  @enderror</h5>
    
    </div>

    <!-- Button trigger modal to Add New Doctorant -->
    <button class="ButtonAdd" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ajouter Doctorant 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        </svg>
    </button>
    
</div>

    <!-- Modal import -->
    <div style="margin: auto;" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div style="width:60%; margin: auto; height:75%; z-index: ; border-raduis:5px; margin: auto;" class="modal-content">
                <div style="background-color: #D9FFFF; color: ; height: 65px;" class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Import Data</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('ImportDoctorants') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div style="background-color: #DEDEDE; height: 400px;" class="modal-body">
                        <h5 style="text-align: center; margin-top: 20px"><b>l'excel importer doit respecter la form suivant</b></h5>
                        <img style="margin-bottom: 40px;" src="img/excel1.png" width="100%" height="160px">
                        <div class="mb-3">
                            <label for="formFile" class="form-label"><b>Choose Excel File :</b></label>
                            <input name="import_excel" style="background-color: #FFB2DC;" class="form-control" type="file" id="formFile">
                        </div>

                    </div>
                    <div style="background-color: #D9FFFF;padding-bottom: 6px; padding-right: 15px; padding-top: 10px; height: 65px;" class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button name="importbutton" type="submit" class="btn btn-success">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div style="float: right; margin-bottom: 10px; margin-right:30px" class="button_search">

</div>
            <div style="width: 97%; margin: auto">
                <div style="justify-content: space-around; border: 1px solid rgba(0, 0, 0, 0.125); background: rgba(0, 0, 0, 0.03); color: ; height: 65px; width: 100%;" class="modal-header text-center">
                    <h1>you welcome to Doctorant Page </h1>
                </div>
                <div style="border: 1px solid rgba(0, 0, 0, 0.125); border-top: 0px;" class="modal-body bg-white">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- partie Search -->
                    <form action="{{route('searchpage')}}" method="get">
                        @csrf

                        <div class="searchdiv">
                        <input type="text" class="form-control" name="searchid" id="searchinput" placeholder="Search Here">
                        <button name="buttonsearch" id="searchbutton" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                        </div>
                    </form>

                    <!-- show message after importing data from excel -->
                    @if(Session::get('ImportSuccess'))
                    <div style="padding:10px;" id="messageshow" class="alert alert-success" role="alert">
                        {{ Session::get('ImportSuccess') }}
                    </div>@endif

                    <!-- show message after inserting data -->
                    @if(Session::get('success'))
                    <div style="padding:10px;" id="messageshow" class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>@endif
                    @if(Session::get('fail'))
                    <div id="errorshow" style="padding:10px;" class="alert alert-danger" role="alert">
                        {{ Session::get('fail') }}
                    </div>@endif
                    
                    <!-- message de validation de suppression  -->
                    @if(Session::get('SuccessCreation'))
                    <div style="padding:10px;" id="messageshow" class="alert alert-success" role="alert">
                        {{ Session::get('SuccessCreation') }}
                    </div>@endif
                    @if(Session::get('failCreation'))
                    <div id="errorshow" style="padding:10px;" class="alert alert-danger" role="alert">
                        {{ Session::get('failCreation') }}
                    </div>@endif

                    <!-- message de validation de L'edite -->
                    @if(Session::get('success2'))
                    <div style="padding:10px;" id="messageshow" class="alert alert-success" role="alert">
                        {{ Session::get('success2') }}
                    </div>@endif
                    @if(Session::get('fail2'))
                    <div id="errorshow" style="padding:10px;" class="alert alert-danger" role="alert">
                        {{ Session::get('fail2') }}
                    </div>@endif

                <!-- show data in table -->
                <table style="text-align: center;" class="table table-striped">
                        <tr style="height: 50px;">
                            <th style="padding-top: 15px;">Profile</th>
                            <th style="padding-top: 15px;">Nom & Prenom</th>
                            <th style="padding-top: 15px;">CIN & CNE</th>
                            <th style="padding-top: 15px;">E-mail</th>
                            <th style="padding-top: 15px;">Action</th>
                        </tr>
                        @foreach($doctorants as $result)
                        <tr style="height: 50px;">
                            <td>
                                <img id="image" src="img/prfile.png" />
                            </td>
                            <td style="padding-top: 15px;">Nom: {{$result['Nom_D']}} $ Prenom: {{$result['Prenom_D']}}</td>
                            <td style="padding-top: 15px;">CIN: {{ $result['CIN_D'] }} $ CNE: {{ $result['CNE_D'] }}</td>
                            <td style="padding-top: 15px;">E-amil: {{ $result['Email_D'] }}</td>
                            <td>
                                </li>
                                <li class="list-inline-item">
                                    <a href='Edit/<?php echo $result['id'] ; ?>' class="btn btn-success btn-sm rounded-0 iconsboot" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="/<?php echo $result['id'] ; ?>" onclick="ShowModal('Data Deletion','Do you really want to delete this Doctorant', '{{ $result['id'] }}','Yes', 'No');
                                            return false;" class="btn btn-danger btn-sm rounded-0 iconsboot" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg"
                                             width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                            </svg><i class="fa fa-trash"></i>
                                    </a>
                                </li>
                            </td>
                        </tr>
                    @endforeach
                </table>
                    <!-- <div class="statistic">
                        Showing 10 / {{ $doctorants-> count(); }}
                    </div> -->
                    <div class="paginationbar">
                        {{$doctorants->links()}}
                    </div>
                </div>
            </div>
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
  
@endsection


<!-- Modal To Add Doctors-->

<div style="" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div style="width:50%; height:100%; margin: auto; border-raduis:5px;" class="modal-content">
            <div style="background-color: #D9FFFF; color: ; height: 65px;" class="modal-header text-center">
                <h2 class="modal-title" id="exampleModalLabel">Add Docotrs</h2>
                <button style="color:red;" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('AddDoctoratant') }}">
                @csrf
                <div style="background-color: #DEDEDE; height: 575px;" class="modal-body">
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
                </div>

                <div style="background-color: #D9FFFF;padding-bottom: 6px; padding-right: 15px; padding-top: 10px; height: 65px;" class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    <button name="insert" type="submit" class="btn btn-success">Add</button>
                </div>
        </form>
    </div>
    </div>
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
                    <form method="post" action="{{route('DeleteStudent')}}">
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

