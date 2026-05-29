

@extends('layouts.frontend.app')

@section('content')
    <section class="about-section-abt">

    <div class="container">

        <!-- SECTION TITLE -->

        <div class="row">
            <div class="col-12">

                <div class="section-title text-center">

                    <h2>
                        {{ $about->title ?? 'About Us' }}
                    </h2>

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

                <h2>
                    {{ $extra['who_we_are_title'] ?? 'Who are We?' }}
                </h2>

                <div class="about-divider">
                    <img src="{{ asset('assets/images/services/section-line.png') }}" alt="">
                </div>

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

             

            </div>

        </div>

    </div>

</section>

  <section class="services-section">

    <div class="container">

        {{-- TITLE --}}
        <div class="services-title text-center">

            {{-- CMS Title --}}
            <h2>
                {{ $services->text_content ?? 'What Services Do We Manage?' }}
            </h2>

            {{-- IMAGE --}}
            <div class="services-divider">
                <img src="{{ asset($services->image_url ?? 'assets/images/services/section-line.png') }}"
                    alt="">
            </div>

            {{-- JSON DESCRIPTION (text_content) --}}
            <p>
                {{ $services_ext['description'] ?? '' }}
            </p>

        </div>

        {{-- SERVICE GRID --}}
           <div class="row">

                @forelse($services_card as $service)

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
    <!-- Start Achievement Area -->
        @include('frontend.cta')
    <!-- End Achievement Area -->
@endsection
