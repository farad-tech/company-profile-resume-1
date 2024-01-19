<div class="footer container-fluid position-relative bg-dark bg-light-radial text-white-50 py-6 px-5">
    <div class="row g-5">
        <div class="col-lg-6 pe-lg-5">
            <a href="index.html" class="navbar-brand">
                <h6 class="m-0 display-4 text-uppercase text-white"><i
                        class="bi bi-building text-primary me-2"></i>WEBUILD</h6>
            </a>
            <p>{{ $footer_public->text }}</p>
            <p><i class="fa fa-map-marker-alt me-2"></i>{{ $footer_public->address }}</p>
            <p><i class="fa fa-phone-alt me-2"></i><a
                    href="tel:{{ $footer_public->phone }}">{{ $footer_public->phone }}</a></p>
            <p><i class="fa fa-envelope me-2"></i><a
                    href="mailto:{{ $footer_public->email }}">{{ $footer_public->email }}</a></p>
            <div class="d-flex justify-content-start mt-4">

                @if ($footer_public->twitter !== null)
                    <a class="btn btn-lg btn-primary btn-lg-square rounded-0 me-2"
                        href="{{ $footer_public->twitter }}"><i class="fab fa-twitter"></i></a>
                @endif

                @if ($footer_public->facebook !== null)
                    <a class="btn btn-lg btn-primary btn-lg-square rounded-0 me-2"
                        href="{{ $footer_public->facebook }}"><i class="fab fa-facebook-f"></i></a>
                @endif

                @if($footer_public->linkedin !== null)
                <a class="btn btn-lg btn-primary btn-lg-square rounded-0 me-2" href="{{ $footer_public->linkedin }}"><i
                        class="fab fa-linkedin-in"></i></a>
                @endif

                @if($footer_public->instagram !== null)
                <a class="btn btn-lg btn-primary btn-lg-square rounded-0" href="{{ $footer_public->instagram }}"><i
                        class="fab fa-instagram"></i></a>
                @endif
            </div>
        </div>
        <div class="col-lg-6 ps-lg-5">
            <div class="row g-5">
                <div class="col-sm-6">
                    <p class="text-white text-uppercase mb-4">{{ $footer_public->quickLinkTitle }}</p>
                    <div class="d-flex flex-column justify-content-start">
                        @foreach ($footer_quick_links as $link)
                            <a class="text-white-50 mb-2" href="{{ $link->url }}"><i class="fa fa-angle-right me-2"></i>{{ $link->title }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-6">
                    <p class="text-white text-uppercase mb-4">{{ $footer_public->popularLinkTitle }}</p>
                    <div class="d-flex flex-column justify-content-start">
                        @foreach ($footer_popular_links as $link)
                            <a class="text-white-50 mb-2" href="{{ $link->url }}"><i class="fa fa-angle-right me-2"></i>{{ $link->title }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-12">
                    <p class="text-white text-uppercase mb-4">Newsletter</p>
                    <div class="w-100">
                        <div class="input-group">
                            <input type="text" class="form-control border-light" style="padding: 20px 30px;"
                                placeholder="Your Email Address"><button class="btn btn-primary px-4">Sign
                                Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-dark bg-light-radial text-white border-top border-primary px-0">
    <div class="d-flex flex-column flex-md-row justify-content-between">
        <div class="py-4 px-5 text-center text-md-start">
            <p class="mb-0">
                {{ $footer_public->copyRight }}
            </p>
        </div>
        <div class="py-4 px-5 bg-primary footer-shape position-relative text-center text-md-end">
            <p class="mb-0">Designed by <a class="text-dark" href="https://htmlcodex.com">HTML Codex</a></p>
        </div>
    </div>
</div>
