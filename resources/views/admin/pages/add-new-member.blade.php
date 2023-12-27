@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Smarkerz | Add New Member')
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
                            <h5 class="fw-regular">Add New Member</h5>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-10 px-3 py-2">
                    <form id="memberForm" action="{{ url('/api/member') }}" method="POST" enctype="multipart/form-data"
                        class="">
                        @csrf
                        <input type="hidden" name="action" value="store">
                        <input type="hidden" name="referral_code" value="E-{{ \App\Models\Admin::count() + 1 }}">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Username*</label>
                                    <input class="form-control" id="username" name="username" placeholder="Enter Username"
                                        type="text" />
                                    <span class="small error-text username_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Email*</label>
                                    <input class="form-control" id="email" name="email" placeholder="Enter Email"
                                        type="text" />
                                    <span class="small error-text email_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Password*</label>
                                    <input class="form-control" id="password" name="password" placeholder="Enter Password"
                                        type="text" />
                                    <span class="small error-text password_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>First Name*</label>
                                    <input class="form-control" id="first_name" name="first_name"
                                        placeholder="Enter First Name" type="text" />
                                    <span class="small error-text first_name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Last Name*</label>
                                    <input class="form-control" id="last_name" name="last_name"
                                        placeholder="Enter Last Name" type="text" />
                                    <span class="small error-text last_name_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Mobile Number*</label>
                                    <input class="form-control" id="mobile_no" name="mobile_no"
                                        placeholder="Enter Mobile No." type="tel" />
                                    <span class="small error-text mobile_no_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Role*</label>
                                    <select id="role" name="role" class="form-control form-control-sm selectpicker">
                                        <option value="">Select Role</option>
                                        @foreach (DB::table('roles')->get() as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="small error-text role_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input class="form-control" id="designation" name="designation"
                                        placeholder="Enter Designation" type="text" />
                                    <span class="small error-text designation_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Reporting To*</label>
                                    <select id="reporting_to" name="reporting_to" class="form-control custom-select2">
                                        @foreach (DB::table('admins')->get() as $admin)
                                            <option value="{{ $admin->id }}">
                                                {{ ucwords($admin->first_name . ' ' . $admin->last_name) }}</option>
                                        @endforeach
                                    </select>
                                    <span class="small error-text reporting_to_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Country*</label>
                                    <select id="country" name="country" class="form-control custom-select2">
                                        <option value="">Select Country</option>
                                        @foreach (DB::table('country')->get() as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="small error-text country_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>State</label>
                                    <select id="state" name="state" class="form-control custom-select2">
                                        <option value="">Select State</option>
                                    </select>
                                    <span class="small error-text state_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>City</label>
                                    <select id="city" name="city" class="form-control custom-select2">
                                        <option value="">Select City</option>
                                    </select>
                                    <span class="small error-text city_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address" id="address" cols="30" rows="10" maxlength="500"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Pincode</label>
                                    <input class="form-control" id="pincode" name="pincode"
                                        placeholder="Enter Pincode" type="text" />
                                    <span class="small error-text pincode_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select id="gender" name="gender"
                                        class="form-control form-control-sm selectpicker">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <span class="small error-text gender_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Relationship Status</label>
                                    <select id="relation_status" name="relation_status"
                                        class="form-control form-control-sm selectpicker">
                                        <option value="" selected>Select</option>
                                        <option value="married">Married</option>
                                        <option value="unmarried">Unmarried</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <span class="small error-text relation_status_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input class="form-control date-picker" id="dob" name="dob"
                                        placeholder="Select DOB" type="text" />
                                    <span class="small error-text dob_error"></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Date of Joining</label>
                                    <input class="form-control date-picker" id="doj" name="doj"
                                        placeholder="Select DOJ" type="text" />
                                    <span class="small error-text doj_error"></span>
                                </div>
                            </div>
                            {{-- <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Referral ID*</label>
                                    <input class="form-control" placeholder="E-45" type="text" />
                                </div>
                            </div> --}}
                            <div class="col-lg-12 text-center mt-10">
                                <button class="btn btn-green">Submit</button>
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

        $("#dob").datepicker({
            language: "en",
            autoClose: true,
            dateFormat: "dd MM yyyy",
            maxDate: new Date(),
        });

        $("[name='country']").on("change", function() {
            var country_id = $(this).val();
            if (country_id !== "") {
                $("[name='state']").html('');
                $("[name='city']").html('');
                var formdata = new FormData();
                formdata.append('country_id', country_id);
                $.ajax({
                    url: "{{ url('api/get_states') }}",
                    method: "POST",
                    data: formdata,
                    processData: false,
                    dataType: "json",
                    contentType: false,
                    beforeSend: function() {},
                    success: function(response) {
                        //console.log(response);
                        toastr.remove();
                        if (response.status) {
                            var states = '<option value="">Select State</option>';
                            for (var i = 0; i < response.data.length; i++) {
                                states += '<option value="' + response.data[i].id + '">' + response
                                    .data[i].name + '</option>';
                            }
                            $("[name='state']").html(states);
                        } else {
                            toastr.warning(response.message);
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

        });

        $("[name='state']").on("change", function() {
            var state_id = $(this).val();
            if (state_id !== "") {
                $("[name='city']").html('');
                var formdata = new FormData();
                formdata.append('state_id', state_id);
                $.ajax({
                    url: "{{ url('api/get_cities') }}",
                    method: "POST",
                    data: formdata,
                    processData: false,
                    dataType: "json",
                    contentType: false,
                    beforeSend: function() {},
                    success: function(response) {
                        //console.log(response);
                        toastr.remove();
                        if (response.status) {
                            var cities = '<option value="">Select Cities</option>';
                            for (var i = 0; i < response.data.length; i++) {
                                cities += '<option value="' + response.data[i].id + '">' + response
                                    .data[i].name + '</option>';
                            }
                            $("[name='city']").html(cities);
                        } else {
                            toastr.warning(response.message);
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
        });

        $("form#memberForm").submit(function(e) {
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
                        $(form).find('[name="admin_id"]').val('');
                        toastr.success(response.message);
                        setTimeout(() => {
                            location.href = "{{ route('admin.member-list')}}";
                        }, 2000);
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
