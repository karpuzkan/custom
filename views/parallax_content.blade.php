<section class="container-fluid" id="{!! substr($menu->opSlug,1) !!}">
    <div class="row">
        <h1>{!! $menu->title !!}</h1>
        <h4>{!! $menu->subtitle !!}</h4>
        <p>{!! $menu->body !!}</p>
    </div>
    <div>
        @foreach($menu->contents() as $content)
            @if($content->pivot->contentable_type == "App\Banner")
                <div class="row">@include('temp.carousel', ['banner'=>$content])</div>
            @elseif($content->pivot->contentable_type=="App\Gallery")
                <div class="row">@include('temp.gallery', ['photos'=>$content->photos()->get(), 'gallery'=>$content->title])</div>
            @else
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
</section>

@if($menu->children->count() > 0)
    @foreach($menu->children as $menu)
        @include('parallax_content')
    @endforeach
@endif
