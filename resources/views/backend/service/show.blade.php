@extends('layouts.backend')
@section('title', 'Service')
@section('breadcrumb', 'SERVICE')

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

                        <div class="col-lg-6 mb-3">
                            <label class="form-label">Icon *</label>
                            <input type="text" name="icon" class="form-control" value="{{ $service->icon }}" disabled
                                readonly>
                        </div>


                        <div class="col-lg-6 mb-3">
                            <label class="form-label">Title *</label>
                            <input type="text" name="title" class="form-control" value="{{ $service->title }}" disabled
                                readonly>
                        </div>


                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Description *</label>

                            <input id="description" type="hidden" name="description" class="form-control"
                                value="{{ $service->description }}" disabled readonly>
                            <trix-editor input="description" class="form-control" readonly disabled></trix-editor>

                        </div>

                    </div>

                    <a href="{{ route('dashboard.service.edit', $service->id) }}" type="submit" class="btn btn-primary">
                        Edit
                    </a>

                    <a href="{{ route('dashboard.service.index') }}" type="submit" class="btn btn-secondary">
                        Back
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
