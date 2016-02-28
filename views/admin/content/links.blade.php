<div class="col-md-6">
    <div class="box box-danger">
        <div class="box-header with-border">
            @include('partial.error')
            <h2 class="box-title">{!! $content->title !!} için Haber&Dış Link Ekle</h2>
            @include('admin.links.create',['item_id'=>$content->id,'item_type'=>'App\Content'])
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h2 class="box-title">{!! $content->title !!} için Geçerli Haber&Dış Linkler</h2>
            <br><small>sürükleyerek sıralamayı değiştirebilirsiniz</small>
            <div id="sort-things">
                <ul class="list-group" {!! \Auth::user()->can('sort link')?'id="sort-links"':null !!}>
                    @foreach($content->links as $link)
                        <li class="list-group-item" id="link-{!! $link->id !!}">
                            <!-- CHANGE TITLE -->
                            <div class="pull-left"><p>{!! $link->title !!}</p></div>
                            <!-- DELETE BUTTON -->
                            {!! Form::open(['url' => '/admin/link/'.$link->id, 'method'=>'DELETE', 'class'=>'pull-right'])!!}
                            {!! Form::button('Sil', ['class'=>'ui-icon ui-icon-closethick', 'type'=>'submit']) !!}
                            {!! Form::close() !!}
                                    <!-- EDIT BUTTON -->
                            <a class="pull-right" href="/admin/link/{!! $link->id !!}"><span class="ui-icon ui-icon-pencil"></span></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>