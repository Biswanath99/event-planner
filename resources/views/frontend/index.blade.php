

@extends('layouts.frontend.app')
@section('content')
    <!-- Start Hero Area -->
   <section class="hero-area style2">

        <div class="hero-slider owl-carousel">

            @forelse($banners as $banner)

                <div class="single-slider"
                    style="background-image:url('{{ $banner->image_url ?? asset('assets/images/services/Decoration.jpg') }}');">

                    <div class="overlay"></div>

                    <div class="container">

                        <div class="hero-text text-center">

                            <!-- SUB TITLE -->
                            <span class="sub-title">

                                {{ $banner->sub_title ?? 'CELEBRATE NEW BEGINNINGS WITH US' }}

                            </span>

                            <!-- BORDER IMAGE -->
                            <div class="slider-border">

                                <img src="{{ $banner->border_image_url ?? asset('assets/images/services/slide-border.png') }}"
                                    alt="Border Image">

                            </div>

                            <!-- TITLE -->
                            <h2>

                                {{ $banner->title ?? 'Wedding Planner in Kolkata' }}

                            </h2>

                            <!-- DESCRIPTION -->
                            <p>

                                {{ $banner->description ?? 'Are you looking for wedding event management in the city of joy? Yuvik Weddings & Events is here to take away your wedding blues!' }}

                            </p>

                            <!-- STATIC BUTTON -->
                            <div class="theme-btn">

                                <a class="read-btn text-white" href="{{ route('appointment') }}"
                                >

                                  <i class="lni lni-heart"></i>  Book Appointment

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <!-- FALLBACK SLIDER -->

                <div class="single-slider"
                    style="background-image:url('{{ asset('assets/images/services/Decoration.jpg') }}');">

                    <div class="overlay"></div>

                    <div class="container">

                        <div class="hero-text text-center">

                            <span class="sub-title">
                                CELEBRATE NEW BEGINNINGS WITH US
                            </span>

                            <div class="slider-border">

                                <img src="{{ asset('assets/images/services/slide-border.png') }}"
                                    alt="Border Image">

                            </div>

                            <h2>
                                Wedding Planner in Kolkata
                            </h2>

                            <p>
                                Are you looking for wedding event management in the city of joy?
                                Yuvik Weddings & Events is here to take away your wedding blues!
                            </p>

                            <!-- STATIC BUTTON -->
                            <div class="theme-btn">

                                <a class="read-btn text-white" href="{{ route('appointment') }}"
                                >

                                    Book Appointment

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @endforelse

        </div>

    </section>
    <!-- End Hero Area -->

    <!-- Start Appointment Area -->
    <section class="services-area">
        <div class="container">

            <!-- Section Title -->
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">

                        {{-- TITLE --}}
                        <h2>
                            {{ $we_do->title ?? 'What We Do' }}
                        </h2>

                        {{-- IMAGE --}}
                        <div class="title-shape">
                            <img src="{{ asset($we_do->image_url ?? 'assets/images/services/section-line.png') }}"
                                alt="Shape">
                        </div>

                        {{-- TEXT CONTENT (DIRECT DB FIELD) --}}
                        <p>
                            {{ $we_do->text_content ?? '' }}
                        </p>

                    </div>
                </div>
            </div>

            <!-- Services -->
            <div class="row">

                @forelse($services as $service)

                    <div class="col-lg-4 col-md-6 col-12 mb-4">

                        <div class="single-service">

                            <div class="corner-top-left"></div>
                            <div class="corner-top-right"></div>
                            <div class="corner-bottom-left"></div>
                            <div class="corner-bottom-right"></div>

                            {{-- Content --}}
                            <div class="service-content text-center">

                                <h5>
                                    {{ $service->name }}
                                </h5>

                                {{-- Small Center Image --}}
                                @if($service->image_url)
                                    <div class="my-3 d-flex justify-content-center">
                                        <img src="{{ $service->image_url }}"
                                            alt="{{ $service->name }}"
                                            style="height: 10px; width: 100px;">
                                    </div>
                                @endif

                                <p>
                                    {{ Str::limit($service->description, 180) }}
                                </p>

                                <a href="{{ url('service-details/' . $service->slug) }}"
                                    class="read-btn">
                                    READ MORE
                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center">
                        <p>No Services Found</p>
                    </div>

                @endforelse

            </div>
        </div>
    </section>
    <!-- End Appointment Area -->

    <!-- Start About Area -->
    <section class="about-section">

        <div class="container">

            <!-- SECTION TITLE -->

            <div class="row">
                <div class="col-12">

                    <div class="section-title text-center">

                        <h2> {{ $extra['who_we_are_title'] ?? 'Who are We?' }}</h2>

                        <div class="title-shape">
                            <img src="{{ asset('assets/images/services/section-line.png') }}" alt="">
                        </div>

                        <p>
                            {{ $about->text_content ?? '' }}
                        </p>

                    </div>

                </div>
            </div>

            <!-- ABOUT CARD -->

           <div class="about-card">

            <!-- IMAGE -->

            <div class="about-image">

                @if(!empty($about?->image_url))

                    <img src="{{ $about->image_url }}" alt="">

                @else

                    <img src="{{ asset('assets/images/services/Decoration.jpg') }}" alt="">

                @endif

            </div>

            <!-- CONTENT -->

            <div class="about-content">

                

                

                @if(!empty($extra['description_one']))
                    <p>
                        {!! nl2br(e($extra['description_one'])) !!}
                    </p>
                @endif

                @if(!empty($extra['description_two']))
                    <p>
                        {!! nl2br(e($extra['description_two'])) !!}
                    </p>
                @endif

                  <a href="{{route('about-us')}}" class="read-btn">
                        Read More
                    </a>

            </div>

        </div>

        </div>

    </section>
    <!-- End About Area -->

    <!-- Start Departments  Area -->
    <section class="gallery-section">
        <div class="container">

            <!-- Section Title -->
           <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">

                        {{-- TITLE --}}
                        <h2>
                            {{ $gallery->title ?? 'Gallery' }}
                        </h2>

                        {{-- IMAGE --}}
                        <div class="title-shape">
                            <img src="{{ asset($gallery->image_url ?? 'assets/images/services/section-line.png') }}"
                                alt="Shape">
                        </div>

                        {{-- DESCRIPTION --}}
                        <p>
                            {{  $gallery->text_content ?? '' }}
                        </p>

                    </div>
                </div>
            </div>

            <!-- Gallery -->
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
    <!-- /End Departments  Area -->

    <!-- Start Achievement Area -->
        @include('frontend.cta')
    <!-- End Achievement Area -->
@endsection
