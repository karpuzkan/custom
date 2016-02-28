<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header with-border">
            @include('partial.error')
            <h2 class="box-title">{!! $content->title !!} içeriğini düzenlemektesiniz</h2>
            {{-- Contents Form --}}
            {!! Form::open(['url' => '/admin/contents/'.$content->id, 'method'=>'PUT', 'files'=>'true'])!!}
            <div class="form-group">
                @if(str_slug($content->title)!='anasayfa')
                    {!! Form::label('title', 'Başlık') !!}
                    {!! Form::text('title', $content->title, ['class'=>'form-control', 'placeholder'=>'']) !!}
                @else
                    <h4 class="box-title">{!! $content->title !!}</h4>
                    <input type="hidden" name="unguard_home" value="1">
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('subtitle', 'Alt Başlık') !!}
                {!! Form::text('subtitle', $content->subtitle, ['class'=>'form-control', 'placeholder'=>'']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'İçerik') !!}
                {!! Form::textarea('body', $content->body, ['class'=>'form-control ckeditor']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('active', 'Bu İçerik Sitede Görülecek mi?') !!}
                {!! Form::select('active', ["0"=>"Hayır", "1"=>"Evet"], $content->active, ['class'=>'form-control']) !!}
            </div>
            {{-- İngilizce Düzenleme Alanı --}}
            <div class="box box-danger box-solid collapsed-box">
                <div class="box-header with-border">
                    <a href="#" data-widget="collapse">İngilizce Alanını Düzenlemek İçin Tıklayınız</a>
                </div>
                <div class="box-body" style="display: none;">
                    <div class="form-group">
                        @if(str_slug($content->eng_title) != 'home')
                            {!! Form::label('eng_title', 'İngilizce Başlık') !!}
                            {!! Form::text('eng_title', $content->eng_title, ['class'=>'form-control', 'placeholder'=>'']) !!}
                        @else
                            <h4>{!! $content->eng_title !!}</h4>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::label('eng_subtitle', 'İngilizce Alt Başlık') !!}
                        {!! Form::text('eng_subtitle', $content->eng_subtitle, ['class'=>'form-control', 'placeholder'=>'']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('eng_body', 'İngilizce İçerik') !!}
                        {!! Form::textarea('eng_body', $content->eng_body, ['class'=>'form-control ckeditor']) !!}
                    </div>
                </div>
            </div>
            {{-- İleri Düzey Alanı --}}
            <div class="box box-danger box-solid collapsed-box">
                <div class="box-header with-border">
                    <a href="#" data-widget="collapse">İleri Düzey Ayarlar</a>
                </div>
                <div class="box-body" style="display: none;">
                    <div class="form-group">
                        {!! Form::label('header', 'Header -- bu kısım html bilgisi gerektirir, boş bırakabilirsiniz') !!}
                        {!! Form::textarea('header', $content->header, ['class'=>'form-control', 'placeholder'=>'', 'rows'=>'3']) !!}
                    </div>
                </div>
            </div>
            <div>
                {!! Form::button('Kaydet', ['class'=>'btn btn-primary col-xs-12 col-sm-4', 'type'=>'submit']) !!}
            </div>
            {!! Form::close() !!}
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
{{-- Create New Photo --}}
<div class="col-md-6">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h2 class="box-title">
                {!! $content->title !!} için Yeni Fotoğraf Ekle
            </h2>
            @include('admin.photos.create',['item_id'=>$content->id, 'item_type'=>'App\Content'])
        </div>
    </div>
</div>