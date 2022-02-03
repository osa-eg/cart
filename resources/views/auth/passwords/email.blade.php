@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row no-gutter justify-content-center">
            <!-- The image half -->
            <div class="col-md-4 col-lg-4 col-xl-4 d-md-flex bg-white py-3 pb-5">
                <div class="row wd-100p mx-auto ">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <div class="card-sigin">
                            <x-auth-logo></x-auth-logo>
                            <h4 class=" text-center h4">{{ __('auth.reset_password') }}</h4>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('keys.email') }}</label>

                                        <div class="col-md-12">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-center">

                                    <button type="submit" class="btn btn-primary">
                                        {{ __('auth.send_password_reset_link') }}
                                    </button>

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
