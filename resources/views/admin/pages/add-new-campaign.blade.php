@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard')
@push('styles')
@endpush
@section('content')
    <div class="main-container">
        <div class="p-3">
            <div class="min-height-200px">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mb-10">
                        <div class="title">
                            <h5 class="fw-regular">Select Campaign Type</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-lg-4">
                        <a href="{{ route('admin.add-performance-campaign') }}"
                            class="d-block card-box height-100-p widget-style1 widget-style-custom text-center position-relative py-2">
                            <div class="widget-data">
                                <div class="h4 mb-0 flaticon-381-funnel icon"></div>
                                <div class="h2 mt-1 mb-0">Performance Campaign</div>
                                <img class="info-badge campaign-type" src="{{ asset('assets/src/img/info.svg') }}" data-toggle="tooltip"
                                    data-placement="top"
                                    title="Performance campaigns are the campaign for which you pay only when their is measurable result. Select this option to create performance based campaign."></img>
                            </div>
                        </a>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <a href="{{ route('admin.add-branding-campaign') }}"
                            class="d-block card-box height-100-p widget-style1 widget-style-custom text-center position-relative py-2">
                            <div class="widget-data">
                                <div class="h4 mb-0 flaticon-381-promotion-1 icon"></div>
                                <div class="h2 mt-1 mb-0">Branding Campaign</div>
                                <img class="info-badge campaign-type" src="{{ asset('assets/src/img/info.svg') }}" data-toggle="tooltip"
                                    data-placement="top"
                                    title="Branding campaign goal is to increasing brand awareness and improving brand equity in the mind of the consumer"></img>
                            </div>
                        </a>
                    </div>
                    <div class="mb-3 col-lg-4">
                        <a href="{{ route('admin.add-barter-campaign') }}"
                            class="d-block card-box height-100-p widget-style1 widget-style-custom text-center position-relative py-2">
                            <div class="widget-data">
                                <div class="h4 mb-0 fa fa-exchange icon"></div>
                                <div class="h2 mt-1 mb-0 pt-10">Barter Campaign</div>
                                <img class="info-badge campaign-type" src="{{ asset('assets/src/img/info.svg') }}" data-toggle="tooltip"
                                    data-placement="top"
                                    title="Barter collaboration can be described as a situation whereby a company brand reaches out to an influencer to help promote its product in exchange for free product samples for the influencer to use"></img>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <p class="text-center"><b>Disclaimer:</b> The amount mentioned under Spent and Income for Companies
                            and
                            Influencers may vary after final calculations*</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
