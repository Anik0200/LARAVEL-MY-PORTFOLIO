@extends('layouts.frontend')
@section('title', 'Projects')

@section('content')

    <style>
        ul {
            padding-left: 14px !important
        }

        .source_code {
            color: #FFFFFF;
            border-bottom: 2px solid #FFFFFF;
            padding-bottom: 2px
        }

        .source_code:hover {
            border-bottom: 2px solid #ec1839;
        }
    </style>

    <div id="content-wrapper">

        <section id="" class="full-height px-lg-5">
            <div class="container">

                <div class="row pb-4">
                    <div class="col-lg-8">
                        <h1 class="text-brand">PROJECT</h1>
                    </div>
                </div>

                <div class="row gy-5">
                    <div class="col-lg-12">

                        <h3 class="mb-5">{{ $project->title ?? 'NO TITLE' }}</h3>

                        @if (count($project->projectGalleries) > 1)
                            <div class="row gy-4 mt-2">
                                @foreach ($project->projectGalleries as $gallery)
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <img class="rounded-4 img-thumbnail"
                                            src="{{ asset('projectImages/' . $gallery->image) }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="row gy-4 mt-2">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <img class="rounded-4 img-thumbnail"
                                        src="{{ asset('projectImages/' . $project->thumbnail) }}" alt="">
                                </div>
                            </div>
                        @endif

                        @if ($project->description != null)
                            <div class="row gy-4 mt-4">
                                <div class="col-12">
                                    <h2>Description</h2>
                                    <p class="projecDesc">
                                        {!! $project->description !!}
                                    </p>
                                </div>
                            </div>
                        @endif


                        @if ($project->technology != null)
                            <div class="row gy-4 mt-4">
                                <div class="col-12">
                                    <h2>Technology</h2>
                                    <p>
                                        {!! $project->technology !!}
                                    </p>
                                </div>
                            </div>
                        @endif

                        @if ($project->source_code != null)
                            <div class="row gy-4 mt-4">
                                <div class="col-12">
                                    <h5>
                                        <a href="{{ $project->source_code }}" class="source_code">
                                            Source Code
                                        </a>
                                    </h5>

                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </section>

        @include('frontend.inc.Footer')

    </div>
@endsection
