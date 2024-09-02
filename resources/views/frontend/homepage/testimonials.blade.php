  <!-- reviews -->
  <section class="mil-reviews mil-deep-bg mil-p-120-120 testimonial">
      <div class="mil-deco" style="top: 0; right: 30%;"></div>
      <div class="container">
          <div class="row align-items-center mil-mb-90">
              <div class="col-md-6 col-xl-6">

                  <span class="mil-suptitle mil-suptitle-2 mil-mb-30">Testimonial</span>
                  <h2>What Our <span class="mil-accent">Clients</span> Say</h2>

              </div>
              <div class="col-md-6 col-xl-6">

                  <div class="mil-adaptive-right mil-mt-60-adapt">
                      <div class="mil-slider-nav">
                          <div class="mil-slider-btn-prev mil-revi-prev"><i class="fas fa-arrow-left"></i><span
                                  class="mil-h6">Prev</span></div>
                          <div class="mil-slider-btn-next mil-revi-next"><span class="mil-h6">Next</span><i
                                  class="fas fa-arrow-right"></i></div>
                      </div>
                  </div>

              </div>
          </div>
          <div class="swiper-container mil-revi-slider">
              <div class="swiper-wrapper">
                  @foreach ($testimonials as $testimonial)
                      <div class="swiper-slide">

                          <div class="mil-review">
                              <div class="mil-stars mil-mb-30">
                                  <img src="{{ asset('frontend/img/icons/sm/11.svg') }}" alt="quote">
                                  <ul>
                                      @for ($i = 1; $i <= 5; $i++)
                                          @if ($i <= $testimonial->rating)
                                          <li><i class="fas fa-star"></i></li>
                                          @else
                                            <li><i class="fas fa-star" style="color: gray;"></i></li> <!-- Empty star -->
                                          @endif
                                      @endfor
                                  </ul>
                              </div>
                              <p class="mil-mb-30">{{ $testimonial->message }}</p>
                              <div class="mil-author">
                                  @if ($testimonial->image)
                                      <img src="{{ asset('storage/' . $testimonial->image) }}"
                                          alt="{{ $testimonial->name }}">
                                  @else
                                      <img src="{{ asset('images/default-image.png') }}" alt="No image available">
                                  @endif
                                  {{-- <img src="img/faces/1.jpg" alt="Customer"> --}}
                                  <div class="mil-name">
                                      <h6 class="mil-mb-5">{{ $testimonial->name }}</h6>
                                      <span class="mil-text-sm">{{ $testimonial->designation }},
                                          {{ $testimonial->company }}</span>
                                  </div>
                              </div>
                          </div>

                      </div>
                  @endforeach


              </div>
          </div>
      </div>
  </section>
  <!-- reviews end -->
