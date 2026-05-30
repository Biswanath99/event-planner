
@extends('layouts.frontend.app')
@section('content')


<div class="service-details">

    <div class="container">

        <div class="section-title text-center mb-4">

            <h2>{{ $service->name }}</h2>

            <div class="title-shape">
                <img src="{{ asset('assets/images/services/section-line.png') }}" alt="">
            </div>

            @if($service->description)
                <p>
                    {{ $service->description }}
                </p>
            @endif

        </div>

        <div class="content">

            <div class="row">

                {{-- Sidebar --}}
                <div class="col-lg-4 col-md-12 col-12">

                    <div class="service-sidebar">

                        <div class="single-widget service-category">

                            <h3 class="text-center">What We Do</h3>

                            <img src="{{ asset('assets/images/services/section-line.png') }}"
                                alt="Logo"
                                style="
                                    height: 15px;
                                    width: auto;
                                    display: block;
                                    margin: 13px auto;
                                    object-fit: contain;
                                ">

                            <ul>

                                @foreach ($services as $item)
                                    <li>
                                        <a href="{{ route('service-details', $item->slug) }}"
                                            class="{{ $service->id == $item->id ? 'active' : '' }}">

                                            {{ $item->name }}

                                            <i class="lni lni-arrow-right"></i>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>

                        </div>

                    </div>

                </div>

                {{-- Service Details --}}
                <div class="col-lg-8 col-md-12 col-12">

                    <div class="details-content">

                        @if($serviceDetails)

                            @if($serviceDetails->image)
                                <div class="thumb mb-4">
                                    <img src="{{ $serviceDetails->image_url }}"
                                        alt="{{ $serviceDetails->title }}"
                                        class="img-fluid rounded w-100">
                                </div>
                            @endif

                            <h3 class="title">
                                {{ $serviceDetails->title }}
                            </h3>

                            <div class="description">
                                {!! $serviceDetails->description !!}
                            </div>

                        @else

                            <div class="alert alert-warning">
                                No service details available.
                            </div>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- CTA Section --}}
    @include('frontend.cta')

</div>

@endsection

