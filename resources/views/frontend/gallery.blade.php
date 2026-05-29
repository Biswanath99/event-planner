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

                      

                        <h2>Gallery</h2>

                        <!-- Decorative Image -->
                        <div class="title-shape">
                            <img src="{{ asset('assets/images/services/section-line.png') }}" alt="Shape">
                        </div>

                        <p>
                            We are not only a wedding planner in Kolkata. We offer
                            more than 30+ design and event management services.
                        </p>

                    </div>
                </div>
            </div>

            <!-- Services -->
            <div class="row">
                <!-- Card -->
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="single-service">

                        <div class="corner-top-left"></div>
                        <div class="corner-top-right"></div>
                        <div class="corner-bottom-left"></div>
                        <div class="corner-bottom-right"></div>

                        <!-- Image -->
                        <div class="service-image">
                            <img src="{{ asset('assets/images/services/Decoration.jpg') }}" alt="">
                        </div>

                        <!-- Content -->
                        <div class="service-content">

                            <h5>Wedding Decoration</h5>

                            <div class="line"></div>



                            <a href="{{ route('gallery-details') }}" class="read-btn">
                                View All
                            </a>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Appointment Area -->
@endsection
