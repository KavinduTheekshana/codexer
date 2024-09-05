@extends('layouts.backend')

@section('content')
    <div class="dashboard-main-body">
    @section('page_name', 'Codexer')
    @include('backend.components.breadcrumb')
    <div class="row gy-4">
        @include('backend.dashboard.cards')




    </div>

</div>

@endsection
