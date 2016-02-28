@extends('layout.master_site')
@section('content')
    @include('layout.op_nav_site')
    @each('parallax_content', $menus, 'menu')
@endsection