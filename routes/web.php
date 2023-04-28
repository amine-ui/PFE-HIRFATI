<?php

use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\dashboard\ArtisanController;
use App\Http\Controllers\dashboard\CategorieController;
use App\Http\Controllers\dashboard\CommandController;
use App\Http\Controllers\dashboard\ProfileController;
use App\Http\Controllers\dashboard\ServicesController;
use App\Http\Controllers\dashboard\UserControllerD;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Chat;
use App\Http\Livewire\Conversation;
use App\Http\Livewire\EditComponent;
use App\Http\Livewire\SearchComponenet;
use App\Http\Livewire\UserAnnonceComponent;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[ServiceController::class,'index'])->name('Home');
// route pour allez à la page about 
Route::get('/about', function () {
    return view('about.about-us');
});
// route pour allez à la page contact 
Route::get('/contact', function () {
    return view('contact.contact');
});

// route pour depose un travail 
Route::get('/post', [ServiceController::class,'create'])->middleware(['auth','isUser','isArtisan']);
// add new service 
Route::post('/post', [ServiceController::class,'store'])->name('service.post');
// route pour allez au user dashbord (user annances , parameters) 
Route::get('/dashbord', function () { return view('user.dashbord');})->middleware(['auth','isUser'])->name('dashbord');
// to annonces 
Route::get('/Annonces', [UserController::class , 'todashboard'])->middleware(['auth','isUser'])->name('my_annonce');

// route pour allez au annonce (user annances , parameters) 
// Route::get('/dashbord', function () {
// 012
// route pour allez à la page de service spicifie

Route::get('/service/{service:title}',[ServiceController::class,'show'])->name('service.show');
Route::get('/service/{service:title}/edit',[ServiceController::class,'edit'])->name('service.edit');
Route::put('/service/edit/{service:title}',[EditComponent::class,'update'])->name('service.update');
Route::delete('/service/delete/{service:title}',[UserAnnonceComponent::class,'destroy'])->name('service.delete');

// route for search 
Route::post('/search',[SearchController::class , "index"])->name('search');
// route for search 
Route::get('/messages',function(){return view('messages.messages');})->name('messages');

// route pour allez au admin dashbord (gestion des utilisteurs , categories , services ) 
// -------------- login -------------------
// route pour allez au admin dashbord (gestion des utilisteurs , categories , services ) 
// -------------- login -------------------
Route::get('/admin/login', [AdminController::class,'index'])->name('admin.login');
Route::post('/admin/login/verifier', [AdminController::class,'login'])->name('admin.login.verifier');
// -------------- dashbord -------------------
Route::middleware(['isAdmin'])->group(function () {

    Route::get('admin/dashboard', [AdminController::class,'show'])->name('admin.dashboard');
    Route::post('adminUsers/destroy', [UserControllerD::class, 'destroy'])->name('adminUsers.destroy');
    Route::post('adminArtisan/destroy', [ArtisanController::class, 'destroy'])->name('adminUsers.destroy');
    Route::post('adminService/destroy', [ServicesController::class, 'destroy'])->name('adminService.destroy');
    
    Route::resources([
        'adminUsers' => UserControllerD::class,
        'adminCategorie' => CategorieController::class,
        'adminArtisan' => ArtisanController::class,
        'adminSetting' => SettingController::class,
        'adminCommand' => CommandController::class,
        'adminService' => ServicesController::class,
        'adminProfile' => ProfileController::class,
    ]);
    Route::post('/admin/logout', [AdminController::class,'logout'])->name('admin.logout');

});

// switch to saller
Route::post('/switch', [UserController::class,'switch'])->name('to_artisan');
Route::put('/update', [UserController::class,'update'])->name('user.update');
Auth::routes();

// chat route
Route::get('/conversations', [ConversationController::class, 'index'])->name('messages') ->middleware('auth');
Route::get('conversation/{conversation}',[ConversationController::class, 'show'])
    ->name('conversation.show')
    ->middleware('auth');

//Google
Route::get('/login/google', [SocialAuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback'])->name('login.google.callback');

