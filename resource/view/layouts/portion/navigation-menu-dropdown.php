@if(count($menuChildrens['children']) > 0)
<li>
    <a href="{{$menuChildrens['href']}}">{{$menuChildrens['title']}}</a>
    <ul>
        @foreach($menuChildrens['children'] as $menuChildren)
            @include('layouts.admin.portion.navigation-menu-dropdown', ['menuChildrens' => $menuChildren])
        @endforeach
    </ul>
</li>
@else
<li>
    <a href="{{$menuChildrens['href']}}">{{$menuChildrens['title']}}</a>
</li>
@endif
