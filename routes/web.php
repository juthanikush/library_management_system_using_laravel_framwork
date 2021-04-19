<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\library\LibrayController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::view('admin_login','admin.admin_login');
Route::view('libaryan_login','libaryan.libaryan_login');
Route::post('login',[AdminController::class,'login'])->name('login');
Route::post('libray/login',[LibrayController::class,'login'])->name('libray/login');
Route::view('libaryan_deshboard','libaryan.libaryan_deshboard');

Route::group(['middleware'=>'admin_check'],function(){
    Route::view('admin/admin_deshboard','admin.admin_deshboard');
    Route::view('admin/Add_library','admin.add_library');

    Route::get('admin/delete/{id}',[AdminController::class,'delete'])->name('admin/delete');
    Route::post('admin/add_library',[AdminController::class,'add_library'])->name('admin/add_library');
    Route::get('admin/view',[AdminController::class,'view'])->name('admin.admin_view');
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
    
        session()->flash('error','logout sucessfully');
        return redirect('admin_login');
    });
});



Route::group(['middleware'=>'librayancheck'],function(){
Route::get('libaryan/logout', function () {
    session()->forget('LIBRARY_LOGIN');
    session()->flash('error','logout sucessfully');
    return redirect('libaryan_login');
});


Route::get('libaryan/delete/{id}',[LibrayController::class,'delete'])->name('libaryan/delete');
Route::get('libaryan/edit/{id}',[LibrayController::class,'edit'])->name('libaryan/edit');
Route::get('libaryan/view_books',[LibrayController::class,'view_books'])->name('libaryan/view_books');
Route::view('libaryan/add_books','libaryan.add_books');
Route::post('library/add_book',[LibrayController::class,'add_book'])->name('library/add_book');
Route::post('library/update',[LibrayController::class,'update'])->name('library/update');
Route::view('libaryan/issue_books','libaryan.issue_books');
Route::post('libaryn/issue_book',[LibrayController::class,'issue_book'])->name('libaryn/issue_book');
Route::get('libaryan/view_issue_books',[LibrayController::class,'view_issue_books'])->name('libaryan/view_issue_books');
Route::view('libaryan/return_books','libaryan.return_books');
Route::post('library/return_book',[LibrayController::class,'return_book'])->name('library/return_book');

});