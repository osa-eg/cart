@extends('layouts.app')

@section('content')
    <nav class="breadcrumb-header bg-white justify-content-between p-3 rounded-5">
        <div>
            <ol class="breadcrumb bg-transparent ">
                <li class="breadcrumb-item text-sm "><a class="opacity-5 " href="{{route('admin')}}">{{__('dashboard.dashboard')}}</a></li>
                <li class="breadcrumb-item text-sm "><a class="opacity-5 " href="{{route('category.index')}}">{{__('category.title')}}</a></li>
                @if($category->parent)
                    <li class="breadcrumb-item text-sm "><a class="opacity-5 " href="{{route('category.show',$category->parent)}}">{{$category->parent->name}}</a></li>
                @endif
                <li class="breadcrumb-item text-sm  active" aria-current="page">{{__('category.details')}}</li>
            </ol>
            <h6 class="font-weight-bolder">{{$category->name}}</h6>
        </div>
        <div>
            <x-delete-btn :route="route('category.destroy',$category)" :class="'btn btn-outline-danger btn-sm m-1py-1'" :name="true" :showIcon="false"></x-delete-btn>
            <a href="{{route('category.toggle_active',$category)}}" class="btn  @if($category->active) btn-outline-secondary @else  btn-outline-success @endif btn-sm py-1 m-1 ">  {{$category->active?__('btn.dactivate'):__('btn.activate')}} </a>
            <a href="{{route('category.edit',$category)}}" class="btn btn-outline-primary btn-sm py-1 m-1 ">  {{__('btn.edit')}} </a>
            <a href="{{route('category.index')}}" class="btn btn-outline-dark btn-sm py-1 m-1 ">  {{__('btn.back')}} </a>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4>{{__('main.main_details')}}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            @foreach(config('settings.locales') as $lang)
                                <tr>
                                    <th>{{__('keys.name')}} ({{$lang}})</th>
                                    <td>{{$category->translate($lang)->name}}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <th>{{__('keys.children_count')}}</th>
                                <td class="text-sm">{{$category->children()->count()}}</td>
                            </tr>
                            <tr>
                                <th>{{__('keys.products_count')}}</th>
                                <td class="text-sm">{{$category->products()->count()}}</td>
                            </tr>
                            <tr>
                                <th>{{__('keys.children_products_count')}}</th>
                                <td class="text-sm">{{$category->children_products()->count()}}</td>
                            </tr>
                            <tr>
                                <th>{{__('keys.status')}}</th>
                                <td class="text-sm">{!! $category->active?"<span class='badge badge-success'>".__('keys.active')."</span>":"<span class='badge badge-secondary'>".__('keys.inactive')."</span>" !!}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if(!$category->parent_id)
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4>{{__('category.children')}}</h4>

                    <form class="row">
                        @csrf
                        <div class="col-md-10 input-group">
                            <input type="text" class="form-control" placeholder="{{__('main.enter_name')}}" name="child_name" value="{{request()->child_name??''}}">
                            <button class="input-group-append btn btn-primary" type="submit">{{__('btn.search')}}</button>
                            @if(request()->has('child_name'))
                                <a href="{{url()->current()}}" class="input-group-append btn btn-secondary" type="submit">{{__('btn.clear_search')}}</a>
                            @endif
                        </div>
                    </form>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-flush" id="products-list">
                            <thead class="thead-light">
                            <tr>
                                <th>{{__('keys.sequence')}}</th>
                                <th>{{__('keys.name')}}</th>
                                <th>{{__('keys.products_count')}}</th>
                                <th>{{__('keys.status')}}</th>
                                <th>{{__('keys.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($children as $item)
                                <tr>
                                    <td>{{$loop->iteration}} </td>
                                    <td class="text-sm">{{$item->name}}</td>
                                    <td class="text-sm">{{$item->products_count}}</td>
                                    <td class="text-sm">{!! $item->active?"<span class='badge badge-success'>".__('keys.active')."</span>":"<span class='badge badge-secondary'>".__('keys.inactive')."</span>" !!}</td>
                                    <td class="text-sm">
                                        <a href="{{route('category.show',$item)}}" class="mx-1" title="{{__('btn.show')}} ">
                                            <i class="fas fa-eye text-primary"></i>
                                        </a>
                                        <a href="{{route('category.toggle_active',$item)}}" class="mx-1" title="{{$item->active?__('btn.dactivate'):__('btn.activate')}} ">
                                            <i class="fas fa-dot-circle @if($item->active) text-secondary @else  text-success @endif "></i>
                                        </a>
                                        <a href="{{route('category.edit',$item)}}" class="mx-1"  title="{{__('btn.edit')}} ">
                                            <i class="fas fa-edit text-warning"></i>
                                        </a>
                                        <x-delete-btn :route="route('category.destroy',$item)"></x-delete-btn>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">{{__('category.no_saved_categories')}}</td>
                                </tr>
                            @endforelse
                            </tbody>

                        </table>
                    </div>
                    {{$children->links()}}
                </div>
            </div>
        </div>
        @else
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h4>{{__('products.title')}}</h4>

                        <form class="row">
                            @csrf
                            <div class="col-md-10 input-group">
                                <input type="text" class="form-control" placeholder="{{__('main.enter_name')}}" name="product_name" value="{{request()->product_name??''}}">
                                <button class="input-group-append btn btn-primary" type="submit">{{__('btn.search')}}</button>
                                @if(request()->has('product_name'))
                                    <a href="{{url()->current()}}" class="input-group-append btn btn-secondary" type="submit">{{__('btn.clear_search')}}</a>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-flush" id="products-list">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>{{__('keys.sequence')}}</th>
                                        <th>{{__('keys.name')}}</th>
                                        <th>{{__('keys.qty')}}</th>
                                        <th>{{__('keys.price')}}</th>
                                        <th>{{__('keys.status')}}</th>
                                        <th>{{__('keys.action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($products as $item)
                                        <tr>
                                            <td>{{$loop->iteration}} </td>
                                            <td class="text-sm">{{$item->name}}</td>
                                            <td class="text-sm">{{$item->qty}}</td>
                                            <td class="text-sm">{{$item->price}}</td>
                                            <td class="text-sm">{!! $item->active?"<span class='badge badge-success'>".__('keys.active')."</span>":"<span class='badge badge-secondary'>".__('keys.inactive')."</span>" !!}</td>
                                            <td class="text-sm">
                                                <a href="{{route('category.show',$item)}}" class="mx-1" title="{{__('btn.show')}} ">
                                                    <i class="fas fa-eye text-primary"></i>
                                                </a>
                                                <a href="{{route('category.toggle_active',$item)}}" class="mx-1" title="{{$item->active?__('btn.dactivate'):__('btn.activate')}} ">
                                                    <i class="fas fa-dot-circle @if($item->active) text-secondary @else  text-success @endif "></i>
                                                </a>
                                                <a href="{{route('category.edit',$item)}}" class="mx-1"  title="{{__('btn.edit')}} ">
                                                    <i class="fas fa-edit text-warning"></i>
                                                </a>
                                                <x-delete-btn :route="route('category.destroy',$item)"></x-delete-btn>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">{{__('product.no_saved_products')}}</td>
                                        </tr>
                                    @endforelse
                                    </tbody>

                                </table>
                            </div>
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        @endif
    </div>
@stop