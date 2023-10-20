@extends('layouts.appChef')

<link rel="icon" href="/img/fplogo.png">
<link rel="stylesheet" href="/pages/Alert/Alert.css">
<script src="/pages/Alert/Alert.js"></script>
<?php require('pages/Alert/Alert.html'); ?>

@section('title', 'Gestion Rapport')
@section('content')
<div style="width: 98%; margin: auto">
<div style="border: 1px solid rgba(0, 0, 0, 0.125);border-bottom: 0px; background: rgba(0, 0, 0, 0.03); color: ; height: 65px;" class="modal-header text-center">
    <h1 style="margin-left: 30px" class="modal-title" id="exampleModalLabel">List Of Rapports</h1>
    </div>
    <div style="border: 1px solid rgba(0, 0, 0, 0.125);" class="modal-body">
        <!-- show data in table -->
        <table style="text-align: center;" class="table table-striped">
            <tr style="height: 50px;">
                <th style="padding-top: 15px;">pdf</th>
                <th style="padding-top: 15px;">Expiditeur Name</th>
                <th style="padding-top: 15px;">Expiditeur Email</th>
                <th style="padding-top: 15px;">Expiditeur Team</th>
                <th style="padding-top: 15px;">Date Envoi</th>
                <th style="padding-top: 15px;">View</th>
                <th style="padding-top: 15px;">Download</th>
                <th style="padding-top: 15px;">Delete</th>
            </tr>
            @foreach($rapport as $row)
            <tr style="height: 50px;">
                <td>
                    <a href=""><img id="image" src="../img/pdf2.png" width="50" height="50" /></a>
                </td>
                <td style="padding-top: 15px;">{{ $row->name_responsible }}</td>
                <td style="padding-top: 15px;">{{ $row->email_responsible }}</td>
                <td style="padding-top: 15px;">{{ $row->id_team }}</td>
                <td style="padding-top: 15px;">{{ $row->created_at }}</td>
                <td style="padding-top: 15px;">
                    <li class="list-inline-item">
                        <a href='Visualiser/<?php echo $row['id'] ; ?>' class="btn btn-success">View</a>
                    </li>
                </td>
                <td style="padding-top: 15px;">                                    
                    <a href="{{ route('chef.equipe.Download.Rapport', ['file' => 'Rapports/.<?php $row->file_rapport ?>']) }}" class="btn btn-info">Download</i>
                    </a>
                </td>
                <td style="padding-top: 15px;">
                    <li class="list-inline-item">
                        <a href='Delete/<?php echo $row['id'] ; ?>' class="btn btn-danger" onclick="ShowModalDelete('Rappport Deletion','Do you really want to delete this Rappport',
                         '{{ $row['id'] }}', 'Yes', 'No'); return false;">Delete</a>
                    </li>
                </td>
            </tr>
            @endforeach
        </table>
        <?php
            if(Session::get('Delete_Rapport')){
                $message = Session::get('Delete_Rapport');
                echo "<script>
                    ShowAlert('".$message."','rgba(240,45,45,0.8)','rgb(220,3,3)');
                </script>";
            } 
        ?>
    </div>
</div>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script>
    var ModalWrap = null;

    //don't creat multiple modal
    if(ModalWrap !== null){
    modal.remove();
    }

    const ShowModalDelete = (title, description, value, btnyes, btnNO) => {
        ModalWrap = document.createElement('div');
        ModalWrap.innerHTML = `
            <div style=" background-color:rgba(0,0,0,0.5); position: absolute;" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div style="width:35%; height:30%; z-index: -1; border-raduis:3px;" class="modal-dialog bg-light">
                    <form method="post" action="{{route('chef.equipe.Delete')}}">
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