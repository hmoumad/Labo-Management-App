@extends('layouts.app')
<link rel="stylesheet" href="pages/doctorant.css">

@section('title', 'Search Doctorant')
@section('content')

<h1 style="text-align: center;">All Element Searched</h1>
<div id="cardid">
@foreach($doctorants as $row)

<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="img/prfile.png" alt="Card image cap">
    <div class="card-body">
        <h5 style="font-weight: bold;" class="card-title">{{ $row->Nom_D }} {{ $row->Prenom_D }}</h5>
        <p class="card-text"><b>The E-mail :</b><br> {{ $row->Email_D }}</p>
        <p class="card-text"><b>Date Naissance :</b> {{ $row->Date_Naiss_D }} <br><b> Lieu Naissance : </b>{{ $row->Lieu_Naiss_D }}</p>
        <a style="margin-right: 20px" href="{{route('doctorant')}}" class="btn btn-primary">All Doctorant</a>
        <a href="Edit/{{ $row->id }}" class="btn btn-success">Edite</a>
    </div>
</div>
@endforeach

</div>

@endsection