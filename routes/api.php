<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CampaignController;
use App\Http\Controllers\API\MasterController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\InfluencerController;

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

Route::post('/login', [AuthController::class, 'login'])->name('login');

// Enquiries
Route::post('/enquiries', [MasterController::class, 'enquiries'])->name('enquiries');

Route::middleware('auth:sanctum')->group(function () {

    // Tags
    Route::post('/tags', [MasterController::class, 'tags'])->name('tags');

    // Brands
    Route::post('/brands', [BrandController::class, 'brands'])->name('brands');

    // Influencers
    Route::post('/influencers', [InfluencerController::class, 'influencers'])->name('influencers');

    // Bank Details
    Route::post('/bank_details', [MasterController::class, 'bank_details'])->name('bank_details');

    // Admin Member
    Route::post('/member', [MasterController::class, 'member'])->name('member');

    // Get States (Country Id)
    Route::post('/get_states', [MasterController::class, 'get_states'])->name('get_states');

    // Get Cities (State Id)
    Route::post('/get_cities', [MasterController::class, 'get_cities'])->name('get_cities');

    // Campaign
    Route::post('/campaigns', [CampaignController::class, 'campaigns'])->name('campaigns');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
