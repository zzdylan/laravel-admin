@foreach($menus as $menu)
@if(Auth::guard('admin')->user()->visible($menu->roles))
<li class="nav-item start ">
    <a href="@if($menu->hasChildren())javascript:;@else{{$menu->uri}}@endif" class="nav-link @if($menu->hasChildren())nav-toggle @endif">
        <i class="fa {{$menu->icon}}"></i>
        <span class="title">{{$menu->title}}</span>
        @if($menu->hasChildren())
        <span class="arrow"></span>
        @endif
    </a>
    @if($menu->hasChildren())
        <ul class="sub-menu">
            @include('admin.layouts.menuPart',['menus'=>$menu->children()])
        </ul>
    @endif
</li>
@endif
@endforeach