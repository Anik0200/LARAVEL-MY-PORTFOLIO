<section id="home" class="full-height px-lg-5" data-aos="fade-down" data-aos-delay="300">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">

                <h1 class="fw-bold text">
                    {{ $banner->title ?? 'NO TITLE' }}
                </h1>

                <p class="lead mt-2 mb-4">
                    {{ $banner->text ?? 'No Text' }}
                </p>

                <div>
                    <a href="{{ $banner->btn_url ?? '#' }}" class="btn btn-brand me-3 rounded-5" style="color: #eadbdb;">
                        DOWNLOAD CV
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
