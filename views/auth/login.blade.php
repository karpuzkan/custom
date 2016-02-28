@extends('layout.master_admin')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            {!! Html::image('img/assets/logo.png', null, ['style'=>'max-height:50px']) !!}
        </div>
        <div class="login-box-body">
            <div class="login-box-message">
                @include('partial.error')
            </div>
            {{-- LogIn --}}
            {!! Form::open(['url' => '/auth/login', 'method'=>'POST', 'file'=>'null'])!!}
            {!! csrf_field() !!}
            <div class="form-group">
                {!! Form::text('email', null, ['class'=>'form-control input-sm chat-input', 'placeholder'=>'E-posta']) !!}
            </div>

            <div class="form-group">
                {!! Form::password('password', ['class'=>'form-control input-sm chat-input', 'placeholder'=>'password']) !!}
            </div>

            <div class="checkbox">
                <label>
                    {!! Form::checkbox('remember')!!}Beni Hatırla
                </label>
            </div>
            <div>
                {!! Form::button('Giriş Yap', ['class'=>'btn btn-primary btn-md btn-block', 'type'=>'submit']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection