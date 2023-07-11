<?php
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolePermissionController;
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

Route::prefix('cms/')->middleware('guest:admin,author')->group(function(){
    Route::get('{guard}/login' , [UserAuthController::class , 'showLogin'])->name('view.login');
    Route::post('{guard}/login' , [UserAuthController::class , 'login']);
});

Route::prefix('cms/admin')->middleware('auth:admin,author')->group(function(){
    Route::get('logout' , [UserAuthController::class , 'logout'])->name('view.logout');
});

Route::prefix('cms/admin/')->middleware('auth:admin,author')->group(function(){
    Route::view('' , 'cms.home')->name('view.admin');
    Route::view('temp' , 'cms.temp');
    Route::resource('countries' , CountryController::class);
    Route::post('countries_update/{id}' , [CountryController::class , 'update'])->name('countries_update');

    Route::resource('cities' , CityController::class);
    Route::post('cities_update/{id}' , [CityController::class , 'update'])->name('cities_update');

    Route::resource('admins' , AdminController::class);
    Route::post('admins_update/{id}' , [AdminController::class , 'update'])->name('admins_update');

    Route::resource('authors' , AuthorController::class);
    Route::post('authors_update/{id}' , [AuthorController::class , 'update'])->name('authors_update');

    Route::resource('categories' , CategoryController::class);
    Route::post('categories_update/{id}' , [CategoryController::class , 'update'])->name('categories_update');

    Route::resource('articles' , ArticleController::class);
    Route::post('articles_update/{id}' , [ArticleController::class , 'update'])->name('articles_update');
    Route::get('/create/articles/{id}', [ArticleController::class, 'createArticle'])->name('createArticle');
    Route::get('/index/articles/{id}', [ArticleController::class, 'indexArticle'])->name('indexArticle');

    Route::resource('roles' , RoleController::class);
    Route::post('roles_update/{id}' , [RoleController::class , 'update'])->name('roles_update');

    Route::resource('permissions' , PermissionController::class);
    Route::post('permissions_update/{id}' , [PermissionController::class , 'update'])->name('permissions_update');

    Route::resource('roles.permissions' , RolePermissionController::class);
});
