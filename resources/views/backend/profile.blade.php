@extends('layouts.backend')
@section('title', 'Profile')
@section('breadcrumb', 'Profile')

@section('content')
    <div class="rounded pb-5 pt-5" style="background-color: #2B3035">
        <div class="row d-flex justify-content-center">

            <div class="col-md-8">
                <div class="d-flex flex-column align-items-center text-center mb-4">
                    <img class="rounded-circle mb-3" width="150px"
                        src="{{ !empty(Auth::user()->image) ? asset('images/' . Auth::user()->image) : Avatar::create(Auth::user()->name)->toBase64() }}">

                    <span class="fw-bold">{{ Auth::user()->name }}</span>
                    <span class="text-white">{{ Auth::user()->email }}</span>
                </div>

                <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" class="form-control" placeholder="name" value="{{ Auth::user()->name }}"
                                name="name">
                        </div>

                        <div class="col-md-6">
                            <label class="labels">Mobile Number</label>
                            <input type="text" class="form-control" placeholder="enter phone number"
                                value="{{ Auth::user()->phone }}" name="phone">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Email</label>
                            <input type="email" class="form-control" placeholder="enter email address"
                                value="{{ Auth::user()->email }}" name="email">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Update Password</label>
                            <input type="password" class="form-control" placeholder="enter new password" value=""
                                name="password">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Image</label>
                            <input type="file" class="form-control upload" name="image" accept="image/*"
                                onchange="readURL(this);">
                        </div>
                    </div>


                    <img class="mt-3 mb-2 rounded d-none jsImg" id="image" src="/upload/<?= Auth::user()->image ?>"
                        alt="" width="80">

                    <div class="mt-3">
                        <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
        function readURL(input) {

            $('.jsImg').removeClass('d-none');

            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function(e) {
                    console.log(e.target.result);
                    $('#image')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
