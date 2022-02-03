@extends('layouts.app')

@section('content')
    <div class="row mb-4 no-gutter justify-content-center">
        <!-- The image half -->
        <div class="col-md-4 col-lg-4 col-xl-4 d-md-flex bg-white py-3 pb-5">
            <div class="row wd-100p mx-auto ">
                <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                    <div class="card-sigin">
                        <x-auth-logo></x-auth-logo>

                        <div class="card-sigin">
                            <div class="main-signup-header">
                                <div class="text-center">
                                    <h2>{{__('main.welcome_back')}}</h2>
                                    <h5 class="font-weight-semibold mb-4">{{__('main.Sign_Up_to_continue')}}.</h5>
                                </div>

                                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('sign_up') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>{{__('main.name')}}</label>
                                        <input name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{__('main.enter_name')}}" type="eamil" value="{{old('username')}}" required>
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('main.email')}}</label>
                                        <input name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('main.enter_email')}}" type="email" value="{{old('email')}}" required>
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('main.phone')}}</label>
                                        <input name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="{{__('main.enter_phone')}}" type="tel" value="{{old('phone')}}" required>
                                        @error('phone')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>{{__('main.password')}}</label>
                                        <input name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{__('main.enter_password')}}" type="password" value="{{old('password',123456789)}}" required>
                                        @error('password')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('main.conf_password')}}</label>
                                        <input name="password_confirmation" class="form-control " placeholder="{{__('main.re_enter_password')}}" type="password" value="{{old('password',123456789)}}" required>
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="submit" class="btn btn-main-primary " value="{{ __('main.register') }}">
                                        <div class="mt-4">
                                            <small> {{__('main.already_have_account')}} <a href="{{route('login')}}" class="mt-5">
                                                {{__('main.login')}}</a> </small>

                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
