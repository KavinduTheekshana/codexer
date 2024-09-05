@extends('layouts.backend')

@section('content')
    <div class="dashboard-main-body">
    @section('page_name', 'Profile')
    @include('backend.components.breadcrumb')


    <div class="row gy-4">
        <div class="col-lg-4">
            <div class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">
                <img src="{{ asset('backend/images/profilebackground.jpg') }}" alt=""
                    class="w-100 object-fit-cover">
                <div class="pb-24 ms-16 mb-24 me-16  mt--100">
                    <div class="text-center border border-top-0 border-start-0 border-end-0">
                        <img src="{{ asset('backend/images/Default-avatar.jpg') }}" alt=""
                            class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover">
                        <h6 class="mb-0 mt-16">{{ Auth::user()->name }}</h6>
                        <span class="text-secondary-light mb-16">{{ Auth::user()->email }}</span>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-8">
            @include('backend.components.alert')
            <div class="card h-100">
                <div class="card-body p-24">


                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel"
                            aria-labelledby="pills-edit-profile-tab" tabindex="0">
                            <h6 class="text-md text-primary-light ">Profile Information</h6>
                            <p class="mb-16">Update your account's profile information and email address.</p>

                            <form class="mt-3 mb-5" method="POST" action="{{ route('profile.update.user') }}">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-20">
                                            <label for="name"
                                                class="form-label fw-semibold text-primary-light text-sm mb-8">Full Name
                                                <span class="text-danger-600">*</span></label>
                                            <input type="text" class="form-control radius-8" id="name"
                                                name="name" value="{{ old('name', auth()->user()->name) }}"
                                                placeholder="Enter Full Name">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-20">
                                            <label for="email"
                                                class="form-label fw-semibold text-primary-light text-sm mb-8">Email
                                                <span class="text-danger-600">*</span></label>
                                            <input type="email" class="form-control radius-8" id="email"
                                                name="email" value="{{ old('email', auth()->user()->email) }}"
                                                placeholder="Enter email address">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-center gap-3">
                                    <button type="submit"
                                        class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                        Update
                                    </button>
                                </div>
                            </form>

                            <hr>

                            <h6 class="text-md text-primary-light mt-5 ">Update Password</h6>
                            <p class="mb-16">Ensure your account is using a long, random password to stay secure.</p>



                            <form class="mt-3" method="POST" action="{{ route('profile.update.password') }}">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-20">
                                            <label for="current_password" class="form-label fw-semibold text-primary-light text-sm mb-8">Current Password
                                                <span class="text-danger-600">*</span></label>
                                            <input type="password" class="form-control radius-8" id="current_password" name="current_password" placeholder="Enter current password">
                                            @error('current_password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-20">
                                            <label for="password" class="form-label fw-semibold text-primary-light text-sm mb-8">New Password
                                                <span class="text-danger-600">*</span></label>
                                            <input type="password" class="form-control radius-8" id="password" name="password" placeholder="Enter new password">
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-20">
                                            <label for="password_confirmation" class="form-label fw-semibold text-primary-light text-sm mb-8">Confirm Password
                                                <span class="text-danger-600">*</span></label>
                                            <input type="password" class="form-control radius-8" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password">
                                            @error('password_confirmation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-center gap-3">

                                    <button type="submit" class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                        Update Password
                                    </button>
                                </div>
                            </form>


                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
