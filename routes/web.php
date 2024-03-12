<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\CompanyController;  
use App\Http\Controllers\admin\ContactInfoController;  
use App\Http\Controllers\admin\BannerController;  
use App\Http\Controllers\admin\AboutUsController;  
use App\Http\Controllers\admin\ServiceController;  
use App\Http\Controllers\admin\ServiceDetailController;  
use App\Http\Controllers\admin\ClientController;  

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

// x--------------------------------login Controller -------------------------------------------------------------x
Route::redirect('/login', '/');
Route::get('/',[LoginController::class,'login'])->name('login');
Route::post('/logged/in',[LoginController::class,'logged'])->name('logged');
Route::get('/logout',[LoginController::class,'adminlogout'])->name('logout');
//Route::get('register',[LoginController::class,'register'])->name('signup');
//Route::post('/post_register',[LoginController::class,'post_register'])->name('post.signup');
//-------------------------------------------------------------------------================
Route::middleware(['adminlogin:1'])->group(function () {

Route::get('/admin-dashboard',[AdminDashboardController::class,'dashboard'])->name('admin.dash');
// x---------------------------------Company Controller ---------------------------------------------------------x
Route::get('/company-index', [CompanyController::class, 'index'])->name('company.index');
Route::get('/admin/company/{id}/show',[CompanyController::class,'show'])->name('company.show');
Route::post('/admin/company/add',[CompanyController::class,'store'])->name('company.add');
Route::get('/admin/company/{id}/edit',[CompanyController::class,'edit'])->name('company.edit');
Route::post('/admin/company/{id}/update',[CompanyController::class,'update'])->name('company.update');
Route::delete('/admin/company/delete/{id}',[CompanyController::class,'destroy'])->name('company.delete');

// x---------------------------------Company Controller ---------------------------------------------------------x
Route::get('/contact-info-index', [ContactInfoController::class, 'index'])->name('contact.info.index');
Route::get('/admin/contact-info/{id}/show',[ContactInfoController::class,'show'])->name('contact.info.show');
Route::post('/admin/contact-info/add',[ContactInfoController::class,'store'])->name('contact.info.add');
Route::get('/admin/contact-info/{id}/edit',[ContactInfoController::class,'edit'])->name('contact.info.edit');
Route::post('/admin/contact-info/{id}/update',[ContactInfoController::class,'update'])->name('contact.info.update');
Route::delete('/admin/contact-info/delete/{id}',[ContactInfoController::class,'destroy'])->name('contact.info.delete');
// x---------------------------------Banner Controller ---------------------------------------------------------x
Route::get('/banner-index', [BannerController::class, 'index'])->name('banner.index');
Route::get('/admin/banner/{id}/show',[BannerController::class,'show'])->name('banner.show');
Route::post('/admin/banner/add',[BannerController::class,'store'])->name('banner.add');
Route::get('/admin/banner/{id}/edit',[BannerController::class,'edit'])->name('banner.edit');
Route::post('/admin/banner/{id}/update',[BannerController::class,'update'])->name('banner.update');
Route::delete('/admin/banner/delete/{id}',[BannerController::class,'destroy'])->name('banner.delete');
// x---------------------------------About Us Controller ---------------------------------------------------------x
Route::get('/aboutus-index', [AboutUsController::class, 'index'])->name('aboutus.index');
Route::get('/admin/aboutus/{id}/show',[AboutUsController::class,'show'])->name('aboutus.show');
Route::post('/admin/aboutus/add',[AboutUsController::class,'store'])->name('aboutus.add');
Route::get('/admin/aboutus/{id}/edit',[AboutUsController::class,'edit'])->name('aboutus.edit');
Route::post('/admin/aboutus/{id}/update',[AboutUsController::class,'update'])->name('aboutus.update');
Route::delete('/admin/aboutus/delete/{id}',[AboutUsController::class,'destroy'])->name('aboutus.delete');
// x---------------------------------Service Controller ---------------------------------------------------------x
Route::get('/service-index', [ServiceController::class, 'index'])->name('service.index');
Route::get('/admin/service/{id}/show',[ServiceController::class,'show'])->name('service.show');
Route::post('/admin/service/add',[ServiceController::class,'store'])->name('service.add');
Route::get('/admin/service/{id}/edit',[ServiceController::class,'edit'])->name('service.edit');
Route::post('/admin/service/{id}/update',[ServiceController::class,'update'])->name('service.update');
Route::delete('/admin/service/delete/{id}',[ServiceController::class,'destroy'])->name('service.delete');
// x---------------------------------Service Details Controller ---------------------------------------------------------x
Route::get('/service-details-index', [ServiceDetailController::class, 'index'])->name('service.details.index');
Route::get('/admin/service-details/{id}/show',[ServiceDetailController::class,'show'])->name('service.details.show');
Route::post('/admin/service-details/add',[ServiceDetailController::class,'store'])->name('service.details.add');
Route::get('/admin/service-details/{id}/edit',[ServiceDetailController::class,'edit'])->name('service.details.edit');
Route::post('/admin/service-details/{id}/update',[ServiceDetailController::class,'update'])->name('service.details.update');
Route::delete('/admin/service-details/delete/{id}',[ServiceDetailController::class,'destroy'])->name('service.details.delete');
// x---------------------------------Client Controller ---------------------------------------------------------x
Route::get('/client-index', [ClientController::class, 'index'])->name('client.index');
Route::get('/admin/client-details/{id}/show',[ClientController::class,'show'])->name('client.show');
Route::post('/admin/client-details/add',[ClientController::class,'store'])->name('client.add');
Route::get('/admin/client-details/{id}/edit',[ClientController::class,'edit'])->name('client.edit');
Route::post('/admin/client-details/{id}/update',[ClientController::class,'update'])->name('client.update');
Route::delete('/admin/client-details/delete/{id}',[ClientController::class,'destroy'])->name('client.delete');

});

/* Route::group(['middleware' => ['any:adminlogin,userlogin']], function() {   // for both user access
    // Route::get('/job-list', [JobController::class, 'index'])->name('job.index');
    // Route::get('/admin/job/{id}/show',[JobController::class,'show'])->name('job.show');
}); */

