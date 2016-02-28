<div class="col-xs-12"><hr></div>
<div class="col-xs-12">
    <p>photo title is: {!! (\Request::segment(1)=='eng'&&$photo->eng_title!=''?$photo->eng_title:$photo->title) !!}</p>
    <p>photo alt_tag is: {!! (\Request::segment(1)=='eng'&&$photo->eng_alt_tag!=''?$photo->eng_alt_tag:$photo->alt_tag) !!}</p>
    <img src="{!! $photo->slug !!}?w=500" alt="{!! (\Request::segment(1)=='eng'&&$photo->eng_alt_tag!=''?$photo->eng_alt_tag:$photo->alt_tag) !!}">
    <p>photo body is: {!! (\Request::segment(1)=='eng'&&$photo->eng_body!=''?$photo->eng_body:$photo->body) !!}</p>
</div>