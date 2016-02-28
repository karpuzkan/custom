@extends('layout.master_admin')

@section('content')
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                @include('partial.error')
                <h2 class="box-title">{!! $person->name!!}</h2>
                {{-- Create Links --}}
                {{-- Create Person --}}
                {!! Form::open(['url' => '/admin/person/'.$person->id, 'method'=>'PUT', 'enctype'=>'multipart/form-data'])!!}
                <div class="form-group">
                    {!! Form::label('name', 'İsim') !!}
                    {!! Form::text('name', $person->name, ['class'=>'form-control', 'placeholder'=>'']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('surname', 'Soyisim') !!}
                    {!! Form::text('surname', $person->surname, ['class'=>'form-control', 'placeholder'=>'']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('title', 'Ünvan') !!}
                    {!! Form::text('title', $person->title, ['class'=>'form-control', 'placeholder'=>'']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'E-Posta') !!}
                    {!! Form::text('email', $person->email, ['class'=>'form-control', 'placeholder'=>'']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('body', 'CV') !!}
                    {!! Form::textarea('body', $person->body, ['class'=>'form-control ckeditor']) !!}
                </div>
                <div class="box box-danger box-solid collapsed-box">
                    <div class="box-header with-border">
                        <a href="#" data-widget="collapse">İngilizce Alanını Düzenlemek İçin Tıklayınız</a>
                    </div>
                    <div class="box-body" style="display: none;">
                        <div class="form-group">
                            {!! Form::label('eng_title', 'İngilizce Ünvan') !!}
                            {!! Form::text('eng_title', $person->eng_title, ['class'=>'form-control', 'placeholder'=>'']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('eng_body', 'İngilizce CV') !!}
                            {!! Form::textarea('eng_body', $person->eng_body, ['class'=>'form-control ckeditor']) !!}
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
                @if(count($person->photos) > 0)
                    <h2 class="box-title">{!! $person->name !!} için Kullanılan Fotoğraflar</h2>
                    <br><small>sürükleyerek fotoğrafların sıralamasını değiştirebilirsiniz</small>
                    {{-- get photos --}}
                    @include('admin.photos.index', ['content'=>$person])
                @else
                    <h2 class="box-title">{!! $person->name !!} için Fotoğraf Bulunmamaktadır</h2>
                @endif
            </div>
        </div>
    </div>

    {{-- Add Photo to Content --}}
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h4 class="box-title">{!! $person->name !!} için Yeni Fotoğraf Ekle</h4>
                @include('admin.photos.create',['item_id'=>$person->id,'item_type'=>'App\Person'])
            </div>
        </div>
    </div>
@endsection