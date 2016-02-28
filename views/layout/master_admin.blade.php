<!DOCTYPE html>
<html>
    @include('layout.header_admin')
    <body class="skin-black fixed{!! !Auth::check()?' login-page':null !!}" data-spy="scroll" data-target="#scrollspy">
    @if(Auth::check())
    <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <!-- Logo -->
                <a href="/admin" class="logo">
                    <!-- logo for regular state and mobile devices -->
                    {!! Html::image('img/assets/logo.png?w=30') !!} &nbsp;&nbsp;|&nbsp;&nbsp; {!! $brand !!}
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toogle-fff" data-toggle="offcanvas" role="button">
                        <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li><a href="#">Merhaba {!! Auth::user()->name !!}</a></li>
                            <li><a href="/auth/logout">Çıkış</a></li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <div class="sidebar" id="scrollspy">
                    <ul class="nav sidebar-menu">
                        @include('layout.nav_admin')
                    </ul>
                </div>
                <hr>
            </aside>
            <section class="content-wrapper">
                <div class="content body">
                    @yield('content')
                </div>
            </section>
    </div>
    @else
        {{-- Login Form --}}
        @yield('content')
    @endif
    {!! Html::script('/js/jquery-1.11.3.min.js') !!}
    {!! Html::script('/js/jquery-ui.min.js') !!}
    {!! Html::script('/js/bootstrap.min.js') !!}
    {!! Html::script('/js/bootbox.min.js') !!}
    {!! Html::script('/js/ckeditor/ckeditor.js') !!}
    {!! Html::script('/js/nestedSortable.min.js') !!}
    {!! Html::script('/js/jquery.slimscroll.min.js') !!}
    {!! Html::script('/js/AdminLTE.min.js') !!}
    {!! Html::script('/js/admin.js') !!}
    </body>
</html>
