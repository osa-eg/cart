@extends('layouts.app')
@push('css')
    <style>
        .svg-lg{
            height: 310px;
        }
        .svg-sm{
            height: 120px;
        }
        .logo{
            height: 100px;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{__('overview.hi_welcome')}}</h2>
                    <p class="mg-b-0">{{__('overview.sales_monitoring_dashboard')}}</p>
                </div>
            </div>
            <div class="main-dashboard-header-right">

                <div class="" >
                    <label class="tx-13 mb-2" >{{__('overview.all_users')}}</label>
                    <h5 id="user_count">

                    </h5>
                </div>
                <div class="" >
                    <label class="tx-13 mb-2" >{{__('overview.annual_ads')}}</label>
                    <h5 id="annual_ads">

                    </h5>
                </div>
                <div class="" >
                    <label class="tx-13 mb-2" >{{__('overview.annual_orders')}}</label>
                    <h5 id="annual_orders">

                    </h5>
                </div>
            </div>
        </div>
        <div class="row row-sm">
            <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-primary-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">{{__('overview.month_ads')}}</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 font-weight-bold mb-1 text-white" id="month_ads_now"></h4>
                                    <p class="mb-0 tx-12 text-white op-7">{{__('overview.compare_to_last_month')}}</p>
                                </div>
                                <span class="float-right my-auto mr-auto">
                                    <i class="fas fa-arrow-circle-up text-white" id="ads_icon"></i>
                                <span class="text-white op-7" id="month_ads_compare"> </span>
                            </span>
                            </div>
                        </div>
                    </div>
                    <span id="compositeline" class="pt-1"><canvas width="296" height="30" style="display: inline-block; width: 296px; height: 30px; vertical-align: top;"></canvas></span>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-success-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">{{__('overview.month_orders')}}</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 font-weight-bold mb-1 text-white" id="month_orders_now"></h4>
                                    <p class="mb-0 tx-12 text-white op-7">{{__('overview.compare_to_last_month')}}</p>
                                </div>
                                <span class="float-right my-auto mr-auto">
                                    <i class="fas fa-arrow-circle-up text-white" id="orders_icon"></i>
                                    <span class="text-white op-7" id="month_orders_compare"> </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <span id="compositeline2" class="pt-1"><canvas width="296" height="30" style="display: inline-block; width: 296px; height: 30px; vertical-align: top;"></canvas></span>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-danger-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white">{{__('overview.month_reports')}}</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h4 class="tx-20 font-weight-bold mb-1 text-white" id="month_reports_now"></h4>
                                    <p class="mb-0 tx-12 text-white op-7">{{__('overview.compare_to_last_month')}}</p>
                                </div>
                                <span class="float-right my-auto mr-auto">
                                    <i class="fas fa-arrow-circle-up text-white" id="reports_icon"></i>
                                    <span class="text-white op-7" id="month_reports_compare"> </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <span id="compositeline3" class="pt-1"><canvas width="296" height="30" style="display: inline-block; width: 296px; height: 30px; vertical-align: top;"></canvas></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            {{__('months.ads_number')}}
                        </div>
                        <p class="mg-b-20">{{__('months.ads_number_desc')}}</p>
                        <div class="form-group">
                            <select class="my-2 form-control" id="monthChartSelect">
                                @for ($i = 0; $i < 5; $i++)
                                    <option @if($i==0) selected @endif value="{{\Carbon\Carbon::now()->subYears($i)->format('Y')}}">{{\Carbon\Carbon::now()->subYears($i)->format('Y')}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="chartjs-wrapper-demo">
                            <canvas id="chartLine1"></canvas>
                        </div>
                        <div class="text-center">
                            <span class="badge" style="background-color:#f7557a ">{{__('chart.props')}}</span>
                            <span class="badge" style="background-color:#5a55f7 ">{{__('chart.electronic')}}</span>
                            <span class="badge" style="background-color:#17cc9a ">{{__('chart.motors')}}</span>
                            <span class="badge" style="background-color:#0f4f3b ">{{__('chart.job')}}</span>
                            <span class="badge" style="background-color:#FD0000C3 ">{{__('chart.household')}}</span>
                            <span class="badge" style="background-color:#5c835c ">{{__('chart.home_furniture')}}</span>
                            <span class="badge" style="background-color:#7a650e ">{{__('chart.misc')}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="row">
                    @each('components.backend.dash-category-card',\App\Models\Category::parents()->get(),'item' )
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            {{__('months.orders_number')}}
                        </div>
                        <p class="mg-b-20">{{__('months.orders_number_desc')}}</p>
                        <div class="form-group">
                            <select class="my-2 form-control" id="ordersChartSelect">
                                @for ($i = 0; $i < 5; $i++)
                                    <option @if($i==0) selected @endif value="{{\Carbon\Carbon::now()->subYears($i)->format('Y')}}">{{\Carbon\Carbon::now()->subYears($i)->format('Y')}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="chartjs-wrapper-demo">
                            <canvas id="ordersChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            {{__('months.reports_number')}}
                        </div>
                        <p class="mg-b-20">{{__('months.reports_number_desc')}}</p>
                        <div class="form-group">
                            <select class="my-2 form-control" id="reportsChartSelect">
                                @for ($i = 0; $i < 5; $i++)
                                    <option @if($i==0) selected @endif value="{{\Carbon\Carbon::now()->subYears($i)->format('Y')}}">{{\Carbon\Carbon::now()->subYears($i)->format('Y')}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="chartjs-wrapper-demo">
                            <canvas id="reportsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mg-t-20 mg-xl-t-0">
                <div class="card">

                    <div class="card-header">
                        <p class=" main-content-label tx-12 mg-b-15">{{__('months.ads_cities_number')}}</p>
                        <p class="mg-b-20">{{__('months.ads_cities_number_desc')}}</p>
                    </div>
                    <div class="card-body">
                        <div class="form-group m-4">
                            <select class="my-2 form-control" id="citiesChartSelect">
                                @for ($i = 0; $i < 5; $i++)
                                    <option @if($i==0) selected @endif value="{{\Carbon\Carbon::now()->subYears($i)->format('Y')}}">{{\Carbon\Carbon::now()->subYears($i)->format('Y')}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="ht-200 ht-lg-250 ">
                            <canvas id="chartBar3"></canvas>
                        </div>
                    </div>

                </div>

            </div>

        </div>


    </div>




@endsection
@push('js')
    <style>
        .newpdsds{
            color: #17cc9a;
        }
    </style>
    <script src="{{asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <script async>
        $.get('{{route('api.getDashBordData')}}').then((res)=>{
            $('#user_count').text(res.user_count);
            $('#annual_ads').text(res.annual_ads);
            $('#annual_orders').text(res.annual_orders);
            const ads = res.month_ads.now;
            const ads_c = res.month_ads.compare;
            $('#month_ads_now').text(ads);
            if(ads < ads_c ) $('#ads_icon').removeClass('fa-arrow-circle-up').addClass('fa-arrow-circle-dwen');
            $('#month_ads_compare').text(ads_c);
            const reports = res.month_reports.now;
            const reports_c = res.month_reports.compare;
            if(reports < reports_c ) $('#reports_icon').removeClass('fa-arrow-circle-up').addClass('fa-arrow-circle-dwen');
            $('#month_reports_now').text(reports);
            $('#month_reports_compare').text(reports_c);

            const orders = res.month_orders.now;
            const orders_c = res.month_orders.compare;
            if(orders < orders_c ) $('#orders_icon').removeClass('fa-arrow-circle-up').addClass('fa-arrow-circle-dwen');

            $('#month_orders_now').text(orders);
            $('#month_orders_compare').text(orders_c);
        });

        let chart,cityChart,reportsChart,ordersChart ;
        var ctx8 = document.getElementById('chartLine1');
        var ordersEl = document.getElementById('ordersChart');
        var reportsEl = document.getElementById('reportsChart');
        $.get('{{route('api.api_chart_ads_months')}}').then((res)=>{
            chart =  new Chart(ctx8, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                        {
                            data: res.props,
                            borderColor: '#f7557a',
                            borderWidth: 1,
                            fill: false
                        },{
                            data: res.motors,
                            borderColor: '#17cc9a',
                            borderWidth: 1,
                            fill: false
                        },{
                            data: res.electronic,
                            borderColor: '#5a55f7',
                            borderWidth: 1,
                            fill: false
                        },{
                            data: res.job,
                            borderColor: '#0f4f3b',
                            borderWidth: 1,
                            fill: false
                        },{
                            data: res.misc,
                            borderColor: '#7a650e',
                            borderWidth: 1,
                            fill: false
                        },{
                            data: res.household,
                            borderColor: '#FD0000C3',
                            borderWidth: 1,
                            fill: false
                        },{
                            data: res.home_furniture,
                            borderColor: '#5c835c',
                            borderWidth: 1,
                            fill: false
                        },
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                        labels: {
                            display: false
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontSize: 12,
                                max: 200,
                                fontColor: "rgb(171, 167, 167,0.9)",
                            },
                            gridLines: {
                                display: true,
                                color: 'rgba(171, 167, 167,0.2)',
                                drawBorder: false
                            },
                        }],
                        xAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontSize: 11,
                                fontColor: "rgb(171, 167, 167,0.9)",
                            },
                            gridLines: {
                                display: true,
                                color: 'rgba(171, 167, 167,0.2)',
                                drawBorder: false
                            },
                        }]
                    }
                }
            });
        });
        $('#monthChartSelect').change(function(){
            let year = this.value;
            console.log(chart);
            $.get('{{url('api/v1/months_ads_chart/')}}'+'/'+year).then((res) =>{
                chart.data = {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                        {
                            data: res.props,
                            borderColor: '#f7557a',
                            borderWidth: 1,
                            fill: false
                        },{
                            data: res.motors,
                            borderColor: '#17cc9a',
                            borderWidth: 1,
                            fill: false
                        },{
                            data: res.electronic,
                            borderColor: '#5a55f7',
                            borderWidth: 1,
                            fill: false
                        },{
                            data: res.job,
                            borderColor: '#0f4f3b',
                            borderWidth: 1,
                            fill: false
                        },{
                            data: res.misc,
                            borderColor: '#7a650e',
                            borderWidth: 1,
                            fill: false
                        },{
                            data: res.household,
                            borderColor: '#FD0000C3',
                            borderWidth: 1,
                            fill: false
                        },{
                            data: res.home_furniture,
                            borderColor: '#5c835c',
                            borderWidth: 1,
                            fill: false
                        },
                    ]
                };
                chart.update();

            });
        })

        $.get('{{route('api.api_chart_orders_months')}}').then((res)=>{
            ordersChart =  new Chart(ordersEl, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                        {
                            data: res,
                            borderColor: '#00F171FF',
                            borderWidth: 1,
                            fill: false
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                        labels: {
                            display: false
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontSize: 12,
                                max: 2000,
                                fontColor: "rgb(171, 167, 167,0.9)",
                            },
                            gridLines: {
                                display: true,
                                color: 'rgba(171, 167, 167,0.2)',
                                drawBorder: false
                            },
                        }],
                        xAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontSize: 11,
                                fontColor: "rgb(171, 167, 167,0.9)",
                            },
                            gridLines: {
                                display: true,
                                color: 'rgba(171, 167, 167,0.2)',
                                drawBorder: false
                            },
                        }]
                    }
                }
            });
        });
        $('#ordersChartSelect').change(function(){
            let year = this.value;
            $.get('{{url('api/v1/months_orders_chart/')}}'+'/'+year).then((res) =>{
                ordersChart.data = {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                        {
                            data: res,
                            borderColor: '#00f171',
                            borderWidth: 1,
                            fill: false
                        }
                    ]
                };
                ordersChart.update();

            });
        })

        $.get('{{route('api.api_chart_reports_months')}}').then((res)=>{
            reportsChart =  new Chart(reportsEl, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                        {
                            data: res,
                            borderColor: '#f8003a',
                            borderWidth: 1,
                            fill: false
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                        labels: {
                            display: false
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontSize: 12,
                                max: 2000,
                                fontColor: "rgb(171, 167, 167,0.9)",
                            },
                            gridLines: {
                                display: true,
                                color: 'rgba(171, 167, 167,0.2)',
                                drawBorder: false
                            },
                        }],
                        xAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontSize: 11,
                                fontColor: "rgb(171, 167, 167,0.9)",
                            },
                            gridLines: {
                                display: true,
                                color: 'rgba(171, 167, 167,0.2)',
                                drawBorder: false
                            },
                        }]
                    }
                }
            });
        });
        $('#reportsChartSelect').change(function(){
            let year = this.value;
            $.get('{{url('api/v1/months_orders_chart/')}}'+'/'+year).then((res) =>{
                reportsChart.data = {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                        {
                            data: res,
                            borderColor: '#ff003b',
                            borderWidth: 1,
                            fill: false
                        }
                    ]
                };
                reportsChart.update();

            });
        })


        var ctx3 = document.getElementById('chartBar3').getContext('2d');
        var gradient = ctx3.createLinearGradient(0, 0, 0, 250);

        gradient.addColorStop(0, '#00b2b2');
        gradient.addColorStop(1, 'rgba(41,128,92,0.8)');
        $.get('{{route('api.api_chart_citiesChart',app()->getLocale())}}').then((res)=>{
            cityChart = new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels: res.labels,
                    datasets: [{
                        label: '{{__('chart.of_ads')}}',
                        data: res.data,
                        backgroundColor: gradient
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: false,
                        labels: {
                            display: false
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                fontSize: 10,
                                max: 1000,
                                fontColor: "rgb(171, 167, 167,0.9)",
                            },
                            gridLines: {
                                display: true,
                                color: 'rgba(171, 167, 167,0.2)',
                                drawBorder: false
                            },
                        }],
                        xAxes: [{
                            barPercentage: 0.6,
                            ticks: {
                                beginAtZero: true,
                                fontSize: 11,
                                fontColor: "rgb(171, 167, 167,0.9)",
                            },
                            gridLines: {
                                display: true,
                                color: 'rgba(171, 167, 167,0.2)',
                                drawBorder: false
                            },
                        }]
                    }
                }
            });

        });
        $('#citiesChartSelect').change(function(){
            let year = this.value;
            $.get('{{url('api/v1/cities_chart/'.app()->getLocale())}}'+'/'+year).then((res) =>{
                cityChart.data =  {
                    labels: res.labels,
                    datasets: [{
                        label: '{{__('chart.of_ads')}}',
                        data: res.data,
                        backgroundColor: gradient
                    }]
                };
                cityChart.update();

            });
        })

    </script>

@endpush
