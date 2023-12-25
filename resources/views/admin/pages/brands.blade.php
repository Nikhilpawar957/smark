@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard')
@push('styles')
    {{-- All External Stylesheets Below This --}}
    <link rel="stylesheet" href="{{ asset('assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
@endpush
@section('content')
    {{-- All Content Below This --}}
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="title pb-10">
                <h2 class="h3 mb-0 section-title">Company List</h2>
            </div>
            <div class="card-box mb-30 px-3 py-2 stats-cards">
                <div>
                    <div class="row pd-20">
                        <div class="table-responsive">
                            <table id="brands_table" class="table hover nowrap">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Company</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Location</th>
                                        <th>Tags</th>
                                        <th>Reg Date</th>
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

        var table = $('#brands_table').DataTable({
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
            ajax: "{{ route('admin.get-brands-list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'company_name',
                    name: 'company_name',
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
                    data: 'email',
                    name: 'email',
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
            formdata.append('bank_id', id);
            formdata.append('status', status);
            formdata.append('action', 'change_status');
            $.ajax({
                url: "{{ url('api/brands') }}",
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
                        $('#brands_table').DataTable().ajax.reload(null, false);
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
    </script>
@endpush
