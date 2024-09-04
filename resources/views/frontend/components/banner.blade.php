


   <!-- banner -->
     <div class="mil-banner-sm mil-deep-bg">
        <img src="{{asset('frontend/img/deco/map.png')}}" alt="background" class="mil-background-image">
        <div class="mil-deco mil-deco-accent" style="top: 47%; right: 10%; transform: rotate(90deg)"></div>
        <div class="mil-banner-content">
            <div class="container mil-relative">
                <ul class="mil-breadcrumbs mil-mb-30">
                    <li><a href="{{route('/')}}">Home</a></li>
                    <li><a href="">@yield('page_name')</a></li>
                </ul>
                <h2 class="mil-uppercase">@yield('page_name')</h2>
            </div>
        </div>
    </div>
    <!-- banner end -->