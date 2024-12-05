@extends('layouts.backend')
@section('title', 'Edit-Skill')
@section('breadcrumb', 'EDIT SKILL')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-3 border-0 mb-4">
                <form action="{{ route('dashboard.skill.update', $skill->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">Title *</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $skill->title) }}">

                            @error('title')
                                <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('dashboard.skill.index') }}" type="submit" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
