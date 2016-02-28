<!DOCTYPE html>

<html>
    @include('layout.header_site')
    {{-- Custom Css Files --}}
    @foreach($csss as $css)
        {!! Html::style('/custom/css/'.$css->getRelativePathname()) !!}
    @endforeach
    <body @if($one_page)class="parallax"@endif>
        <div class="container-fluid">
                @yield('content')
        </div>
        {!! Html::script('/js/jquery-1.11.3.min.js') !!}
        {!! Html::script('/js/bootstrap.min.js') !!}
        {!! Html::script('/js/jquery.mCustomScrollbar.concat.min.js') !!}
        {!! Html::script('/js/jquery.fancybox.pack.js') !!}
        {!! Html::script('/js/smart_menus.js') !!}
        {!! Html::script('/js/jquery.lazyload.min.js') !!}
        {!! Html::script('/js/site.js') !!}
        @if($one_page)
            {!! Html::script('/js/jquery.easing.min.js') !!}
            {!! Html::script('/js/jquery.scrollTo.min.js') !!}
            {!! Html::script('/js/wow.min.js') !!}
            {!! Html::script('/js/parallax.js') !!}
        @endif
    @foreach($jss as $js)
        {!! Html::script('/custom/js/'.$js->getRelativePathname()) !!}
    @endforeach
    </body>

</html>