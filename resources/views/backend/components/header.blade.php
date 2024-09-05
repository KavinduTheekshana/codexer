<div class="navbar-header">
    <div class="row align-items-center justify-content-between">
        <div class="col-auto">
            <div class="d-flex flex-wrap align-items-center gap-4">
                <button type="button" class="sidebar-toggle">
                    <iconify-icon icon="heroicons:bars-3-solid" class="icon text-2xl non-active"></iconify-icon>
                    <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
                </button>
                <button type="button" class="sidebar-mobile-toggle">
                    <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
                </button>

            </div>
        </div>
        <div class="col-auto">
            <div class="d-flex flex-wrap align-items-center gap-3">
                <button type="button" data-theme-toggle
                    class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"></button>


                <!-- In your header blade template -->
                <div class="dropdown">
                    <button
                        class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                        type="button" data-bs-toggle="dropdown">
                        <iconify-icon icon="mage:email" class="text-primary-light text-xl"></iconify-icon>
                    </button>
                    <div class="dropdown-menu to-top dropdown-menu-lg p-0">
                        <div
                            class="m-16 py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                            <div>
                                <h6 class="text-lg text-primary-light fw-semibold mb-0">Messages</h6>
                            </div>
                            <span
                                class="text-primary-600 fw-semibold text-lg w-40-px h-40-px rounded-circle bg-base d-flex justify-content-center align-items-center">{{ $unreadContacts->count() }}</span>
                        </div>

                        <div class="max-h-400-px overflow-y-auto scroll-sm pe-4">
                            @foreach ($unreadContacts as $contact)
                                <a href="#"
                                    class="px-24 py-12 d-flex align-items-start gap-3 mb-2 justify-content-between">
                                    <div
                                        class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">

                                        <div>
                                            <h6 class="text-md fw-semibold mb-4">{{ $contact->first_name }}
                                                {{ $contact->last_name }}</h6>
                                            <p class="mb-0 text-sm text-secondary-light text-w-100-px">
                                                {{ Str::limit($contact->project_description, 80) }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span
                                            class="text-sm text-secondary-light flex-shrink-0">{{ $contact->created_at->format('h:i A') }}</span>

                                    </div>
                                </a>
                            @endforeach
                        </div>

                        <div class="text-center py-12 px-16">
                            <a href="{{ route('contacts.index') }}" class="text-primary-600 fw-semibold text-md">See
                                All Messages</a>
                        </div>
                    </div>
                </div>




                <div class="dropdown">
                    <button class="d-flex justify-content-center align-items-center rounded-circle" type="button"
                        data-bs-toggle="dropdown">
                        <span class="w-40-px h-40-px rounded-circle object-fit-cover d-flex justify-content-center align-items-center fw-semibold text-sm bg-success-100 text-success-600">{{ Auth::user() ? substr(Auth::user()->name, 0, 2) : '' }}</span>
                    </button>
                    <div class="dropdown-menu to-top dropdown-menu-sm">
                        <div
                            class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                            <div>
                                <h6 class="text-lg text-primary-light fw-semibold mb-2">{{Auth::user()->name}}</h6>
                                <span class="text-secondary-light fw-medium text-sm">Admin</span>
                            </div>
                            <button type="button" class="hover-text-danger">
                                <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
                            </button>
                        </div>
                        <ul class="to-top-list">
                            <li>
                                <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                    href="{{route('profile')}}">
                                    <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon> My
                                    Profile</a>
                            </li>


                            <li>
                              <form method="POST" action="{{ route('logout') }}">
                                  @csrf
                                  <button type="submit" class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3">
                                      <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon> Log Out
                                  </button>
                              </form>
                          </li>

                        </ul>
                    </div>
                </div><!-- Profile dropdown end -->


            </div>
        </div>
    </div>
</div>
