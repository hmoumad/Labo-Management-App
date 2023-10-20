@extends('layouts.appChef')
@section('title', 'Home Page')

<link href="../nav_footer/home.css" rel="stylesheet">
<link rel="icon" href="../nav_footer/fplogo.png">
<link rel="icon" href="../img/fplogo.png">
@section('content')
<article>
        <div class="content ">
            <div class="STDOC">
                <div class="Sous-Content">
                    <p>represent les doctorant de notre appliction</p>
                    <p class="Tit1">Les Doctorant</p>
                    <p class="Tit2"> Appartient a equipe</p>
                </div>
                <div class="dsp"><img src="../nav_footer/img/111.png"></div>
            </div>
            <div class="STJURY">
                <div class="Sous-Content">
                    <p>chaque equipes est un ensemble des doctorant</p>
                    <p class="Tit1">Les Equipes</p>
                    <p class="Tit2"> Qui ont un Projet</p>
                </div>
                <div class="dsp"><img src="../nav_footer/img/22.png"></div>
            </div>
            <div class="STSOUT" >
                <div class="Sous-Content">
                    <p>chaque projet est presenter par un chef d'equipe et doctorant</p>
                    <p class="Tit1">Les Projets</p>
                    <p class="Tit2"> Maintenant</p>
                </div>
                <div class="dsp"><img style="border-radius: 50%; " src="../nav_footer/img/33.jpg"></div>
            </div>
        </div>
    </article>
@endsection
