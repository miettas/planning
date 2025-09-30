<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [App\Http\Controllers\Directories_plsController::class, 'welcome'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('test', [App\Http\Controllers\HomeController::class, 'test']);
Route::get('books/menu/{menu}', [App\Http\Controllers\Books_plsController::class, 'menu'])->name('bkmenu');
Route::get('people_pls/{id}', [App\Http\Controllers\People_plsController::class, 'show']);
Route::get('books_pls/{id}', [App\Http\Controllers\Books_plsController::class, 'show']);
Route::get('books_pls/', [App\Http\Controllers\Books_plsController::class, 'index']);

Route::resources([
    'articles' => App\Http\Controllers\ArticlesController::class,
    'books' => App\Http\Controllers\Books_plsController::class,
    'chapters' => App\Http\Controllers\Chapters_plsController::class,
    'directories' => App\Http\Controllers\Directories_plsController::class,
    'mimages' => App\Http\Controllers\MimagesController::class,
    'people' => App\Http\Controllers\People_plsController::class,
    'places' => App\Http\Controllers\PlacesController::class,
    'pages' => App\Http\Controllers\PagesController::class,
    'greeneries' => App\Http\Controllers\Green_pagesController::class,
    'mccplans' => App\Http\Controllers\Mccplan_pagesController::class,
    'munros' => App\Http\Controllers\Munro_pagesController::class,
    'munrofootnotes' => App\Http\Controllers\MunrofootnotesController::class,
    'pimages' => App\Http\Controllers\PimagesController::class,
    'streets' => App\Http\Controllers\StreetsController::class
]);

Route::get('SearchArticles', [App\Http\Controllers\SearchController::class, 'searcharticles'])->name('SearchArticles');
Route::get('SearchChapters', [App\Http\Controllers\SearchController::class, 'searchchapters'])->name('SearchChapters');
Route::get('SearchGreeneries', [App\Http\Controllers\SearchController::class, 'searchgreeneries'])->name('SearchGreeneries');
Route::get('SearchMccplans', [App\Http\Controllers\SearchController::class, 'searchmccplans'])->name('SearchMccplans');
Route::get('SearchImages', [App\Http\Controllers\SearchController::class, 'searchmimages'])->name('SearchMimages');
Route::get('SearchPages', [App\Http\Controllers\SearchController::class, 'searchpages'])->name('SearchPages');
Route::get('SearchPeople', [App\Http\Controllers\SearchController::class, 'searchpeople'])->name('SearchAPeople');
Route::get('SearchPlaces', [App\Http\Controllers\SearchController::class, 'searchplaces'])->name('SearchPlaces');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

require __DIR__.'/auth.php';
