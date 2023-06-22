<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StageController;

use App\Http\Controllers\TacheController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\StagiaireDashboardController;
use Illuminate\Support\Facades\Auth, App\Http\Controllers\Auth\LoginController;

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

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Home route
Route::get('/home', function () {
    if (Auth::check()) {
        if (Auth::user()->role == 1) { // admin role
            return redirect()->route('admin-dashboard');
        } elseif (Auth::user()->role == 0) { // stagiaire role
            return redirect()->route('stagiaire-dashboard');
        }
    }
    return redirect()->route('login');
})->name('home');

// Routes for stagiaire dashboard
Route::get('/stagiaire-dashboard', [StagiaireDashboardController::class, 'index'])
    ->name('stagiaire-dashboard')
    ->middleware(['auth', 'role:0']);

// Routes for admin dashboard
Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])
    ->name('admin-dashboard')
    ->middleware(['auth', 'role:1','prevent-back-history']);

// Routes accessible only to stagiaires
Route::middleware(['auth', 'role:0'])->group(function () {

    // Stagiaire profile route
    Route::get('/stagiaire/profile', function () {
        return view('stagiaire.profile');
    })->name('stagiaire.profile');

    // Stagiaire create form
    Route::get('/stagiaire/create', [StagiaireController::class, 'create'])
        ->name('stagiaire.create');

    // Stagiaire store route
    Route::post('/stagiaires', [StagiaireController::class, 'store'])
        ->name('stagiaire.store');

    // Stagiaire show route
    Route::get('/stagiaire/profile/{id}', [StagiaireController::class, 'show'])
        ->name('stagiaire.profile')
        ->middleware(['prevent-back-history']);

    // Stagiaire PDF route
    Route::get('/stagiaire/pdf/{id}', [StagiaireController::class, 'pdf'])
        ->name('stagiaire.pdf');
});

// Routes accessible only to admins
Route::middleware(['auth', 'role:1'])->group(function () {

    // Admin dashboard route
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');

});

// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('guest')->group(function () {

    // Login route
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

    // Register route
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

});


//crud index :
Route::get('/stagiaires', [StagiaireController::class, 'index'])->name('stagiaire.index')->middleware(['auth', 'role:1']);
//PDF route
Route::get('stagiaire/pdf/{id}', [StagiaireController::class, 'pdf'])->name('stagiaire.pdf');

//Update stagiaire route
Route::get('/stagiaire/edit/{id}', [StagiaireController::class, 'edit'])->name('stagiaire.edit');
Route::get('/stagiaire/change/{id}', [StagiaireController::class, 'change'])->name('stagiaire.change');
Route::put('/stagiaire/update/{id}', [StagiaireController::class, 'modify'])->name('stagiaire.modify');
Route::delete('stagiaire/destroy/{id}', [StagiaireController::class, 'destroy'])->name('stagiaire.destroy');
Route::put('/stagiaire/{id}', [StagiaireController::class, 'update'])->name('stagiaire.update');


//Tache routes
Route::get('tache/create',[TacheController::class, 'create'])->name('tache.create');
Route::get('tache/index',[TacheController::class, 'index'])->name('tache.index');
Route::post('/tache',[TacheController::class, 'store'])->name('tache.store');
Route::get('tache/{taches}/edit',[TacheController::class, 'edit'])->name('tache.edit');
Route::put('tache/{taches}',[TacheController::class, 'update'])->name('tache.update');
Route::get('tache/{tache_id}/delete',[TacheController::class, 'destroy'])->name('tache.destroy');


//Stage Routes
Route::get('stage/create',[StageController::class, 'create'])->name('stage.create');
Route::get('stage/index',[StageController::class, 'index'])->name('stage.index');
Route::post('store',[StageController::class, 'store'])->name('stage.store');
Route::get('stage/{stages}/edit',[StageController::class, 'edit'])->name('stage.edit');
Route::put('stage/{stages}',[StageController::class, 'update'])->name('stage.update');
Route::get('stage/{stage}/delete',[StageController::class, 'destroy'])->name('stage.destroy');

//absence routes
Route::get('/absence/create', [AbsenceController::class, 'create'])->name('absence.create');
Route::get('/absence/index', [AbsenceController::class, 'index'])->name('absence.index');
Route::post('/absence/index', [AbsenceController::class, 'store'])->name('absence.store');
Route::get('absence/{absences}/edit',[AbsenceController::class, 'edit'])->name('absence.edit');
Route::put('absence/{absences}',[AbsenceController::class, 'update'])->name('absence.update');
Route::get('absence/{id}',[AbsenceController::class, 'destroy'])->name('absence.destroy');


//Attestation de stage route
Route::get('stage/pdf/{id}', [StageController::class, 'pdf'])->name('stage.pdf');

//archivé : 
Route::get('/stagiaire/archives', [StagiaireController::class, 'archives'])->name('stagiaire.archives');
Route::put('/stagiaire/{id}/archive', [StagiaireController::class, 'archive'])->name('stagiaire.archive');
Route::put('/stagiaire/{id}/restore', [StagiaireController::class, 'restore'])->name('stagiaire.restore');

//paramètre : 
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/settings', [SettingsController::class, 'index'])->name('settings.index')->middleware(['auth', 'role:1','prevent-back-history']);
    Route::get('/admin/edit/{user_id}', [SettingsController::class, 'edit'])->name('settings.edit')->middleware(['auth', 'role:1','prevent-back-history']);

    Route::patch('/admin/settings', [SettingsController::class, 'update'])->name('settings.update')->middleware(['auth', 'role:1','prevent-back-history']);
});