@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Smarkerz | Slugs')
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
                    <div class="col-md-12 col-sm-12 mb-2">
                        <div class="title">
                            <h5 class="fw-regular">Slugs</h5>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-30 p-3">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input id="date_range" class="form-control datetimepicker-range" data-range="true"
                                    data-multiple-dates-separator=" - " data-language="en" class="datepicker-here"
                                    placeholder="Select Date Range" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="slugs_table" class="table hover nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="text-center">Sr. No</th>
                                    <th>Created date</th>
                                    <th>Slug ID</th>
                                    <th>Influencer ID</th>
                                    <th>Influencer Name</th>
                                    <th>Lead Owner</th>
                                    <th>Company Name</th>
                                    <th>Campaign Name</th>
                                    <th>Activated URL</th>
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
    <script src="{{ asset('assets/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/src/plugins/datatables/js/vfs_fonts.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer {{ session()->get('apitoken') }}"
            }
        });

        $("#date_range").datepicker({
            language: "en",
            dateFormat: 'yyyy-mm-dd',
            onSelect: function(formattedDate, date, inst) {
                var dates = formattedDate.split(" - ");
                var start_date = dates[0];
                var end_date = dates[1];
                if (end_date != undefined) {
                    table.draw();
                }

            }
        });

        var table = $('#slugs_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            // aLengthMenu: [
            //     [10, 15, 25, 50, 100, -1],
            //     [10, 15, 25, 50, 100, "All"]
            // ],
            "language": {
                "info": "_START_-_END_ of _TOTAL_ entries",
                paginate: {
                    next: '<i class="ion-chevron-right"></i>',
                    previous: '<i class="ion-chevron-left"></i>'
                }
            },
            dom: 'Bfrtp',
            buttons: [
                'csv', 'pdf'
            ],
            ajax: {
                url: "{{ route('admin.get-slugs-list') }}",
                data: function(data) {
                    data.date_range = $("#date_range").val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'slug',
                    name: 'slug',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'influencer_id',
                    name: 'influencer_id',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'influencer_name',
                    name: 'influencer_name',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'lead_owner',
                    name: 'lead_owner',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'company_name',
                    name: 'company_name',
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
                    data: 'slug_url',
                    name: 'slug_url',
                    orderable: true,
                    searchable: true
                },

            ]
        });
    </script>
@endpush
