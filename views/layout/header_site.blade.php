<head>
    <title>{!! !empty($content)?$content->Ctitle:$brand !!}</title>
    {!! Html::style('/css/app.css') !!}
    {!! Html::style('/css/jquery.mCustomScrollbar.min.css') !!}
    {!! Html::style('/css/jquery.fancybox.css') !!}
    {!! $header !!}
    {!! !empty($content)?$content->header:null !!}
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
