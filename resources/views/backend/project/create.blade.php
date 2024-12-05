@extends('layouts.backend')
@section('title', 'Project-Create')
@section('breadcrumb', 'CREATE PROJECTS')


@section('content')
    <div class="row">

        <form action="{{ route('dashboard.project.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="col-lg-12">
                <div class="card rounded-3 border-0 mb-4">

                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-12 mb-3">
                                <label class="form-label">Title *</label>
                                <input type="text" name="title" class="form-control">

                                @error('title')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-lg-12 mb-5">
                                <label class="form-label">Description</label>

                                <input id="description" type="hidden" name="description" class="form-control">
                                <trix-editor input="description" class="form-control"></trix-editor>

                                @error('description')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label">Technology</label>

                                <input id="technology" type="hidden" name="technology" class="form-control">
                                <trix-editor input="technology" class="form-control"></trix-editor>

                                @error('technology')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Source Code</label>
                                <input type="text" name="source_code" class="form-control">

                                @error('source_code')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Demo</label>
                                <input type="text" name="demo" class="form-control">

                                @error('demo')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label">Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control">

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
                                <label class="form-label">Images</label>
                                <input type="file" name="images[]" class="form-control" multiple>

                                @error('images')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('dashboard.project.index') }}" type="submit" class="btn btn-secondary">Back</a>

                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
