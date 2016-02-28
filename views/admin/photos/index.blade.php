
<ul class="col-xs-12" {!! \Auth::user()->can('sort photo')?'id="sort-photos"':null !!}>
    @foreach($content->photos as $photo)
        <li class="col-xs-3 photos" id="photo_{!! $photo->id !!}">
            <a href="/admin/photos/{!! $photo->id !!}">
                <div class="photo-edit">
                    <h5>{!! $photo->title !!}</h5>
                    <!-- DELETE BUTTON -->
                    {!! Form::open(['url' => '/admin/photos/'.$photo->id, 'method'=>'DELETE', 'class'=>'pull-right'])!!}
                    {!! Form::button('Sil', ['class'=>'ui-icon ui-icon-closethick', 'type'=>'submit']) !!}
                    {!! Form::close() !!}
                </div>
                <img class="img-responsive" src="{!! $photo->slug !!}?w=200&h=200&fit=crop" alt="">
            </a>
        </li>
    @endforeach
</ul>