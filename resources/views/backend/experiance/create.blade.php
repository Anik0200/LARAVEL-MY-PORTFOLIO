@extends('layouts.backend')
@section('title', 'Create-Experiance')
@section('breadcrumb', 'CREATE EXPERIANCE')

@section('content')

    <style>
        trix-toolbar {
            display: none;
        }
    </style>

    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-3 border-0 mb-4">
                <form action="{{ route('dashboard.experiance.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Position *</label>
                                <input type="text" name="position" class="form-control" value="">

                                @error('position')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Institute</label>
                                <input type="text" name="institute" class="form-control" value="">

                                @error('institute')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Start Date</label>
                                <input type="date" name="start_year" class="form-control" value="">

                                @error('start_year')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">End Date</label>
                                <input type="date" name="end_year" class="form-control" value="">

                                @error('end_year')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label">Description</label>

                                <input id="text" type="hidden" name="text" class="form-control">
                                <trix-editor input="text" class="form-control"></trix-editor>

                                @error('text')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('dashboard.experiance.index') }}" type="submit"
                            class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
