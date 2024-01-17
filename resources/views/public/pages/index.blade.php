@extends('public.layouts.joint.template')

@section('main')


    @if ($slides->count() > 0)
        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">


                    @foreach ($slides as $slide)
                        <div class="carousel-item @if ($slide->id == $slides->first()->id) active @endif">
                            <img class="w-100" src="\storage\{{ $slide->image }}" alt="{{ $slide->imageAlt }}">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 900px;">
                                    <p class="display-2 text-uppercase text-white mb-md-4">{{ $slide->title }}</p>
                                    <a href="{{ $slide->CallToActionURL }}"
                                        class="btn btn-primary py-md-3 px-md-5 mt-2">{{ $slide->CallToActionTitle }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- Carousel End -->
    @endif


    @if ($about !== null)
        <!-- About Start -->
        <div class="container-fluid py-6 px-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <h1 class="display-5 text-uppercase mb-4">{{ $about->content['title'] }}</h1>
                    <h2 class="text-uppercase mb-3 text-body">{{ $about->content['sub-title'] }}</h2>
                    <p>{{ $about->content['text-1'] }}</p>
                    <div class="row gx-5 py-2">
                        @foreach ($about->content['options'] as $option)
                            <p class="fw-bold col-sm-6 mb-3">
                                <i class="fa fa-check text-primary me-3"></i>{{ $option }}
                            </p>
                        @endforeach
                    </div>
                    <p class="mb-4">{{ $about->content['text-2'] }}</p>
                </div>
                <div class="col-lg-5 pb-5" style="min-height: 400px;">
                    <div class="position-relative bg-dark-radial h-100 ms-5">
                        <img class="position-absolute w-100 h-100 mt-5 ms-n5" src="/storage/{{ $about->content['image'] }}"
                            style="object-fit: cover;" alt="We are the Leader in Construction Industry">
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
    @endif

    <!-- Services Start -->
    @if (count($services) > 0)
        <div class="container-fluid bg-light py-6 px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h4 class="display-5 text-uppercase mb-4">We Provide <strong class="text-primary">The Best</strong>
                    Construction
                    Services</h4>
            </div>
            <div class="row g-5">

                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item bg-white d-flex flex-column align-items-center text-center">
                            <img class="img-fluid" src="\storage\{{ $service->icon }}" alt="service-1">
                            <div class="px-4 pb-4">
                                <p class="text-uppercase mb-3 pt-4">{{ $service->title }}</p>
                                <p>{{ $service->text }}</p>
                                <a class="btn text-primary" href="">Read More <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    @endif
    <!-- Services End -->

    <!-- Portfolio Start -->
    @if (count($projects) > 0)
        <div class="container-fluid bg-light py-6 px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <p class="display-5 text-uppercase mb-4">Some Of Our <span class="text-primary">Popular</span> Dream
                    Projects</p>
            </div>
            <div class="row gx-5">
                <div class="col-12 text-center">
                    <div class="d-inline-block bg-dark-radial text-center pt-4 px-5 mb-5">
                        <ul class="list-inline mb-0" id="portfolio-flters">
                            <li class="btn btn-outline-primary bg-white p-2 active mx-2 mb-4" data-filter="*">
                                <img src="\public\img/portfolio-1.jpg" style="width: 150px; height: 100px;"
                                    alt="portfolio-1">
                                <div class="position-absolute top-0 start-0 end-0 bottom-0 m-2 d-flex align-items-center justify-content-center"
                                    style="background: rgba(4, 15, 40, .3);">
                                    <p class="text-white text-uppercase m-0">All</p>
                                </div>
                            </li>
                            @foreach ($project_categories as $category)
                                <li class="btn btn-outline-primary bg-white p-2 mx-2 mb-4"
                                    data-filter=".cat{{ $category->id }}">
                                    <img src="\storage\{{ $category->image }}" style="width: 150px; height: 100px;"
                                        alt="{{ $category->alt }}">
                                    <div class="position-absolute top-0 start-0 end-0 bottom-0 m-2 d-flex align-items-center justify-content-center"
                                        style="background: rgba(4, 15, 40, .3);">
                                        <p class="text-white text-uppercase m-0">{{ $category->title }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row g-5 portfolio-container">

                @foreach ($projects as $project)
                    <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item cat{{ $project->category }}">
                        <div class="position-relative portfolio-box">
                            <img class="img-fluid w-100" src="\storage\{{ $project->images[0] }}"
                                alt="{{ $project->title }}">
                            <a class="portfolio-title shadow-sm" href="">
                                <p class="h4 text-uppercase">{{ $project->title }}</p>
                                <span class="text-body"><i
                                        class="fa fa-map-marker-alt text-primary me-2"></i>{{ $project->address }}</span>
                            </a>
                            <a class="portfolio-btn" href="img/portfolio-1.jpg" data-lightbox="portfolio">
                                <i class="bi bi-plus text-white"></i>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    @endif
    <!-- Portfolio End -->


    <!-- Team Start -->
    <div class="container-fluid py-6 px-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <p class="display-5 text-uppercase mb-4">We Are <span class="text-primary">Professional & Expert</span>
                Workers</p>
        </div>
        <div class="row g-5">
            @foreach ($teams as $member)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="row g-0">
                        <div class="col-10" style="min-height: 300px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100" src="/storage/{{ $member->image }}"
                                    style="object-fit: cover;" alt="{{ $member->alt }}">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="h-100 d-flex flex-column align-items-center justify-content-between bg-light">
                                <a class="btn" href="{{ $member->twitter }}"><i class="fab fa-twitter"></i></a>
                                <a class="btn" href="{{ $member->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn" href="{{ $member->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn" href="{{ $member->instagram }}"><i class="fab fa-instagram"></i></a>
                                <a class="btn" href="{{ $member->youtube }}"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bg-light p-4">
                                <p class="text-uppercase">{{ $member->title }}</p>
                                <span>{{ $member->position }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Team End -->


    @if ($blogs->count() > 0)
        <!-- Blog Start -->
        <div class="container-fluid py-6 px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h5 class="display-5 text-uppercase mb-4">Latest <span class="text-primary">Articles</span> From Our Blog
                    Post</h5>
            </div>
            <div class="row g-5">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="bg-light">
                            <img class="img-fluid" src="\public\img/blog-1.jpg" alt="blog-1">
                            <div class="p-4">
                                <div class="d-flex justify-content-end mb-4">
                                    <div class="d-flex align-items-center">
                                        <span class="ms-3"><i
                                                class="far fa-calendar-alt text-primary me-2"></i>{{ $carbon::parse($blog->created_at)->diffForHumans() }}</span>
                                    </div>
                                </div>
                                <p class="text-uppercase mb-3">{{ $blog->title }}</p>
                                <a class="text-uppercase fw-bold"
                                    href="{{ route('blog', ['id' => $blog->id, 'slug' => str_replace(' ', '-', $blog->title)]) }}">Read
                                    More <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Blog End -->
    @endif


@endsection
