<?php

use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get( 'add-media-to-library', function () {
    Article::create()
        ->addMedia( storage_path( 'demo/3.jpg' ) )
        ->toMediaCollection();
} );



Route::get( 'add-multiple-files-media-to-library', function () {
    $article = Article::create();

    $article
        ->addMedia( storage_path( 'demo/2.jpg' ) )
        ->toMediaCollection();

    $article
        ->addMedia( storage_path( 'demo/talha.jpg' ) )
        ->toMediaCollection();
} );


Route::get( 'add-media-from-request', [ArticleController::class, 'create'] );
Route::post( 'add-media-from-request', [ArticleController::class, 'store'] );

