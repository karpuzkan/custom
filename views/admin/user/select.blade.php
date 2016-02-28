<div class="box box-danger box-solid collapsed-box">
    <div class="box-header with-border">
        <a href="#" data-widget="collapse">{!! $title !!} İzinleri</a>
        @if(!empty($note))<small>{!! $note !!}</small>@endif
    </div>
    <div class="box-body" style="display: none;">
        <div class="form-group">
            {!! Form::label($item.'show', 'Görüntüleme') !!}
            {!! Form::select($item.'show', ['hayır', 'evet'], !empty($user) && $user->can('show '.$item)?1:(!empty($user)?0:1), ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label($item.'update', 'Değiştirme') !!}
            {!! Form::select($item.'update', ['hayır', 'evet'], !empty($user) && $user->can('update '.$item)?1:0, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label($item.'store', 'Ekleme') !!}
            {!! Form::select($item.'store', ['hayır', 'evet'], !empty($user) && $user->can('store '.$item)?1:0, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label($item.'destroy', 'Silme') !!}
            {!! Form::select($item.'destroy', ['hayır', 'evet'], !empty($user) && $user->can('destroy '.$item)?1:0, ['class'=>'form-control']) !!}
        </div>
        @if($sort)
        <div class="form-group">
            {!! Form::label($item.'sort', 'Sıralama') !!}
            {!! Form::select($item.'sort', ['hayır', 'evet'], !empty($user) && $user->can('sort '.$item)?1:0, ['class'=>'form-control']) !!}
        </div>
        @endif
        @if(!empty($custom))
            @foreach($custom as $item)
                <div class="form-group">
                    {!! Form::label($item['model'], $item['title']) !!}
                    {!! Form::select($item['model'].$item['permission'], ['hayır', 'evet'], !empty($user) && $user->can($item['permission'].' '.$item['model'])?1:0, ['class'=>'form-control']) !!}
                </div>
            @endforeach
        @endif
    </div>
</div>