@extends('layouts.app')

@section('content')
    <nav class="breadcrumb-header bg-white justify-content-between p-3 rounded-5">
        <div>
            <ol class="breadcrumb bg-transparent ">
                <li class="breadcrumb-item text-sm "><a class="opacity-5 " href="{{route('admin')}}">{{__('dashboard.dashboard')}}</a></li>
                <li class="breadcrumb-item text-sm "><a class="opacity-5 " href="{{route('product.index')}}">{{__('product.title')}}</a></li>

                <li class="breadcrumb-item text-sm  active" aria-current="page">{{__('product.details')}}</li>
            </ol>
            <h6 class="font-weight-bolder">{{$product->name}}</h6>
        </div>
        <div>
            <x-delete-btn :route="route('product.destroy',$product)" :class="'btn btn-outline-danger btn-sm m-1py-1'" :name="true" :showIcon="false"></x-delete-btn>
            <a href="{{route('product.toggle_active',$product)}}" class="btn  @if($product->active) btn-outline-secondary @else  btn-outline-success @endif btn-sm py-1 m-1 ">  {{$product->active?__('btn.dactivate'):__('btn.activate')}} </a>
            <a href="{{route('product.edit',$product)}}" class="btn btn-outline-primary btn-sm py-1 m-1 ">  {{__('btn.edit')}} </a>
            <a href="{{route('product.index')}}" class="btn btn-outline-dark btn-sm py-1 m-1 ">  {{__('btn.back')}} </a>
        </div>
    </nav>
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body h-100">
                    <div class="row row-sm ">
                        <div class=" col-xl-5 col-lg-12 col-md-12">
                            <div class="preview-pic tab-content">
                                @foreach($product->getMedia('images') as $image )
                                <div class="tab-pane @if($loop->first) active @endif" id="pic-{{$loop->iteration}}"><img src="{{$image->getUrl()}}" alt="image"/></div>
                                @endforeach
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                               @foreach($product->getMedia('images') as $image )
                                    <li @if($loop->first) class="active" @endif><a data-target="#pic-{{$loop->iteration}}" data-toggle="tab"><img src="{{$image->getUrl('thumb')}}" alt="image"/></a></li>

                                @endforeach
                            </ul>
                        </div>
                        <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                            <h4 class="product-title mb-1">{{$product->name}}</h4>


                            <h6 class="price">{{__('keys.price')}}: <span class="h3 ml-2">{{$product->price}}$</span></h6>
                            <h6 class="price">{{__('keys.qty')}}: <span class="h3 ml-2">{{$product->qty}}</span></h6>
                            <div class="product-description">{!! $product->description !!} </div>
                            <table class="table table-striped mt-4">
                                <tr>
                                    <th>{{__('keys.created_at')}}</th>
                                    <td>{{$product->created_at->format('Y-m-d')}}</td>
                                </tr>
                                <tr>
                                    <th>{{__('keys.updated_at')}}</th>
                                    <td>{{$product->updated_at->format('Y-m-d')}}</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop