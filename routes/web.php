<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Signature\SignatureController;
use App\Http\Controllers\Site\SiteController;
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


Route::post('signatures/store',[SignatureController::class,'store'])->name('signatures.store')->middleware('signature.plan');

Route::get('signatures/premium',[SignatureController::class,'premium'])->name('signatures.premium')->middleware('signature');

Route::get('signatures/checkout',[SignatureController::class,'checkout'])->name('signatures.checkout')->middleware('signature.plan');

Route::get('signatures/invoice',[SignatureController::class, 'invoice'])->name('signatures.invoice');//rota para exibir as faturas

Route::get('signatures/invoice/{id}',[SignatureController::class,'downloadInvoice'])->name('signatures.invoice.download');

Route::get('signatures/cancel',[SignatureController::class,'cancel'])->name('signatures.cancel');

Route::get('signatures/resume',[SignatureController::class,'resume'])->name('signatures.resume');

Route::get('/assinar/{url}',[SiteController::class,'createSessionPlan'])->name('assina.plan');




Route::get('/',[SiteController::class, 'home'])->name('site.home');





// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
