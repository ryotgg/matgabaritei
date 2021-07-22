<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\ExercicioController;


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

Route::get('/admin', function () {
    return view('admin.index');
})->middleware('auth')->name('adminpanel');

//Route::get('/admin', [AdminController::class, 'index'])->middleware('auth');

/*Route::get('/artigos', function () {
    $artigos = Artigo::all();
    //ddd($artigos);
    return view('artigos.artigos', [
        'artigos' => $artigos
    ]); 
});*/

//Route::get('/artigos', [::class, 'index']);


Route::get('/article/{article:slug}', [ArticleController::class,'show'])->whereAlphaNumeric('slug');
Route::resource('artigos', ArticleController::class)->except([
    'show',
]);



route::get('/cursos', [CursoController::class,'index'])->name('cursos.index');
route::get('/cursos/{curso}', [CursoController::class,'show'])->name('cursos.show');

route::get('/modulos/{modulo}', [ModuloController::class,'show'])->name('modulos.show');

route::get('/aulas/{aula}', [AulaController::class,'show'])->name('aulas.show');

route::get('/listas/{lista}', [ListaController::class,'show'])->name('listas.show');

route::get('/aulas/{aula}', [AulaController::class,'show'])->name('aulas.show');

Route::prefix('admin')->middleware('auth')->group(function () {
    
    Route::resource('cursos', CursoController::class)->parameters(['curso' => 'curso:slug'])->except(['index', 'show']);

    Route::resource('cursos.modulos', ModuloController::class)->shallow()->except(['index', 'show']);;

    Route::resource('modulos.aulas', AulaController::class)->shallow()->except(['index', 'show']);;

    Route::resource('aulas.listas', ListaController::class)->shallow()->except(['index', 'show']);;

    Route::resource('listas.exercicios', ExercicioController::class)->shallow()->except(['index', 'show']);;
});






//Route::get('modulos/{modulo:slug}', [ModuloController::class,'show'])->whereAlphaNumeric('slug')->name('modulos.show');



/*
Route::post('/aulas', [AulaController::class,'store'])->name('aulas.store');
Route::get('/aulas/{aula:slug}', [AulaController::class,'show'])->whereAlphaNumeric('slug')->name('aulas.show');
*/
Route::get('modulos/{modulo:slug}/addaula', [AulaController::class,'create'])->whereAlphaNumeric('slug')->name('aulas.create');


/*
Route::post('/listas', [ListaController::class,'store'])->whereAlphaNumeric('slug')->name('listas.store');
Route::get('/listas/{lista:slug}', [ListaController::class,'show'])->whereAlphaNumeric('slug')->name('listas.show');
*/
Route::get('/aulas/{aula:slug}/addlista', [ListaController::class,'create'])->whereAlphaNumeric('slug')->name('listas.create');
Route::resource('listas', ListaController::class)->parameters(['lista' => 'lista:slug']);


Route::get('/listas/{lista:slug}/addexercicio', [ExercicioController::class,'create'])->whereAlphaNumeric('slug')->name('exercicios.create');
Route::post('/exercicios/resp/{id}', [ExercicioController::class,'responder'])->name('exercicios.responder');
Route::resource('exercicios', ExercicioController::class)->except([
    'create'
]);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
