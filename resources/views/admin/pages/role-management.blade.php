@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Smarkerz - Role Management')
@push('styles')
    {{-- All External Stylesheets Below This --}}
@endpush
@section('content')
    {{-- All Content Below This --}}
    <div class="main-container">
        <div class="p-3">
            <div class="min-height-200px">
                <div class="row">
                    <div class="col-md-12 col-sm-12 mb-10">
                        <div class="title">
                            <h5 class="fw-regular">Role Management</h5>
                        </div>
                    </div>
                </div>
                <div class="card-box mb-10 px-3 py-2">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <select class="custom-select solid-input">
                                    <option value="">Select Role</option>
                                    @foreach (\App\Models\Role::all() as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">Sr. No</th>
                                <th>Function</th>
                                <th>Full Access</th>
                                <th>Add Access</th>
                                <th>Edit Access</th>
                                <th>Delete Access</th>
                                <th>View Access</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Members</td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Campaigns</td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Influencer</td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Report</td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Payout</td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Communication</td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Asset</td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="custom-control custom-checkbox mb-5">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2" />
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-lg-12 text-right mt-10">
                            <button class="btn btn-green mr-3">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{-- All External Scripts Below This --}}
@endpush
