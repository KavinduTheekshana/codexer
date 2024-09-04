@extends('layouts.frontend')
@section('content')
@section('page_name', 'Contact us')
@include('frontend.components.banner')
@include('frontend.contact.form')
@include('frontend.contact.map')
@include('frontend.contact.contact')
@endsection