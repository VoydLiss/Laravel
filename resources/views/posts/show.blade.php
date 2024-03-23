@extends('layouts.layout')

@section('header')
	@isset($category)
		@include('includes.header-department')
	@endisset
@endsection

@section('content')


		{{ $post->title}}


@endsection