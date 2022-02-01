@extends('layouts.app')
@push('css')
    <link href="{{asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet"/>

@endpush
@section('content')
    <div class=" container-fluid pt-2">

        <div class="row newrow justify-content-center">

            <div class="  col-md-12 ">

            </div>
        </div>

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">{{__('main.profile')}}</h4><span class="text-muted mt-1 tx-13 ml-2 mb-0">{{__('main.update_profile')}}</span>
                </div>
            </div>
            <div class="d-flex my-xl-auto right-content">

            </div>
        </div>
        <!-- breadcrumb -->


        <!-- row opened -->
        <div class="row row-sm ">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">{{__('keys.change_password')}}</h4>
                        </div>
                    </div>
                    <form action="{{route('user-profile-information.update')}}" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">{{__('keys.name')}}</label>
                            <input type="text" name="name" id="name" value="{{old('name',auth()->user()->name)}}" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label for="image">{{__('keys.image')}}</label>
                            <input type="file" name="image" class="dropify" id="image" data-default-file="{{auth()->user()->avatar}}" data-height="200">
                        </div>
                    </div>
                        <div class="card-footer">
                            <input type="submit" value="{{__('btn.update')}}" class="btn btn-info-gradient btn-sm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script>

        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong appended.'
            },
            error: {
                'fileSize': 'The file size is too big (2M max).'
            }
        });
    </script>
@endpush
