@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Smarkerz | Members List')
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
                    <div class="col-md-12 col-sm-12 mb-10">
                        <div class="title">
                            <h5 class="fw-regular">Member List</h5>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-10 px-3 py-2">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select id="created_by" name="created_by" class="custom-select solid-input">
                                    <option value="">Added By</option>
                                    @foreach (\App\Models\Admin::where('role', '=', 0)->get() as $admin)
                                        <option value="{{ $admin->id }}">{{ $admin->first_name . ' ' . $admin->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <select id="status" name="status" class="custom-select solid-input">
                                    <option value="">Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="admins_table" class="table hover nowrap">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>EMP ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Mobile No.</th>
                                    <th>Status</th>
                                    <th>Role</th>
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

        $("[name='created_by']").on("change", function(){
            table.draw();
        });

        $("[name='status']").on("change", function(){
            table.draw();
        });

        var table = $('#admins_table').DataTable({
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
            ajax: {
                url: "{{ route('admin.get-member-list') }}",
                data: function(data) {
                    data.added_by = $("#added_by").val();
                    data.status = $("#status").val();
                },
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'id',
                    name: 'id',
                    render: function(data, type, full, meta) {
                        return 'E-' + data;
                    },
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'admin_name',
                    name: 'admin_name',
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
                    data: 'role_name',
                    name: 'role_name',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, full, meta) {
                        if (data === 0) {
                            return '<span class="badge red">Inactive</span>';
                        } else if (data === 1) {
                            return '<span class="badge green">Active</span>';
                        } else {
                            return 'N/A';
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
