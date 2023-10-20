<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\DoctorantController;
use App\Http\Controllers\CondidatController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ChercheurController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChefEquipeController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\ChefEquipe;

Route::get('/', function () { return view('auth.login'); });

/* =========================================== Start Creat Accounts ========================================================= */

Route::get('/Register_Page', [AccountController::class, 'index'])->name('RegisterPage')->middleware('auth');
Route::post('/Registration', [AccountController::class, 'create'])->name('Registration')->middleware('auth');
Route::get('/Accounts/Home', [AccountController::class, 'Accounts'])->name('Accounts')->middleware('auth');

/* =========================================== End Creat Accounts ========================================================= */

Route::get('/hahaha', function () { return 'bonjour tout le monde'; });
Route::get('/view', function () { return view('view');});
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

/* =================================================== Start Partie Admin ================================================================================ */

/* ---------------------------------------------------Gestion Des Doctorant---------------------------------------------------------------------- */

Route::get('/doctorant', [DoctorantController::class, 'index'])->name('doctorant')->middleware('auth');
Route::post('store', [DoctorantController::class, 'store'])->name('AddDoctoratant')->middleware('auth');
Route::post('destroy', [DoctorantController::class , 'destroy'])->name('DeleteStudent')->middleware('auth');
Route::get('Search', [DoctorantController::class , 'search'])->name('searchpage')->middleware('auth');
Route::get('Edit/{id}', [DoctorantController::class , 'show'])->name('ShowDataEdit')->middleware('auth');
Route::get('edit_doctor/{id}', [DoctorantController::class , 'show'])->name('ShowDataEdit')->middleware('auth');
Route::post('Edit/Edition_Doctorant/{id}', [DoctorantController::class , 'update'])->middleware('auth');
Route::post('/doctorant/import', [DoctorantController::class , 'import'])->name('ImportDoctorants')->middleware('auth');

/* ---------------------------------------------------Gestion Des Projet---------------------------------------------------------------------- */

Route::get('/projet', [ProjectController::class, 'index'])->name('projet')->middleware('auth');
Route::post('/projet', [ProjectController::class, 'store'])->name('Add_projet')->middleware('auth');
Route::post('/Delete_projet', [ProjectController::class, 'destroy'])->name('DeleteProjet')->middleware('auth');
Route::get('Edit_Projet/{id}', [ProjectController::class , 'show'])->name('ShowDataEditProjet')->middleware('auth');
Route::get('projets/edit_projet', [ProjectController::class , 'show'])->name('EditData')->middleware('auth');
Route::post('Edit_Projet/Edition_projet/{id}', [ProjectController::class , 'update'])->middleware('auth');
Route::get('SearchProjet', [ProjectController::class , 'search'])->name('Search_Projet')->middleware('auth');

/* ---------------------------------------------------Gestion Des Equipes---------------------------------------------------------------------- */

Route::get('/equipe', [EquipeController::class, 'index'])->name('equipe')->middleware('auth');

/* ---------------------------------------------------Gestion Des Chercheurs---------------------------------------------------------------------- */

Route::get('/Chercheurs', [ChercheurController::class, 'index'])->name('Chercheur')->middleware('auth');

/* ---------------------------------------------------Gestion Des Condidats---------------------------------------------------------------------- */

Route::get('/Condidat', [CondidatController::class, 'index'])->name('condidat')->middleware('auth');
Route::post('/Import_Condidat', [CondidatController::class, 'import'])->name('ImportCondidat')->middleware('auth');
Route::get('/Add_Colomns', [CondidatController::class, 'AddColomns'])->name('AddColomn')->middleware('auth');
Route::post('/Show_All', [CondidatController::class, 'store'])->name('ShowAllCondidat')->middleware('auth');

/* =================================================== End Partie Admin ================================================================================ */

/* =================================================== Start Partie User ================================================================================ */

Route::name('simple.user.')->namespace('User')->prefix('User/')->group(function(){

    Route::get('Home', [UserController::class, 'index'])->name('Home')->middleware('auth:user');
    Route::get('Login', [UserController::class, 'UserLogin'])->name('Loign');
    Route::post('Login', [UserController::class, 'CheckUserLogin'])->name('CHeckLogin');
    Route::get('Add_Rapport', [UserController::class, 'AddRapport'])->name('rapport')->middleware('auth:user');
    Route::post('Add_Rapport', [UserController::class, 'TraitcontactementAddRapport'])->name('traitement.rapport')->middleware('auth:user'); 
    Route::get('Contact', [UserController::class, 'ContactUs'])->name('contact')->middleware('auth:user');
    Route::post('Contact', [ContactController::class, 'AddContact'])->name('Message')->middleware('auth:user');

});
/* =================================================== End Partie User ================================================================================ */

/* =================================================== Start Partie chef Equipe================================================================================ */

Route::name('chef.equipe.')->namespace('ChefEquipe')->prefix('Chef_Equipe/')->group(function(){

    Route::get('Home', [ChefEquipeController::class, 'index'])->name('Home')->middleware('auth:chefequipe');
    Route::get('Login', [ChefEquipeController::class, 'LoginChef'])->name('Login');
    Route::post('Login', [ChefEquipeController::class, 'CheckChefLogin'])->name('CheckLogin');
    Route::get('Gestion_Rapports', [ChefEquipeController::class, 'GestionRapport'])->name('rapport')->middleware('auth:chefequipe');
    Route::get('Visualiser/{id}', [ChefEquipeController::class, 'ViewRapport'])->name('View.Rapport')->middleware('auth:chefequipe');
    Route::get('Download', [ChefEquipeController::class, 'DownloadRapport'])->name('Download.Rapport')->middleware('auth:chefequipe');
    Route::post('Delete', [ChefEquipeController::class, 'DeleteRapport'])->name('Delete')->middleware('auth:chefequipe');
    
});
/* =================================================== End Partie chef Equipe ================================================================================ */

