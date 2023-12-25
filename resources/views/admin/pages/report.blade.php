@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard')
@push('styles')
    {{-- All External Stylesheets Below This --}}
@endpush
@section('content')
    {{-- Content Below This --}}
    <div class="main-container">
        <div class="p-3">
            <div class="min-height-200px">
                <div class="row">
                    <div class="col-md-12 col-sm-12 d-flex justify-content-between">
                        <div class="title">
                            <h5 class="mb-2 fw-regular">Report</h5>
                        </div>
                        <div class="filter">
                            <a href="javascript:void();" id="filter"><img
                                    src="{{ asset('assets/src/img/filter.png') }}">Filters</a>
                        </div>
                    </div>
                </div>
                <div class="filter-box">
                    <div class="card-box mb-10 px-3 py-2">
                        <div class="">
                            <h5 class="fw-regular mb-1">Filter</h5>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Date Range</label>
                                        <input class="form-control date-picker" placeholder="Select Date Range"
                                            type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Brand :</label>
                                        <select class="custom-select form-control">
                                            <option value="" selected>Select Brand</option>
                                            <option value="">Select Brand</option>
                                            <option value="">Select Brand</option>
                                            <option value="">Select Brand</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Campaign :</label>
                                        <select class="custom-select form-control">
                                            <option value="" selected>Select Campaign</option>
                                            <option value="">Select Campaign</option>
                                            <option value="">Select Campaign</option>
                                            <option value="">Select Campaign</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Influencer :</label>
                                        <select class="custom-select form-control">
                                            <option value="" selected>Select Influencer</option>
                                            <option value="">Select Influencer</option>
                                            <option value="">Select Influencer</option>
                                            <option value="">Select Influencer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-right">
                                    <button class="btn btn-secondary mr-3">Clear</button>
                                    <button class="btn btn-primary">Apply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-30 px-3 py-2">
                    <div class="pb-10 table-responsive">
                        <table class="table hover multiple-select-row data-table-export nowrap">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">Sr. No.</th>
                                    <th>Lead Code</th>
                                    <th>Mobile No.</th>
                                    <th>Lead Name</th>
                                    <th>Date Received</th>
                                    <th>Campaign</th>
                                    <th>Influencer</th>
                                    <th>Influencer Mobile No</th>
                                    <th>Payout Plan</th>
                                    <th>Total Company Transactions Commission</th>
                                    <th>Total Influencer Transactions Commission</th>
                                    <th>Total Company Payout</th>
                                    <th>Total Influencer Payout</th>
                                    <th>Lead Status</th>
                                    <th>Last Modified Date</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-plus">1</td>
                                    <td>9959305934</td>
                                    <td>77778889899</td>
                                    <td>abcd</td>
                                    <td>Jan 14, 2022</td>
                                    <td>Algo Bulls Subscription</td>
                                    <td>John</td>
                                    <td>77778889899</td>
                                    <td>400</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>450</td>
                                    <td>300</td>
                                    <td>Converted</td>
                                    <td>September 18, 2023, 12:00</td>
                                    <td>--</td>
                                </tr>
                                <tr>
                                    <td class="table-plus">1</td>
                                    <td>9959305934</td>
                                    <td>77778889899</td>
                                    <td>abcd</td>
                                    <td>Jan 14, 2022</td>
                                    <td>Algo Bulls Subscription</td>
                                    <td>John</td>
                                    <td>77778889899</td>
                                    <td>400</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>450</td>
                                    <td>300</td>
                                    <td>Converted</td>
                                    <td>September 18, 2023, 12:00</td>
                                    <td>--</td>
                                </tr>
                                <tr>
                                    <td class="table-plus">1</td>
                                    <td>9959305934</td>
                                    <td>77778889899</td>
                                    <td>abcd</td>
                                    <td>Jan 14, 2022</td>
                                    <td>Algo Bulls Subscription</td>
                                    <td>John</td>
                                    <td>77778889899</td>
                                    <td>400</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>450</td>
                                    <td>300</td>
                                    <td>Converted</td>
                                    <td>September 18, 2023, 12:00</td>
                                    <td>--</td>
                                </tr>
                                <tr>
                                    <td class="table-plus">1</td>
                                    <td>9959305934</td>
                                    <td>77778889899</td>
                                    <td>abcd</td>
                                    <td>Jan 14, 2022</td>
                                    <td>Algo Bulls Subscription</td>
                                    <td>John</td>
                                    <td>77778889899</td>
                                    <td>400</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>450</td>
                                    <td>300</td>
                                    <td>Converted</td>
                                    <td>September 18, 2023, 12:00</td>
                                    <td>--</td>
                                </tr>
                                <tr>
                                    <td class="table-plus">1</td>
                                    <td>9959305934</td>
                                    <td>77778889899</td>
                                    <td>abcd</td>
                                    <td>Jan 14, 2022</td>
                                    <td>Algo Bulls Subscription</td>
                                    <td>John</td>
                                    <td>77778889899</td>
                                    <td>400</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>450</td>
                                    <td>300</td>
                                    <td>Converted</td>
                                    <td>September 18, 2023, 12:00</td>
                                    <td>--</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{-- All External Scripts Below This --}}
@endpush
