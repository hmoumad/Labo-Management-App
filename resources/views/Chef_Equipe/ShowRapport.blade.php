@extends('layouts.appChef')
<link rel="icon" href="/img/fplogo.png">
<link rel="stylesheet" href="../pages/rapport.css">

@section('title', 'Gestion Rapport')
@section('content')
<div style="width: 98%; margin: auto">
<div style="border: 1px solid rgba(0, 0, 0, 0.125);border-bottom: 0px; background: rgba(0, 0, 0, 0.03); color: ; height: 65px;" class="modal-header text-center">
    <h1 style="margin-left: 30px" class="modal-title" id="exampleModalLabel">Details Of Rapport</h1>
    <a href="{{ route('chef.equipe.rapport') }}" class="btn btn-info" type="submit">Back To Rapports</a>
    </div>
    <div style="border: 1px solid rgba(0, 0, 0, 0.125);" class="modal-body">
        <div style="" class="content">
        <div class="description">
            <h3>More Delailes about Rapport</h3>
            <table style="width: 60%">
                <tr>
                    <td><h5><b>Sent At :</b></h5></td>
                    <td>{{ $rapport->created_at }}</td>
                    <td><h5><b>Full Name of Expiditeur :</b></h5></td>
                    <td>{{ $rapport->name_responsible }}</td>
                </tr>
                <tr>
                    <td><h5><b>Email of Expiditeur :</b></h5></td>
                    <td>{{ $rapport->email_responsible }}</td>
                    <td><h5><b>Message Descriptif :</b></h5></td>
                    <td>{{ $rapport->description_message }}</td>
                </tr>
            </table>
        </div>
        <div style="" class="rapport">
            <iframe title="testPdf" height="100%" width="100%" src="/Rapports/{{$rapport->file_rapport}}" frameborder="0"></iframe>
        </div>
        </div>
    </div>
</div>

@endsection