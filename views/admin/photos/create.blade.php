{{-- Create Photos --}}
    {!! Form::open(['url' => '/admin/photos', 'method'=>'POST', 'file'=>'true', 'enctype'=>'multipart/form-data', 'role'=>'form'])!!}
    <div class="form-group">
        {!! Form::label('title', 'Başlık') !!}
        {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Başlık']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('alt_tag', 'Alt Tag') !!}
        <br><small>bu alanı doldurmanız seo açısından önemlidir</small>
        {!! Form::text('alt_tag', null, ['class'=>'form-control', 'placeholder'=>'alt_tag']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body', 'Açıklama') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control ckeditor']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('image', 'Fotoğraf') !!}
        {!! Form::file('image', null, ['class'=>'form-control']) !!}
    </div>
    <div class="box box-danger box-solid collapsed-box">
        <div class="box-header with-border">
            <a href="#" data-widget="collapse">İngilizce Alanını Düzenlemek İçin Tıklayınız</a>
        </div>
        <div class="box-body" style="display: none;">
            <div class="form-group">
                {!! Form::label('eng_title', 'Başlık') !!}
                {!! Form::text('eng_title', null, ['class'=>'form-control', 'placeholder'=>'Başlık']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('eng_alt_tag', 'alt_Tag') !!}
                <br><small>bu alanı doldurmanız seo açısından önemlidir</small>
                {!! Form::text('eng_alt_tag', null, ['class'=>'form-control', 'placeholder'=>'alt_tag']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('eng_body', 'Açıklama') !!}
                {!! Form::textarea('eng_body', null, ['class'=>'form-control ckeditor']) !!}
            </div>
        </div>
    </div>

    <input type="hidden" name="item_id" value="{!! $item_id !!}">
    <input type="hidden" name="item_type" value="{!! $item_type !!}">
    <div>
        {!! Form::button('KAYDET', ['class'=>'btn btn-primary btn-sm btn-block', 'type'=>'submit']) !!}
    </div>
{!! Form::close() !!}