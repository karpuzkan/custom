<div id="{!! str_slug($banner->title) !!}" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @foreach($banner->photos()->get() as $key => $photo)
            <li data-target="#{!! str_slug($banner->title) !!}" data-slide-to="{!! $key !!}" {!! $key==0?'class="active"':null !!}></li>
        @endforeach
    </ol>
    <div class="carousel-inner" role="listbox">
        @foreach($banner->photos()->get() as $key => $photo)
        <div class="item{!! $key==0?' active':null !!}">
            <img src="{!! $photo->slug !!}?w=2200" alt="{!! $photo->slug !!}">
            <div class="container">
                <div class="carousel-caption">
                    <h1>{!! $photo->title !!}</h1>
                    <p>{!! $photo->body !!}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <a class="left carousel-control" href="#{!! str_slug($banner->title)!!}" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#{!! str_slug($banner->title) !!}" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>