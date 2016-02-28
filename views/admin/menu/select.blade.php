<div class="box box-danger box-solid collapsed-box">
    <div class="box-header with-border">
        <a href="#" data-widget="collapse">{!! $title !!} Eklemek için Tıklayınız</a>
    </div>
    <div class="box-body" style="display: none;">
        <div class="form-group">
            <table class="table table-bordered">
                @foreach($items as $item)
                    <tbody>
                    <th width="10px">
                        <input type="checkbox" name="contents[]" value="{!! $item->id !!}" {!! count($item->currentMenu($menu_id))>0?'checked':null !!} />
                    </th>
                    <th>
                        {!! $item->title !!}
                    </th>
                    <th width="100px">
                        @if($item->firstPhoto)<img src="{!! $item->firstPhoto !!}?w=100" alt="">@endif
                    </th>
                    </tbody>
                @endforeach
            </table>

        </div>
    </div>
</div>