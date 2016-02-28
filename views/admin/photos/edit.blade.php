@extends('layout.master_admin')

@section('content')
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                @include('partial.error')
                <h2 class="box-title">{!! $photo->title !!}</h2>
                {{-- Edit Photo --}}
                {!! Form::open(['url' => '/admin/photos/'.$photo->id, 'method'=>'PUT', 'file'=>'true', 'enctype'=>'multipart/form-data'])!!}
                <div class="form-group">
                    {!! Form::label('title', 'Başlık') !!}
                    {!! Form::text('title', $photo->title, ['class'=>'form-control', 'placeholder'=>'Başlık']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('alt_tag', 'Alt Tag') !!}
                    <br><small>bu alanı doldurmanız seo açısından önemlidir</small>
                    {!! Form::text('alt_tag', $photo->alt_tag, ['class'=>'form-control', 'placeholder'=>'alt_tag']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('body', 'Açıklama') !!}
                    {!! Form::textarea('body', $photo->body, ['class'=>'form-control ckeditor']) !!}
                </div>
                <div class="box box-danger box-solid collapsed-box">
                    <div class="box-header with-border">
                        <a href="#" data-widget="collapse">İngilizce Alanını Düzenlemek İçin Tıklayınız</a>
                    </div>
                    <div class="box-body" style="display: none;">
                        <div class="form-group">
                            {!! Form::label('eng_title', 'Başlık') !!}
                            {!! Form::text('eng_title', $photo->eng_title, ['class'=>'form-control', 'placeholder'=>'Başlık']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('eng_alt_tag', 'alt_Tag') !!}
                            <br><small>bu alanı doldurmanız seo açısından önemlidir</small>
                            {!! Form::text('eng_alt_tag', $photo->eng_alt_tag, ['class'=>'form-control', 'placeholder'=>'alt_tag']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('eng_body', 'Açıklama') !!}
                            {!! Form::textarea('eng_body', $photo->eng_body, ['class'=>'form-control ckeditor']) !!}
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
@endsection