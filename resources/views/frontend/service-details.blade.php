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
                            <h3 class="title">Lorem Ipsum</h3>
                            
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised thanks to these sheets and more recently with desktop publishing software including versions of Lorem Ipsum.</p>

                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since 1966, when designers at Letraset and James Mosley, the librarian at St Bride Printing Library, took a 1914 Cicero translation and scrambled it to make dummy text for Letraset's Body Type sheets. It has survived not only many decades, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised thanks to these sheets and more recently with desktop publishing software including versions of Lorem Ipsum.</p>
                            




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
