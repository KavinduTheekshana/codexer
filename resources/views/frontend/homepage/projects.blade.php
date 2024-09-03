<!-- portfolio -->
<section class="mil-works mil-p-120-90">
    <div class="mil-deco" style="top: 0; right: 40%;"></div>
    <div class="container">
        <div class="row align-items-center mil-mb-60-adapt">
            <div class="col-md-6 col-xl-6">

                <h2 class="mil-mb-30">Latest Projects</h2>

            </div>
            <div class="col-md-6 col-xl-6">

                <div class="mil-adaptive-right">
                    <div class="mil-slider-nav mil-mb-30">
                        <div class="mil-slider-btn-prev mil-works-prev"><i class="fas fa-arrow-left"></i><span
                                class="mil-h6">Prev</span></div>
                        <div class="mil-slider-btn-next mil-works-next"><span class="mil-h6">Next</span><i
                                class="fas fa-arrow-right"></i></div>
                    </div>
                </div>

            </div>
        </div>

        <div class="swiper-container mil-works-slider mil-mb-90">
            <div class="swiper-wrapper">
                @foreach ($projects as $project)
                <div class="swiper-slide">

                    <a href="{{ route('project.view', $project->slug) }}" class="mil-card">
                        <div class="mil-cover-frame">
                            @if ($project->image)
                                      <img src="{{ asset('storage/' . $project->image) }}"
                                          alt="{{ $project->name }}">
                                  @else
                                      <img src="{{ asset('images/default-image.png') }}" alt="No image available">
                                  @endif

                        </div>
                        <div class="mil-description">
                            <div class="mil-card-title">
                                <h4 class="mil-mb-10">{{$project->title}}</h4>
                                <h6><span class="mil-accent">{{$project->category}}</span></h6>
                            </div>
                            <div class="mil-card-text">
                                <p>{{ Str::limit(strip_tags($project->message), 120) }}</p>
                            </div>
                        </div>
                    </a>

                </div>
                @endforeach



            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6 col-xl-6">

                <a href="portfolio.html" class="mil-link mil-mb-30"><span>View All Cases</span><i
                        class="fas fa-arrow-right"></i></a>

            </div>
            <div class="col-md-6 col-xl-6">

                <div class="mil-adaptive-right">
                    <a href="contact.html" class="mil-button mil-border mil-mb-30"><span>Get Started</span></a>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- portfolio end -->
