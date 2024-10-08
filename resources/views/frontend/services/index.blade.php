@extends('layouts.frontend')
@section('content')
@section('page_name', 'Services')
@include('frontend.components.banner')
@include('frontend.services.mobile')
@include('frontend.services.call')
@include('frontend.services.tech')
@include('frontend.components.divider')
@include('frontend.components.partners')
@include('frontend.services.type')
@endsection
