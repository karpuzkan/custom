@extends('layout.master_admin')

@section('content')
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                @include('partial.error')
                <h2 class="box-title">{!! $link->title !!}</h2>
                {{-- Create Links --}}
                {!! Form::open(['url' => '/admin/link/'.$link->id, 'method'=>'PUT', 'enctype'=>'multipart/form-data'])!!}
                <div class="form-group">
                    {!! Form::label('title', 'Başlık') !!}
                    {!! Form::text('title', $link->title, ['class'=>'form-control', 'placeholder'=>'Başlık']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('body', 'Açıklama') !!}
                    {!! Form::textarea('body', $link->body, ['class'=>'form-control ckeditor']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('external', 'Dış Link') !!}
                    {!! Form::text('external', $link->external, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('pdf', 'PDF Dosyası') !!}
                    {!! Form::file('pdf', null, ['class'=>'form-control']) !!}
                </div>
                @if($link->pdf)
                    {!! Html::link($link->pdf, 'Şu Anki PDF Dosyası', ['target'=>'_BLANK']) !!}
                @endif
                <div class="form-group">
                    {!! Form::label('date', 'Yayın Tarihi') !!}
                    {!! Form::input('date', 'date', $link->date, ['class'=>'form-control', 'style'=>'width:30%']) !!}
                </div>
                <input type="hidden" name="item_id" value="{!! $link->item_id !!}">
                <input type="hidden" name="item_model" value="{!! $link->item_type !!}">
                <input type="hidden" name="item_type" value="{!! $link->item_type !!}">
                <div class="box box-danger box-solid collapsed-box">
                    <div class="box-header with-border">
                        <a href="#" data-widget="collapse">İngilizce Alanını Düzenlemek İçin Tıklayınız</a>
                    </div>
                    <div class="box-body" style="display: none;">
                        <div class="form-group">
                            {!! Form::label('eng_title', 'İngilizce Başlık') !!}
                            {!! Form::text('eng_title', $link->eng_title, ['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('eng_body', 'İngilizce İçerik') !!}
                            {!! Form::textarea('eng_body', $link->eng_body, ['class'=>'form-control ckeditor']) !!}
                        </div>
                    </div>
                </div>
                <div>
                    {!! Form::button('KAYDET', ['class'=>'btn btn-primary btn-sm btn-block', 'type'=>'submit']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


    {{-- Current Content Photos --}}
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                @if(count($link->photos) > 0)
                    <h2 class="box-title">{!! $link->title !!} İçeriğinde Kullanılan Fotoğraflar</h2>
                    <br><small>sürükleyerek fotoğrafların sıralamasını değiştirebilirsiniz</small>
                    {{-- get photos --}}
                    @include('admin.photos.index', ['content'=>$link])
                @else
                    <h2 class="box-title">{!! $link->title !!} Haber&Dış Linkine Ait Fotoğraf Bulunmamaktadır</h2>
                @endif
            </div>
        </div>
    </div>

    {{-- Add Photo to Content --}}
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h4 class="box-title">Bu İçeriğe Yeni Fotoğraf Ekle</h4>
                @include('admin.photos.create',['item_id'=>$link->id, 'item_type'=>'App\Links'])
            </div>
        </div>
    </div>
@endsection