@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard')
@push('styles')
    {{-- All External Stylesheets Below This --}}
@endpush
@section('content')
    {{-- All Content Below This --}}
    <div class="main-container">
        <div class="p-3">
            <div class="min-height-200px">
                <div class="row">
                    <div class="col-md-12 col-sm-12 d-flex justify-content-between">
                        <div class="title">
                            <h5 class="mb-2 fw-regular">Ledger</h5>
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
                                        <label>From Date</label>
                                        <input class="form-control date-picker" placeholder="Select From Date"
                                            type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input class="form-control date-picker" placeholder="Select To Date"
                                            type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-30">
                                    <button class="btn btn-primary mr-3">Search</button>
                                    <button class="btn btn-secondary">Clear</button>

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
                                    <th>Month</th>
                                    <th>Growth Partner</th>
                                    <th>Brokerage</th>
                                    <th>Total Brokerage</th>
                                    <th>Name</th>
                                    <th>Bank IFSC</th>
                                    <th>Bank Account No</th>
                                    <th>Description</th>
                                    <th>Req Id</th>
                                    <th>Invoice No</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="table-plus">1</td>
                                    <td>April 2021</td>
                                    <td>77778889899</td>
                                    <td>0</td>
                                    <td>1000</td>
                                    <td>Sachin Kumar</td>
                                    <td>ICIC0000831</td>
                                    <td>083101523837</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="table-plus">1</td>
                                    <td>April 2021</td>
                                    <td>77778889899</td>
                                    <td>0</td>
                                    <td>1000</td>
                                    <td>Sachin Kumar</td>
                                    <td>ICIC0000831</td>
                                    <td>083101523837</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="table-plus">1</td>
                                    <td>April 2021</td>
                                    <td>77778889899</td>
                                    <td>0</td>
                                    <td>1000</td>
                                    <td>Sachin Kumar</td>
                                    <td>ICIC0000831</td>
                                    <td>083101523837</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="table-plus">1</td>
                                    <td>April 2021</td>
                                    <td>77778889899</td>
                                    <td>0</td>
                                    <td>1000</td>
                                    <td>Sachin Kumar</td>
                                    <td>ICIC0000831</td>
                                    <td>083101523837</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="table-plus">1</td>
                                    <td>April 2021</td>
                                    <td>77778889899</td>
                                    <td>0</td>
                                    <td>1000</td>
                                    <td>Sachin Kumar</td>
                                    <td>ICIC0000831</td>
                                    <td>083101523837</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="table-plus">1</td>
                                    <td>April 2021</td>
                                    <td>77778889899</td>
                                    <td>0</td>
                                    <td>1000</td>
                                    <td>Sachin Kumar</td>
                                    <td>ICIC0000831</td>
                                    <td>083101523837</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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
