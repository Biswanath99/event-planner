@extends('layouts.frontend.app')
@section('content')
    <section id="appointment" class="contact-us section">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="section-title text-center">

                            <h2>{{ $policy->title ?? 'Privacy Policy' }}</h2>

                            <div class="title-shape">
                                <img src="{{ asset($policy->image_url ?? 'assets/images/services/section-line.png') }}" alt="">
                            </div>

                            <p>
                                {{ $policy_ext['description'] ?? '' }}
                            </p>

                        </div>

                    </div>
                </div>

                 <div class="row justify-content-center">

                    <div class="col-lg-8 col-md-10 col-12">

                        <div class="contact-head wow fadeInUp"
                            data-wow-delay=".4s">

                            <div class="form-main">

                                <div class="form-title text-center">


                                </div>

                            

                                <div class="form">

                                

                                    <div class="row">

                                        
                                        {!! $policy->text_content ?? '' !!}

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            
        </div>
    </section>
@endsection