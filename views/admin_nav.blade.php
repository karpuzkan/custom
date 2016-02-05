@if(\Auth::user()->can('show menu'))<li{!! \Request::segment(2)=='menu'?' class="active"':null!!}><a href="/admin/menu">Menü</a></li>@endif
@if(\Auth::user()->can('show gallery'))<li{!! \Request::segment(2)=='gallery'?' class="active"':null!!}><a href="/admin/gallery">Galeri</a></li>@endif
@if(\Auth::user()->can('show banner'))<li{!! \Request::segment(2)=='banner'?' class="active"':null!!}><a href="/admin/banner">Banner</a></li>@endif
@if(\Auth::user()->can('show linkTitle'))<li{!! \Request::segment(2)=='linkTitle'?' class="active"':null!!}><a href="/admin/linkTitle">Haberler & Dış Linkler</a></li>@endif
@if(\Auth::user()->can('show user'))<li{!! \Request::segment(2)=='user'?' class="active"':null!!}><a href="/admin/user">Kullanıcılar</a></li>@endif