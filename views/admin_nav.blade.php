@if(\Auth::user()->can('show menu'))<li{!! \Request::segment(2)=='menu'?' class="active"':null!!}><a href="/admin/menu">Menü</a></li>@endif
@if(\Auth::user()->can('show galleries'))<li{!! \Request::segment(2)=='galleries'?' class="active"':null!!}><a href="/admin/galleries">Galeri</a></li>@endif
@if(\Auth::user()->can('show banners'))<li{!! \Request::segment(2)=='banners'?' class="active"':null!!}><a href="/admin/banners">Banner</a></li>@endif
@if(\Auth::user()->can('show links'))<li{!! \Request::segment(2)=='links'?' class="active"':null!!}><a href="/admin/links">Haberler & Dış Linkler</a></li>@endif
@if(\Auth::user()->can('show user'))<li{!! \Request::segment(2)=='user'?' class="active"':null!!}><a href="/admin/user">Kullanıcılar</a></li>@endif