@extends('layouts.backend')
@section('title', 'Project')
@section('breadcrumb', 'PROJECT')

@section('content')

    <style>
        trix-toolbar {
            display: none;
        }

        trix-editor,
        trix-toolbar {
            pointer-events: none;
        }
    </style>

    <div class="row">

        <div class="col-lg-12">
            <div class="card rounded-3 border-0 mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Title *</label>
                            <input type="text" name="title" class="form-control" value="{{ $project->title }}" disabled
                                readonly>

                            @error('title')
                                <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="col-lg-12 mb-5">
                            <label class="form-label">Description</label>

                            <input id="description" type="hidden" name="description" class="form-control"
                                value="{{ $project->description }}" disabled readonly>
                            <trix-editor input="description" class="form-control"></trix-editor>

                            @error('description')
                                <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Technology</label>

                            <input id="technology" type="hidden" name="technology" class="form-control"
                                value="{{ $project->technology }}" disabled readonly>
                            <trix-editor input="technology" class="form-control"></trix-editor>

                            @error('technology')
                                <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label">Source Code</label>
                            <input type="text" name="source_code" class="form-control"
                                value="{{ $project->source_code }}" disabled readonly>

                            @error('source_code')
                                <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="col-lg-6 mb-3">
                            <label class="form-label">Demo</label>
                            <input type="text" name="demo" class="form-control" value="{{ $project->demo }}" disabled
                                readonly>

                            @error('demo')
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

                        <div class="col-lg-3 mb-3 projectGallery">
                            <img src="{{ asset('projectImages/' . $project->thumbnail) }}" width="250px"
                                class="rounded-2">
                        </div>

                        @forelse ($project->projectGalleries as $projectGallery)
                            <div class="col-lg-3 mb-3 projectGallery">
                                <img src="{{ asset('projectImages/' . $projectGallery->image) }}" width="250px"
                                    class="rounded-2">
                            </div>
                        @empty
                            <h4 class="text-center text-danger fw-bold">No Gallery Images</h4>
                        @endforelse

                        <div class="col-md-4">
                            <a href="{{ route('dashboard.project.edit', $project->id) }}" type="submit"
                                class="btn btn-primary">
                                Edit
                            </a>

                            <a href="{{ route('dashboard.project.index') }}" type="submit" class="btn btn-secondary">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    @include('layouts.toast')
@endsection
