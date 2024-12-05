@extends('layouts.backend')
@section('title', 'Project-Edit')
@section('breadcrumb', 'EDIT PROJECT')

@section('content')
    <div class="row">

        <form action="{{ route('dashboard.project.update', $project->id) }}" enctype="multipart/form-data" method="POST">
            @method('PUT')
            @csrf
            <div class="col-lg-12">
                <div class="card rounded-3 border-0 mb-4">

                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-12 mb-3">
                                <label class="form-label">Title *</label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $project->title) }}">

                                @error('title')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-lg-12 mb-5">
                                <label class="form-label">Description</label>

                                <input id="description" type="hidden" name="description" class="form-control"
                                    value="{{ old('description', $project->description) }}">
                                <trix-editor input="description" class="form-control"></trix-editor>

                                @error('description')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label">Technology</label>

                                <input id="technology" type="hidden" name="technology" class="form-control"
                                    value="{{ old('technology', $project->technology) }}">
                                <trix-editor input="technology" class="form-control"></trix-editor>

                                @error('technology')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Source Code</label>
                                <input type="text" name="source_code" class="form-control"
                                    value="{{ old('source_code', $project->source_code) }}">

                                @error('source_code')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Demo</label>
                                <input type="text" name="demo" class="form-control"
                                    value="{{ old('demo', $project->demo) }}">

                                @error('demo')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label">Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control">

                                <img src="{{ asset('projectImages/' . $project->thumbnail) }}" alt=""
                                    width="80px" class="mt-2 rounded-2">

                                @error('thumbnail')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-12">
                <div class="card rounded-3 border-0 mb-4">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-12 mb-3">
                                <label class="form-label">Upload More Images</label>
                                <input type="file" name="images[]" class="form-control" multiple>

                                @error('images')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('dashboard.project.index') }}" type="submit" class="btn btn-secondary">Back</a>

                    </div>
                </div>
            </div>


            <div class="col-lg-12">
                <div class="card rounded-3 border-0 mb-4">
                    <div class="card-body">
                        <div class="row">
                            @forelse ($project->projectGalleries as $projectGallery)
                                <div class="col-lg-3 mb-3 projectGallery">
                                    <img src="{{ asset('projectImages/' . $projectGallery->image) }}" width="250px"
                                        class="rounded-2">
                                    <a href="{{ route('dashboard.project.images.delete', $projectGallery->id) }}"
                                        class="btn btn-sm btn-danger mt-2">Delete</a>
                                </div>
                            @empty
                                <h4 class="text-center text-danger fw-bold">No Gallery Images</h4>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    @include('layouts.toast')
@endsection
