@extends('layouts.default', ['title' => $category->name ])
@section('content')
    @include('inc.navbar', ['index' => false, 'photos' => true])
    <category-photos category="{{ $category->category_slug }}"></category-photos>
@endsection
