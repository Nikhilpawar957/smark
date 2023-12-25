@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard')
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
@endpush
@section('content')
    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="card-box mb-30 px-3 py-2">
                <div class="title pb-2">
                    <h2 class="h3 mb-0 section-title">Campaign Influencer List</h2>
                </div>
                <div class="row pb-10">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="form-group mb-0">
                            <select class="form-control form-control-sm selectpicker">
                                <option value="" selected>Select Campaign</option>
                                <option value="">Aditya Birla Demat</option>
                                <option value="">Yes Securities Demat</option>
                                <option value="">mStock Demat</option>
                                <option value="">WOW Skin</option>
                                <option value="">Motilal Oswal Demat</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="form-group mb-0">
                            <select class="form-control form-control-sm selectpicker">
                                <option value="" selected>Select Category</option>
                                <option value="">Option1</option>
                                <option value="">Option2</option>
                                <option value="">Option3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3">
                        <div class="inv-btn">
                            <button class="btn btn-green">Invite Influencers</button>
                        </div>
                    </div>
                </div>
                <div class="row pd-20 pt-0">
                    <div class="tab wd100">
                        <ul class="nav nav-tabs customtab pink-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#actve" role="tab">Active (35)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#invited" role="tab">Invited (12)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#rejected" role="tab">Rejected (0)</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="actve" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="data-table table hover nowrap">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Sr No</th>
                                                <th>Influencer Name</th>
                                                <th>Campaign Name</th>
                                                <th class="text-center">Influencer Category</th>
                                                <th>Followers</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2"
                                                        width="30" height="30" alt="" /> Samurai</td>
                                                <td>
                                                    Aditya Birla Demat
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge grey">Finance</span>
                                                </td>
                                                <td>468</td>

                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2"
                                                        width="30" height="30" alt="" /> Samurai</td>
                                                <td>
                                                    Aditya Birla Demat
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge grey">Finance</span>
                                                </td>
                                                <td>468</td>

                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2"
                                                        width="30" height="30" alt="" /> Samurai</td>
                                                <td>
                                                    Aditya Birla Demat
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge grey">Finance</span>
                                                </td>
                                                <td>468</td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="invited" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="data-table table hover nowrap">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Sr No</th>
                                                <th>Influencer Name</th>
                                                <th>Campaign Name</th>
                                                <th class="text-center">Influencer Category</th>
                                                <th>Followers</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2"
                                                        width="30" height="30" alt="" /> Jannat</td>
                                                <td>
                                                    Aditya Birla Demat
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge grey">Finance</span>
                                                </td>
                                                <td>468</td>

                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2"
                                                        width="30" height="30" alt="" /> Jannat</td>
                                                <td>
                                                    Aditya Birla Demat
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge grey">Finance</span>
                                                </td>
                                                <td>468</td>

                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2"
                                                        width="30" height="30" alt="" /> Jannat</td>
                                                <td>
                                                    Aditya Birla Demat
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge grey">Finance</span>
                                                </td>
                                                <td>468</td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="rejected" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="data-table table hover nowrap">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Sr No</th>
                                                <th>Influencer Name</th>
                                                <th>Campaign Name</th>
                                                <th class="text-center">Influencer Category</th>
                                                <th>Followers</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2"
                                                        width="30" height="30" alt="" /> Lexi</td>
                                                <td>
                                                    Aditya Birla Demat
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge grey">Finance</span>
                                                </td>
                                                <td>468</td>

                                            </tr>
                                            <tr>
                                                <td class="text-center">2</td>
                                                <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2"
                                                        width="30" height="30" alt="" /> Lexi</td>
                                                <td>
                                                    Aditya Birla Demat
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge grey">Finance</span>
                                                </td>
                                                <td>468</td>

                                            </tr>
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td><img src="{{ asset('assets/src/img/table-user.svg') }}" class="border-radius-100 mr-2"
                                                        width="30" height="30" alt="" /> Lexi</td>
                                                <td>
                                                    Aditya Birla Demat
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge grey">Finance</span>
                                                </td>
                                                <td>468</td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
