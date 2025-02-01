<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlertaController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\MeditationController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\ProtocoloController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\UserController;


// RUTAS (el apiResource las genera automáticamente en CRUD)

Route::apiResource('/alertas', AlertasController::class);

Route::apiResource('/almacen', AlertasController::class);

Route::apiResource('/categorias', AlertasController::class);

Route::apiResource('/favoritos', AlertasController::class);

Route::apiResource('/meditaciones', AlertasController::class);

Route::apiResource('/musica', AlertasController::class);

Route::apiResource('/notificaciones', AlertasController::class);

Route::apiResource('/premium', AlertasController::class);

Route::apiResource('/protocolos', AlertasController::class);

Route::apiResource('/sesiones', AlertasController::class);

Route::apiResource('/users', AlertasController::class);

?>