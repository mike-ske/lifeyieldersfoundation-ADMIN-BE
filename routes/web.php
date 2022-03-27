<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MailAdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AwardApplicationController;
use App\Http\Controllers\GrantApplicationController;
use App\Http\Controllers\PendingApplicationController;
use App\Http\Controllers\ApprovedApplicationController;
use App\Http\Controllers\InterviewApplicationController;
use App\Http\Controllers\MailboxController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\StudentMailController;

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

Route::resource('application', ApplicationController::class);
Route::resource('profile', AdminController::class);
Route::resource('student', StudentController::class);
Route::resource('pending', PendingApplicationController::class);
Route::resource('email', MailAdminController::class);
Route::resource('grants', GrantApplicationController::class);
Route::resource('interview', InterviewApplicationController::class);
Route::resource('award', AwardApplicationController::class);
Route::resource('approval', ApprovedApplicationController::class);

Auth::routes(['verify' => true, 'register' => true]);

Route::get('/certificate', function () {
    return view('pages.certificate');
});

Route::get('/getmail', [SendMailController::class, 'getmail'])->name('mails');
Route::get('/getapplication', [SendMailController::class, 'getapplication']);
Route::get('/clearnotice', [SendMailController::class, 'clearnotice']);

Route::post('/inbox', [MailboxController::class, 'sendMail'])->name('inbox');