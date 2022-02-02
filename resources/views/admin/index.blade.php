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

@endpush
