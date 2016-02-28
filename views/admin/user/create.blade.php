@extends('layout.master_admin')

@section('content')
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                @include('partial.error')
                <h2>Yeni Kullanıcı Oluştur</h2>
                {{-- Kullanıcı Form --}}
                {!! Form::open(['url' => '/admin/user', 'method'=>'POST', 'file'=>'null'])!!}
                {!! csrf_field() !!}
                <div class="form-group">
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'İsim']) !!}
                </div>
                <div class="form-group">
                    {!! Form::text('email', null, ['class'=>'form-control input-sm chat-input', 'placeholder'=>'E-posta']) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('password', ['class'=>'form-control input-sm chat-input', 'placeholder'=>'Şifre']) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('password_confirmation', ['class'=>'form-control input-sm chat-input', 'placeholder'=>'Şifre Tekrar']) !!}
                </div>
                {{-- Kullanıcı Konfirme Edilecek mi? --}}
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('confirmation')!!}Yeni Kullanıcıdan E-posta ile konfirme istensin mi?
                    </label>
                </div>
                <hr>
                <h3>İzinler</h3>
                <small>Yeni Kullanıcı varsayılan olarak tüm alanları görüntüleyebilir fakat ekleme,değiştirme,silme işlemleri yapamaz. Yetkileri değiştirmek için aşağıdaki alanları düzenleyiniz.</small>
                {{-- Anasayfa Permission --}}
                @include('admin.user.select', ['title'=>'Yönetici Anasayfa','item'=>'home', 'sort'=>false])
                {{-- Menü Permission --}}
                @include('admin.user.select', ['title'=>'Menü','item'=>'menu', 'sort'=>true, 'custom'=>[['model'=>'contents', 'permission'=>'sort', 'title'=> 'İçerik Sıralama']]])
                {{-- Galeri Permission --}}
                @include('admin.user.select', ['title'=>'Galeri', 'item'=>'galleries', 'sort'=>false])
                {{-- Banner Permission --}}
                @include('admin.user.select', ['title'=>'Banner', 'item'=>'banners', 'sort'=>false])
                {{-- Links Permission --}}
                @include('admin.user.select', ['title'=>'Haber&Dış Link', 'item'=>'links', 'sort'=>false, 'note'=>'Bu alan eklenecek haber&dış link başlıklarını kapsar'])
                {{-- User Permission --}}
                @include('admin.user.select', ['title'=>'Kullanıcı', 'item'=>'user', 'sort'=>false])
                {{-- Photo Permission --}}
                @include('admin.user.select', ['title'=>'Fotoğraf', 'item'=>'photo', 'sort'=>true])
                {{-- News Permission --}}
                @include('admin.user.select', ['title'=>'Haber&Dış Link', 'item'=>'photo', 'sort'=>true, 'note'=>'Bu alan başlık altına eklenecek haber&dış linkleri kapsar'])

            </div>
            <div>
                {!! Form::button('Kaydet', ['class'=>'btn btn-primary btn-md btn-block', 'type'=>'submit']) !!}
            </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection