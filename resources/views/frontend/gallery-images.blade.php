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


                        <h2>   {{ $categories->title  }}</h2>

                        <!-- Decorative Image -->
                        <div class="title-shape">
                            <img src="{{ asset( $image_gallery->image_url ?? 'assets/images/services/section-line.png') }}"
                                alt="Shape">
                        </div>

                        

                    </div>
                </div>
            </div>

             <div class="row g-4">

        @forelse($categories->images as $image)

            <div class="col-lg-4 col-md-6 col-12">

                <div class="single-service">

                    <span class="corner-top-left"></span>
                    <span class="corner-top-right"></span>
                    <span class="corner-bottom-left"></span>
                    <span class="corner-bottom-right"></span>

                    <div class="service-image">

                        <img src="{{ $image->image_url ?? asset('assets/images/services/Decoration.jpg') }}"
                             alt="{{ $categories->title }}"
                             class="img-fluid">

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12 text-center text-danger">
                No Images Found
            </div>

        @endforelse

    </div>

        </div>
         
    </section>
@endsection
