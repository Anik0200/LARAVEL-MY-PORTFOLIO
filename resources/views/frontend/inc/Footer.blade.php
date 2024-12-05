<footer class="py-5 px-lg-5">
    <div class="container">
        <div class="row gy-4 justify-content-between">
            <div class="col-auto">
                <p class="mb-0">
                    <a href="#" class="fw-bold">{{ $footer->text ?? 'NO DATA' }}</a>
                </p>
            </div>
            <div class="col-auto">
                <div class="social-icons">
                    <a href="{{ $footer->twitter_url ?? '#' }}"><i class="lab la-twitter"></i></a>
                    <a href="{{ $footer->whatsapp_url ?? '#' }}"><i class="lab la-whatsapp"></i></a>
                    <a href="{{ $footer->github_url ?? '#' }}"><i class="lab la-github"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
