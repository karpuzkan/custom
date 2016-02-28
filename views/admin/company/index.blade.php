@extends('layout.master_admin')

@section('content')
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                @include('partial.error')
                <h2 class="box-title">
                    <a href="/admin/company/create">Yeni İşletme Oluştur</a>
                </h2>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h2 class="box-title">Geçerli İşletmeler</h2>
            </div>
            <div class="form-group" id="sort-things">
                <ol class="sortable ui-sortable mjs-nestedSortable-branch mjs-nestedSortable-expanded">
                    @foreach($companies as $company)
                        <li class="list-group-item">
                            <!-- CHANGE TITLE -->
                            {!! Html::link('/admin/company/'.$company->id, $company->title) !!}
                                    <!-- DELETE BUTTON -->
                            {!! Form::open(['url' => '/admin/company/'.$company->id, 'method'=>'DELETE', 'class'=>'pull-right'])!!}
                            {!! Form::button('Sil', ['class'=>'ui-icon ui-icon-closethick', 'type'=>'submit']) !!}
                            {!! Form::close() !!}
                                    <!-- EDIT BUTTON -->
                            <a class="pull-right" href="/admin/company/{!! $company->id !!}"><span class="ui-icon ui-icon-pencil"></span></a>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endsection