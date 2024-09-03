@extends('layouts.frontend')
@section('content')

  <!-- banner -->
  <div class="mil-banner-sm mil-deep-bg text-white-banner">
    <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('images/default-image.png') }}" alt="{{ $project->title }}" alt="background" class="mil-background-image project-header">
    <div class="overlay"></div>
    <div class="mil-deco mil-deco-accent" style="top: 47%; right: 10%; transform: rotate(90deg)"></div>
    <div class="mil-banner-content">
        <div class="container mil-relative">
            <ul class="mil-breadcrumbs mil-mb-30">
                <li><a href="{{route('/')}}">Home</a></li>
                <li><a href="#">Projects</a></li>
            </ul>
            <h2 class="mil-uppercase">{{$project->title}}</h2>
        </div>
    </div>
</div>
<!-- banner end -->


<!-- project -->
<section class="mil-p-120-90">
    <div class="container">

        <div class="row flex-sm-row-reverse justify-content-between">
            <div class="col-lg-4 col-xl-3">

                <div class="mil-project-info mil-mb-60">

                    <h5 class="mil-list-title mil-mb-30">Project Info</h5>

                    <p class="mil-mb-10">Category</p>
                    <h6 class="mil-mb-15">{{$project->category}}</h6>
                    <div class="mil-divider mil-divider-left mil-mb-30"></div>
                    <p class="mil-mb-10">Client</p>
                    <h6 class="mil-mb-15">{{$project->client}}</h6>
                    <div class="mil-divider mil-divider-left mil-mb-30"></div>
                    <p class="mil-mb-10">Industry</p>
                    <h6 class="mil-mb-15">{{$project->industry}}</h6>
                    <div class="mil-divider mil-divider-left mil-mb-30"></div>
                    <p class="mil-mb-10">Stack</p>
                    <h6>{{$project->stack}}</h6>

                </div>

            </div>
            <div class="col-lg-7 col-xl-8">

                <span class="mil-suptitle mil-suptitle-2 mil-mb-30">Overviews</span>
                <div class="mil-mb-30 text-dark">{!! $project->message !!}</div>


            </div>
        </div>

    </div>
</section>
<!-- project end -->


@endsection
