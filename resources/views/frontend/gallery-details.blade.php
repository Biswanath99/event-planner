<style>
    
</style>

@extends('layouts.frontend.app')
@section('content')
    <!-- Wedding Gallery Section -->
    <section class="gallery-section">
        <div class="container">

            <!-- Section Title -->
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">

                        <span>WELCOME TO YUVIK WEDDINGS & EVENTS'S WORLD</span>

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

            <!-- Gallery -->
            <div class="row g-4">

                <!-- Item -->
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="gallery-item">
                        <img src="{{ asset('assets/images/services/Decoration.jpg') }}" alt="">
                    </div>
                </div>



            </div>

        </div>
    </section>
@endsection
