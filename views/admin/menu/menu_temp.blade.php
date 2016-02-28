@if($menu->slug != '/anasayfa')
    <li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded" id="menuItem_{!! $menu->id !!}">
        <div class="menuDiv">
            <span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick">
            <span></span>
            </span>
            <span>
            <span data-id="{!! $menu->id !!}" class="itemTitle"><a href="/admin/menu/{!! $menu->id !!}">{!! $menu->upperTitle !!}</a></span>
            {!! Form::open(['url' => '/admin/menu/'.$menu->id, 'method'=>'DELETE', 'class'=>'pull-right'])!!}
            {!! Form::submit('Sil', ['class'=>'ui-icon ui-icon-closethick', 'type'=>'submit']) !!}
            {!! Form::close() !!}
            <span></span>
            </span>
            </span>
        </div>
    @if ($menu->children()->count() > 0)
        <ol>
            @foreach($menu->children as $menu)
                @include('admin.menu.menu_temp', $menu)
            @endforeach
        </ol>
    @endif
    </li>
@else
    <li style="display: list-item;" class="mjs-nestedSortable-branch mjs-nestedSortable-expanded">
        <div class="menuDiv">
        <span title="Click to show/hide children" class="disclose ui-icon ui-icon-minusthick">
        <span></span>
        </span>
        <span>
        <span data-id="{!! $menu->id !!}" class="itemTitle"><a href="/admin/menu/{!! $menu->id !!}">{!! $menu->upperTitle !!}</a></span>
            {!! Form::open(['url' => '/admin/menu/'.$menu->id, 'method'=>'DELETE', 'class'=>'pull-right'])!!}
            {!! Form::submit('Sil', ['class'=>'ui-icon ui-icon-closethick', 'type'=>'submit']) !!}
            {!! Form::close() !!}
            <span></span>
        </span>
            </span>
        </div>
    </li>
@endif