@extends('layout.master_site')
@section('content')
    @include('layout.nav_site')
    <div class="container-fluid">
        <div class="row">
            <h1>{!! $menu->title!!}</h1>
            <h4>{!! $menu->subtitle !!}</h4>
            <p>{!! $menu->body !!}</p>
        </div>
        @foreach($menu->contents()->get() as $content)
            @if($content->type == "Banners")
                <div class="row">@include('temp.carousel', ['banner'=>$content])</div>
            @elseif($content->type =="Galleries")
                <div class="row">@include('temp.gallery', ['photos'=>$content->photos()->get(), 'gallery'=>$content->title])</div>
            @elseif($content->type == "Links")
                <table class="table">
                    <thead>
                    <tr>
                        <th>Başlık</th>
                        <th>Açıklama</th>
                        <th>Link</th>
                        <th>PDF</th>
                    </tr>
                    </thead>
                    <tbody>
                        <div class="row">@each('temp.news', $content->links()->get() , 'link')</div>
                    </tbody>
                </table>
            @endif
        @endforeach
    </div>
@endsection