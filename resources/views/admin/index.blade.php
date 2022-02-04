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
        </div>

        <div class="row row-sm">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-6" >
                        <div class="card text-center card-body">
                            <h1><i class="fa fa-users"></i></h1>
                            <label class="tx-13 mb-2" >{{__('overview.all_users')}}</label>
                            <h5 >
                                {{DB::table('users')->count()}}
                            </h5>
                        </div>

                    </div>
                    <div class="col-md-6" >
                        <div class="card text-center card-body">
                            <h1><i class="fa fa-cubes"></i></h1>
                            <label class="tx-13 mb-2" >{{__('overview.all_categories')}}</label>
                            <h5 >
                                {{DB::table('categories')->count()}}
                            </h5>
                        </div>

                    </div>
                    <div class="col-md-6" >
                        <div class="card text-center card-body">
                            <h1><i class="fa fa-list-alt"></i></h1>
                            <label class="tx-13 mb-2" >{{__('overview.all_products')}}</label>
                            <h5>
                                {{DB::table('products')->count()}}
                            </h5>
                        </div>

                    </div>
                    <div class="col-md-6" >
                        <div class="card text-center card-body">
                            <h1><i class="fa fa-shopping-cart"></i></h1>
                            <label class="tx-13 mb-2" >{{__('overview.all_orders')}}</label>
                            <h5>
                                {{DB::table('orders')->count()}}
                            </h5>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-5">
                <div class="card card-body">
                    <label for="">{{__('overview.about_to_finis_products')}}</label>
                    <div class="table-responsive">
                        <table class="table table-flush" id="products-list">
                            <thead class="thead-light">
                            <tr>
                                <th>{{__('keys.image')}}</th>
                                <th>{{__('keys.name')}}</th>
                                <th>{{__('keys.qty')}}</th>
                                <th>{{__('keys.status')}}</th>
                                <th>{{__('keys.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse(\App\Models\Product::aboutToFinish()->get() as $item)
                                <tr>
                                    <td><img src="{{$item->thumb}}" class="img-thumbnail  rounded-circle shadow-sm" style="width:60px ; height:60px " alt=""></td>
                                    <td class="text-sm">{{$item->name}}</td>
                                    <td class="text-sm">{{$item->qty}}</td>
                                    <td class="text-sm">{!! $item->active?"<span class='badge badge-success'>".__('keys.active')."</span>":"<span class='badge badge-secondary'>".__('keys.inactive')."</span>" !!}</td>
                                    <td class="text-sm">
                                        <a href="{{route('product.show',$item)}}" class="mx-1" title="{{__('btn.show')}} ">
                                            <i class="fas fa-eye text-primary"></i>
                                        </a>
                                        <a href="{{route('product.toggle_active',$item)}}" class="mx-1" title="{{$item->active?__('btn.dactivate'):__('btn.activate')}} ">
                                            <i class="fas fa-dot-circle @if($item->active) text-secondary @else  text-success @endif "></i>
                                        </a>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">{{__('product.no_saved_products')}}</td>
                                </tr>
                            @endforelse
                            </tbody>

                        </table>

                    </div>

                </div>
                <div class="card mt-4 card-body">
                    <label for="">{{__('overview.finished_products')}}</label>
                    <div class="table-responsive">
                        <table class="table table-flush" id="products-list">
                            <thead class="thead-light">
                            <tr>
                                <th>{{__('keys.image')}}</th>
                                <th>{{__('keys.name')}}</th>
                                <th>{{__('keys.qty')}}</th>
                                <th>{{__('keys.status')}}</th>
                                <th>{{__('keys.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse(\App\Models\Product::finished()->get() as $finished)
                                <tr>
                                    <td><img src="{{$finished->thumb}}" class="img-thumbnail  rounded-circle shadow-sm" style="width:60px ; height:60px " alt=""></td>
                                    <td class="text-sm">{{$finished->name}}</td>
                                    <td class="text-sm">{{$finished->qty}}</td>
                                    <td class="text-sm">{!! $finished->active?"<span class='badge badge-success'>".__('keys.active')."</span>":"<span class='badge badge-secondary'>".__('keys.inactive')."</span>" !!}</td>
                                    <td class="text-sm">
                                        <a href="{{route('product.show',$finished)}}" class="mx-1" title="{{__('btn.show')}} ">
                                            <i class="fas fa-eye text-primary"></i>
                                        </a>
                                        <a href="{{route('product.toggle_active',$finished)}}" class="mx-1" title="{{$finished->active?__('btn.dactivate'):__('btn.activate')}} ">
                                            <i class="fas fa-dot-circle @if($finished->active) text-secondary @else  text-success @endif "></i>
                                        </a>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">{{__('product.no_saved_products')}}</td>
                                </tr>
                            @endforelse
                            </tbody>

                        </table>

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

@endpush
