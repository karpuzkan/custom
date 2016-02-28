{{-- Create Person --}}
{!! Form::open(['url' => '/admin/person', 'method'=>'POST', 'enctype'=>'multipart/form-data'])!!}
<div class="form-group">
    {!! Form::label('name', 'İsim') !!}
    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'']) !!}
</div>
<div class="form-group">
    {!! Form::label('surname', 'Soyisim') !!}
    {!! Form::text('surname', null, ['class'=>'form-control', 'placeholder'=>'']) !!}
</div>
<div class="form-group">
    {!! Form::label('title', 'Ünvan') !!}
    {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'E-Posta') !!}
    {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'CV') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control ckeditor']) !!}
</div>
<div class="box box-danger box-solid collapsed-box">
    <div class="box-header with-border">
        <a href="#" data-widget="collapse">İngilizce Alanını Düzenlemek İçin Tıklayınız</a>
    </div>
    <div class="box-body" style="display: none;">
        <div class="form-group">
            {!! Form::label('eng_title', 'İngilizce Ünvan') !!}
            {!! Form::text('eng_title', null, ['class'=>'form-control', 'placeholder'=>'']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('eng_body', 'İngilizce CV') !!}
            {!! Form::textarea('eng_body', null, ['class'=>'form-control ckeditor']) !!}
        </div>
    </div>
</div>
{!! Form::hidden('person_id', $item_id) !!}
{!! Form::hidden('person_type', $item_type) !!}
<div>
    {!! Form::button('KAYDET', ['class'=>'btn btn-primary btn-sm btn-block', 'type'=>'submit']) !!}
</div>
{!! Form::close() !!}