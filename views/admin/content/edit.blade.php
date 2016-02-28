@extends('layout.master_admin')

@section('content')
    @if($content->type == 'Banners')
        @include('admin.content.banners')
    @elseif($content->type == 'Galleries')
        @include('admin.content.galleries')
    @elseif($content->type == 'Links')
        @include('admin.content.links')
    @elseif($content->type == 'People')
        @include('admin.content.people')
    @endif

@endsection