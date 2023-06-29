@extends('layouts.app')

@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li>Project Details</li>
        </ol>
        <h2>Project Details</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                  <img src="{{ url($project->img) }}">
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Project information</h3>
              <ul>
                <li><strong>Title</strong>: {{ $project->title }}</li>
                <li><strong>Project date</strong>: {{ $project->created_at }}</li>
                <li><strong>Project URL</strong>: <a href="#">{{ $project->url }}</a></li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Description</h2>
              <p>{{ $project->description }}</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->  

@endsection