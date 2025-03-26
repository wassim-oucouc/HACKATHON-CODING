<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HackathonController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'Login']);


Route::post('/Hackathon/creation',[HackathonController::class,'Create']);

Route::put('/Hackathon/update/{id_hackathon}',[HackathonController::class,'Update']);

Route::post('/Regle/create', [RégleController::class, 'create']);

Route::delete('/Regle/delete/{id}', [RégleController::class, 'deleteRégle']);

Route::put('/Regle/update/{id}', [RégleController::class, 'updateRégle']);

Route::get('/Regle/read/{id}', [RégleController::class, 'readRégle']);


Route::post('/Equipe/create', [EquipeController::class, 'CreateEquipe']);

Route::delete('/Equipe/delete/{id}', [EquipeController::class, 'DeleteEquipe']);

Route::put('/Equipe/update/{id}', [EquipeController::class, 'UpdateEquipe']);

Route::get('/Equipe/{id}', [EquipeController::class, 'GetEquipeByID']);
