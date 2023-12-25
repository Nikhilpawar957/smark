@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/src/plugins/jquery-steps/jquery.steps.css') }}" />
@endpush
@section('content')

<div class="main-container">
    <div class="p-3">
        <div class="min-height-200px">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="title">
                        <h5 class="mb-4 fw-regular">Add New Barter Campaign</h5>
                    </div>
                </div>
            </div>
            <div class="card-box mb-30 p-3">
                <div class="p-3">
                    <div class="wizard-content">
                        <form class="tab-wizard wizard-circle wizard">
                            <!-- Step 1 -->
                            <h5>Campaign Brief</h5>
                            <section class="pb-5">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Campaign Name*</label>
                                            <input type="text" class="form-control" placeholder="Enter campaign Name" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Company* :</label>
                                            <select class="custom-select form-control">
                                                <option value="" selected>Select Company</option>
                                                <option value="">Select Company</option>
                                                <option value="">Select Company</option>
                                                <option value="">Select Company</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Campaign Payout</label>
                                            <div class="d-flex">
                                                <div class="custom-control custom-checkbox mb-5 mr-3">
                                                    <input type="checkbox" class="custom-control-input" id="Barter-1">
                                                    <label class="custom-control-label" for="Barter-1">Barter</label>
                                                </div>
                                                <div class="custom-control custom-checkbox mb-5 mr-3">
                                                    <input type="checkbox" class="custom-control-input" id="FixedPay-1">
                                                    <label class="custom-control-label" for="FixedPay-1">Fixed Pay</label>
                                                </div>
                                                <div class="custom-control custom-checkbox mb-5 mr-3">
                                                    <input type="checkbox" class="custom-control-input" id="Cashback-1">
                                                    <label class="custom-control-label" for="Cashback-1">Cashback</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Campaign Category :</label>
                                            <select class="custom-select form-control">
                                                <option value="" selected>Select Category</option>
                                                <option value="">Select Category</option>
                                                <option value="">Select Category</option>
                                                <option value="">Select Category</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Product Cost (in INR)</label>
                                            <input type="text" class="form-control" placeholder="Product Cost" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Commision Per Sale %</label>
                                            <input type="text" class="form-control" value="20" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Platforms</label>
                                            <ul class="platforms">
                                                <li>
                                                    <input type="checkbox" id="myCheckbox1" />
                                                    <label for="myCheckbox1"><img src="{{ asset('assets/src/img/platform/facebook.svg') }}" /></label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="myCheckbox2" />
                                                    <label for="myCheckbox2"><img src="{{ asset('assets/src/img/platform/youtube.svg') }}" /></label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="myCheckbox3" />
                                                    <label for="myCheckbox3"><img src="{{ asset('assets/src/img/platform/twitter.svg') }}" /></label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="myCheckbox4" />
                                                    <label for="myCheckbox4"><img src="{{ asset('assets/src/img/platform/instagram.svg') }}" /></label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="myCheckbox5" />
                                                    <label for="myCheckbox5"><img src="{{ asset('assets/src/img/platform/telegram.svg') }}" /></label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" id="myCheckbox6" />
                                                    <label for="myCheckbox6"><img src="{{ asset('assets/src/img/platform/quora.svg') }}" /></label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Is Platform Mandatory ? <img class="info-badge" src="{{ asset('assets/src/img/info.svg') }}" data-toggle="tooltip" data-placement="top" title="Select your preferred Campaign Payout Option: CPA (Cost Per Action), CPL (Cost Per Lead), or CPT (Cost Per Thousand Impressions)."></img></label>
                                            <div class="d-flex mt-3">
                                                <div class="custom-control custom-radio mr-3">
                                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" selected />
                                                    <label class="custom-control-label" for="customRadio1">Yes</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" />
                                                    <label class="custom-control-label" for="customRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Media Approval <img class="info-badge" src="{{ asset('assets/src/img/info.svg') }}" data-toggle="tooltip" data-placement="top" title="When checked 'Yes', the company gains the authority to approve or decline media uploads by influencers. Admin has this privilege by default."></img></label>
                                            <div class="d-flex mt-3">
                                                <div class="custom-control custom-radio mr-3">
                                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" selected />
                                                    <label class="custom-control-label" for="customRadio1">Yes</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" />
                                                    <label class="custom-control-label" for="customRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Enable ASCI Mandatory? <img class="info-badge" src="{{ asset('assets/src/img/info.svg') }}" data-toggle="tooltip" data-placement="top" title="ASCI Mandatory: When enabled, influencers must provide Government Regulatory body name, Registration code, and certificate upload."></img></label>
                                            <div class="d-flex mt-3">
                                                <div class="custom-control custom-radio mr-3">
                                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" selected />
                                                    <label class="custom-control-label" for="customRadio1">Yes</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" />
                                                    <label class="custom-control-label" for="customRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label>Deliverables</label>
                                            <input type="text" class="form-control" placeholder="Youtube dedicated video" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Type :</label>
                                            <select class="custom-select form-control">
                                                <option value="" selected>Dedicated Video</option>
                                                <option value="">Dedicated Video</option>
                                                <option value="">Dedicated Video</option>
                                                <option value="">Dedicated Video</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label>Deadline</label>
                                            <input class="form-control date-picker" placeholder="Select Date" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Instagam post" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <select class="custom-select form-control">
                                                <option value="" selected>Image</option>
                                                <option value="">Image</option>
                                                <option value="">Image</option>
                                                <option value="">Image</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <input class="form-control date-picker" placeholder="Select Date" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <a class="purple-add-btn">+</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Notification</label>
                                            <div class="custom-control custom-checkbox mb-5">
                                                <input type="checkbox" class="custom-control-input" id="Notification-1">
                                                <label class="custom-control-label" for="Notification-1">Get
                                                    deliverables notification on e-mail from influencers</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Send notification on" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>End Date</label>
                                            <input class="form-control date-picker" placeholder="Select Date" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Type</label>
                                            <select class="custom-select form-control">
                                                <option value="" selected>General</option>
                                                <option value="">General</option>
                                                <option value="">General</option>
                                                <option value="">General</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-3">Campaign brand tags to be entered in caption</label>
                                            <h6 class="sub-heading">Enter Brand Tags</h6>
                                            <input type="text" class="form-control" placeholder="@instagram_handle @youtube_channel @facebook_page" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-3">Campaign hashtags to be entered in caption</label>
                                            <h6 class="sub-heading">Enter Hashtags</h6>
                                            <input type="text" class="form-control" placeholder="#hashtag1, #hashtag2, #hashtag3" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tab campaign-brief">
                                            <ul class="nav nav-pills" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active text-blue" data-toggle="tab" href="#brief" role="tab" aria-selected="true">Campaign Brief</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-blue" data-toggle="tab" href="#kpi" role="tab" aria-selected="false">Campaign KPI</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-blue" data-toggle="tab" href="#tnc" role="tab" aria-selected="false">Campaign T&C</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="brief" role="tabpanel">
                                                    <div class="pd-20 content">
                                                        “Artificial intelligence is that activity devoted to making machines intelligent, and intelligence is that quality that enables an entity to function appropriately and with foresight in its environment.”
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="kpi" role="tabpanel">
                                                    <div class="pd-20 content">
                                                        “Artificial intelligence is that activity devoted to making machines intelligent, and intelligence is that quality that enables an entity to function appropriately and with foresight in its environment.”
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tnc" role="tabpanel">
                                                    <div class="pd-20 content">
                                                        “Artificial intelligence is that activity devoted to making machines intelligent, and intelligence is that quality that enables an entity to function appropriately and with foresight in its environment.”
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="dashed my-5">
                                <h5 class="fw-regular mb-4">Campaign Details for Company (For Admin Only)</h5>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Campaign Payout</label>
                                            <div class="d-flex">
                                                <div class="custom-control custom-checkbox mb-5 mr-3">
                                                    <input type="checkbox" class="custom-control-input" id="Barter-1">
                                                    <label class="custom-control-label" for="Barter-1">Barter</label>
                                                </div>
                                                <div class="custom-control custom-checkbox mb-5 mr-3">
                                                    <input type="checkbox" class="custom-control-input" id="FixedPay-1">
                                                    <label class="custom-control-label" for="FixedPay-1">Fixed Pay</label>
                                                </div>
                                                <div class="custom-control custom-checkbox mb-5 mr-3">
                                                    <input type="checkbox" class="custom-control-input" id="Cashback-1">
                                                    <label class="custom-control-label" for="Cashback-1">Cashback</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-9 pr-0">
                                                <div class="form-group">
                                                    <label>Product Cost (in INR)</label>
                                                    <input type="text" class="form-control" placeholder="Product Cost" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-9 pr-0">
                                                <div class="form-group">
                                                    <label>Commision Per Sale %</label>
                                                    <input type="text" class="form-control" value="20" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tab campaign-brief">
                                            <ul class="nav nav-pills" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active text-blue" data-toggle="tab" href="#brief1" role="tab" aria-selected="true">Campaign Brief</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-blue" data-toggle="tab" href="#kpi1" role="tab" aria-selected="false">Campaign KPI</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-blue" data-toggle="tab" href="#tnc1" role="tab" aria-selected="false">Campaign T&C</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="brief1" role="tabpanel">
                                                    <div class="pd-20 content">
                                                        “Artificial intelligence is that activity devoted to making machines intelligent, and intelligence is that quality that enables an entity to function appropriately and with foresight in its environment.”
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="kpi1" role="tabpanel">
                                                    <div class="pd-20 content">
                                                        “Artificial intelligence is that activity devoted to making machines intelligent, and intelligence is that quality that enables an entity to function appropriately and with foresight in its environment.”
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tnc1" role="tabpanel">
                                                    <div class="pd-20 content">
                                                        “Artificial intelligence is that activity devoted to making machines intelligent, and intelligence is that quality that enables an entity to function appropriately and with foresight in its environment.”
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 2 -->
                            <h5>Campaign Assets</h5>
                            <section class="pb-5">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <h6 class="fw-regular">Offer</h6>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="upload__box">
                                                <div class="upload__btn-box">
                                                    <label class="upload__btn">
                                                        <img src="{{ asset('assets/src/img/cloud-upload.png') }}" alt="">
                                                        <p>Drag file to upload</p>
                                                        <span class="pink-btn">Browse File</span>
                                                        <input type="file" name="userfiles[]" data-max_length="20" class="upload__inputfile" multiple>
                                                    </label>
                                                </div>
                                                <div class="upload__img-wrap"></div>
                                            </div>
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
                                                        <img src="{{ asset('assets/src/img/cloud-upload.png') }}" alt="">
                                                        <p>Drag file to upload</p>
                                                        <span class="pink-btn">Browse File</span>
                                                        <input type="file" name="userfiles[]" data-max_length="20" class="upload__inputfile" multiple>
                                                    </label>
                                                </div>
                                                <div class="upload__img-wrap"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <h6 class="fw-regular">Campaign Videos</h6>
                                        </div>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" placeholder="Paste URLs"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 3 -->
                            <h5>Campaign URL</h5>
                            <section class="pb-5">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-11 pr-0">
                                            <div class="form-group">
                                                <h6 class="sub-heading">Campaign URL*</h6>
                                                <input type="text" class="form-control br-r0" value="https://app.smarkerz.com/influencer/register" />
                                            </div>
                                        </div>
                                        <div class="col-md-1 pl-0">
                                            <div class="form-group mb-0 mt-2">
                                                <select class="custom-select form-control br-l0">
                                                    <option value="" selected>?</option>
                                                    <option value="">?</option>
                                                    <option value="">?</option>
                                                    <option value="">?</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="UTM" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="UTM ID" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="UTM Source" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="UTM Medium" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="UTM Campaign" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="UTM Term" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="UTM Content" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 4 -->
                            <h5>Influencer List</h5>
                            <section class="pb-5">
                                <div class="container">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group d-flex align-items-center">
                                                <label class="mr-3 mb-0">Select&nbsp;Visibility</label>
                                                <select class="custom-select form-control">
                                                    <option value="" selected>Select Visibility</option>
                                                    <option value="">Select Visibility</option>
                                                    <option value="">Select Visibility</option>
                                                    <option value="">Select Visibility</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="warning-box">
                                                <p class="text-red"><b>Don't change the Visibility dropdown once selected</b></p>
                                                <p>Description *</p>
                                                <p><b>Default - Visible to all Influencers:</b> Visible to all, so any influencer can activate the campaign <br> <b>Visible to Selected
                                                        Influencers :</b> Visible to only added influencers and only those can activate the campaign <br> <b>Hidden for Selected
                                                        Influencers :</b> Hidden to only added influencer and except hidden other influencers can activate the campaign <br> <b>Visible to all with restriction :</b> Campaign will be visible to all but only added influencers can activate the campaign</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-4 pr-0 br-r0">
                                            <input type="file" class="form-control-file form-control height-auto" />
                                        </div>
                                        <div class="col-md-2 pl-0">
                                            <button class="btn btn-primary w-100">Upload</button>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <a class="download-sample my-3">Download Sample Sheet</a>
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
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2" width="30" height="30" alt="" /> John Wick</td>
                                                        <td>342</td>
                                                        <td>
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/instagram.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/facebook.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/youtube.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                        </td>
                                                        <td class="text-center">Mumbai</td>
                                                        <td class="text-center"><a href="#" class="remove-link">Remove</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2" width="30" height="30" alt="" /> John Wick</td>
                                                        <td>342</td>
                                                        <td>
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/instagram.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/facebook.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/youtube.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                        </td>
                                                        <td class="text-center">Mumbai</td>
                                                        <td class="text-center"><a href="#" class="remove-link">Remove</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2" width="30" height="30" alt="" /> John Wick</td>
                                                        <td>342</td>
                                                        <td>
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/instagram.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/facebook.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/youtube.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                        </td>
                                                        <td class="text-center">Mumbai</td>
                                                        <td class="text-center"><a href="#" class="remove-link">Remove</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2" width="30" height="30" alt="" /> John Wick</td>
                                                        <td>342</td>
                                                        <td>
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/instagram.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/facebook.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/youtube.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                        </td>
                                                        <td class="text-center">Mumbai</td>
                                                        <td class="text-center"><a href="#" class="remove-link">Remove</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2" width="30" height="30" alt="" /> John Wick</td>
                                                        <td>342</td>
                                                        <td>
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/instagram.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/facebook.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/youtube.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                        </td>
                                                        <td class="text-center">Mumbai</td>
                                                        <td class="text-center"><a href="#" class="remove-link">Remove</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2" width="30" height="30" alt="" /> John Wick</td>
                                                        <td>342</td>
                                                        <td>
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/instagram.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/facebook.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/youtube.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                        </td>
                                                        <td class="text-center">Mumbai</td>
                                                        <td class="text-center"><a href="#" class="remove-link">Remove</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2" width="30" height="30" alt="" /> John Wick</td>
                                                        <td>342</td>
                                                        <td>
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/instagram.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/facebook.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/youtube.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                        </td>
                                                        <td class="text-center">Mumbai</td>
                                                        <td class="text-center"><a href="#" class="remove-link">Remove</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2" width="30" height="30" alt="" /> John Wick</td>
                                                        <td>342</td>
                                                        <td>
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/instagram.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/facebook.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/youtube.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                        </td>
                                                        <td class="text-center">Mumbai</td>
                                                        <td class="text-center"><a href="#" class="remove-link">Remove</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2" width="30" height="30" alt="" /> John Wick</td>
                                                        <td>342</td>
                                                        <td>
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/instagram.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/facebook.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/youtube.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                        </td>
                                                        <td class="text-center">Mumbai</td>
                                                        <td class="text-center"><a href="#" class="remove-link">Remove</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2" width="30" height="30" alt="" /> John Wick</td>
                                                        <td>342</td>
                                                        <td>
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/instagram.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/facebook.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                            <img src="{{ asset('assets/src/img/add-campaign-icons/youtube.svg') }}" class="mr-2" width="25" height="25" alt="" />
                                                        </td>
                                                        <td class="text-center">Mumbai</td>
                                                        <td class="text-center"><a href="#" class="remove-link">Remove</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 5 -->
                            <h5>Payout Settings</h5>
                            <section class="pb-5">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5 class="fw-regular mb-4">Campaign Payout Settings</h5>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="mb-3">Lead Commission Value</label>
                                                        <h6 class="sub-heading">Company</h6>
                                                        <input type="text" class="form-control" value="500" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group mt-2">
                                                        <label class="mb-3">&nbsp;</label>
                                                        <input type="text" class="form-control" placeholder="Influencer" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="mb-3">Lead Acquisition Value</label>
                                                        <h6 class="sub-heading">Company</h6>
                                                        <input type="text" class="form-control" value="500" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group mt-2">
                                                        <label class="mb-3">&nbsp;</label>
                                                        <input type="text" class="form-control" placeholder="Influencer" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Commission on First Transaction</label>
                                                        <select class="custom-select form-control">
                                                            <option value="" selected>Select</option>
                                                            <option value="">Select</option>
                                                            <option value="">Select</option>
                                                            <option value="">Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Commission Minus First Transaction</label>
                                                        <select class="custom-select form-control">
                                                            <option value="" selected>Select</option>
                                                            <option value="">Select</option>
                                                            <option value="">Select</option>
                                                            <option value="">Select</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control date-picker" placeholder="Effective from" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Note" />
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="fw-regular my-4">Additional KPI Condition</h5>
                                            <div class="row">
                                                <div class="col-md-5 d-flex">
                                                    <button class="btn btn-primary w-100 mr-3">CTR</button>
                                                    <button class="btn btn-secondary w-100">LCR</button>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mt-4">
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
                                                        <input type="checkbox" class="custom-control-input" id="kpichangenotification">
                                                        <label class="custom-control-label" for="kpichangenotification">Send KPI Change Notification on
                                                            Email</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script src="{{ asset('assets/src/plugins/jquery-steps/jquery.steps.js') }}"></script>
    <script src="{{ asset('assets/vendors/scripts/steps-setting.js') }}"></script>
@endpush
