@extends('layouts.backend')
@section('title', 'Banner')
@section('breadcrumb', 'BANNER')

<style>
    trix-toolbar {
        display: none;
    }
</style>


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-3 border-0 mb-4">

                <form action="{{ route('dashboard.banner.store') }}" method="POST">
                    @csrf
                    <div class="card-body">

                        <input type="hidden" name="id" value="{{ $banner->id ?? '' }}" hidden class="form-control">

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Tilte *</label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ $banner->title ?? '' }}">

                                @error('title')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Url *</label>
                                <input type="text" name="btn_url" class="form-control"
                                    value="{{ $banner->btn_url ?? '' }}">

                                @error('btn_url')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label class="form-label">Text *</label>

                                <input id="text" type="hidden" name="text" class="form-control"
                                    value="{!! $banner->text ?? '' !!}">
                                <trix-editor input="text" class="form-control"></trix-editor>

                                @error('text')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
