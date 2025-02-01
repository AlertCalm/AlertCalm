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

Route::apiResource('/alertas', AlertaController::class);

Route::apiResource('/almacen', AlmacenController::class);

Route::apiResource('/categorias', CategoriaController::class);

Route::apiResource('/favoritos', FavoritoController::class);

Route::apiResource('/meditaciones', MeditationController::class);

Route::apiResource('/musica', MusicController::class);

Route::apiResource('/notificaciones', NotificacionController::class);

Route::apiResource('/premium', PremiumController::class);

Route::apiResource('/protocolos', ProtocoloController::class);

Route::apiResource('/sesiones', SesionController::class);

Route::apiResource('/users', UserController::class);

?>