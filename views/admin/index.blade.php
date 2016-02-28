@extends('layout.master_admin')
@section('content')
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                @include('partial.error')
                <h2 class="box-title">Site Ayarları</h2>
                {!! Form::open(['url' => '/admin', 'method'=>'POST', 'file'=>'true', 'enctype'=>'multipart/form-data', 'role'=>'form'])!!}
                <div class="form-group">
                    {!! Form::label('brand', 'Şirket Adı') !!}
                    {!! Form::text('brand', $brand, ['class'=>'form-control', 'placeholder'=>'']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('mail', 'Şirket Mail Adresi') !!}<br>
                    <small>iletişim formu, abonelik bildirimleri, siteden gönderilecek mailler için kullanılacaktır</small>
                    {!! Form::text('mail', $mail, ['class'=>'form-control', 'placeholder'=>'']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('active', 'Site Aktif mi?') !!}
                    {!! Form::select('active', ['HAYIR','EVET'], $active, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('eng', 'İngilizce aktif mi?') !!}
                    {!! Form::select('eng', ['HAYIR','EVET'], $eng, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('one_page', 'Site tek sayfadan mı oluşuyor?') !!}
                    {!! Form::select('one_page', ['HAYIR','EVET'], $one_page, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('googlemap', 'Google Map Iframe') !!}<br>
                    <small><a href="https://support.google.com/maps/answer/3544418?hl=tr" target="_blank">Google Map ekleme yardımı için tıklayınız</a></small>
                    {!! Form::text('googlemap', $googlemap, ['class'=>'form-control', 'placeholder'=>'']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('logo', 'logonuz') !!}
                    {!! Form::file('logo', null, ['class'=>'form-control']) !!}
                </div>

                {{-- İleri Düzey Ayarlar --}}
                <div class="box box-danger box-solid collapsed-box">
                    <div class="box-header with-border">
                        <a href="#" data-widget="collapse">İleri Düzey Ayarlar</a>
                    </div>
                    <div class="box-body" style="display: none;">
                        <div class="form-group">
                            <div class="form-group">
                                {!! Form::label('header', 'Site Header -- bu kısım html bilgisi gerektirir, boş bırakabilirsiniz') !!}
                                {!! Form::textarea('header', $header, ['class'=>'form-control', 'rows'=>'3']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('ico', 'ico dosyası') !!}
                                {!! Form::file('ico', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('custom_css', 'css Dosyası') !!}
                                {!! Form::file('custom_css', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('custom_js', 'javascript Dosyası') !!}
                                {!! Form::file('custom_js', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    {!! Form::button('Kaydet', ['class'=>'btn btn-primary btn-sm btn-block', 'type'=>'submit']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <div class="col-xs-12">
                    {!! Html::link('http://static.googleusercontent.com/media/www.google.com/tr//intl/tr/webmasters/docs/arama-motoru-optimizasyon-baslangic-rehberi.pdf', 'Google Seo Rehberi', ['target'=>'_blank']) !!}
                </div>
                <div class="col-xs-12">
                    {!! Html::link('', 'Sitenizi Görüntelemek için tıklayınız', ['target'=>'_blank']) !!}
                </div>
            </div>
        </div>
        @if($jss || $csss)
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h2 class="box-title">Siteye Yüklediğiniz Dosyalar</h2>
                    @foreach($csss as $css)
                        {{-- delete css --}}
                        <li class="list-group-item">
                            <!-- CHANGE TITLE -->
                            {!! Html::link('custom/css/'.$css->getRelativePathname(), $css->getRelativePathname(), ['target'=>'_BLANK']) !!}
                            <ul class="list-group pull-right">
                                <!-- DELETE BUTTON -->
                                {!! Form::open(['url' => '/admin/custom/css/'.$css->getRelativePathname(), 'method'=>'DELETE', 'class'=>'pull-right'])!!}
                                {!! Form::button('Sil', ['class'=>'ui-icon ui-icon-closethick', 'type'=>'submit']) !!}
                                {!! Form::close() !!}
                            </ul>
                        </li>
                    @endforeach
                    @foreach($jss as $js)
                        {{-- delete css --}}
                        <li class="list-group-item">
                            <!-- CHANGE TITLE -->
                            {!! Html::link('custom/js/'.$js->getRelativePathname(), $js->getRelativePathname(), ['target'=>'_BLANK']) !!}
                            <ul class="list-group pull-right">
                                <!-- DELETE BUTTON -->
                                {!! Form::open(['url' => '/admin/custom/js/'.$js->getRelativePathname(), 'method'=>'DELETE', 'class'=>'pull-right'])!!}
                                {!! Form::button('Sil', ['class'=>'ui-icon ui-icon-closethick', 'type'=>'submit']) !!}
                                {!! Form::close() !!}
                            </ul>
                        </li>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="box box-danger">
            <div class="box-header with-border">
                <div class="col-xs-12">
                    <a href="/admin/subscribes">Abone Listesi</a>
                </div>
            </div>
        </div>
    </div>
@endsection