@extends('layouts.app')

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>{{ $setting->description1 }}</h1>
                    <h2>{{ $setting->description2 }}</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ url($setting->img) }}" class="img-fluid animated" alt>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Clients Section ======= -->
        @if (count($clients))
            <section id="clients" class="clients section-bg">
                <div class="container">
                    <div class="row justify-content-evenly" data-aos="zoom-in">
                        @foreach ($clients as $client)
                            @if ($client->status)
                                <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ $client->img }}" class="img-fluid">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!-- End Cliens Section -->


        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>About Us</h2>
                </div>
                <div class="row content">
                    <div class="col-lg-6">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                        </p>
                        <ul>
                            <li>
                                <i class="ri-check-double-line"></i>
                                Ullamco laboris nisi ut aliquip ex ea commodo consequat
                            </li>
                            <li>
                                <i class="ri-check-double-line"></i>
                                Duis aute irure dolor in reprehenderit in voluptate velit
                            </li>
                            <li>
                                <i class="ri-check-double-line"></i>
                                Ullamco laboris nisi ut aliquip ex ea commodo consequat
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                            in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>
                </div>
            </div>
        </section><!-- End About Us Section -->


        <!-- ======= Services Section ======= -->
        @if (count($services))
            <section id="services" class="services section-bg">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2>Services</h2>
                        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                            sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                            ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                    </div>
                    <div class="row justify-content-evenly">
                        @foreach ($services as $service)
                            @if ($service->status)
                                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                                    data-aos-delay="100">
                                    <div class="icon-box">
                                        <div class="icon"><i class="{{ $service->icon }}"></i></div>
                                        <h4>{{ $service->title }}</h4>
                                        <p>{{ $service->description }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!-- End Services Section -->
        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">
                <div class="row">
                    <div class="col-lg-9 text-center text-lg-start">
                        <h3>Call To Action</h3>
                        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
        </section><!-- End Cta Section -->


        <!-- ======= Portfolio Section ======= -->
        @if (count($projects))
            <section id="portfolio" class="portfolio">
                <div class="container">
                    <div class="section-title">
                        <h2>Portfolio</h2>
                        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                            sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                            ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                    </div>
                    <div class="row portfolio-container">
                        @foreach ($projects as $project)
                            @if ($project->status === 'on')
                                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                    <div class="portfolio-img">
                                        <img src="{{ $project->img }}" class="img-fluid">
                                    </div>
                                    <div class="portfolio-info">
                                        <h4>{{ $project->title }}</h4>
                                        <p>{{ $project->description }}</p>
                                        <a href="{{ $project->img }}" data-gallery="portfolioGallery"
                                            class="portfolio-lightbox preview-link" title="App 1">
                                            <i class="bx bx-plus"></i>
                                        </a>
                                        <a href="{{ url('/project/' . $project->id) }}" class="details-link" title="More Details">
                                            <i class="bx bx-link"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!-- End Portfolio Section -->
        <!-- ======= Team Section ======= -->
        @if (count($team))
            <section id="team" class="team section-bg">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2>Team</h2>
                        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                            sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                            ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                    </div>
                    <div class="row">
                        @foreach ($team as $member)
                            @if ($member->status)
                                <div class="col-lg-6 mt-4 mt-lg-0s" data-aos="zoom-in">
                                    <div class="member d-flex align-items-start">
                                        <div class="pic">
                                            <img src="{{ $member->img }}" class="img-fluid">
                                        </div>
                                        <div class="member-info">
                                            <h4>{{ $member->name }}</h4>
                                            <span>{{ $member->title }}</span>
                                            <p>{{ $member->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!-- End Team Section -->


        <!-- ======= Frequently Asked Questions Section ======= -->
        @if (count($asks))
            <section id="faq" class="faq section-bg">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2>Frequently Asked Questions</h2>
                        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                            sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                            ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                    </div>
                    <div class="faq-list">
                        <ul>
                            @foreach ($asks as $ask)
                                @if ($ask->status)
                                    <li data-aos="fade-up" data-aos-delay="100">
                                        <i class="bx bx-help-circle icon-help"></i>
                                        <a data-bs-toggle="collapse" class="collapse"
                                            data-bs-target="#faq-list-{{ $ask->id }}">
                                            {{ $ask->qu }}
                                            <i class="bx bx-chevron-down icon-show"></i>
                                            <i class="bx bx-chevron-up icon-close"></i>
                                        </a>
                                        <div id="faq-list-{{ $ask->id }}" class="collapse"
                                            data-bs-parent=".faq-list">
                                            <p>{{ $ask->an }}</p>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </section><!-- End Frequently Asked Questions Section -->
        @endif
    </main><!-- End #main -->
    

@endsection