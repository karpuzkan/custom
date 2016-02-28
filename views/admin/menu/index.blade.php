@extends('layout.master_admin')

@section('content')
    <div class="col-md-8">
        <div class="box box-danger">
            <div class="box-header with-border">
                @include('partial.error')
                <h2 class="box-title">
                    <a href="/admin/menu/create">Yeni İçerik Oluştur</a>
                </h2>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h2 class="box-title">Geçerli İçerikler</h2>
            </div>
            <div class="form-group menus-sort" id="sort-things">
                <ol class="{!! \Auth::user()->can('sort menu')?'sortMenu':null !!} sortable ui-sortable mjs-nestedSortable-branch mjs-nestedSortable-expanded">
                    @each('admin.menu.menu_temp', $menus, 'menu')
                </ol>
            </div>
        </div>
    </div>
@endsection