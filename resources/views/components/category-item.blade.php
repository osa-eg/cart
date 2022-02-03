@if ($category->children_count)
    @php
    $a_id = uniqid() ; $ul_id = uniqid()
    @endphp
    <li>
        <a href="#" class="has-submenu" id="{{$a_id}}" aria-haspopup="true" aria-controls="{{$ul_id}}" aria-expanded="false">{{$category->name}}<span class="sub-arrow"></span></a>
        <ul id="{{$ul_id}}" role="group" aria-hidden="true" aria-labelledby="{{$a_id}}" aria-expanded="false" class="sm-nowrap" style="width: auto; display: none; top: auto; left: 0px; margin-left: -223px; margin-top: -40.4px; min-width: 10em; max-width: 20em;">
            @foreach ($category->children()->withCount('children')->get(['id']) as $item)
                <x-category-item :category="$item"></x-category-item>
            @endforeach
        </ul>
    </li>
@else
    <li>
        <a href="#">
            {{$category->name}}
        </a>
    </li>
@endif