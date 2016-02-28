@extends('layout.master_admin')

@section('content')
    {{-- Edit Content --}}
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                @include('partial.error')
                <h2 class="box-title">{!! $menu->title !!} içeriğini düzenlemektesiniz</h2>
                {{-- Contents Form --}}
                {!! Form::open(['url' => '/admin/menu/'.$menu->id, 'method'=>'PUT', 'files'=>'true'])!!}
                <div class="form-group">
                    @if(str_slug($menu->title)!='anasayfa')
                        {!! Form::label('title', 'Başlık') !!}
                        {!! Form::text('title', $menu->title, ['class'=>'form-control', 'placeholder'=>'']) !!}
                    @else
                        <h4 class="box-title">{!! $menu->title !!}</h4>
                        <input type="hidden" name="unguard_home" value="1">
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('subtitle', 'Alt Başlık') !!}
                    {!! Form::text('subtitle', $menu->subtitle, ['class'=>'form-control', 'placeholder'=>'']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('body', 'İçerik') !!}
                    {!! Form::textarea('body', $menu->body, ['class'=>'form-control ckeditor']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('active', 'Bu İçerik Sitede Görülecek mi?') !!}
                    {!! Form::select('active', ["0"=>"Hayır", "1"=>"Evet"], $menu->active, ['class'=>'form-control']) !!}
                </div>
                {{-- Banner Düzenleme Alanı --}}
                @include('admin.menu.select', ['title'=>'Banner', 'items'=>$bannersSelect, 'menu_id'=>$menu->id])
                {{-- Galeri Düzenleme Alanı --}}
                @include('admin.menu.select', ['title'=>'Galeri', 'items'=>$galleriesSelect, 'menu_id'=>$menu->id])
                {{-- Haber&Dış Link Düzenleme Alanı --}}
                @include('admin.menu.select', ['title'=>'Haber&Dış Link', 'items'=>$linksSelect, 'menu_id'=>$menu->id])
                {{-- Kişiler Düzenleme Alanı --}}
                @include('admin.menu.select', ['title'=>'Kişiler', 'items'=>$peopleSelect, 'menu_id'=>$menu->id])

                {{-- İngilizce Düzenleme Alanı --}}
                <div class="box box-danger box-solid collapsed-box">
                    <div class="box-header with-border">
                        <a href="#" data-widget="collapse">İngilizce Alanını Düzenlemek İçin Tıklayınız</a>
                    </div>
                    <div class="box-body" style="display: none;">
                        <div class="form-group">
                            @if(str_slug($menu->eng_title) != 'home')
                                {!! Form::label('eng_title', 'İngilizce Başlık') !!}
                                {!! Form::text('eng_title', $menu->eng_title, ['class'=>'form-control', 'placeholder'=>'']) !!}
                            @else
                                <h4>{!! $menu->eng_title !!}</h4>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('eng_subtitle', 'İngilizce Alt Başlık') !!}
                            {!! Form::text('eng_subtitle', $menu->eng_subtitle, ['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('eng_body', 'İngilizce İçerik') !!}
                            {!! Form::textarea('eng_body', $menu->eng_body, ['class'=>'form-control ckeditor']) !!}
                        </div>
                    </div>
                </div>
                {{-- İleri Düzey Alanı --}}
                <div class="box box-danger box-solid collapsed-box">
                    <div class="box-header with-border">
                        <a href="#" data-widget="collapse">İleri Düzey Ayarlar</a>
                    </div>
                    <div class="box-body" style="display: none;">
                        <div class="form-group">
                            {!! Form::label('header', 'Header -- bu kısım html bilgisi gerektirir, boş bırakabilirsiniz') !!}
                            {!! Form::textarea('header', $menu->header, ['class'=>'form-control', 'placeholder'=>'', 'rows'=>'3']) !!}
                        </div>
                    </div>
                </div>
                <div>
                    {!! Form::button('Kaydet', ['class'=>'btn btn-primary col-xs-12 col-sm-4', 'type'=>'submit']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    {{-- Current Contents --}}
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                @if(count($menu->contents()) > 0)
                <h2 class="box-title">{!! $menu->title !!} Menüsünde Kullanılan İçerikler</h2>
                <br><small>sürükleyerek sıralamayı değiştirebilirsiniz</small>
                <div id="sort-things">
                    <ul class="list-group" {!! \Auth::user()->can('sort menu')?'id="sort-contents"':null !!}>
                        @foreach($menu->contents()->get() as $content)
                            <li class="list-group-item" id="contents-{!! $content->id !!}">
                                <!-- CHANGE TITLE -->
                                <div class="pull-left"><p>{!! $content->title !!} ({!! ucfirst(str_singular($content->slugtr))!!})</p></div>
                                <!-- DELETE BUTTON -->
                                {!! Form::open(['url' => '/admin/menu/delete_content/'.$content->id, 'method'=>'DELETE', 'class'=>'pull-right'])!!}
                                {!! Form::hidden('menu_id', $menu->id) !!}
                                {!! Form::button('Sil', ['class'=>'ui-icon ui-icon-closethick', 'type'=>'submit']) !!}
                                {!! Form::close() !!}
                                        <!-- EDIT BUTTON -->
                                <a class="pull-right" href="/admin/{!! $content->slug !!}/{!! $content->id !!}"><span class="ui-icon ui-icon-pencil"></span></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @else
                    <h2 class="box-title">{!! $menu->title !!} Menüsüne Ait İçerik Bulunmamaktadır</h2>
                @endif
            </div>
        </div>
    </div>

    {{-- Current Menu Photos --}}
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                @if(count($menu->photos) > 0)
                <h2 class="box-title">{!! $menu->title !!} Menüsünde Kullanılan Fotoğraflar</h2>
                <br><small>sürükleyerek fotoğrafların sıralamasını değiştirebilirsiniz</small>
                {{-- get photos --}}
                @include('admin.photos.index', ['content'=>$menu])
                @else
                    <h2 class="box-title">{!! $menu->title !!} Menüsüne Ait Fotoğraf Bulunmamaktadır</h2>
                @endif
            </div>
        </div>
    </div>

    {{-- Add Photo to Menu --}}
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h4 class="box-title">Bu İçeriğe Yeni Fotoğraf Ekle</h4>
                @include('admin.photos.create',['item_id'=>$menu->id, 'item_model'=>'content','item_type'=>'App\Menu'])
            </div>
        </div>
    </div>
@endsection