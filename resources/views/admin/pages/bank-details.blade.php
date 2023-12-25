@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Smarkerz - Influencer Bank Details')
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
                            <h5 class="fw-regular">Bank Details</h5>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-30 p-3">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input id="date_range" class="form-control datetimepicker-range" data-range="true"
                                    data-multiple-dates-separator=" - " data-language="en" class="datepicker-here"
                                    placeholder="Select Date Range" type="text" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select id="status" class="custom-select solid-input">
                                    <option value="">Status</option>
                                    <option value="0">Unverified</option>
                                    <option value="1">Verified</option>
                                    <option value="2">Declined</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="bank_details_table" class="table hover nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Influencer ID</th>
                                    <th>Action</th>
                                    <th>Bank Name</th>
                                    <th>Account Number</th>
                                    <th>Account Name</th>
                                    <th>Branch Name</th>
                                    <th>Account Type</th>
                                    <th>IFSC code</th>
                                    <th>PAN Card</th>
                                    <th>PAN Card Image</th>
                                    <th>Aadhar Card</th>
                                    <th>Account Proof</th>
                                    <th>GST</th>
                                    <th>GST Proof</th>
                                    <th>Status</th>
                                    <th>Reason</th>
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

        $("#status").on("change", function(){
            table.draw();
        });

        var table = $('#bank_details_table').DataTable({
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
                url: "{{ route('admin.get-bank-details-list') }}",
                data: function(data) {
                    data.date_range = $("#date_range").val();
                    data.status = $("#status").val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'influencer_id',
                    name: 'influencer_id',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'bank_name',
                    name: 'bank_name',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'account_no',
                    name: 'account_no',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'account_name',
                    name: 'account_name',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'branch_name',
                    name: 'branch_name',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'account_type',
                    name: 'account_type',
                    render: function(data, type, full, meta) {
                        if (data == 1) {
                            return 'Savings Account';
                        } else if (data == 2) {
                            return 'Current Account';
                        } else {
                            return '';
                        }
                    },
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'ifsc_code',
                    name: 'ifsc_code',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'pan_number',
                    name: 'pan_number',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'pan_card_file',
                    name: 'pan_card_file',
                    render: function(data, type, full, meta) {
                        if (data != null) {
                            return "<img src=/storage/" + data +
                                "  width='50' height='60' alt='' />";
                        } else {
                            return 'N/A';
                        }
                    },
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'aadhar_number',
                    name: 'aadhar_number',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'cancelled_cheque_file',
                    name: 'cancelled_cheque_file',
                    render: function(data, type, full, meta) {
                        if (data != null) {
                            return "<img src=/storage/" + data +
                                "  width='50' height='60' alt='' />";
                        } else {
                            return 'N/A';
                        }
                    },
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'gst_number',
                    name: 'gst_number',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'gst_certificate_file',
                    name: 'gst_certificate_file',
                    render: function(data, type, full, meta) {
                        if (data != null) {
                            return "<img src=/storage/" + data +
                                "  width='50' height='60' alt='' />";
                        } else {
                            return 'N/A';
                        }
                    },
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
                        } else {
                            return '<span class="badge red">Declined</span>';
                        }
                    },
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'reason',
                    name: 'reason',
                    render: function(data, type, full, meta) {
                        if (data != null) {
                            return data;
                        } else {
                            return 'N/A';
                        }
                    },
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
                url: "{{ url('api/bank_details') }}",
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
                        $('#bank_details_table').DataTable().ajax.reload(null, false);
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

        function deleteBankDetails(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                confirmButtonText: 'Yes, delete it!'
            }).then(function() {
                var formdata = new FormData();
                formdata.append('bank_id', id);
                formdata.append('action', 'delete');
                $.ajax({
                    url: "{{ url('api/bank_details') }}",
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
                            $('#bank_details_table').DataTable().ajax.reload(null, false);
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
            })

        }
    </script>
@endpush
