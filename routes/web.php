<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\VitrineController;
use App\Http\Controllers\MenController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PlateController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// pour la gestion des menus

Route::get('/menu', [MenuController::class, 'tableau_menu']);
Route::post('/menus/traitement', [MenuController::class, 'ajouter_menu']);
Route::get('/updatemenu/{id}', [MenuController::class, 'update_menu']);
Route::post('/updatemenu/traitement', [MenuController::class, 'modifier_menu_traitement']);
Route::get('/delete-menu/{id}', [MenuController::class, 'delete_menu']);

//gestion des reservation

Route::controller(ReservationController::class)->prefix('/reservation')->name('reservation')->group(function(){
  Route::get('/', 'index');
  Route::get('/create', 'create');
  Route::post('', 'store');
  Route::get('/{id}/update', 'update');
  Route::patch('/{id}', 'update');
  Route::delete('/delete/{id}', 'destroy');
  Route::get('/{id}', 'show');
});

//gestion des client
Route::get('/client', [ClientController::class, 'tableau_client']);
Route::post('/clients/traitement', [ClientController::class, 'ajouter_client']);
Route::get('/updateclient/{id}', [ClientController::class, 'update_client']);
Route::post('/updateCli/traitement', [ClientController::class, 'modifier_client_traitement']);
Route::get('/delete-client/{id}', [ClientController::class, 'delete_client']);

//gestion des réservation
Route::get('/reservation', [ReservationController::class, 'tableau_reservation']);
Route::post('/reservations/traitement', [ReservationController::class, 'ajouter_reservation']);
Route::get('/updatereservation/{id}', [ReservationController::class, 'update_reservation']);
Route::post('/updateres/traitement', [ReservationController::class, 'modifier_reservation_traitement']);
Route::get('/delete-reservation/{id}', [ReservationController::class, 'delete_reservation']);

//gestion des plats
Route::get('/plat', [PlatController::class, 'tableau_plat']);
Route::post('/plats/traitement', [PlatController::class, 'ajouter_plat']);
Route::get('/updateplat/{id}', [PlatController::class, 'update_plat']);
Route::post('/updateplat/traitement', [PlatController::class, 'modifier_plat_traitement']);
Route::get('/delete-plat/{id}', [PlatController::class, 'delete_plat']);
//gestion des roles
Route::get('/role', [RoleController::class, 'tableau_role']);
Route::post('/roles/traitement', [RoleController::class, 'ajouter_role']);
Route::get('/updaterole/{id}', [RoleController::class, 'update_role']);
Route::post('/updaterole/traitement', [RoleController::class, 'modifier_role_traitement']);
Route::get('/delete-role/{id}', [RoleController::class, 'delete_role']);

//gestion des tables
Route::get('/table', [TableController::class, 'tableau_table']);
Route::post('/tables/traitement', [TableController::class, 'ajouter_table']);
Route::get('/updatetable/{id}', [TableController::class, 'update_table']);
Route::post('/updatetable/traitement', [TableController::class, 'modifier_table_traitement']);
Route::get('/delete-table/{id}', [TableController::class, 'delete_table']);

//gestion des commandes
Route::get('/commande', [CommandeController::class, 'tableau_commande']);
Route::post('/commandes/traitement', [commandeController::class, 'ajouter_commande']);
Route::get('/updatecommande/{id}', [CommandeController::class, 'update_Commande']);
Route::post('/updatecommande/traitement', [CommandeController::class, 'modifier_commande_traitement']);
Route::get('/delete-commande/{id}', [CommandeController::class, 'delete_commande']);

//gestion des utilisateurs
Route::get('/user', [UserController::class, 'tableau_user']);
Route::post('/users/traitement', [UserController::class, 'ajouter_user']);
Route::get('/updateuser/{id}', [UserController::class, 'update_user']);
Route::post('/updateuser/traitement', [UserController::class, 'modifier_user_traitement']);
Route::get('/delete-user/{id}', [UserController::class, 'delete_user']);


// affichage de la page d'accueil

Route::get('/accueil', [VitrineController::class, 'vitrine_vue']);

// affichage de a propos
Route::get('/about', [AboutController::class, 'about_vue']);

// affichage des plats 

Route::get('/plate', [PlateController::class, 'plate_vue']);

// affichage des menu

Route::get('/men', [MenController::class, 'men_vue']);


//affichage page de reservation

Route::get('/booking', [BookingController::class, 'book_vue']);

// affichage page de commande

Route::get('/order', [OrderController::class, 'order_vue']);


require __DIR__.'/auth.php';
