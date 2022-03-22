<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CampaignsController;
use App\Http\Controllers\ClientsController;

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

// Route::group(['middleware' => 'api-sessions'], function(){
    route::get('/campaigns', [CampaignsController::class, 'allCampaignsAPI']);
    route::get('/clients', [ClientsController::class, 'allClientsAPI']);
    route::get('/clients/{clientName}', [ClientsController::class, 'clientBrandsAPI']);

    route::post('/new-campaign', [CampaignsController::class, 'newCampaignAPI']);
    route::post('/campaign/edit', [CampaignsController::class, 'editCampaignAPI']);

    route::get('/campaign/{id}', [CampaignsController::class, 'viewCampaignAPI']);
    route::get('/clients/{name}', [CampaignsController::class, 'viewSelectedClientAPI']);

    route::get('/campaign/search/{searchKeyword}', [CampaignsController::class, 'searchCampaignAPI']);

// });
