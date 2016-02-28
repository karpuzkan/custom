@if($menu->slug != '/anasayfa' || $menu->eng_slug != '/home')
    @if($menu->children()->count() > 0 && $menu->activeChildren == true)
        <li class="dropdown{!! $menu->navActive?' active':null !!}">
            <a href="{!! $menu->slug !!}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                {!! $menu->title !!}
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
                @foreach($menu->children as $menu)
                    @if($menu->active != 0)
                        @include('layout.nav_site_temp')
                    @endif
                @endforeach
            </ul>
    @else
        <li{!! $menu->navActive?' class="active"':null !!}>
            <a href="{!! $menu->slug !!}">{!! $menu->title !!}</a>
    @endif
        </li>
@endif