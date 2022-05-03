<?php

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MailboxController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\MailAdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\StudentMailController;
use App\Http\Controllers\StudentAccountController;
use App\Http\Controllers\ApprovedApplicationController;

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

Route::get('/', [HomeController::class, 'index'])->name('/');

// Device Register routes
Route::get('/device', [DeviceController::class, 'index'])->name('device');
Route::post('/device', [DeviceController::class, 'store']);


// End of device register route


// Add student routes
Route::get('/student', [StudentController::class, 'index'])->name('student');
Route::post('/student', [StudentController::class, 'store']);
// End of student routes
Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/dev', function () {
    return view('pages.developer');
});

Route::get('search/{value}', [SearchController::class, 'search'])->name('search');
// End of about routes


Route::resource('application', ApplicationController::class);
Route::resource('profile', AdminController::class);
Route::resource('students', StudentAccountController::class);

Route::resource('email', MailAdminController::class);

Route::resource('approval', ApprovedApplicationController::class);

Auth::routes(['verify' => true, 'register' => true]);


Route::get('/getmail', [SendMailController::class, 'getmail'])->name('mails');
Route::get('/getapplication', [SendMailController::class, 'getapplication']);
Route::get('/clearnotice', [SendMailController::class, 'clearnotice']);

Route::post('/inbox', [MailboxController::class, 'sendMail'])->name('inbox');