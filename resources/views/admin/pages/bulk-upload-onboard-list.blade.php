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
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h5 class="mb-2 fw-regular">Bulk Upload Onboared List</h5>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-30 px-3 py-2">
                    <form id="onBoardLead" action="{{ route('admin.onboarding-lead') }}" method="POST"
                        enctype="multipart/form-data" class="">
                        <div class="row mb-0">
                            <div class="col-md-4 br-r0">
                                <div class="form-group">
                                    <label>Upload Leads</label>
                                    <input name="onbaordlead_file" accept=".csv" type="file"
                                        class="form-control-file form-control height-auto">
                                    <span class="onbaordlead_file_error text-danger error-text small"></span>
                                </div>
                            </div>
                            <div class="col-md-3 mt-4">
                                <button class="btn btn-gradient mt-1">Upload</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ asset('assets/excel_templates/onboardlead.csv') }}" download=""
                                    class="text-dark download-sample m-0">Download Sample Sheet <img
                                        src="{{ asset('assets/src/img/ant-design_download-outlined.svg') }}"
                                        alt=""></a>
                            </div>
                        </div>

                    </form>
                    <ul id="errors_list" class="d-none">
                    </ul>
                </div>


            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{-- All External Scripts Below This --}}
    <script>
        $('form#onBoardLead').submit(function(e) {
            e.preventDefault();
            var form = this;
            var formdata = new FormData(form);
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: formdata,
                processData: false,
                dataType: "json",
                contentType: false,
                beforeSend: function() {
                    $(form).find('span.error-text').text('');
                    $("#errors_list").addClass("d-none");
                },
                success: function(response) {
                    toastr.remove();
                    if (response.code == 1) {
                        $(form)[0].reset();
                        toastr.success(response.msg);
                        setTimeout(() => {
                            location.reload();
                        }, 3000);
                    } else {
                        toastr.error(response.msg);
                    }
                },
                error: function(response) {
                    toastr.remove();

                    var html = '';

                    $.each(response.responseJSON.errors, function(prefix, val) {
                        $(form).find('span.' + prefix + '_error').text(val[0]);

                        if (prefix == "") {
                            html += '<li class="text-danger">' + val[0] + '</li>';
                        }
                    });

                    if (html) {
                        $("#errors_list").html(html);
                        $("#errors_list").removeClass("d-none");
                    }


                }
            });
        });
    </script>
@endpush
