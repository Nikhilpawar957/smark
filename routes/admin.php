<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\LeadsController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::view('/', 'admin.pages.login')->name('login');
        Route::post('/login_handler', [AdminController::class, 'login_handler'])->name('login_handler');
    });
    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
        // Dashboard
        Route::view('/dashboard', 'admin.pages.dashboard')->name('dashboard');

        // Add New Campaign
        Route::view('add-new-campaign', 'admin.pages.add-new-campaign')->name('add-new-campaign');

        // Add Performance Campaign
        Route::get('add-performance-campaign', [AdminController::class, 'add_performance_campaign'])->name('add-performance-campaign');

        // Add Barter Campaign
        Route::get('add-barter-campaign', [AdminController::class, 'add_barter_campaign'])->name('add-barter-campaign');

        // Add Branding Campaign
        Route::get('add-branding-campaign', [AdminController::class, 'add_branding_campaign'])->name('add-branding-campaign');

        // Edit Campaign (GET Method)
        Route::get('edit-campaign', [AdminController::class, 'edit_campaign'])->name('edit-campaign');

        // Campaign List
        Route::view('campaign-list', 'admin.pages.campaign-list')->name('campaign-list');

        // Campaign List (Datatable)
        Route::get('/get-campaigns-list', [AdminController::class, 'getCampaignsList'])->name('get-campaigns-list');

        // Campaign Influencers List
        Route::view('campaign-influencer-list', 'admin.pages.campaign-influencer-list')->name('campaign-influencer-list');
        Route::view('report', 'admin.pages.report')->name('report');
        Route::view('ledger', 'admin.pages.ledger')->name('ledger');

        // Asset Management
        Route::view('assets-management', 'admin.pages.assets-management')->name('assets-management');

        // Influencers
        Route::view('influencers', 'admin.pages.influencers')->name('influencers');

        // Influencer List (Datatable)
        Route::get('/get-influencer-list', [AdminController::class, 'getInfluencerList'])->name('get-influencer-list');

        // Brands
        Route::view('brands', 'admin.pages.brands')->name('brands');

        // Brand List (Datatable)
        Route::get('/get-brands-list', [AdminController::class, 'getBrandsList'])->name('get-brands-list');

        // Bank Details
        Route::view('bank-details', 'admin.pages.bank-details')->name('bank-details');

        // Bank Details List (Datatable)
        Route::get('/get-bank-details-list', [AdminController::class, 'getBankDetailsList'])->name('get-bank-details-list');

        // Upload Lead Status
        Route::view('upload-lead-status', 'admin.pages.upload-lead-status')->name('upload-lead-status');

        // Upload Lead Status (POST Method)
        Route::post('upload-lead-csv', [LeadsController::class, 'upload_leads_csv'])->name('upload-lead-csv');

        // Slugs
        Route::view('slugs', 'admin.pages.slugs')->name('slugs');

        // Slug List (Datatable)
        Route::get('get-slugs-list', [AdminController::class, 'getSlugsList'])->name('get-slugs-list');

        // Bulk Upload Onboard
        Route::view('bulk-upload-onboard-list', 'admin.pages.bulk-upload-onboard-list')->name('bulk-upload-onboard-list');

        // Bulk Upload Onboard (POST Method)
        Route::post('onboarding-lead', [LeadsController::class, 'onboarding_lead'])->name('onboarding-lead');

        // Tag List
        Route::view('tag', 'admin.pages.tag')->name('tag');

        // Tag List (Datatable)
        Route::get('/get-tag-list', [AdminController::class, 'getTags'])->name('get-tag-list');

        // Enquiry List
        Route::view('enquiry-list', 'admin.pages.enquiry-list')->name('enquiry-list');

        // Enquiry List (Datatable)
        Route::get('/get-enquiry-list', [AdminController::class, 'getEnquiryList'])->name('get-enquiry-list');

        // Add New Member
        Route::view('add-new-member', 'admin.pages.add-new-member')->name('add-new-member');

        // Member List
        Route::view('member-list', 'admin.pages.member-list')->name('member-list');

        // Member List (Datatable)
        Route::get('/get-member-list', [AdminController::class, 'getMemberList'])->name('get-member-list');

        // Role Management
        Route::view('role-management', 'admin.pages.role-management')->name('role-management');

        // Reset Password
        Route::view('reset-password', 'admin.pages.reset-password')->name('reset-password');

        // Logout
        Route::get('logout', [AdminController::class, 'logout'])->name('logout');
    });
});
