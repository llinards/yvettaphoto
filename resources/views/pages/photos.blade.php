@extends('layouts.default', ['title' => $category->name ])
@section('content')
 @include('inc.sm-navbar')
 @include('gallery.photos')
@stop