<?php

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
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiretorController;
use App\Http\Controllers\ObraController;

Route::get('/', [LoginController::class, 'verifyAuth'])->name('index');

Route::get('/logout', function(){
    Auth::logout();
    Session::flush();
    return redirect()->route('index');
})->name('logout');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/visualizacao', [AdminController::class, 'view'])->middleware('auth')->name('visualizacao');
Route::get("/visualizacao/{id}", 
    [ AdminController::class, 'view' ]
)->middleware('auth')->name('view');

Route::post('/register', [LoginController::class, 'register'])->middleware('auth')->name('register');

Route::get('/browser', [LoginController::class, 'browser'])->middleware('auth')->name('browser');

Route::post('/video/add', [VideosController::class, 'store'])->middleware('auth')->name('video');

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin');

Route::get("/categoria/exc/{id}", [ CategoryController::class, 'ExcluirCategoria' ])->name('categoria_ex');
Route::get("/categoria/upd/{id}", 
    [ CategoryController::class, 'BuscarAlteracao' ]
)->name('categoria_upd');
Route::post('/categoria', [ CategoryController::class, 'IncluirCategoria' ]);
Route::post('/categoria/upd', [ CategoryController::class, 'ExecutaAlteracao' ]);

Route::get("/user/exc/{id}", [ UserController::class, 'ExcluirUsuario' ])->name('user_ex');
Route::get("/user/upd/{id}", 
    [ UserController::class, 'BuscarAlteracao' ]
)->name('user_upd');
Route::post('/user', [ UserController::class, 'IncluirUser' ]);
Route::post('/user/upd', [ UserController::class, 'ExecutaAlteracao' ]);

Route::get("/diretor/exc/{id}", [ DiretorController::class, 'ExcluirDiretor' ])->name('diretor_ex');
Route::get("/diretor/upd/{id}", 
    [ DiretorController::class, 'BuscarAlteracao' ]
)->name('diretor_upd');
Route::post('/diretor', [ DiretorController::class, 'IncluirDiretor' ]);
Route::post('/diretor/upd', [ DiretorController::class, 'ExecutaAlteracao' ]);

Route::get("/obra/exc/{id}", [ ObraController::class, 'ExcluirObra' ])->name('obra_ex');
Route::get("/obra/upd/{id}", 
    [ ObraController::class, 'BuscarAlteracao' ]
)->name('obra_upd');
Route::post('/obra', [ ObraController::class, 'IncluirObra' ]);
Route::post('/obra/upd', [ ObraController::class, 'ExecutaAlteracao' ]);

Route::post('/api/{id}', [ AdminController::class, 'API' ]);
// Route::get('/api', function () {
//     return view('api'); // Retorna a view welcome.blade.php
// });

Route::post('/pagseguro/notification', [
    'uses' => '\laravel\pagseguro\Platform\Laravel5\NotificationController@notification',
    'as' => 'pagseguro.notification',
]);

Auth::routes();

//Route::get('/home', [HomeController::class, 'index']);
