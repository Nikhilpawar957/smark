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
                            <h5 class="mb-2 fw-regular">Offline Leads</h5>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-30 px-3 py-2">
                    <form id="uploadLeads" method="POST" enctype="multipart/form-data"
                    action="{{ route('admin.upload-lead-csv') }}" class="">
                        <div class="row mb-20">
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="form-group mb-0">
                                    <label>Company</label>
                                    <select name="brand_id" class="form-control form-control-sm selectpicker">
                                        <option value="" selected>Select Company</option>
                                        @foreach (\App\Models\Brand::all() as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->company_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-4 br-r0">
                                <div class="form-group">
                                    <input name="csv_file" type="file" accept=".csv" class="form-control-file form-control height-auto" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-gradient mt-1">Upload</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ asset('assets/excel_templates/offlinelead.csv') }}" download="" class="text-dark download-sample m-0">Download Sample Sheet <img
                                        src="{{ asset('assets/src/img/ant-design_download-outlined.svg') }}"
                                        alt=""></a>
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
@endpush
