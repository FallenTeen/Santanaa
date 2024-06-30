<?php
use Illuminate\Support\Facades\Route;
Route::view('/', 'userpages.landing');

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('admin', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin');
    Route::get('admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/karyawan', [App\Http\Controllers\AdminController::class, 'viewKaryawan'])->name('admin.viewkaryawan');
    Route::get('admin/report', [App\Http\Controllers\AdminController::class, 'viewReport'])->name('admin.viewReport');
    Route::get('admin/hotel', [App\Http\Controllers\HotelController::class, 'viewHotel'])->name('admin.viewhotel');
    Route::get('admin/tipe-kamar-create', App\Livewire\Managehotel\Kamar\TipeKamarCreate::class)->name('tipe-kamar-create');
    
});
Route::middleware(['auth', 'verified', 'karyawan'])->group(function () {
    Route::get('dashboard',  [App\Http\Controllers\KaryawanController::class, 'dashboard'])->name('dashboard');
    Route::get('karyawan',  [App\Http\Controllers\KaryawanController::class, 'dashboard'])->name('karyawan');
    Route::get('karyawan/dashboard',  [App\Http\Controllers\KaryawanController::class, 'dashboard'])->name('karyawan.dashboard');
    Route::get('karyawan/viewreport', [App\Http\Controllers\KaryawanController::class, 'viewreport'])->name('karyawan.viewreport');
});
Route::middleware(['auth', 'verified', 'user'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard');
    Route::get('user', [App\Http\Controllers\UserController::class, 'dashboard'])->name('user');
    Route::get('user/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('user/order', [App\Http\Controllers\UserController::class, 'lihatOrder'])->name('user.order');
    Route::get('user/report', [App\Http\Controllers\UserController::class, 'buatReport'])->name('user.report');
});



Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

Route::post('logout', function () {
    Auth::logout();
    Session::invalidate();
    Session::regenerateToken();

    return redirect('/');
})->name('logout');
require __DIR__.'/auth.php';
