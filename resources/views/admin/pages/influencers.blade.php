@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Smarkerz - Influencers')
@push('styles')
    {{-- All External Stylesheets Below This --}}
    <link rel="stylesheet" href="{{ asset('assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
@endpush
@section('content')
    {{-- All Content Below This --}}
    <div class="main-container">
        <div class="p-3">
            <div class="min-height-200px">
                <div class="row">
                    <div class="col-md-12 col-sm-12 d-flex justify-content-between">
                        <div class="title">
                            <h5 class="mb-2 fw-regular">Influencer List</h5>
                        </div>
                        <div class="filter">
                            <a href="javascript:void(0);" id="filter"><img
                                    src="{{ asset('assets/src/img/filter.png') }}">Filters</a>
                        </div>
                    </div>
                </div>
                <div class="filter-box">
                    <div class="card-box mb-10 px-3 py-2">
                        <form method="POST" class="">
                            <h5 class="fw-regular mb-1">Filter</h5>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Date Range</label>
                                        <input id="date_range" class="form-control datetimepicker-range" data-range="true"
                                            data-multiple-dates-separator=" - " data-language="en" class="datepicker-here"
                                            placeholder="Select Date Range" type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Campaign :</label>
                                        <select class="form-control custom-select">
                                            <option value="" selected>All Campaigns</option>
                                            @foreach (\App\Models\Campaign::where('status', '=', 1)->get() as $campaign)
                                                <option value="{{ $campaign->id }}">{{ $campaign->campaign_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Status :</label>
                                        <select class="custom-select form-control">
                                            <option value="" selected>All</option>
                                            <option value="1">Profile Pending</option>
                                            <option value="2">Pending</option>
                                            <option value="3">Approved</option>
                                            <option value="4">Declined</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Category :</label>
                                        <select class="custom-select form-control">
                                            <option value="" selected>All</option>
                                            @foreach (\App\Models\Tag::all() as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Referred By</label>
                                        <select class="custom-select form-control">
                                            <option value="" selected>All</option>
                                            @foreach (\App\Models\Admin::all() as $admin)
                                                <option value="{{ $admin->id }}">{{ 'E-' . $admin->id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Owner :</label>
                                        <select class="custom-select form-control">
                                            <option value="" selected>All</option>
                                            @foreach (\App\Models\Admin::all() as $admin)
                                                <option value="{{ $admin->id }}">{{ $admin->username }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Primary Channel :</label>
                                        <select class="custom-select form-control">
                                            <option value="" selected>All</option>
                                            @foreach (DB::table('channels')->get() as $channel)
                                                <option value="{{ $channel->id }}">{{ ucwords($channel->channel_name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Influencer Tiers :</label>
                                        <select class="custom-select form-control">
                                            <option value="" selected>All</option>
                                            @foreach (DB::table('tiers')->get() as $tier)
                                                <option value="{{ $tier->id }}">{{ $tier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-right">
                                    <button class="btn btn-secondary mr-3">Clear</button>
                                    <button class="btn btn-primary">Apply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-box mb-30 px-3 py-2">
                    <div class="pb-10">
                        <button class="btn btn-gradient mr-3">Transfer</button>
                        <button class="btn btn-gradient">Update Social Details</button>
                    </div>
                    <div class="pb-10 table-responsive">
                        <table id="influencers_table" class="table nowrap w-100">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="dt-checkbox">
                                            <input type="checkbox" name="select_all" value="1"
                                                id="example-select-all" />
                                            <span class="dt-checkbox-label"></span>
                                        </div>
                                    </th>
                                    <th>Sr. No</th>
                                    <th>Influencer Name</th>
                                    <th>Influencer ID</th>
                                    <th>Reg Date</th>
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Location</th>
                                    <th>Tag</th>
                                    <th>Referral Code</th>
                                    <th>Status</th>
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

        var table = $('#influencers_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
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
            ajax: "{{ route('admin.get-influencer-list') }}",
            order: [
                [1, 'asc']
            ],
            columns: [{
                    data: 'id',
                    name: 'id',
                    className: 'dt-body-center',
                    render: function(data, type, full, meta) {
                        return '<div class="dt-checkbox"><input type="checkbox" name="id[]" value="' + $(
                                '<div/>').text(data).html() +
                            '"><span class="dt-checkbox-label"></span></div>';
                    },
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'influencer_name',
                    name: 'influencer_name',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'id',
                    name: 'id',
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
                    data: 'email',
                    name: 'email',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'mobile_no',
                    name: 'mobile_no',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'city',
                    name: 'city',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'tag_name',
                    name: 'tag_name',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'referral_code',
                    name: 'referral_code',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, full, meta) {
                        if (data === 0) {
                            return '<span class="badge yellow">Pending</span>';
                        } else if (data === 1) {
                            return '<span class="badge green">Approved</span>';
                        } else if (data === 2) {
                            return '<span class="badge red">Declined</span>';
                        } else {
                            return '<span class="badge brawn">Profile Pending</span>';
                        }
                    },
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });

        function changeStatus(id, status) {
            var formdata = new FormData();
            formdata.append('influencer_id', id);
            formdata.append('status', status);
            formdata.append('action', 'change_status');
            $.ajax({
                url: "{{ url('api/influencers') }}",
                method: "POST",
                data: formdata,
                processData: false,
                dataType: "json",
                contentType: false,
                beforeSend: function() {},
                success: function(response) {
                    //console.log(response);
                    if (response.status) {
                        toastr.success(response.message);
                        table.ajax.reload(null, false);
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function(response) {
                    toastr.remove();
                    $.each(response.responseJSON.errors, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);
                    });
                }
            });
        }

        $('#example-select-all').on('click', function() {
            var rows = table.rows({
                'search': 'applied'
            }).nodes();
            $('input[type="checkbox"]', rows).prop('checked', this.checked);
        });
    </script>
@endpush
