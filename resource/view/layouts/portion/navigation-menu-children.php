@if(count($menuGroup['children']) > 0)
<li>
    <a href="{{$menuGroup['href']}}">{{$menuGroup['title']}}</a>
    <ul>
    @foreach($menuGroups['children'] as $menu)
        @include('layouts.admin.portion.navigation-menu-dropdown', ['menuChildrens' => $menu])
    @endforeach
    </ul>
</li>
@else
<li><a href="{{$menuGroup['href']}}">{{$menuGroup['title']}}</a></li>
@endif
{{--@if(Request::is('admin') && $menu['id'] == 'dashboards') class="active" @else class="{{$menu['class']}}" @endif --}}
