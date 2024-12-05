@extends('layouts.backend')
@section('title', 'Service-Edit')
@section('breadcrumb', 'EDIT SERVICES')

@section('content')

    <style>
        trix-toolbar {
            display: none;
        }
    </style>

    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-3 border-0 mb-4">
                <form action="{{ route('dashboard.service.update', $service->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Icon *</label>
                                <input type="text" name="icon" class="form-control"
                                    placeholder="Use Line Awesome Icons Ex: la la-home" value="{{ $service->icon }}">

                                @error('icon')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Title *</label>
                                <input type="text" name="title" class="form-control" value="{{ $service->title }}">

                                @error('title')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-lg-12 mb-3">
                                <label class="form-label">Description *</label>

                                <input id="description" type="hidden" name="description" class="form-control"
                                    value="{{ $service->description }}">
                                <trix-editor input="description" class="form-control"></trix-editor>

                                @error('description')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('dashboard.service.index') }}" type="submit" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
