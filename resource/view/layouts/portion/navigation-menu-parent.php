@if($menu['id'] == 'logout')
<li>
    <a class="" href="" data-toggle="tooltip" onclick="event.preventDefault();document.getElementById('logout-form').submit();" data-placement="right" title="{{$menu['title']}}">
        <i data-feather="{{$menu['icon']}}"></i>
    </a>
    <form action="{{$menu['href']}}" id="logout-form" method="POST" class="d-none">
        @csrf
    </form>
</li>
@else
<li>
    <a class="" style="font-size: 20px" href="{{$menu['href']}}" data-toggle="tooltip" data-placement="right" title="{{$menu['title']}}" @if($menu['data-nav-target']) data-nav-target="#{{$menu['id']}}" @endif>
        <i @if(empty($menu['class']))  data-feather="{{$menu['icon']}}" @else class="{{$menu['class']}}" @endif></i>
    </a>
</li>
@endif
