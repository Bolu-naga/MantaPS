<?php
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GameController::class, 'index']);
Route::get('/catalogue', [GameController::class, 'fullCatalogue']);

Route::prefix('mantaps-workspace-admin')->group(function () {
    Route::get('/games', [GameController::class, 'adminIndex'])->name('admin.index');
    Route::post('/games', [GameController::class, 'store'])->name('admin.store');
    Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('admin.destroy');
});