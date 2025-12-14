<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PersonController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\API\BeforeAfterController;


/*|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


/*-------------------------------------------------------*/
// Ruta de prueba simple 
Route::get('/test', function () {
    return response()->json([
        'message' => 'API Perfect Esthetic funcionando',
        'version' => 'v1'
    ]);
});
// Rutas de pruebas - Person
Route::prefix('v1/persons')->group(function () {
    Route::get('/',[ PersonController::class, 'get']);
    Route::post('/', [ PersonController::class, 'create']);
    Route::get('/{id}', [ PersonController::class, 'getById']);
    Route::put('/{id}', [ PersonController::class, 'update']);
    Route::delete('/{id}', [ PersonController::class, 'delete']);
});
/*-------------------------------------------------------*/


Route::prefix('v1')->group(function () {

    // Ruta pública
    Route::get('/before-after', [BeforeAfterController::class, 'index']);

    // Register y Login ADMIN
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    // Rutas admin
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/before-after', [BeforeAfterController::class, 'store']);
        Route::put('/before-after/{id}', [BeforeAfterController::class, 'update']);
        Route::delete('/before-after/{id}', [BeforeAfterController::class, 'destroy']);
    });
});
