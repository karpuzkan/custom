@extends('layout.master_admin')

@section('content')
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                @include('partial.error')
                {{-- Create Company --}}
                {!! Form::open(['url' => '/admin/company', 'method'=>'POST', 'enctype'=>'multipart/form-data'])!!}
                <div class="form-group">
                    {!! Form::label('title', 'Başlık') !!}
                    {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Başlık']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('body', 'Açıklama') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control ckeditor']) !!}
                </div>
                <div>
                    {!! Form::button('KAYDET', ['class'=>'btn btn-primary btn-sm btn-block', 'type'=>'submit']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection