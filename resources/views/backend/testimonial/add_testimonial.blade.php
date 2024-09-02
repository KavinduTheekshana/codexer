@extends('layouts.backend')

@section('content')

    <div class="dashboard-main-body">




    @section('page_name', isset($testimonial) ? 'Edit Testimonial' : 'Add Testimonial')
    @include('backend.components.breadcrumb')

    <div class="row gy-4">
        <div class="col-md-6">
            @include('backend.components.alert')
            <div class="card">
                <div class="card-header d-flex">
                    <a href="{{ route('testimonials.list') }}" type="button"
                        class="btn btn-neutral-900 text-base radius-8 px-20 py-11 d-flex align-items-center gap-2 ml-auto">
                        <iconify-icon icon="fontisto:list-1"></iconify-icon> TESTIMONIAL LIST
                    </a>
                </div>
                <div class="card-body">
                    <div class="row gy-3">

                        <form
                            action="{{ isset($testimonial) ? route('testimonials.update', $testimonial->id) : route('testimonials.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($testimonial))
                                @method('PUT')
                            @endif

                            <div class="form-group mb-24">
                                <label class="form-label" for="name">Name:</label>
                                <input type="text" name="name" id="name" class="form-control" required
                                    value="{{ old('name', $testimonial->name ?? '') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-24">
                                <label class="form-label" for="designation">Designation:</label>
                                <input type="text" name="designation" id="designation" class="form-control" required
                                    value="{{ old('designation', $testimonial->designation ?? '') }}">
                                @error('designation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-24">
                                <label class="form-label" for="company">Company:</label>
                                <input type="text" name="company" id="company" class="form-control" required
                                    value="{{ old('company', $testimonial->company ?? '') }}">
                                @error('company')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-24">
                                <label class="form-label" for="message">Testimonial Message:</label>
                                <textarea name="message" id="message" class="form-control" rows="5" required>{{ old('message', $testimonial->message ?? '') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-24">
                                <label class="form-label" for="rating">Rating:</label>
                                <select name="rating" id="rating" class="form-control" required>
                                    <option value="5"
                                        {{ old('rating', $testimonial->rating ?? '') == 5 ? 'selected' : '' }}>5 -
                                        Excellent</option>
                                    <option value="4"
                                        {{ old('rating', $testimonial->rating ?? '') == 4 ? 'selected' : '' }}>4 - Good
                                    </option>
                                    <option value="3"
                                        {{ old('rating', $testimonial->rating ?? '') == 3 ? 'selected' : '' }}>3 -
                                        Average</option>
                                    <option value="2"
                                        {{ old('rating', $testimonial->rating ?? '') == 2 ? 'selected' : '' }}>2 - Poor
                                    </option>
                                    <option value="1"
                                        {{ old('rating', $testimonial->rating ?? '') == 1 ? 'selected' : '' }}>1 - Very
                                        Poor</option>
                                </select>
                                @error('rating')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-24">
                                <label class="form-label" for="image">Customer Image (optional):</label>
                                <input type="file" name="image" id="image" class="form-control"
                                    onchange="previewImage(event)">
                                @if (isset($testimonial) && $testimonial->image)
                                    <p class="form-label mt-3" >Current Image:</p>
                                    <img src="{{ asset('storage/' . $testimonial->image) }}" alt="Customer Image"
                                        style="max-width: 150px; display: block; margin-top: 10px;">
                                @endif
                                {{-- <p>Selected Image:</p> --}}
                                <img id="imagePreview" src="#" alt="Selected Image"
                                    style="max-width: 150px; display: none; margin-top: 10px;">

                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit"
                                class="btn btn-primary mt-3 ml-auto d-flex justify-content-end align-items-end">{{ isset($testimonial) ? 'Update Testimonial' : 'Add Testimonial' }}</button>
                        </form>



                    </div>
                </div>
            </div><!-- card end -->

        </div>


    </div>


</div>
@endsection

@push('scripts')
<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function() {
            var imagePreview = document.getElementById('imagePreview');
            imagePreview.src = reader.result;
            imagePreview.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
@endpush
