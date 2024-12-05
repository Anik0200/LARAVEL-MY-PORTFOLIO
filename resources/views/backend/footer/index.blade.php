@extends('layouts.backend')
@section('title', 'Footer')
@section('breadcrumb', 'FOOTER')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-3 border-0 mb-4">

                <form action="{{ route('dashboard.footer.store') }}" method="POST">
                    @csrf
                    <div class="card-body">

                        <input type="hidden" name="id" value="{{ $footer->id ?? '' }}" hidden class="form-control">

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Text *</label>
                                <input type="text" name="text" class="form-control" value="{{ $footer->text ?? '' }}">

                                @error('text')
                                    <p class="text-danger text-uppercase fw-bold mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Github</label>
                                <input type="text" name="github_url" class="form-control"
                                    value="{{ $footer->github_url ?? '' }}">
                            </div>


                            <div class="col-lg-6 mb-3">
                                <label class="form-label">WhatsApp</label>
                                <input type="text" name="whatsapp_url" class="form-control"
                                    value="{{ $footer->whatsapp_url ?? '' }}">
                            </div>


                            <div class="col-lg-6 mb-3">
                                <label class="form-label">Twitter</label>
                                <input type="text" name="twitter_url" class="form-control"
                                    value="{{ $footer->twitter_url ?? '' }}">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
