<div class="col-md-6">
    <div class="box box-danger">
        <div class="box-header with-border">
            @include('partial.error')
            <h2 class="box-title">{!! $content->title !!} için Kişi Ekle</h2>
            @include('admin.people.create',['item_id'=>$content->id,'item_type'=>'App\Content'])
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h2 class="box-title">{!! $content->title !!} için Geçerli Kişiler</h2>
            <br><small>sürükleyerek sıralamayı değiştirebilirsiniz</small>
            <div id="sort-things">
                <ul class="list-group" {!! \Auth::user()->can('sort people')?'id="sort-people"':null !!}>
                    @foreach($content->people as $person)
                        <li class="list-group-item" id="people-{!! $person->id !!}">
                            <!-- CHANGE TITLE -->
                            <div class="pull-left"><p>{!! $person->name !!} {!! $person->surname !!}</p></div>
                            <!-- DELETE BUTTON -->
                            {!! Form::open(['url' => '/admin/person/'.$person->id, 'method'=>'DELETE', 'class'=>'pull-right'])!!}
                            {!! Form::button('Sil', ['class'=>'ui-icon ui-icon-closethick', 'type'=>'submit']) !!}
                            {!! Form::close() !!}
                            <!-- EDIT BUTTON -->
                            <a class="pull-right" href="/admin/person/{!! $person->id !!}"><span class="ui-icon ui-icon-pencil"></span></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>