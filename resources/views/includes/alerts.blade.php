<div class="row my-3 justify-content-center">

    <div class=" @auth() col-md-12 @else col-md-4 @endauth">

        @if ($errors->any())
            @foreach($errors->all() as $key=>$error)
                <div role="alert" class="alert alert-danger">
                    <strong>{{__('main.alerts.validation_error')}}!</strong> {{$error}}
                </div>
            @endforeach
        @endif
        @if(session()->has('success'))
            <div role="alert" class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        @if(session()->has('error'))
            <div role="alert" class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif
        @if(session()->has('updated'))
            <div role="alert" class="alert alert-success">
                {{session('updated')}}
            </div>
        @endif
    </div>
</div>