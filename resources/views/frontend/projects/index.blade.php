@extends('layouts.frontend')
@section('content')
@section('page_name', 'Projects')
@include('frontend.components.banner')


<section class="mil-p-120-120">
    <div class="container">

        @foreach ($projects as $index => $project)
            <div
                class="row {{ $index % 2 == 0 ? 'flex-sm-row-reverse' : '' }} justify-content-between align-items-center">
                <div class="col-xl-6 mil-mb-60">
                    <div class="mil-project-cover {{ $index % 2 == 0 ? 'mil-type-2' : '' }}">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="Project">
                    </div>
                </div>
                <div class="col-xl-5 mil-mb-60">
                    <span class="mil-suptitle mil-suptitle-2 mil-mb-30">{{ $project->category }}</span>
                    <h3 class="mil-mb-30">{{ $project->title }}</h3>
                    <a href="{{ route('project.view', $project->slug) }}" class="mil-button-with-label">
                        <div class="mil-button mil-border mil-icon-button"><span><i class="fas fa-plus"></i></span>
                        </div>
                        <span class="mil-dark">See More</span>
                    </a>
                </div>
            </div>
        @endforeach




        <div class="mil-divider mil-mb-60"></div>

        <div class="mil-pagination mil-hidden-arrows">
            <div class="mil-slider-nav">
                @if ($projects->onFirstPage())
                    <div class="mil-slider-btn-prev mil-blog-prev disabled"><i class="fas fa-arrow-left"></i><span class="mil-h6">Prev</span></div>
                @else
                    <a href="{{ $projects->previousPageUrl() }}" class="mil-slider-btn-prev mil-blog-prev"><i class="fas fa-arrow-left"></i><span class="mil-h6">Prev</span></a>
                @endif
            </div>
            <ul class="mil-pagination-numbers">
                @for ($i = 1; $i <= $projects->lastPage(); $i++)
                    <li class="{{ $i == $projects->currentPage() ? 'mil-active' : '' }}">
                        <a href="{{ $projects->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
            </ul>
            <div class="mil-slider-nav">
                @if ($projects->hasMorePages())
                    <a href="{{ $projects->nextPageUrl() }}" class="mil-slider-btn-next mil-blog-next"><span class="mil-h6">Next</span><i class="fas fa-arrow-right"></i></a>
                @else
                    <div class="mil-slider-btn-next mil-blog-next disabled"><span class="mil-h6">Next</span><i class="fas fa-arrow-right"></i></div>
                @endif
            </div>
        </div>


    </div>
</section>


@endsection
