@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/jquery-steps/jquery.steps.css') }}" />
    <style>
        /* This selector targets the editable element (excluding comments). */
        .ck-editor__editable_inline:not(.ck-comment__input *) {
            height: 200px;
            overflow-y: auto;
        }

        .offercard-row {
            display: none;
        }
    </style>
@endpush
@section('content')
    <div class="main-container">
        <div class="p-3">
            <div class="min-height-200px">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h5 class="mb-2 fw-regular">Add New Performance Campaign</h5>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-30 p-1">
                    <div class="">
                        <div class="wizard-content">
                            <div class="tab-wizard wizard-circle wizard">
                                <input type="hidden" id="campaign_id" name="campaign_id"
                                    value="@if (isset($data)) {{ $data->id }} @else {{ '' }} @endif">
                                <input type="hidden" id="campaign_type" name="campaign_type" value="1">
                                <!-- Step 1 -->
                                <h5>Campaign Brief</h5>
                                <section class="pb-2">
                                    <form id="campaignStepOne" action="{{ url('api/campaigns') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Campaign Name*</label>
                                                    <input type="text" class="form-control" name="campaign_name"
                                                        placeholder="Enter Campaign Name" />
                                                    <span class="error-text small campaign_name_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Company* :</label>
                                                    <select id="brand_id" name="brand_id"
                                                        class="custom-select form-control">
                                                        <option value="" selected>Select Company</option>
                                                        @foreach (\App\Models\Brand::where('status', '=', 1)->whereNull('deleted_at')->get() as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->company_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error-text small brand_id_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-9 pr-0">
                                                        <div class="form-group">
                                                            <label>Campaign Payout <img class="info-badge"
                                                                    src="{{ asset('assets/src/img/info.svg') }}"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Select your preferred Campaign Payout Option: CPA (Cost Per Acquisition), CPL (Cost Per Lead), or CPT (Cost Per Transaction)."></label>
                                                            <input type="text" class="form-control br-r0"
                                                                name="influencer_payout_value" placeholder="Enter Amount" />
                                                            <span
                                                                class="error-text small influencer_payout_value_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 pl-0">
                                                        <div class="form-group">
                                                            <label>&nbsp;</label>
                                                            <select class="custom-select form-control br-l0"
                                                                name="influencer_payout_option">
                                                                <option value="cpa" selected>CPA</option>
                                                                <option value="cpl">CPL</option>
                                                                <option value="cpt">CPT</option>
                                                            </select>
                                                            <span
                                                                class="error-text small influencer_payout_option_error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Commission per Transaction %</label>
                                                    <input type="text" class="form-control"
                                                        name="influencer_commission_per_transaction" value="" />
                                                    <span
                                                        class="error-text small influencer_commission_per_transaction_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Campaign Channel</label>
                                                    <select class="custom-select form-select" name="channels">
                                                        <option value="">Select Channels</option>
                                                        @foreach (DB::table('channels')->select('*')->get() as $channel)
                                                            <option value="{{ $channel->id }}">
                                                                {{ ucwords($channel->channel_name) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error-text small channels_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Campaign Category</label>
                                                    <select class="custom-select form-control" id="tag_id"
                                                        name="tag_id">
                                                        <option value="" selected>Select Category</option>
                                                        @foreach (\App\Models\Tag::where('status', '=', 1)->get() as $tag)
                                                            <option value="{{ $tag->id }}">{{ $tag->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="error-text small tag_id_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Type</label>
                                                    <select class="custom-select form-control" id="offer_type"
                                                        name="offer_type">
                                                        <option value="0" selected>General</option>
                                                        <option value="1">Special</option>
                                                    </select>
                                                    <span class="error-text small offer_type_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Enable ASCI Mandatory? <img class="info-badge"
                                                            src="{{ asset('assets/src/img/info.svg') }}"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="When enabled, Influencers must provide Government Regulatory Body Name, Registration Code, and Upload the Certificate."></label>
                                                    <div class="d-flex mt-2">
                                                        <div class="custom-control custom-radio mr-3">
                                                            <input type="radio" id="customRadio1" name="enable_asci"
                                                                value="1" class="custom-control-input" selected />
                                                            <label class="custom-control-label"
                                                                for="customRadio1">Yes</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio2" name="enable_asci"
                                                                value="0" class="custom-control-input" />
                                                            <label class="custom-control-label"
                                                                for="customRadio2">No</label>
                                                        </div>
                                                    </div>
                                                    <span class="error-text small enable_asci_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>End Date</label>
                                                    <input class="form-control date-picker" name="end_date"
                                                        placeholder="Select Date" type="text" />
                                                    <span class="error-text small end_date_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row border py-2 my-2 offercard-row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="offercard">Campaign Offer Card*</label>
                                                    <input type="file" name="offercard" id="offercard"
                                                        class="form-control">
                                                        <span class="error-text small offercard_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mb-2">Campaign brand tags to be entered in
                                                        caption</label>
                                                    <h6 class="sub-heading">Enter Brand Tags</h6>
                                                    <input type="text" class="form-control" name="brand_tags"
                                                        placeholder="@instagram_handle @youtube_channel @facebook_page" />
                                                    <span class="error-text small brand_tags_error"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="mb-2">Campaign hashtags to be entered in
                                                        caption</label>
                                                    <h6 class="sub-heading">Enter Hashtags</h6>
                                                    <input type="text" class="form-control" name="hash_tags"
                                                        placeholder="#hashtag1, #hashtag2, #hashtag3" />
                                                    <span class="error-text small hash_tags_error"></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="tab campaign-brief">
                                                    <ul class="nav nav-pills" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active text-blue" data-toggle="tab"
                                                                href="#brief" role="tab"
                                                                aria-selected="true">Campaign
                                                                Brief</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link text-blue" data-toggle="tab"
                                                                href="#kpi" role="tab"
                                                                aria-selected="false">Campaign KPI</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link text-blue" data-toggle="tab"
                                                                href="#tnc" role="tab"
                                                                aria-selected="false">Campaign T&C</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade mt-1 show active" id="brief"
                                                            role="tabpanel">
                                                            <textarea id="influencer_campaign_brief" class="ckeditor w-100 mt-1 form-control" name="influencer_campaign_brief">

                                                        </textarea>
                                                        </div>
                                                        <div class="tab-pane fade mt-1" id="kpi" role="tabpanel">
                                                            <textarea id="influencer_campaign_kpi" class="ckeditor w-100 mt-1 form-control" name="influencer_campaign_kpi">

                                                        </textarea>
                                                        </div>
                                                        <div class="tab-pane fade mt-1" id="tnc" role="tabpanel">
                                                            <textarea id="influencer_campaign_tc" class="ckeditor w-100 mt-1 form-control" name="influencer_campaign_tc">

                                                        </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="dashed my-3">
                                        <h5 class="fw-regular mb-2">Campaign Details for Company (For Admin Only)</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-9 pr-0">
                                                        <div class="form-group">
                                                            <label>Campaign Payout <img class="info-badge"
                                                                    src="{{ asset('assets/src/img/info.svg') }}"></label>
                                                            <input type="text" class="form-control"
                                                                name="brand_payout_value" placeholder="Enter Amount" />
                                                            <span class="error-text small brand_payout_value_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 pl-0">
                                                        <div class="form-group">
                                                            <label>&nbsp;</label>
                                                            <select class="custom-select form-control"
                                                                name="brand_payout_option">
                                                                <option value="cpa" selected>CPA</option>
                                                                <option value="cpt">CPT</option>
                                                                <option value="cpl">CPL</option>
                                                            </select>
                                                            <span
                                                                class="error-text small brand_payout_option_error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Commission per Transaction %</label>
                                                    <input type="text" class="form-control"
                                                        name="brand_commission_per_transaction" value="" />
                                                    <span
                                                        class="error-text small brand_commission_per_transaction_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="tab campaign-brief">
                                                    <ul class="nav nav-pills" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active text-blue" data-toggle="tab"
                                                                href="#brief1" role="tab"
                                                                aria-selected="true">Campaign
                                                                Brief</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link text-blue" data-toggle="tab"
                                                                href="#kpi1" role="tab"
                                                                aria-selected="false">Campaign KPI</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link text-blue" data-toggle="tab"
                                                                href="#tnc1" role="tab"
                                                                aria-selected="false">Campaign T&C</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade mt-1 show active" id="brief1"
                                                            role="tabpanel">
                                                            <textarea id="brand_campaign_brief" class="ckeditor w-100 mt-1 form-control" name="brand_campaign_brief">

                                                        </textarea>
                                                        </div>
                                                        <div class="tab-pane fade mt-1" id="kpi1" role="tabpanel">
                                                            <textarea id="brand_campaign_kpi" class="ckeditor w-100 mt-1 form-control" name="brand_campaign_kpi">

                                                        </textarea>
                                                        </div>
                                                        <div class="tab-pane fade mt-1" id="tnc1" role="tabpanel">
                                                            <textarea id="brand_campaign_tc" class="ckeditor w-100 mt-1 form-control" name="brand_campaign_tc">

                                                        </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                                <!-- Step 2 -->
                                <h5>Campaign Assets</h5>
                                <section class="pb-2">
                                    <form id="campaignStepTwo" action="{{ url('api/campaigns') }}" method="post"
                                        enctype="multipart/form-data" class="container">
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <h6 class="fw-regular">Campaign Logo</h6>
                                            </div>
                                            <div class="col-lg-10">
                                                <div class="upload__box">
                                                    <div class="upload__btn-box">
                                                        <label class="upload__btn">
                                                            <img src="{{ asset('assets/src/img/cloud-upload.png') }}"
                                                                alt="">
                                                            <p>Drag file to upload</p>
                                                            <span class="pink-btn">Browse File</span>
                                                            <input type="file" name="logofile" id="logofile"
                                                                accept="image/png, image/gif, image/jpeg,image/jpg"
                                                                data-max_length="20" class="upload__inputfile">
                                                        </label>
                                                    </div>
                                                    <div class="upload__img-wrap"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 offset-lg-2">
                                                <p>Please upload campaign logo. It should be JPG/JPEG/PNG file upto 2mb.</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <h6 class="fw-regular">Campaign Images</h6>
                                            </div>
                                            <div class="col-lg-10">
                                                <div class="upload__box">
                                                    <div class="upload__btn-box">
                                                        <label class="upload__btn">
                                                            <img src="{{ asset('assets/src/img/cloud-upload.png') }}"
                                                                alt="">
                                                            <p>Drag file to upload</p>
                                                            <span class="pink-btn">Browse File</span>
                                                            <input type="file"
                                                                accept="image/png, image/gif, image/jpeg,image/jpg"
                                                                name="campaignimages[]" id="campaignimages"
                                                                data-max_length="20" class="upload__inputfile" multiple>
                                                        </label>
                                                    </div>
                                                    <div class="upload__img-wrap"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 offset-lg-2">
                                                <p>Please upload campaign creatives. It should be JPG/JPEG/PNG file upto
                                                    10mb. (maximum 5 images can upload)</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <h6 class="fw-regular">Campaign Documents</h6>
                                            </div>
                                            <div class="col-lg-10">
                                                <div class="upload__box">
                                                    <div class="upload__btn-box">
                                                        <label class="upload__btn">
                                                            <img src="{{ asset('assets/src/img/cloud-upload.png') }}"
                                                                alt="">
                                                            <p>Drag file to upload</p>
                                                            <span class="pink-btn">Browse File</span>
                                                            <input type="file" accept="pdf,doc,docx"
                                                                name="campaigndocuments[]" id="campaigndocuments"
                                                                data-max_length="20" class="upload__inputfile" multiple>
                                                        </label>
                                                    </div>
                                                    <div class="upload__img-wrap"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 offset-lg-2 pt-10">
                                                <p>Please upload campaign documents. It should be PDF/DOC/DOCS file upto
                                                    5mb. (maximum 5 Documents can uploaded)</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2">
                                                <h6 class="fw-regular">Campaign Images</h6>
                                            </div>
                                            <div class="col-lg-10">
                                                <textarea class="form-control" rows="5" cols="10" name="campaignvideos" id="campaignvideos"
                                                    placeholder="Paste URLs"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                                <!-- Step 3 -->
                                <h5>Campaign URL</h5>
                                <section class="pb-2">
                                    <form id="campaignStepThree" action="{{ url('api/campaigns') }}" method="post"
                                        enctype="multipart/form-data" class="container">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-11 pr-0">
                                                        <div class="form-group">
                                                            <h6 class="sub-heading">Campaign URL*</h6>
                                                            <input type="text" class="form-control br-r0"
                                                                id="landing_page_url" name="landing_page_url"
                                                                value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 pl-0">
                                                        <div class="form-group mb-0 mt-2">
                                                            <select class="custom-select form-control br-l0"
                                                                id="utm_tag" name="utm_tag">
                                                                <option value="?" selected>?</option>
                                                                <option value="&">&</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="utm"
                                                        name="utm" placeholder="UTM" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="utm_id"
                                                        name="utm_id" placeholder="UTM ID" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="utm_source"
                                                        name="utm_source" placeholder="UTM Source" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="utm_medium"
                                                        name="utm_medium" placeholder="UTM Medium" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="utm_campaign"
                                                        name="utm_campaign" placeholder="UTM Campaign" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="utm_term"
                                                        name="utm_term" placeholder="UTM Term" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="utm_content"
                                                        name="utm_content" placeholder="UTM Content" />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                                <!-- Step 4 -->
                                <h5>Influencer List</h5>
                                <section class="pb-2">
                                    <form id="campaignStepFour" action="{{ url('api/campaigns') }}" method="post"
                                        enctype="multipart/form-data" class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group d-flex align-items-center">
                                                    <label class="mr-3 mb-0">Select Visibility</label>
                                                    <select class="custom-select form-control" id="campaign_visibility"
                                                        name="campaign_visibility">
                                                        <option value="">Select Visibility</option>
                                                        <option value="0">Default - Visible to all Influencers
                                                        </option>
                                                        <option value="1">Visible to selected Influencers</option>
                                                        <option value="2">Hidden to selected Influencers</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="warning-box">
                                                    <p class="text-red"><b>Don't change the Visibility dropdown once
                                                            selected</b></p>
                                                    <p>Description</p>
                                                    <p><b>Default - Visible to all Influencers:</b> Visible to all, so any
                                                        influencer can activate the campaign <br> <b>Visible to Selected
                                                            Influencers :</b> Visible to only added influencers and only
                                                        those can activate the campaign <br> <b>Hidden for Selected
                                                            Influencers :</b> Hidden to only added influencer and except
                                                        hidden other influencers can activate the campaign</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-4 pr-0 br-r0">
                                                <input type="file"
                                                    class="form-control-file form-control height-auto" />
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-primary w-100">Upload</button>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <a href="#" class="download-sample my-2 text-right">Download Sample
                                                    Sheet</a>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                <button class="btn btn-blue">Send Email</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table class="data-table table hover nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Sr No</th>
                                                            <th>Influencer</th>
                                                            <th>Influencer ID</th>
                                                            <th>Platforms</th>
                                                            <th class="text-center">City</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                                <!-- Step 5 -->
                                <h5>Payout Settings</h5>
                                <section class="">
                                    <form id="campaignStepFive" action="{{ url('api/campaigns') }}" method="post"
                                        enctype="multipart/form-data" class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <h5 class="fw-regular mb-2">Campaign Payout Settings</h5>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="mb-2">Lead Commission Value</label>
                                                            <h6 class="sub-heading">Company</h6>
                                                            <input type="text" class="form-control"
                                                                id="lead_commission_value_brand"
                                                                name="lead_commission_value_brand" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mt-2">
                                                            <label class="mb-2">&nbsp;</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Influencer"
                                                                id="lead_commission_value_influencer"
                                                                name="lead_commission_value_influencer" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="mb-2">Lead Acquisition Value</label>
                                                            <h6 class="sub-heading">Company</h6>
                                                            <input type="text" class="form-control"
                                                                id="lead_acquisition_value_brand"
                                                                name="lead_acquisition_value_brand" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mt-2">
                                                            <label class="mb-2">&nbsp;</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Influencer"
                                                                id="lead_acquisition_value_influencer"
                                                                name="lead_acquisition_value_influencer" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Commission on First Transaction</label>
                                                            <select class="custom-select form-control"
                                                                id="commission_type_on_first_transaction"
                                                                name="commission_type_on_first_transaction">
                                                                <option value="" selected>Select</option>
                                                                <option value="0">Commission Percentage</option>
                                                                <option value="1">Commission Amount</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Commission Minus First Transaction</label>
                                                            <select class="custom-select form-control"
                                                                id="commission_type_on_other_transaction"
                                                                name="commission_type_on_other_transaction">
                                                                <option value="" selected>Select</option>
                                                                <option value="0">Commission Percentage</option>
                                                                <option value="1">Commission Amount</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <h6 class="sub-heading">Company</h6>
                                                            <input type="text" class="form-control"
                                                                id="commission_on_first_transaction_brand"
                                                                name="commission_on_first_transaction_brand"
                                                                value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mt-2">
                                                            <input type="text" class="form-control"
                                                                placeholder="Influencer"
                                                                id="commission_on_first_transaction_influencer"
                                                                name="commission_on_first_transaction_influencer" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <h6 class="sub-heading">Company</h6>
                                                            <input type="text" class="form-control"
                                                                id="commission_on_other_transaction_brand"
                                                                name="commission_on_other_transaction_brand"
                                                                value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group mt-2">
                                                            <input type="text" class="form-control"
                                                                placeholder="Influencer"
                                                                id="commission_on_other_transaction_influencer"
                                                                name="commission_on_other_transaction_influencer" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input class="form-control date-picker" id="effective_from"
                                                                name="effective_from" placeholder="Effective from"
                                                                type="text" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" id="note"
                                                                name="note" placeholder="Note" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5 class="fw-regular my-2">Additional KPI Condition</h5>
                                                <div class="row">
                                                    <div class="col-md-5 d-flex">
                                                        <button class="btn btn-primary w-100 mr-3">CTR</button>
                                                        <button class="btn btn-secondary w-100">LCR</button>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mt-2">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="mb-0">Conversion to Transaction ratio is
                                                                >=</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <h6 class="sub-heading">%</h6>
                                                            <input type="text" class="form-control" value="30" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="mb-0">and Brokerage is >=</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <h6 class="sub-heading">INR</h6>
                                                            <input type="text" class="form-control" value="3000" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <a href="#" class="remove-link-blue">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-md-12 text-center">
                                                        <p class="sep-text">AND</p>
                                                        <hr class="dashed-color" />
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mt-1">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="mb-0">Conversion to Transaction ratio is
                                                                >=</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <h6 class="sub-heading">%</h6>
                                                            <input type="text" class="form-control" value="30" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="mb-0">and Brokerage is >=</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <h6 class="sub-heading">INR</h6>
                                                            <input type="text" class="form-control" value="3000" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <a href="#" class="remove-link-blue">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="kpichangenotification" name="kpichangenotification"
                                                                value="1">
                                                            <label class="custom-control-label"
                                                                for="kpichangenotification">Send KPI Change Notification on
                                                                Email</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{ asset('assets/src/plugins/jquery-steps/jquery.steps.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/super-build/ckeditor.js"></script>
    <script>
        jQuery(document).ready(function() {
            ImgUpload();
        });

        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload__inputfile').each(function() {
                $(this).on('change', function(e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function(f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var html =
                                        "<div class='upload__img-box'><div style='background-image: url(" +
                                        e.target.result + ")' data-number='" + $(
                                            ".upload__img-close").length + "' data-file='" + f
                                        .name +
                                        "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function(e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }

        $(".tab-wizard").steps({
            headerTag: "h5",
            bodyTag: "section",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "Submit"
            },
            onStepChanging: function(event, currentIndex, newIndex) {
                // Getting Current section
                var section = $(this).find('section.current form');
                var form_id = section[0].id;

                // Assigning Form to variable
                var form = document.querySelector('#' + form_id);
                var formdata = new FormData(form);

                // If Campaign Id is not empty
                if ($("[name='campaign_id']").val() != "") {
                    formdata.append('campaign_id', $("[name='campaign_id']").val());
                }

                // If Current Index is 0 (First Step)
                if (currentIndex == 0) {

                    if ($("[name='offer_type']").val() == 1) {
                        if ($("[name='offercard']").val() == "") {
                            $(".offercard_error").text('Please Upload Offer Card for (Type: Special)');
                            $("[name='offercard']").focus();
                            //console.log($("[name='offercard']").val());
                            return false;
                        }else{
                            $(".offercard_error").text('');
                        }
                    }

                    // CKEditor Data for Influencers
                    var influencer_campaign_brief = window.editors[0].getData();
                    var influencer_campaign_kpi = window.editors[1].getData();
                    var influencer_campaign_tc = window.editors[2].getData();
                    formdata.append('influencer_campaign_brief', influencer_campaign_brief);
                    formdata.append('influencer_campaign_kpi', influencer_campaign_kpi);
                    formdata.append('influencer_campaign_tc', influencer_campaign_tc);



                    // CKEditor Data for Brands
                    var brand_campaign_brief = window.editors[3].getData();
                    var brand_campaign_kpi = window.editors[4].getData();
                    var brand_campaign_tc = window.editors[5].getData();
                    formdata.append('brand_campaign_brief', brand_campaign_brief);
                    formdata.append('brand_campaign_kpi', brand_campaign_kpi);
                    formdata.append('brand_campaign_tc', brand_campaign_tc);
                }
                formdata.append('campaign_type', $("[name='campaign_type']").val());
                formdata.append('action', 'store');
                formdata.append('step', currentIndex);

                // Log FormData Keys and Values
                /* for (var pair of formdata.entries()) {
                    console.log(pair[0] + " - " + pair[1]);
                } */

                var result = true;

                // If Current Index is Less than New Index
                if (currentIndex < newIndex) {
                    $.ajax({
                        async: false,
                        url: $(form).attr('action'),
                        method: $(form).attr('method'),
                        data: formdata,
                        processData: false,
                        dataType: "json",
                        contentType: false,
                        beforeSend: function() {
                            $(form).find('span.error-text').text('');
                        },
                        success: function(response) {
                            //console.log(response);
                            toastr.remove();
                            if (response.status) {
                                if (currentIndex == 0) {
                                    $("[name='campaign_id']").val(response.data);
                                }
                                toastr.success(response.message);

                            } else {
                                toastr.error(response.message);
                                result = false;
                            }
                        },
                        error: function(response) {
                            toastr.remove();
                            $.each(response.responseJSON.errors, function(prefix, val) {
                                $(form).find('span.' + prefix + '_error').text(val[0]);
                            });
                            result = false;
                        }
                    });
                }

                if (result) {
                    return true;
                } else {
                    return false;
                }
            },
            onStepChanged: function(event, currentIndex, priorIndex) {
                $('.steps .current').prevAll().addClass('disabled');
            },
            onFinished: function(event, currentIndex) {
                //alert();
            }
        });

        window.editors = {};

        document.querySelectorAll('.ckeditor').forEach((node, index) => {
            CKEDITOR.ClassicEditor
                .create(node, {
                    // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                    toolbar: {
                        items: [
                            'heading', '|',
                            'bold', 'italic', 'strikethrough', 'underline', '|',
                            'bulletedList', 'numberedList', '|',
                            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                            'alignment', '|',
                            'link', 'insertImage', 'insertTable', 'mediaEmbed', '|',
                            'sourceEditing'
                        ],
                        shouldNotGroupWhenFull: true
                    },
                    // Changing the language of the interface requires loading the language file using the <script> tag.
                    // language: 'es',
                    list: {
                        properties: {
                            styles: true,
                            startIndex: true,
                            reversed: true
                        }
                    },
                    // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                    heading: {
                        options: [{
                                model: 'paragraph',
                                title: 'Paragraph',
                                class: 'ck-heading_paragraph'
                            },
                            {
                                model: 'heading1',
                                view: 'h1',
                                title: 'Heading 1',
                                class: 'ck-heading_heading1'
                            },
                            {
                                model: 'heading2',
                                view: 'h2',
                                title: 'Heading 2',
                                class: 'ck-heading_heading2'
                            },
                            {
                                model: 'heading3',
                                view: 'h3',
                                title: 'Heading 3',
                                class: 'ck-heading_heading3'
                            },
                            {
                                model: 'heading4',
                                view: 'h4',
                                title: 'Heading 4',
                                class: 'ck-heading_heading4'
                            },
                            {
                                model: 'heading5',
                                view: 'h5',
                                title: 'Heading 5',
                                class: 'ck-heading_heading5'
                            },
                            {
                                model: 'heading6',
                                view: 'h6',
                                title: 'Heading 6',
                                class: 'ck-heading_heading6'
                            }
                        ]
                    },
                    // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                    placeholder: '',
                    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                    fontFamily: {
                        options: [
                            'default',
                            'Arial, Helvetica, sans-serif',
                            'Courier New, Courier, monospace',
                            'Georgia, serif',
                            'Lucida Sans Unicode, Lucida Grande, sans-serif',
                            'Tahoma, Geneva, sans-serif',
                            'Times New Roman, Times, serif',
                            'Trebuchet MS, Helvetica, sans-serif',
                            'Verdana, Geneva, sans-serif'
                        ],
                        supportAllValues: true
                    },
                    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                    fontSize: {
                        options: [10, 12, 14, 'default', 18, 20, 22],
                        supportAllValues: true
                    },
                    // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                    // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                    htmlSupport: {
                        allow: [{
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }]
                    },
                    // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                    link: {
                        decorators: {
                            addTargetToExternalLinks: true,
                            defaultProtocol: 'https://',
                            toggleDownloadable: {
                                mode: 'manual',
                                label: 'Downloadable',
                                attributes: {
                                    download: 'file'
                                }
                            }
                        }
                    },
                    // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                    mention: {
                        feeds: [{
                            marker: '@',
                            feed: [
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy',
                                '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake',
                                '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum',
                                '@pudding', '@sesame', '@snaps', '@soufflé',
                                '@sugar', '@sweet', '@topping', '@wafer'
                            ],
                            minimumCharacters: 1
                        }]
                    },
                    // The "super-build" contains more premium features that require additional configuration, disable them below.
                    // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                    removePlugins: [
                        // These two are commercial, but you can try them out without registering to a trial.
                        // 'ExportPdf',
                        // 'ExportWord',
                        'AIAssistant',
                        'CKBox',
                        'CKFinder',
                        'EasyImage',
                        // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                        // Storing images as Base64 is usually a very bad idea.
                        // Replace it on production website with other solutions:
                        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                        // 'Base64UploadAdapter',
                        'RealTimeCollaborativeComments',
                        'RealTimeCollaborativeTrackChanges',
                        'RealTimeCollaborativeRevisionHistory',
                        'PresenceList',
                        'Comments',
                        'TrackChanges',
                        'TrackChangesData',
                        'RevisionHistory',
                        'Pagination',
                        'WProofreader',
                        // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                        // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                        'MathType',
                        // The following features are part of the Productivity Pack and require additional license.
                        'SlashCommand',
                        'Template',
                        'DocumentOutline',
                        'FormatPainter',
                        'TableOfContents',
                        'PasteFromOfficeEnhanced'
                    ]
                })
                .then(newEditor => {
                    window.editors[index] = newEditor;
                    //console.log(newEditor.getData());
                }).catch(error => {
                    console.error(error);
                });
        });

        //console.log(window.editors);

        $("[name='offer_type']").on("change", function() {
            if ($(this).val() == 1) {
                $(".offercard-row").slideDown(500);
            } else {
                $(".offercard-row").hide(500);
            }
        });

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer {{ session()->get('apitoken') }}"
            }
        });
    </script>
@endpush
