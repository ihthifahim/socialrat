<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CampaignsController;
use App\Http\Controllers\AuthController;


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



Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'login']);
Route::get('/signout', [AuthController::class, 'signout']);

Route::group(['middleware' => 'adminauth'], function(){
    Route::get('/', function(){
        return redirect('/dashboard');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    });


/*============================================================================
==================== CLIENTS =================================================
============================================================================*/
route::get('/clients', [ClientsController::class, 'allClient']);
route::get('/new-client', [ClientsController::class, 'newClient']);
route::get('/update-client/{id}', [ClientsController::class, 'updateClient']);

route::post('/create-client', [ClientsController::class, 'createClient']);
route::post('/update-client', [ClientsController::class, 'updateClientPost']);


/*============================================================================
==================== CAMPAIGNS ===============================================
============================================================================*/
route::get('/campaigns', [CampaignsController::class, 'allCampaigns']);
route::get('/new-campaign', [CampaignsController::class, 'createCampaign']);
route::get('/campaign/{id}', [CampaignsController::class, 'viewCampaign']);
route::get('/campaign/{id}/{activityid}', [CampaignsController::class, 'viewActivity']);
route::get('/new-activity/{id}', [CampaignsController::class, 'newActivity']);
route::get('/activity-overview', [CampaignsController::class, 'activityOverview']);
route::get('/export-campaign/{campaignid}', [CampaignsController::class, 'exportCampaign']);

route::post('/update-activity', [CampaignsController::class, 'updateActivity']);
route::post('/activity/comment', [CampaignsController::class, 'addCommentActivity']);
route::post('/new-activity', [CampaignsController::class, 'newActivityPost']);

route::post('/delete-activity', [CampaignsController::class, 'deleteActivity']);
route::post('/campaign/add-ro', [CampaignsController::class, 'addROPost']);

route::get('/ro-delete/{id}', [CampaignsController::class, 'deleteRO']);

route::get('/delete-comment/{id}', [CampaignsController::class, 'deleteComment']);


/*============================================================================
==================== USERS ===============================================
============================================================================*/

route::get('/users', [AuthController::class, 'allUsers']);
route::get('/new-user', [AuthController::class, 'newUser']);
route::get('/user/{id}', [AuthController::class, 'viewUser']);

route::post('/create-user', [AuthController::class, 'createUser']);
route::post('/update-user', [AuthController::class, 'updateUser']);


});

