@extends('layouts.frontend')
@section('title', 'Home')

@section('content')

    <div id="content-wrapper">

        <!-- Banner -->
        @include('frontend.inc.Banner')
        <!-- //Banner -->

        <!-- Services -->
        @if ($services->count() > 0)
            <section id="services" class="full-height px-lg-5">
                <div class="container">

                    <div class="row pb-4">
                        <div class="col-lg-8">
                            <h1 class="text-brand">SERVICES</h1>
                        </div>
                    </div>

                    <div class="row gy-4" data-aos="fade-up">
                        @foreach ($services as $service)
                            <div class="col-md-4">
                                <div class="service p-4 bg-base rounded-4 shadow-effect">
                                    <div class="iconbox rounded-4">
                                        <i class="{{ $service->icon }} icons"></i>
                                    </div>
                                    <h5 class="mt-4 mb-2">{{ $service->title }}</h5>
                                    <p>
                                        {{ $service->description }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </section>
        @endif
        <!-- //Services -->


        <!-- Projects -->
        @if ($projects->count() > 0)
            <section id="work" class="full-height px-lg-5">
                <div class="container">

                    <div class="row pb-4">
                        <div class="col-lg-8">
                            <h1 class="text-brand">PROJECTS</h1>
                        </div>
                    </div>

                    <div class="row gy-4" data-aos="fade-up">
                        @foreach ($projects as $project)
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
                        @endforeach
                    </div>

                    <div class="row view-more-main">
                        <div class="col-lg-8">
                            <a href="{{ route('frontend.projects') }}" class="text-brand view-more">
                                VIEW MORE
                            </a>
                        </div>
                    </div>

                </div>
            </section>
        @endif
        <!-- //Projects -->


        <!-- About -->
        @if ($skills->count() > 0 || $educations->count() > 0 || $experiances->count() > 0)
            <section id="about" class="full-height px-lg-5">
                <div class="container">

                    <div class="row pb-4">
                        <div class="col-lg-8">
                            <h1 class="text-brand">ABOUT</h1>
                        </div>
                    </div>

                    <div class="row gy-5">

                        @if ($skills->count() > 0)
                            <div class="col-lg-12">
                                <h3 class="mb-4">Skills</h3>
                                <div class="row gy-4" data-aos="fade-up">
                                    @foreach ($skills as $skill)
                                        <div class="col-12">
                                            <div class="bg-base p-4 rounded-4 shadow-effect">
                                                <h4>{{ $skill->title }}</h4>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($educations->count() > 0)
                            <div class="col-lg-12">

                                <h3 class="mb-4">Education</h3>

                                <div class="row gy-4">

                                    @foreach ($educations as $education)
                                        <div class="col-12">
                                            <div class="bg-base p-4 rounded-4 shadow-effect">
                                                <h4>{{ $education->deegre }}</h4>
                                                <p class="mb-2">
                                                    {{ $education->institute }}
                                                    ({{ date('Y', strtotime($education->start_year)) }}
                                                    -
                                                    {{ date('Y', strtotime($education->end_year)) }})
                                                </p>
                                                <p class="mb-0">{!! $education->text !!}</p>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endif

                        @if ($experiances->count() > 0)
                            <div class="col-lg-12">
                                <h3 class="mb-4">Experiance</h3>
                                <div class="row gy-4">
                                    @foreach ($experiances as $experiance)
                                        <div class="col-12">
                                            <div class="bg-base p-4 rounded-4 shadow-effect">
                                                <h4>{{ $experiance->position }}</h4>
                                                <p class="mb-2">
                                                    {{ $experiance->institute }}
                                                    ({{ date('Y', strtotime($experiance->start_year)) }}
                                                    -
                                                    {{ date('Y', strtotime($experiance->end_year)) }})
                                                </p>
                                                <p class="mb-0">{{ $experiance->text }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </section>
        @endif
        <!-- //About -->


        <!-- Contact -->
        <section id="contact" class="full-height px-lg-5">
            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-lg-8 text-center">
                        <h2 class="mb-4">Get in touch!</h2>
                    </div>

                    <div class="col-lg-8" data-aos="fade-up">
                        <form action="{{ route('frontend.contact') }}" method="POST" class="row g-lg-4 gy-4">
                            @csrf
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control rounded-3"
                                    placeholder="Enter your name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control rounded-3"
                                    placeholder="Enter your email">
                            </div>
                            <div class="form-group col-12">
                                <input type="text" name="subject" class="form-control rounded-3"
                                    placeholder="Enter subject">
                            </div>
                            <div class="form-group col-12">
                                <textarea name="message" rows="4" class="form-control" placeholder="Enter your message"></textarea>
                            </div>
                            <div class="form-group col-12 d-grid">
                                <button type="submit" class="btn btn-brand rounded-5">Send</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
        <!-- //Contact -->

        <!-- Footer -->

        @include('frontend.inc.Footer')
        <!-- //Footer -->

    </div>

@endsection
