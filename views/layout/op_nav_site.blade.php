<nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand page-scroll" href="{!! \Request::segment(1)=='eng'?'#home':'#anasayfa' !!}">Project Name</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            @each('layout.op_nav_site_temp', $menus, 'menu')
        </ul>
        <ul class="nav navbar-nav pull-right">
            <li><a href="/admin">admin</a></li>
            @if(intval($eng)!=0)
                @if(\Request::segment(1) != 'eng')
                    <li><a href="/eng">eng</a></li>
                @else
                    <li><a href="/">tr</a></li>
                @endif
            @endif
        </ul>
    </div><!--/.nav-collapse -->
</nav>