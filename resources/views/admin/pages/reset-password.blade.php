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
                    <div class="col-md-12 col-sm-12 mb-2">
                        <div class="title">
                            <h5 class="fw-regular">Reset Password</h5>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-30 px-3 py-2">
                    <form id="changePasswordForm" action="{{ url('api/member') }}" method="POST" enctype="multipart/form-data"
                        class="">
                        @csrf
                        <input type="hidden" name="admin_id" value="{{ Auth::guard('admin')->user()->id }}">
                        <input type="hidden" name="action" value="change-password">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input class="form-control" id="old_password" name="old_password"
                                        placeholder="Old Password" type="password" />
                                    <span class="small error-text old_password_error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input class="form-control" id="new_password" name="new_password"
                                        placeholder="New Password" type="password" />
                                    <span class="small error-text new_password_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Confirm New Password</label>
                                    <input class="form-control" id="confirm_password" name="confirm_password"
                                        placeholder="Confirm New Password" type="password" />
                                    <span class="small error-text confirm_password_error"></span>
                                </div>
                            </div>

                            <div class="col-lg-12 text-center mt-2">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{-- All External Scripts Below This --}}
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                "Authorization": "Bearer {{ session()->get('apitoken') }}"
            }
        });

        $("form#changePasswordForm").submit(function(e) {
            e.preventDefault();
            toastr.remove();
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
                },
                success: function(response) {
                    //console.log(response);
                    toastr.remove();
                    if (response.status) {
                        $(form)[0].reset();
                        toastr.success(response.message);
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
        });
    </script>
@endpush
