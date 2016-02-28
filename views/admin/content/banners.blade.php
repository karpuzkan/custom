<div class="col-md-6">
    <div class="box box-danger">
        <div class="box-header with-border">
            @include('partial.error')
            <h2 class="box-title">
                {!! $content->title !!} için Yeni Fotoğraf Ekle
            </h2>
            @include('admin.photos.create',['item_id'=>$content->id, 'item_type'=>'App\Content'])
        </div>
    </div>
</div>
{{-- Current Content Photos --}}
<div class="col-md-6">
    <div class="box box-danger">
        <div class="box-header with-border">
            @if(count($content->photos) > 0)
                <h2 class="box-title">{!! $content->title !!} için Kullanılan Fotoğraflar</h2>
                <br><small>sürükleyerek fotoğrafların sıralamasını değiştirebilirsiniz</small>
                {{-- get photos --}}
                @include('admin.photos.index', ['content'=>$content])
            @else
                <h2 class="box-title">{!! $content->title !!} için Ait Fotoğraf Bulunmamaktadır</h2>
            @endif
        </div>
    </div>
</div>