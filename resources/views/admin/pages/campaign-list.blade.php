@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard')
@push('styles')
    {{-- All External Stylesheets Below This --}}
    <link rel="stylesheet" href="{{ asset('assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
@endpush
@section('content')
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="card-box mb-30 px-3 py-2 stats-cards">
                <div>
                    <div class="title pb-10">
                        <h2 class="h3 mb-0 section-title">Campaign List</h2>
                    </div>
                    <div class="row mb-10">
                        <div class="col-xl-2 pr-0">
                            <div class="card-box height-100-p widget-style1 widget-style-custom">
                                <div class="">
                                    <div class="widget-data">
                                        <div class="h2">Total Influencers</div>
                                        <div id="influencer_count" class="h4 mb-0">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 pr-0">
                            <div class="card-box height-100-p widget-style1 widget-style-custom">
                                <div class="d-flex flex-wrap">
                                    <div class="widget-data">
                                        <div class="h2">Total no of Campaigns</div>
                                        <div id="campaign_count" class="h4 mb-0">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 pr-0">
                            <div class="card-box height-100-p widget-style1 widget-style-custom">
                                <div class="d-flex flex-wrap">
                                    <div class="widget-data">
                                        <div class="h2">Total no of Leads</div>
                                        <div id="lead_count" class="h4 mb-0">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 pr-0">
                            <div class="card-box height-100-p widget-style1 widget-style-custom">
                                <div class="d-flex flex-wrap">
                                    <div class="widget-data">
                                        <div class="h2">Total Account Opened</div>
                                        <div id="account_count" class="h4 mb-0">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 pr-0">
                            <div class="card-box height-100-p widget-style1 widget-style-custom">
                                <div class="d-flex flex-wrap">
                                    <div class="widget-data">
                                        <div class="h2">Total no of Transaction</div>
                                        <div id="transaction_count" class="h4 mb-0">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="card-box height-100-p widget-style1 widget-style-custom">
                                <div class="d-flex flex-wrap">
                                    <div class="widget-data">
                                        <div class="h2">Total Amount Spent</div>
                                        <div class="h4 mb-0">₹ <span id="amount_spent">0</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <div class="form-group mb-0">
                                <select id="brand_id" name="brand_id" class="form-control form-control-sm selectpicker">
                                    <option value="" selected>Select Brand</option>
                                    @foreach (\App\Models\Brand::all() as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->company_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <div class="form-group mb-0">
                                <button class="btn btn-secondary mr-3" onclick="return resetFilter();">Clear</button>
                            </div>
                        </div>
                    </div>
                    <div class="row pd-20">
                        <div class="table-responsive">
                            <table id="campaigns_table" class="table hover nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Status</th>
                                        <th>Campaign</th>
                                        <th>Type</th>
                                        <th>Campaign Type</th>
                                        <th>Create Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{-- All External Scripts Below This --}}
    <script src="{{ asset('assets/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer {{ session()->get('apitoken') }}"
            }
        });

        var r = /^(ftp|http|https):\/\/[^ "]+$/;

        $("[name='brand_id']").on("change", function(){
            table.draw();
        });

        function resetFilter(){
            $("[name='brand_id']").val('').change();
        }

        var table = $('#campaigns_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: false,
            aLengthMenu: [
                [10, 15, 25, 50, 100, -1],
                [10, 15, 25, 50, 100, "All"]
            ],
            "language": {
                "info": "_START_-_END_ of _TOTAL_ entries",
                paginate: {
                    next: '<i class="ion-chevron-right"></i>',
                    previous: '<i class="ion-chevron-left"></i>'
                }
            },
            ajax:{
                url: "{{ route('admin.get-campaigns-list') }}",
                data: function(data) {
                    data.brand_id = $("[name='brand_id']").val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, full, meta) {
                        if (data === 1) {
                            return '<span class="badge green">Approved</span>';
                        } else if (data === 2) {
                            return '<span class="badge yellow">Pending</span>';
                        } else if (data === 3) {
                            return '<span class="badge brawn">Stopped</span>';
                        } else {
                            return '<span class="badge red">Declined</span>';
                        }
                    },
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'campaign_name',
                    name: 'campaign_name',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'offer_type',
                    name: 'offer_type',
                    render: function(data, type, full, meta) {
                        if (data === 0) {
                            return 'General';
                        } else {
                            return 'Special';
                        }
                    },
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'campaign_type',
                    name: 'campaign_type',
                    render: function(data, type, full, meta) {
                        if (data === 1) {
                            return 'Performance';
                        } else if (data === 2) {
                            return 'Barter';
                        } else {
                            return 'Branding';
                        }
                    },
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'end_date',
                    name: 'end_date',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'action',
                    name: 'action',
                },

            ]
        });
    </script>
@endpush
