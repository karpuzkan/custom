@if($menu->slug != '/anasayfa' || $menu->eng_slug != '/home')
    @if(!$menu->children()->count() > 0)
        <li{!! $menu->navActive?' class="active"':null !!}>
            <a href="{!! $menu->opSlug !!}" class="page-scroll">{!! $menu->title!!}</a>
    @else
        <li class="dropdown{!! $menu->navActive?' active':null !!}">
            <a href="{!! $menu->opSlug !!}" class="dropdown-toggle page-scroll" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                {!! $menu->title!!}
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                @foreach($menu->children as $menu)
                    @include('layout.op_nav_site_temp')
                @endforeach
            </ul>
    @endif
        </li>
@endif