@extends('layout.master_admin')

@section('content')
    {{-- Create New Gallery --}}
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                @include('partial.error')
                <h2 class="box-title">
                    Yeni Oluştur
                </h2>
                {{-- Contents Create Form --}}
                {!! Form::open(['url' => '/admin/'.strtolower(\Request::segment(2)), 'method'=>'POST', 'files'=>'true', 'role'=>'form'])!!}
                <div class="form-group">
                    {!! Form::label('title', 'Başlık') !!}
                    {!! Form::hidden('type', ucfirst(\Request::segment(2))) !!}
                    {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'']) !!}
                </div>
                <div>
                    {!! Form::button('Kaydet', ['class'=>'btn btn-primary col-xs-12 col-sm-4', 'type'=>'submit']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        {{-- Edit Content --}}
        <div class="box box-danger">
            <div class="box-header with-border">
                <h2 class="box-title">
                    Geçerli İçerikler
                </h2>
                <div id="sort-things">
                    <ul class="list-group">
                        @foreach($contents as $content)
                            <li class="list-group-item">
                                <!-- CHANGE TITLE -->
                                {!! Form::text('title', $content->title, ['class'=>'pull-left', 'placeholder'=>'', 'data-id'=>$content->id, 'class'=>'col-xs-8', 'id' => 'title_'.$content->slug]) !!}
                                <ul class="list-group pull-right">
                                    <!-- DELETE BUTTON -->
                                    {!! Form::open(['url' => '/admin/contents/'.$content->id, 'method'=>'DELETE', 'class'=>'pull-right'])!!}
                                    {!! Form::button('Sil', ['class'=>'ui-icon ui-icon-closethick', 'type'=>'submit']) !!}
                                    {!! Form::close() !!}
                                    <!-- EDIT BUTTON -->
                                    <a class="pull-right" href="/admin/{!! $content->slug !!}/{!! $content->id !!}"><span class="ui-icon ui-icon-pencil"></span></a>
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection