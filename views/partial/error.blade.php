<!-- MESSAGES -->
@if(Session::get('message'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h4><i class="icon glyphicon glyphicon-ok"></i>Tebrikler</h4>
        {!! Session::get('message') !!}
    </div>
@endif
<!-- ERRORS -->
@if($errors->any())
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon glyphicon glyphicon-ban-circle"></i> Dikkat!</h4>
        @foreach ($errors->all() as $error)
            {!! $error !!}<br/>
        @endforeach
    </div>
@endif
<!-- MESSAGES -->
@if(Session::get('status'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h4><i class="icon glyphicon glyphicon-ok"></i>Tebrikler</h4>
        {!! Session::get('status') !!}
    </div>
@endif