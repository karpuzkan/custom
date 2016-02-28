<nav class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{!! \Request::segment(1)=='eng'?'/eng':'/' !!}">Project Name</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            @each('layout.nav_site_temp', $menus, 'menu')
        </ul>
        <ul class="nav navbar-nav pull-right">
            <li><a href="/admin">admin</a></li>
            @if(intval($eng)!=0)
                @if(\Request::segment(1) != 'eng')
                    <li><a href="/home">eng</a></li>
                @else
                    <li><a href="/tr">tr</a></li>
                @endif
            @endif
        </ul>
    </div><!--/.nav-collapse -->
</nav>