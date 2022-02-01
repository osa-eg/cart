@extends('layouts.app')

@section('content')
    <div class="row no-gutter justify-content-center">
        <!-- The image half -->
        <div class="col-md-4 col-lg-4 col-xl-4 d-md-flex bg-primary-transparent py-3 pb-5">
            <div class="row wd-100p mx-auto ">
                <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                    <div class="card-sigin">
                        <x-auth-logo></x-auth-logo>
                        <div class="card-sigin">
                            <div class="main-signup-header">
                                <div class="text-center">
                                    <h2>{{__('main.welcome_back')}}</h2>
                                    <h5 class="font-weight-semibold mb-4">{{__('main.Sign_In_to_continue')}}.</h5>
                                </div>

                                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>{{__('main.email')}}</label>
                                        <input name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('main.enter_email')}}" type="email" value="{{old('username')}}" required>
                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>{{__('main.password')}}</label>
                                        <input name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{__('main.enter_password')}}" type="password" value="{{old('password')}}" required>
                                        @error('password')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                        @if(Route::has('password.request'))
                                        <div class=" d-flex justify-content-between ">
                                            <a href="{{route('password.request')}}" class="btn btn-link">{{__('main.forget_password')}}</a>
                                            <a href="{{route('register')}}" class="btn btn-link">{{__('main.dont_have_account')}}</a>
                                        </div>
                                        @endif
                                        <div class="form-group text-center">
                                            <input type="submit" class="btn btn-main-primary " value="{{ __('main.login') }}">

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
