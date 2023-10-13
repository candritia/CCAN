<?php

use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use App\Models\Category;
use App\Models\Dashboard;
use App\Models\Petugasan;
use App\Models\Statusa;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\ProfileTampilanController;

use App\Http\Controllers\DashboardAreaController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardPetugasController;
use App\Http\Controllers\DashboardPerbaikanController;
use App\Http\Controllers\DashboardStatusController;
use App\Http\Controllers\DashboardHomeController;



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



//Halaman Single Post 
Route::get('/',function(){
    return view('login.index');
})->name('login');

Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/post', [PostController::class, 'index'])->middleware('auth');
Route::get('/post/cari', [PostController::class, 'cari'])->middleware('auth');

Route::get('/user', [UserController::class, 'index'])->middleware('auth');
Route::get('/user/cari', [UserController::class, 'cari'])->middleware('auth');

// Route::get('/postadmin', [PostAdminController::class,'index'])->middleware('auth');

// Route::get('/dashboard', function(){

// return view('dashboard.index');

// })->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/petugasans', DashboardPetugasController::class)->middleware('auth');

Route::resource('/dashboard/areas', DashboardAreaController::class)->middleware('auth');

Route::resource('/dashboard/perbaikans', DashboardPerbaikanController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('auth');

Route::resource('/dashboard/statusas', DashboardStatusController::class)->middleware('auth');



Route::get('/dashboards', [DashboardHomeController::class, 'index'])->middleware('auth');
Route::get('/dashboards/{dashboard:id}', [DashboardHomeController::class, 'show'])->middleware('auth');
Route::resource('/dashboard/dashboards', DashboardController::class)->middleware('auth');

Route::get('/profiles', [ProfileTampilanController::class, 'index'])->middleware('auth');
Route::get('/profiles/{profile:id}', [ProfileTampilanController::class, 'show'])->middleware('auth');
Route::resource('/profile/profiles', ProfilesController::class)->middleware('auth');





// Route::resource('/dashboard/petugasan', DashboardPetugasanController::class)->middleware('auth');
























// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('posts', [
//        'title' => "Post By Category : $category->name",
//        'active' => 'categories',
//        'posts' => $category->posts->load('category','author'),
//     ]);
// });

// Route::get('/authors/{author:username}', function(User $author){
//     return view('posts', [
//        'title' => "Post By Author : $author->name",
//        "active" => 'posts',
//        'posts' => $author->posts->load('category','author'),
//     ]);
// });
