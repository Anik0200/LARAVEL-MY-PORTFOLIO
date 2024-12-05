@extends('layouts.frontend')
@section('title', 'blogs')

@section('content')
    <div id="content-wrapper">

        <section id="" class="full-height px-lg-5">
            <div class="container">

                <div class="row mb-5">
                    <div class="col-lg-8">
                        <h1 class="text-brand">ALL PROJECTS</h1>
                    </div>
                </div>


                <div class="row gy-4" data-aos="fade-up">

                    <div class="row gy-4" data-aos="fade-up">
                        @forelse ($projects as $project)
                            <div class="col-md-4">
                                <div class="card-custom rounded-4 bg-base shadow-effect">
                                    <div class="card-custom-image rounded-4">
                                        <img class="rounded-4" src="{{ asset('projectImages/' . $project->thumbnail) }}"
                                            alt="">
                                    </div>
                                    <div class="card-custom-content p-4">
                                        <p class="mb-2">{{ $project->created_at->diffForHumans() }}</p>
                                        <h5 class="mb-4">{{ $project->title }}</h5>
                                        <a href="{{ route('frontend.projects.details', $project->id) }}"
                                            class="link-custom">Read More</a>
                                    </div>
                                </div>
                            </div>

                        @empty
                        <h6 class="text-brand">NO NEW PROJECT AVAILABLE</h6>
                        @endforelse
                    </div>


                </div>
            </div>
        </section>

        @include('frontend.inc.Footer')

    </div>
@endsection
