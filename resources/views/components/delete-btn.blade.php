@php($id = uniqid())
<a href="#" class="{{$class}}" data-toggle="modal" data-target="#del{{$id}}"  >
    @if($showIcon)
        <i class="fas fa-trash text-danger mx-1"  title="{{__('btn.delete')}} "></i>
    @endif
    @if($name)
        {{__('btn.delete')}}
    @endif
</a>
<div class="modal fade" id="del{{$id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog mt-lg-10">
        <div class="modal-content">

            <div class="modal-body tx-center pd-y-20 pd-x-20">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                <i class="icon icon ion-ios-trash tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                <h4 class="tx-danger mg-b-20">{{__('main.delete_confirm_title')}}</h4>

                <p class="mg-b-20 mg-x-20">{{__('main.delete_confirm_text')}}</p>

            </div>
            <form class="modal-footer" action="{{$route}}" method="post">
                @method('DELETE')
                @csrf
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                    {{__('btn.cancel')}}</button>
                <button type="submit" class="btn btn-primary-gradient btn-sm">
                    {{__('btn.delete')}}</button>
            </form>
        </div>
    </div>
</div>
