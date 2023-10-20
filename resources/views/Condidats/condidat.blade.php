@extends('layouts.app')
<link rel="stylesheet" href="pages/condidat.css">
<link rel="icon" href="img/fplogo.png">

@section('title', 'Gestion Condidats')
@section('content')
<div style="width: 98%; margin: auto">
<div style="border: 1px solid rgba(0, 0, 0, 0.125);border-bottom: 0px; background: rgba(0, 0, 0, 0.03); color: ; height: 65px;" class="modal-header text-center">
    <h1 style="margin-left: 30px" class="modal-title" id="exampleModalLabel">Page Condidats</h1>
        <button name="bottonadd"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="margin-right: 30px;" type="submit" id="ButtonAddColomn">Add New Colomn</button>
    </div>
    <div style="border: 1px solid rgba(0, 0, 0, 0.125);" class="modal-body">
        @if(Session::get('Added'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('Added') }}
            </div>
        @endif
        <fieldset>
            <legend style="text-align: center">Excel File Should Be Like this Format</legend>
            <img src="img/ExcelCondidat.png" width="100%" style="margin-bottom: 40px; border: 2px solid rgba(0, 0, 0, 0.125); border-radius: 5px;">
            <form action="{{ route('ImportCondidat') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="formFile" class="form-label"><b>Choose Excel File :</b></label>
                <div style="display: flex" class="mb-3">
                    <input name="import_condidat" style="background-color: #FFB2DC; width: 500px; margin-right: 20px;" class="form-control" type="file" id="formFile">
                    <button style="margin-right: 20px" name="insert" type="submit" class="btn btn-success">Import</button>
                </div>
                <!-- shpw error message -->
                <h5 style="color: red; margin-top: 20px;">@error('import_condidat')  {{ $message }}  @enderror</h5>
            </form>
            
            <!-- Modal to add new colomn -->
            <div style="margin: auto;" class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div style="width:50%; margin: auto; height:75%; z-index: ; border-raduis:5px; margin: auto;" class="modal-content">
                        <div style="background-color: #D9FFFF; color: ; height: 65px;" class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">Add New Colomn</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('AddColomn') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div style="background-color: #DEDEDE; height: 400px;" class="modal-body">
                                <h5 style="text-align: center; margin-top: 20px"><b>Configuration of Colomn that you want to Add</b></h5>
                                <div class="mb-3">
                                    <table style="margin-top: 30px; margin-bottom: 15px; width: 85%; height: 250px;">
                                        <tr>
                                            <td><label class="form-label" for="name">Your Colomn Name :</label></td>
                                            <td><input class="form-control" type="text" name="ColomName" id="name" placeholder="Enter Colomn Name"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-label" for="cd">Coefficien Of Deug :</label></td>
                                            <td><input class="form-control" type="text" name="Cdeug" id="cd" placeholder="Enter X"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-label" for="cl">Coefficien Of Licence :</label></td>
                                            <td><input class="form-control" type="text" name="Clicence" id="cl" placeholder="Enter Y"></td>
                                        </tr>
                                        <tr>
                                            <td><label class="form-label" for="ce">Coefficien Of Entretien :</label></td>
                                            <td><input class="form-control" type="text" name="Centretien" id="ce" placeholder="Enter Z"></td>
                                        </tr>
                                    </table>
                                    <div>
                                        <small style="float: right; font-weight: bold">Colomn_Value = [(X*Note_Deug)+(X*Note_Licence)+(X*Note_Entretien)]/3</small>
                                    </div>
                                </div>

                            </div>
                            <div style="background-color: #D9FFFF;padding-bottom: 6px; padding-right: 15px; padding-top: 10px; height: 65px;" class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button name="importbutton" type="submit" class="btn btn-success">Add Colomn</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>    
        
            <!-- show message after importing data from excel -->
            @if(Session::get('ImportSuccess'))
            <div style="padding:10px;" id="messageshow" class="alert alert-success" role="alert">
                {{ Session::get('ImportSuccess') }}
            </div>@endif

        </fieldset>

           
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