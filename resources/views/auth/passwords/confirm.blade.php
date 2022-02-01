@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row no-gutter justify-content-center">
            <!-- The image half -->
            <div class="col-md-4 col-lg-4 col-xl-4 d-md-flex bg-primary-transparent py-3 pb-5">
                <div class="row wd-100p mx-auto ">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <div class="card-sigin">
                            <x-auth-logo></x-auth-logo>
                            <h4 class="text-center">{{ __('auth.confirm_password') }}</h4>

                            <div class="card-body">
                            {{ __('auth.Please_confirm_your_password_before_continuing.') }}

                            <form method="POST" action="{{ route('password.confirm') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="password" class="col-md-12 col-form-label text-md-right">{{ __('keys.password') }}</label>
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('btn.confirm_password') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('auth.forget_your_password') }}
                                        </a>
                                    @endif
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
