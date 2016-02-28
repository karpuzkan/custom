@extends('layout.master_admin')

@section('content')
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                @include('partial.error')
                <h2 class="box-title">{!! $company->title !!}</h2>
                {{-- Create Links --}}
                {!! Form::open(['url' => '/admin/company/'.$company->id, 'method'=>'PUT', 'enctype'=>'multipart/form-data'])!!}
                <div class="form-group">
                    {!! Form::label('title', 'Başlık') !!}
                    {!! Form::text('title', $company->title, ['class'=>'form-control', 'placeholder'=>'Başlık']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('body', 'Açıklama') !!}
                    {!! Form::textarea('body', $company->body, ['class'=>'form-control ckeditor']) !!}
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
                @if(count($company->photos) > 0)
                    <h2 class="box-title">{!! $company->title !!} İçeriğinde Kullanılan Fotoğraflar</h2>
                    <br><small>sürükleyerek fotoğrafların sıralamasını değiştirebilirsiniz</small>
                    {{-- get photos --}}
                    @include('admin.photos.index', ['content'=>$company])
                @else
                    <h2 class="box-title">{!! $company->title !!} Haber&Dış Linkine Ait Fotoğraf Bulunmamaktadır</h2>
                @endif
            </div>
        </div>
    </div>

    {{-- Add Photo to Content --}}
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h4 class="box-title">Bu İçeriğe Yeni Fotoğraf Ekle</h4>
                @include('admin.photos.create',['item_id'=>$company->id,'item_type'=>'App\Company'])
            </div>
        </div>
    </div>
@endsection