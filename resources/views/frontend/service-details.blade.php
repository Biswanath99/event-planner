@php
    $services = \App\Models\Services::latest()->get();
@endphp

@extends('layouts.frontend.app')
@section('content')
    <div class="service-details">

        <div class="container">
            <div class="section-title text-center mb-4">

                <h2>Venue Booking</h2>

                <div class="title-shape">
                    <img src="{{ asset('assets/images/services/section-line.png') }}" alt="">
                </div>

              

            </div>
            <div class="content">
                <div class="row">

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

        
        @foreach ($services as $service)
            <li>
                <a href="{{ route('service-details', $service->slug) }}">
                    {{ $service->name }}
                    <i class="lni lni-arrow-right"></i>
                </a>
            </li>
        @endforeach

    </ul>
</div>

                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="details-content">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/services/Decoration.jpg') }}" alt="">
                            </div>
                            <h3 class="title">Introduction to Neurology</h3>
                            <p>Languages realizes why a new common language would be desirable: one could refuse to pay
                                expensive translators. To achieve this, it would be necessary to have uniform grammar,
                                pronunciation and more common words.</p>

                            <p>Languages realizes why a new common language would be desirable: one could refuse to pay
                                expensive translators. To achieve this, it would be necessary to have uniform grammar,
                                pronunciation and more common words. If several languages coalesce, the grammar of the
                                resulting. would be desirable.</p>
                            <h4 class="sub-title">Why Choose This Service</h4>
                            <p>Sed ut perspiciatis undeomnis iste natus error sit voluptatem accusantium dolore Totam
                                rem
                                aperiam with a long list of products and never ending customer support.</p>
                            <ul class="list">
                                <li><i class="lni lni-checkmark"></i> Cerebrovascular disease, such as stroke</li>
                                <li><i class="lni lni-checkmark"></i> Demyelinating diseases of the central nervous
                                    system,
                                    such as multiple sclerosis
                                </li>
                                <li><i class="lni lni-checkmark"></i> Headache disorders
                                </li>
                                <li><i class="lni lni-checkmark"></i> Infections of the brain and peripheral nervous
                                    system
                                </li>
                                <li><i class="lni lni-checkmark"></i> Movement disorders, such as Parkinson's disease
                                </li>
                            </ul>




                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Start Achievement Area -->
            @include('frontend.cta')
         <!-- End Achievement Area -->
    </div>
@endsection
