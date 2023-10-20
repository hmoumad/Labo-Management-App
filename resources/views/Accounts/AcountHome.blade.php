@extends('layouts.app')
@section('title', 'Equipes')
<link rel="stylesheet" href="/pages/AcountHome.css">
@section('content')
<div class="feautures">
    <div class="insert-section">
        <div>
            <h3 >Add New Admin</h3>
            <hr></hr>
            <p>if you click here you well go to add new Admin c-a-d creat new account of Admin</p>
            <form action="options/insert-section.php" method="post">
                <button name="statistique" class="ButtonAdd">New Admin</button>
            </form>
        </div>
    </div>
    <div class="statistique">
            <div>
                <h3>Add New Doctorant</h3>
            <hr></hr>
            <p>if you click here you well go to add new Doctorant c-a-d account of Doctorant</p>
            <form action="options/statistique.php" method="post">
                <button style="width: 150px;" name="statistique" class="ButtonAdd">New Doctorant</button>
            </form>
            </div>
    </div>
    <div class="edit-etudiant">
        <div>
            <h3>Add New Chef</h3>
            <hr></hr>
            <p>if you click here you well go to add new chef equipe c-a-d creat new account of Chef Equipe</p>
            <form action="options/edit-etudiant.php" method="post">
                <button name="statistique" class="ButtonAdd">New Chef</button>
            </form>
        </div>
    </div>
</div>
@endsection
