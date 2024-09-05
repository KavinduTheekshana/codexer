<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{route('dashboard')}}" class="sidebar-logo">
            <img src="{{ asset('backend/images/codexer_dark.svg') }}" alt="site logo" class="light-logo w-80">
            <img src="{{ asset('backend/images/codexer_light.svg') }}" alt="site logo" class="dark-logo">
            <img src="{{ asset('backend/images/favicon.svg') }}" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li class="sidebar-menu-group-title">Menu</li>
            <li>
                <a href="email.html">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="dropdown">
                <a href="{{ route('testimonials.list') }}">
                    <iconify-icon icon="bi:body-text" class="menu-icon"></iconify-icon>
                    <span>Testimonial</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('testimonials.list') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> List</a>
                    </li>
                    <li>
                        <a href="{{ route('testimonials.add') }}"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Add</a>
                    </li>

                </ul>
            </li>

            <li class="dropdown">
                <a href="{{ route('projects.list') }}">
                    <iconify-icon icon="solar:document-text-outline" class="menu-icon"></iconify-icon>
                    <span>Projects</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('projects.list') }}"><i
                                class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> List</a>
                    </li>
                    <li>
                        <a href="{{ route('projects.add') }}"><i
                                class="ri-circle-fill circle-icon text-warning-main w-auto"></i> Add</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="{{route('contact.list')}}">
                    <iconify-icon icon="bi:chat-dots" class="menu-icon"></iconify-icon>
                    <span>Contact</span>
                </a>
            </li>

            <li>
                <a href="{{ route('subscriptions.list') }}">
                    <iconify-icon icon="iconamoon:news-thin" class="menu-icon"></iconify-icon>
                    <span>Subscribers</span>
                </a>
            </li>



        </ul>
    </div>
</aside>
