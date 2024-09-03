@push('styles')
<!-- Place the first <script> tag in your HTML's <head> -->
    <script src="https://cdn.tiny.cloud/1/ebtj6ek8vbl0ag8fujsi9056twiaad2ibgf4lux362t0vou6/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->

@endpush
@extends('layouts.backend')

@section('content')

    <div class="dashboard-main-body">




    @section('page_name', isset($testimonial) ? 'Edit Project' : 'Add Project')
    @include('backend.components.breadcrumb')

    <div class="row gy-4">
        <div class="col-md-8">
            @include('backend.components.alert')
            <div class="card">
                <div class="card-header d-flex">
                    <a href="{{ route('projects.list') }}" type="button"
                        class="btn btn-neutral-900 text-base radius-8 px-20 py-11 d-flex align-items-center gap-2 ml-auto">
                        <iconify-icon icon="fontisto:list-1"></iconify-icon> PROJECTS LIST
                    </a>
                </div>
                <div class="card-body">
                    <div class="row gy-3">

                        <form
                            action="{{ $project->exists ? route('projects.update', $project->id) : route('projects.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($project->exists)
                                @method('PUT')
                            @endif
                            <div class="form-group mb-24">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title', $project->title) }}" required>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-24">
                                <label class="form-label" for="category">Category</label>
                                <input type="text" name="category" id="category"
                                    class="form-control @error('category') is-invalid @enderror"
                                    value="{{ old('category', $project->category) }}" required>
                                @error('category')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-24">
                                <label class="form-label" for="client">Client</label>
                                <input type="text" name="client" id="client"
                                    class="form-control @error('client') is-invalid @enderror"
                                    value="{{ old('client', $project->client) }}" required>
                                @error('client')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-24">
                                <label class="form-label" for="industry">Industry</label>
                                <input type="text" name="industry" id="industry"
                                    class="form-control @error('industry') is-invalid @enderror"
                                    value="{{ old('industry', $project->industry) }}" required>
                                @error('industry')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-24">
                                <label class="form-label" for="stack">Stack</label>
                                <input type="text" name="stack" id="stack"
                                    class="form-control @error('stack') is-invalid @enderror"
                                    value="{{ old('stack', $project->stack) }}" required>
                                @error('stack')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-24">
                                <label class="form-label" for="message">Message</label>
                                <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" rows="4" required>{{ old('message', $project->message) }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-24">
                                <label class="form-label" for="image">Image</label>
                                @if ($project->exists && $project->image)
                                    <div>
                                        <img src="{{ asset('storage/' . $project->image) }}" alt="Current Image" class="mb-24"
                                            style="max-width: 150px;">
                                    </div>
                                @endif
                                <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror" onchange="previewImage(event)">
                                <img id="imagePreview" src="#" alt="Selected Image"
                                    style="max-width: 550px; display: none; margin-top: 10px;">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit"
                                class="btn btn-primary">{{ $project->exists ? 'Update Project' : 'Create Project' }}</button>
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

<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        setup: function (editor) {
            editor.on('change', function () {
                editor.save(); // Save the content to the original textarea
            });
        }
    });
</script>

@endpush
