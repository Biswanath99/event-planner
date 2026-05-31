<style>
   
</style>

@extends('layouts.frontend.app')
@section('content')
    <!-- Start Appointment Area -->
    <section class="services-area">
        <div class="container">

            <!-- Section Title -->
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">

                      

                        <h2> {{ $gallery->title ?? 'Gallery' }}</h2>

                        <!-- Decorative Image -->
                        <div class="title-shape">
                             <img src="{{ asset($gallery->image_url ?? 'assets/images/services/section-line.png') }}"
                                alt="Shape">
                        </div>

                        <p>
                            {{  $gallery->text_content ?? '' }}
                        </p>

                    </div>
                </div>
            </div>

           
               <div class="row">
                @foreach($categories as $category)
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <div class="single-service">

                            <div class="corner-top-left"></div>
                            <div class="corner-top-right"></div>
                            <div class="corner-bottom-left"></div>
                            <div class="corner-bottom-right"></div>

                            <!-- Image -->
                            <div class="service-image">
                                <img src="{{$category->image_url }}"
                                    alt="{{ $category->title }}">
                            </div>

                            <!-- Content -->
                            <div class="service-content">

                                <h5>{{ $category->title }}</h5>

                                <div class="line"></div>

                                <a href="{{ url('gallery-images/' . $category->slug) }}"
                                class="read-btn">
                                    View All
                                </a>

                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Appointment Area -->
@endsection
