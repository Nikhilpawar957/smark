@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard')
@push('styles')
    {{-- All External Stylesheets Below This --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
@endpush
@section('content')
    {{-- All Content Below This --}}
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="card-box mb-10 px-3 py-2">
                <div class="title pb-10">
                    <h2 class="h3 mb-0 section-title">Assets Management</h2>
                </div>
                <div class="row pb-10">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="form-group mb-0">
                            <select class="form-control form-control-sm selectpicker">
                                <option value="" selected>Select Campaigns</option>
                                <option value="">Motilal Oswal Demat</option>
                                <option value="">WOW Skin</option>
                                <option value="">mStock Dema</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Videos</label>
                            <input type="text" class="form-control solid-input" placeholder="Enter Video URL">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Images</label>
                            <input type="file" class="form-control-file form-control height-auto solid-input">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="upld-btn">
                            <button class="btn btn-green">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comp-details">
                <div class="comp-images  mb-10">
                    <h4 class="comp-details-head">Campaign Images</h4>
                    <ul class="compn-list">
                        <li><img src="{{ asset('assets/src/img/comp-image1.png') }}" alt="" /></li>
                        <li><img src="{{ asset('assets/src/img/comp-image2.png') }}" alt="" /></li>
                        <li><img src="{{ asset('assets/src/img/comp-image3.png') }}" alt="" /></li>
                        <li><img src="{{ asset('assets/src/img/comp-image4.png') }}" alt="" /></li>
                    </ul>

                </div>
                <div class="comp-videos  mb-20">
                    <h4 class="comp-details-head">Campaign Videos</h4>
                    <ul class="compn-list">
                        <li><a href="#"><img src="{{ asset('assets/src/img/youtube-icon.png') }}"
                                    alt="" /></a></li>
                        <li><a href="#"><img src="{{ asset('assets/src/img/youtube-icon.png') }}"
                                    alt="" /></a></li>
                        <li><a href="#"><img src="{{ asset('assets/src/img/youtube-icon.png') }}"
                                    alt="" /></a></li>
                        <li><a href="#"><img src="{{ asset('assets/src/img/youtube-icon.png') }}"
                                    alt="" /></a></li>
                        <li><a href="#"><img src="{{ asset('assets/src/img/youtube-icon.png') }}"
                                    alt="" /></a></li>
                        <li><a href="#"><img src="{{ asset('assets/src/img/youtube-icon.png') }}"
                                    alt="" /></a></li>
                    </ul>

                </div>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    {{-- All External Scripts Below This --}}
@endpush
