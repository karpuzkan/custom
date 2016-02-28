@extends('layout.master_admin')

@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                @include('partial.error')
                <h2 class="box-title">Yeni Menü Ouştur</h2>
                {{-- Contents Form --}}
                {!! Form::open(['url' => '/admin/menu', 'method'=>'POST', 'files'=>'true', 'role'=>'form'])!!}
                <div class="form-group">
                    {!! Form::label('title', 'Başlık') !!}
                    {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('subtitle', 'Alt Başlık') !!}
                    {!! Form::text('subtitle', null, ['class'=>'form-control', 'placeholder'=>'']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('body', 'İçerik') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control ckeditor']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('active', 'Bu İçerik Sitede Görülecek mi?') !!}
                    {!! Form::select('active', ["0"=>"Hayır", "1"=>"Evet"], "true", ['class'=>'form-control']) !!}
                </div>
                {{-- Banner Düzenleme Alanı --}}
                @include('admin.menu.select', ['title'=>'Banner', 'items'=>$bannersSelect, 'menu_id'=>0])
                {{-- Galeri Düzenleme Alanı --}}
                @include('admin.menu.select', ['title'=>'Galeri', 'items'=>$galleriesSelect, 'menu_id'=>0])
                {{-- Haber&Dış Link Düzenleme Alanı --}}
                @include('admin.menu.select', ['title'=>'Haber&Dış Link', 'items'=>$linksSelect, 'menu_id'=>0])
                {{-- Kişiler Düzenleme Alanı --}}
                @include('admin.menu.select', ['title'=>'Kişiler', 'items'=>$peopleSelect, 'menu_id'=>0])

                {{-- İngilizce Ekleme Alanı --}}
                <div class="box box-danger box-solid collapsed-box">
                    <div class="box-header with-border">
                        <a href="#" data-widget="collapse">İngilizce Alanını Düzenlemek İçin Tıklayınız</a>
                    </div>
                    <div class="box-body" style="display: none;">
                        <div class="form-group">
                            {!! Form::label('eng_title', 'İngilizce Başlık') !!}
                            {!! Form::text('eng_title', null, ['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('eng_subtitle', 'İngilizce Alt Başlık') !!}
                            {!! Form::text('eng_subtitle', null, ['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('eng_body', 'İngilizce İçerik') !!}
                            {!! Form::textarea('eng_body', null, ['class'=>'form-control ckeditor']) !!}
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
                            {!! Form::textarea('header', null, ['class'=>'form-control', 'placeholder'=>'', 'rows'=>'3']) !!}
                        </div>
                    </div>
                </div>
                <div>
                    {!! Form::button('Kaydet', ['class'=>'btn btn-primary col-xs-12 col-sm-4', 'type'=>'submit']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection