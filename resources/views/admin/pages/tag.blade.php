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
        <div class="p-3">
            <div class="min-height-200px">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h5 class="mb-2 fw-regular">Tag</h5>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-10 px-3 py-2">
                    <form id="tagForm" action="{{ url('/api/tags') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="action" value="store">
                        <input type="hidden" name="tag_id" value="">
                        <div class="row">
                            <div class="col-lg-2">
                                <h6 class="fw-regular">Name<span style="color:red">*</span></h6>
                            </div>
                            <div class="col-lg-4">
                                <div class="">
                                    <input type="text" class="form-control solid-input" name="name"
                                        placeholder="Enter Name">
                                </div>
                                <span class="small error-text name_error"></span>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-lg-2">
                                <h6 class="fw-regular">Image<span style="color:red">*</span></h6>
                            </div>
                            <div class="col-lg-10">
                                <div class="upload__box">
                                    <div class="upload__btn-box">
                                        <label class="upload__btn">
                                            <img src={{ asset('assets/src/img/cloud-upload.png') }} alt="">
                                            <p>Drag file to upload</p>
                                            <span class="pink-btn">Browse File</span>
                                            <input type="file" name="image" id="logo" data-max_length="1"
                                                accept="image/png, image/jpeg" class="upload__inputfile">
                                        </label>
                                    </div>
                                    <div class="upload__img-wrap"></div>
                                </div>
                                <span class="small error-text image_error"></span>
                            </div>
                            <div class="col-lg-10 offset-lg-2">
                                <p>Please upload category image. It should be JPG/JPEG/PNG file upto 1mb. (100 X 100)</p>
                            </div>
                        </div>
                        <div class="form-navigation mt-3 ">
                            <button type="submit" id="savebtn"
                                class="submit-btn btn btn-primary ml-2">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="card-box mb-30 px-3 py-2">
                    <div class="pb-10 table-responsive">
                        <table id="tag_table" class="table hover nowrap">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
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

        var table = $('#tag_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: false,
            aLengthMenu: [
                [10, 15, 25, 50, 100, -1],
                [10, 15, 25, 50, 100, "All"]
            ],
            ajax: "{{ route('admin.get-tag-list') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'image',
                    name: 'image',
                    render: function(data, type, full, meta) {
                        if (r.test(data)) {
                            return '<img src="' + data +
                                '" class="img-fluid" style="height:30px;">';
                        } else {
                            return "<img src=/storage/" + data +
                                " width='50' height='60' alt='' />";
                        }
                    },
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'name',
                    name: 'name',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, full, meta) {
                        if (data === 0) {
                            return '<span class="badge brawn">Inactive</span>';
                        } else {
                            return '<span class="badge green">Active</span>';
                        }
                    },
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'action',
                    name: 'action',
                },

            ]
        });

        $("form#tagForm").submit(function(e) {
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
                        $(form).find('[name="tag_id"]').val('');
                        $(form).find('img').remove();
                        toastr.success(response.message);
                        $('.upload__img-wrap').html('');
                        $('#tag_table').DataTable().ajax.reload(null, false);
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

        function editTag(id) {
            var formdata = new FormData();
            formdata.append('tag_id', id);
            formdata.append('action', 'get');
            $.ajax({
                url: "{{ url('api/tags') }}",
                method: "POST",
                data: formdata,
                processData: false,
                dataType: "json",
                contentType: false,
                beforeSend: function() {},
                success: function(response) {
                    //console.log(response);
                    if (response.status) {
                        $("[name='tag_id']").val(response.data.id);
                        $("[name='name']").val(response.data.name);
                        $("[name='image']").after('<img src="' + response.data.image+'">');
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

        function changeStatus(id, status) {
            var formdata = new FormData();
            formdata.append('tag_id', id);
            formdata.append('status', status);
            formdata.append('action', 'change_status');
            $.ajax({
                url: "{{ url('api/tags') }}",
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
                        $('#tag_table').DataTable().ajax.reload(null, false);
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

        jQuery(document).ready(function() {
            ImgUpload();
        });

        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload__inputfile').each(function() {
                $(this).on('change', function(e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function(f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var html =
                                        "<div class='upload__img-box'><div style='background-image: url(" +
                                        e.target.result + ")' data-number='" + $(
                                            ".upload__img-close").length + "' data-file='" + f
                                        .name +
                                        "' class='img-bg'></div></div>";
                                    imgWrap.html(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });
        }
    </script>
@endpush
