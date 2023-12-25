@extends('admin.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Dashboard')
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
@endpush
@section('content')

    <div class="main-container">
        <div class="xs-pd-20-10 pd-ltr-20">
            <div class="row pb-10">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="form-group mb-0">
                        <select class="form-control form-control-sm selectpicker">
                            <option value="" selected>Select Company</option>
                            <option value="">Aditya Birla capital</option>
                            <option value="">Aditya Birla capital</option>
                            <option value="">Aditya Birla capital</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-0">
                    <div class="form-group mb-0">
                        <select class="form-control form-control-sm selectpicker">
                            <option value="" selected>Date Range</option>
                            <option value="">Start Date and End Date</option>
                            <option value="">Start Date and End Date</option>
                            <option value="">Start Date and End Date</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-box blue-bg mb-4">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <h5 class="card-title text-center pl-20 pr-20">Lead Summary</h5>
                        <button type="button" class="btn light-blue-btn">
                            View Full Report <img src="{{ asset('assets/src/img/arrow.svg') }}">
                        </button>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card-box height-100-p stats-card">
                                    <div class="">
                                        <div class="stats-icon">
                                            <img src="{{ asset('assets/src/img/leads.svg') }}">
                                        </div>
                                        <div class="widget-data pt-3">
                                            <div class="font-14 text-secondary weight-500 grey-color pb-4 line-height-1-3">
                                                Total <br />Leads
                                            </div>
                                            <div class="weight-600 font-24 text-dark">20000</div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card-box height-100-p stats-card">
                                    <div class="">
                                        <div class="stats-icon">
                                            <img src="{{ asset('assets/src/img/conversions.svg') }}" class="brawn-icon">
                                        </div>
                                        <div class="widget-data pt-3">
                                            <div class="font-14 text-secondary weight-500 grey-color pb-4 line-height-1-3">
                                                Total <br /> Conversions
                                            </div>
                                            <div class="weight-600 font-24 text-dark">5000</div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card-box height-100-p stats-card">
                                    <div class="">
                                        <div class="stats-icon">
                                            <img src="{{ asset('assets/src/img/transaction.svg') }}">
                                        </div>
                                        <div class="widget-data pt-3">
                                            <div class="font-14 text-secondary weight-500 grey-color pb-4 line-height-1-3">
                                                Total <br /> Transactions
                                            </div>
                                            <div class="weight-600 font-24 text-dark">700</div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card-box height-100-p stats-card">
                                    <div class="">
                                        <div class="stats-icon">
                                            <img src="{{ asset('assets/src/img/income.svg') }}" class="income-icon">
                                        </div>
                                        <div class="widget-data pt-3">
                                            <div class="font-14 text-secondary weight-500 grey-color pb-4 line-height-1-3">
                                                Estimated <br /> Income*
                                            </div>
                                            <div class="weight-600 font-24 text-dark">₹ 20K</div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="row pb-30">
                        <div class="col-md-12">
                            <div class="card-box height-100-p pd-20 rank-box">
                                <div class="grap-head d-flex justify-content-between">
                                    <h5 class="font-16 weight-500 mb-3">New Influencer Registration <img class="info-badge1"
                                            src="{{ asset('assets/src/img/info.svg') }}" data-toggle="tooltip"
                                            data-placement="top" title=""
                                            data-original-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit">
                                    </h5>
                                    <span class="count-grp">54</span>
                                </div>
                                <div>
                                    <div id="chart-container" style="width: 100%;height: 200px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="row pb-30">
                        <div class="col-md-12">
                            <div class="card-box height-100-p pd-20 rank-box">
                                <div class="grap-head d-flex justify-content-between">
                                    <h5 class="font-16 weight-500 mb-3">Total Influencers <img class="info-badge1"
                                            src="{{ asset('assets/src/img/info.svg') }}" data-toggle="tooltip"
                                            data-placement="top" title=""
                                            data-original-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit">
                                    </h5>
                                    <span class="count-grp">327</span>
                                </div>
                                <div>
                                    <div id="chart-container1" style="width: 100%;height: 200px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-2 pb-2">
                <div class="col-lg-12">
                    <h5 class="card-title mb-2">Overall Leads Acquired</h5>
                    <div class="card-box height-100-p pd-20 rank-box">
                        <div>
                            <div id="chart-container2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="title pb-1">
                <h2 class="h3 mb-0 section-title">Influencer Demographics</h2>
            </div>
            <div class="row pb-30">
                <div class="col-md-6">
                    <div class="card-box height-100-p pd-20">
                        <h6 class="heading text-center">Category</h6>
                        <div id="admin-dashboard-chart3"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-box height-100-p pd-20">
                        <h6 class="heading text-center">Channel</h6>
                        <div id="admin-dashboard-chart4"></div>
                    </div>
                </div>
            </div>
            <div class="row pb-30">
                <div class="col-md-12">
                    <div class="card-box height-100-p pd-20">
                        <div class="h5 mb-2">Top Performing Influencers</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Influencer Name</th>
                                    <th>Campaign</th>
                                    <th class="text-center">Leads</th>
                                    <th class="text-center">Accounts Opened</th>
                                    <th class="text-center">Total amount earned</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="{{ asset('assets/src/img/table-user.svg') }}"
                                            class="border-radius-100 mr-2" width="30" height="30"
                                            alt="" /> Samurai
                                    </td>
                                    <td>Dhani Store</td>
                                    <td class="text-center">19</td>
                                    <td class="text-center">6</td>
                                    <td class="text-center">2000</td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{ asset('assets/src/img/table-user.svg') }}"
                                            class="border-radius-100 mr-2" width="30" height="30"
                                            alt="" /> Jannat
                                    </td>
                                    <td>Aditya Birla Capital</td>
                                    <td class="text-center">19</td>
                                    <td class="text-center">6</td>
                                    <td class="text-center">2000</td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{ asset('assets/src/img/table-user.svg') }}"
                                            class="border-radius-100 mr-2" width="30" height="30"
                                            alt="" /> Lexi
                                    </td>
                                    <td>Axis Mutual Funds</td>
                                    <td class="text-center">19</td>
                                    <td class="text-center">6</td>
                                    <td class="text-center">2000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row pb-30">
                <div class="col-md-12">
                    <div class="card-box height-100-p pd-20">
                        <div class="h5 mb-2">Top Performing Campaigns</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Campaign</th>
                                    <th class="text-center">Leads</th>
                                    <th class="text-center">Accounts Opened</th>
                                    <th class="text-center">Transactions</th>
                                    <th class="text-center">Total amount earned</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="{{ asset('assets/src/img/table-user.svg') }}"
                                            class="border-radius-100 mr-2" width="30" height="30"
                                            alt="" /> Dhani Store</td>
                                    <td class="text-center">19</td>
                                    <td class="text-center">6</td>
                                    <td class="text-center">4</td>
                                    <td class="text-center">2000</td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{ asset('assets/src/img/table-user.svg') }}"
                                            class="border-radius-100 mr-2" width="30" height="30"
                                            alt="" /> Aditya Birla Capital
                                    </td>
                                    <td class="text-center">19</td>
                                    <td class="text-center">6</td>
                                    <td class="text-center">4</td>
                                    <td class="text-center">2000</td>
                                </tr>
                                <tr>
                                    <td><img src="{{ asset('assets/src/img/table-user.svg') }}"
                                            class="border-radius-100 mr-2" width="30" height="30"
                                            alt="" /> Axis Mutual Funds</td>
                                    <td class="text-center">19</td>
                                    <td class="text-center">6</td>
                                    <td class="text-center">4</td>
                                    <td class="text-center">2000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row pb-30">
                <div class="col-md-12">
                    <div class="card-box height-100-p pd-20">
                        <div class="h5 mb-2">Poor Performing Campaigns</div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th></th> -->
                                    <th>Campaign</th>
                                    <th class="text-center">Leads</th>
                                    <th class="text-center">Accounts Opened</th>
                                    <th class="text-center">Transactions</th>
                                    <th class="text-center">Total amount earned</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="{{ asset('assets/src/img/table-user.svg') }}"
                                            class="border-radius-100 mr-2" width="30" height="30"
                                            alt="" /> Dhani Store</td>
                                    <td class="text-center">19</td>
                                    <td class="text-center">6</td>
                                    <td class="text-center">4</td>
                                    <td class="text-center">2000</td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{ asset('assets/src/img/table-user.svg') }}"
                                            class="border-radius-100 mr-2" width="30" height="30"
                                            alt="" /> Aditya Birla Capital
                                    </td>
                                    <td class="text-center">19</td>
                                    <td class="text-center">6</td>
                                    <td class="text-center">4</td>
                                    <td class="text-center">2000</td>
                                </tr>
                                <tr>
                                    <td><img src="{{ asset('assets/src/img/table-user.svg') }}"
                                            class="border-radius-100 mr-2" width="30" height="30"
                                            alt="" /> Axis Mutual Funds</td>
                                    <td class="text-center">19</td>
                                    <td class="text-center">6</td>
                                    <td class="text-center">4</td>
                                    <td class="text-center">2000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <p class="text-center mb-2"><b>Disclaimer:</b> The amount mentioned under Spent and Income for Companies and
                Influencers may vary after final calculations*</p>
        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{ asset('assets/src/plugins/highcharts-6.0.7/code/highcharts.js') }}"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="{{ asset('assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js') }}"></script>
    <script type="text/javascript">
        Highcharts.chart('chart-container', {
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: '',
                align: 'left'
            },
            xAxis: [{
                visible: false,
                crosshair: {
                    width: 3,
                    color: '#fcf4f8',
                    dashStyle: 'shortdot'
                },
            }],
            yAxis: [{
                visible: false
            }],
            tooltip: {
                shared: true
            },
            credits: {
                enabled: false
            },
            legend: {
                enabled: false
            },
            series: [{
                name: '52',
                color: '#8B189D',
                type: 'spline',
                data: [2, 3, 1, 4, 2, 5, 3, 6],
                tooltip: {
                    valueSuffix: 'mm'
                }
            }]
        });
    </script>
    <script type="text/javascript">
        Highcharts.chart('chart-container1', {
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: '',
                align: 'left'
            },
            xAxis: [{
                categories: ['Sept', 'Oct', 'Nov', 'Dec', 'Jan'],
                crosshair: false,
                tickLength: 0,
            }],
            yAxis: [{ // Primary yAxis
                enabled: false,
                title: '',
                gridLineWidth: 0,

            }, { // Secondary yAxis
                title: {
                    text: '',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                },
                labels: {
                    enabled: false,
                },
                gridLineWidth: 0,
                opposite: true
            }],
            tooltip: {
                shared: true
            },
            credits: {
                enabled: false
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                column: {
                    borderRadius: 5
                }
            },
            series: [{
                name: '',
                color: '#8B189D',
                type: 'column',
                yAxis: 1,
                data: [100, 150, 180, 140, 200],
                tooltip: {
                    valueSuffix: ' '
                }

            }]
        });
    </script>
    <script type="text/javascript">
        Highcharts.chart('chart-container2', {
            chart: {
                zoomType: 'xy'
            },
            title: {
                text: '',
                align: 'left'
            },
            xAxis: [{
                categories: ['Jan23', 'Feb23', 'Mar23', 'Apr23', 'May23', 'Jun23',
                    'Jul23'
                ],
                crosshair: {
                    width: 3,
                    color: '#fcf4f8',
                    dashStyle: 'shortdot'
                },
            }],
            yAxis: [{ // Primary yAxis
                labels: {
                    format: '',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                },
                title: {
                    text: 'Leads',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                }
            }, { // Secondary yAxis
                title: {
                    text: 'Income',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                },
                labels: {
                    format: '',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                },
                opposite: true
            }],
            tooltip: {
                shared: true
            },
            credits: {
                enabled: false
            },
            legend: {
                align: 'center',
                x: 0,
                y: 0
            },
            series: [{
                    name: 'Leads',
                    color: 'rgba(99, 85, 216, 1)',
                    type: 'column',
                    yAxis: 1,
                    data: [450, 400, 850, 250, 100, 200, 800],
                    tooltip: {
                        valueSuffix: ' '
                    }

                }, {
                    name: 'Conversion',
                    color: 'rgba(207, 203, 243, 1)',
                    type: 'column',
                    yAxis: 1,
                    data: [380, 350, 420, 250, 80, 130, 440],
                    tooltip: {
                        valueSuffix: ' '
                    }

                },
                {
                    name: 'Transaction',
                    color: 'rgba(207, 203, 243, 1)',
                    type: 'column',
                    yAxis: 1,
                    data: [220, 330, 390, 180, 40, 40, 420],
                    tooltip: {
                        valueSuffix: ' '
                    }

                }, {
                    name: 'Income',
                    color: 'rgba(225, 109, 222, 1)',
                    type: 'spline',
                    data: [400, 450, 200, 100, 150, 400, 600],
                    tooltip: {
                        valueSuffix: ''
                    }
                }
            ]
        });
    </script>
@endpush
