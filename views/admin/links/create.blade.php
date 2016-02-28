{{-- Create Links --}}
{!! Form::open(['url' => '/admin/link', 'method'=>'POST', 'enctype'=>'multipart/form-data'])!!}
<div class="form-group">
    {!! Form::label('title', 'Başlık') !!}
    {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Başlık']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Açıklama') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control ckeditor']) !!}
</div>
<div class="form-group">
    {!! Form::label('external', 'Dış Link') !!}
    {!! Form::text('external', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('pdf', 'PDF Dosyası') !!}
    {!! Form::file('pdf', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('date', 'Yayın Tarihi') !!}
    {!! Form::input('date', 'date', null, ['class'=>'form-control', 'style'=>'width:50%']) !!}
</div>
<input type="hidden" name="item_id" value="{!! $item_id !!}">
<input type="hidden" name="item_type" value="{!! $item_type !!}">
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
            {!! Form::label('eng_body', 'İngilizce İçerik') !!}
            {!! Form::textarea('eng_body', null, ['class'=>'form-control ckeditor']) !!}
        </div>
    </div>
</div>
<div>
    {!! Form::button('KAYDET', ['class'=>'btn btn-primary btn-sm btn-block', 'type'=>'submit']) !!}
</div>
{!! Form::close() !!}