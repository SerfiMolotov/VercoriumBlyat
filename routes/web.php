<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Back\AdminUserController;

use App\Http\Controllers\Technicien\TechnicienDashboardController;
use App\Http\Controllers\Technicien\TechnicienSiteController;
use App\Http\Controllers\Technicien\TechnicienCapteurController;
use App\Http\Controllers\Technicien\TechnicienReleveController;

Route::get('/', function () {
    return view('welcome');
})->name('accueil');

Route::get('/dashboard', [TechnicienDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/releves', [\App\Http\Controllers\Technicien\TechnicienReleveController::class, 'index'])->name('releves.index');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users');
    Route::post('/admin/users/{user}/role', [AdminUserController::class, 'updateRole'])->name('admin.users.updateRole');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::middleware(['auth'])->prefix('technicien')->group(function () {
    Route::get('/sites', [TechnicienSiteController::class, 'index'])
        ->name('technicien.sites.index');

    Route::get('/sites/{site}/capteurs', [TechnicienCapteurController::class, 'index'])
        ->name('technicien.site.capteurs');

    Route::get('/capteurs/{capteur}/donnees', [TechnicienCapteurController::class, 'show'])
        ->name('technicien.capteurs.show');

    Route::get('/releves', [TechnicienReleveController::class, 'index'])
        ->name('technicien.releves');

    Route::get('/releves/create', [\App\Http\Controllers\Technicien\TechnicienReleveController::class, 'create'])
        ->name('technicien.releves.create');

    Route::post('/releves', [\App\Http\Controllers\Technicien\TechnicienReleveController::class, 'store'])
        ->name('technicien.releves.store');

    Route::delete('/releves/{releve}', [TechnicienReleveController::class, 'destroy'])
        ->name('technicien.releves.destroy');
});

Route::middleware(['auth', 'technicien'])->prefix('technicien')->group(function () {

    Route::get('/dashboard', function () {
        return view('technicien.dashboard');
    })->name('technicien.dashboard');

});

Route::middleware(['auth', 'logistique'])->prefix('logistique')->group(function () {
    Route::get('/materiels', [\App\Http\Controllers\Logistique\LogistiqueMaterielController::class, 'index'])->name('logistique.materiels.index');
});

require __DIR__.'/auth.php';
