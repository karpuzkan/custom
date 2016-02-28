<div class="gallery">
    <div class="gallery-content">
        @foreach($photos as $photo)
            <figure class="col-xs-4 col-sm-3">
                <a class="fancybox" data-fancybox-group="{!! $gallery !!}" href="{!! $photo->slug !!}" title="{!! $photo->title !!}">
                    <figcaption>
                        <img class="img-responsive" data-original="{!! $photo->slug !!}" alt="{!! $photo->alt_tag !!}">
                        <noscript>
                            <img src="{!! $photo->slug !!}" alt="{!! $photo->alt_tag !!}">
                        </noscript>
                        <h5>{!! $photo->title !!}</h5>
                        <p>{!! $photo->body !!}</p>
                    </figcaption>
                </a>
            </figure>
        @endforeach
    </div>
</div>