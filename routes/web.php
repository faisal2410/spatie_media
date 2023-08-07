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


Route::get( 'not-preserving-original', function () {
    Article::create()
        ->addMedia( storage_path( 'demo/php1.jpeg' ) )
        ->toMediaCollection();
} );

Route::get( 'preserving-original', function () {
    Article::create()
        ->addMedia( storage_path( 'demo/python.jpeg' ) )
        ->preservingOriginal()
        ->toMediaCollection();
} );


Route::get( 'other-options', function () {
    Article::create()
        ->addMedia( storage_path( 'demo/react.jpeg' ) )
        ->usingName( 'A beautiful react image' )
        ->usingFileName( 'other-name.jpg' )
        ->withCustomProperties( [
            'location' => 'Bangladesh, Sylhet',
            'subject'  => 'Library',
        ] )
        ->toMediaCollection();
} );

// For deleting

Route::get('step-1-add-media-to-models', function () {
    Article::create()
        ->addMedia(storage_path('demo/python.jpeg'))
        ->toMediaCollection();
});

Route::get('step-2-delete-models', function () {
    Article::all()->each->delete();
});


// using collections

Route::get( 'using-collections', function () {

    $article = Article::create();

    $article
        ->addMedia( storage_path( 'demo/php.jpeg' ) )
        ->toMediaLibrary('images');

    $article
        ->addMedia( storage_path( 'demo/python.jpeg' ) )
        ->toMediaCollection( 'images' );

    $article
        ->addMedia( storage_path( 'demo/react.jpeg' ) )
        ->toMediaCollection( 'downloads' );
} );



// To store in s3 (we need aws s3 credentials)
Route::get( 'send-a-file-to-s3', function () {
    Article::create()
        ->addMedia( storage_path( 'demo/react.jpeg' ) )
        ->toMediaCollection( 'images', 's3' );
} );

