@extends('layouts.backend')
@section('title', 'Edit-Experience')
@section('breadcrumb', 'EDIT EXPERIANCE')

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
                            <label class="form-label">Position *</label>
                            <input type="text" name="deegre" class="form-control"
                                value="{{ old('deegre', $experiance->position) }}" disabled readonly>

                            @error('deegre')
                                <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label">Institute</label>
                            <input type="text" name="institute" class="form-control"
                                value="{{ old('institute', $experiance->institute) }}" disabled readonly>

                            @error('institute')
                                <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label">Start Date</label>
                            <input type="date" name="start_year" class="form-control"
                                value="{{ old('start_year', $experiance->start_year) }}" disabled readonly>

                            @error('start_year')
                                <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label">End Date</label>
                            <input type="date" name="end_year" class="form-control"
                                value="{{ old('start_year', $experiance->end_year) }}" disabled readonly>

                            @error('end_year')
                                <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label class="form-label">Description</label>

                            <input id="text" type="hidden" name="text" class="form-control"
                                value="{{ $experiance->text }}" disabled readonly>
                            <trix-editor input="text" class="form-control"></trix-editor>

                            @error('text')
                                <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <a href="{{ route('dashboard.experiance.edit', $experiance->id) }}" type="submit"
                        class="btn btn-primary">
                        Edit
                    </a>

                    <a href="{{ route('dashboard.experiance.index') }}" type="submit" class="btn btn-secondary">
                        Back
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection
