@extends('layout.master_admin')

@section('content')
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                @include('partial.error')
                <h2 class="box-title">{!! $acc->title !!}</h2>
                {{-- Create Links --}}
                {!! Form::open(['url' => '/admin/accountancy/'.$acc->id, 'method'=>'PUT', 'enctype'=>'multipart/form-data'])!!}
                <div class="form-group">
                    {!! Form::label('date', 'Yayın Tarihi') !!}
                    {!! Form::input('date', 'date', $acc->date, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('debt', 'Borç') !!}
                    {!! Form::text('debt', $acc->debt, ['class'=>'form-control', 'placeholder'=>'']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('receivable', 'Alacak') !!}
                    {!! Form::text('receivable', $acc->receivable, ['class'=>'form-control', 'placeholder'=>'']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Açıklama') !!}
                    {!! Form::textarea('description', $acc->description, ['class'=>'form-control', 'placeholder'=>'']) !!}
                </div>
                <div class="form-group">
                    <small></small>
                    {!! Form::label('attach', 'Ek dosya') !!}
                    {!! Form::file('attach', null, ['class'=>'form-control']) !!}
                </div>
                <div>
                    {!! Form::button('KAYDET', ['class'=>'btn btn-primary btn-sm btn-block', 'type'=>'submit']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="box box-danger">
            <div class="box-header with-border">
                @if($acc->slug != '')
                    <h2 class="box-title">Yüklenmiş Dosyalar</h2>
                    <ul class="list-group">
                        @foreach(explode('|', $acc->slug) as $key => $file)
                            <li class="list-group-item">
                                <p class="col-xs-8">{!! class_basename($file) !!}</p>
                                <ul class="list-group pull-right">
                                    <!-- DELETE BUTTON -->
                                    {!! Form::open(['url' => '/admin/accountancy/file_delete/'.$file, 'method'=>'DELETE', 'class'=>'pull-right'])!!}
                                    {!! Form::button('Sil', ['class'=>'ui-icon ui-icon-closethick', 'type'=>'submit']) !!}
                                    {!! Form::close() !!}
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <h2 class="box-title">Yüklenmiş Herhangi Bir Dosya Bulunamadı</h2>
                @endif
            </div>
        </div>
    </div>
@endsection