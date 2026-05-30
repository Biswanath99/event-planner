@extends('layouts.frontend.app')

@section('content')

<section id="appointment" class="contact-us section">

    <div class="container">

        {{-- Section Title --}}
        <div class="row">
            <div class="col-lg-12 col-12 m-auto">

                <div class="section-title text-center">

                    <h2>
                        {{ $appointment->text_content ?? 'Book An Appointment' }}
                    </h2>

                    <div class="title-shape">
                        <img src="{{ $appointment->image_url }}"
                            alt="{{ $appointment->title }}">
                    </div>

                    <p>
                        {{ $extra['description'] ?? '' }}
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

                            <h>
                                {{ $extra['form_heading'] ?? 'Want us to plan your next big event? Contact us personally here.' }}
                            </h>

                        </div>

                        {{-- Success Message --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Error Message --}}
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form class="form" action="{{ route('appointment.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="row">

                                {{-- Name --}}
                                <div class="col-lg-6 col-12">

                                    <div class="form-group mb-3">

                                        <input type="text"
                                            name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Full Name"
                                            value="{{ old('name') }}">

                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                </div>

                                {{-- Email --}}
                                <div class="col-lg-6 col-12">

                                    <div class="form-group mb-3">

                                        <input type="email"
                                            name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Email Address"
                                            value="{{ old('email') }}">

                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                </div>

                                {{-- Contact Number --}}
                                <div class="col-lg-6 col-12">

                                    <div class="form-group mb-3">

                                        <input type="text"
                                            name="contact_no"
                                            class="form-control @error('contact_no') is-invalid @enderror"
                                            placeholder="Contact Number"
                                            value="{{ old('contact_no') }}">

                                        @error('contact_no')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                </div>

                                {{-- Services Dropdown --}}
                                <div class="col-lg-6 col-12">

                                    <div class="form-group mb-3">

                                       <select name="service_id"
                                            class="form-select @error('service_id') is-invalid @enderror">

                                            <option value="">Select Service</option>

                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}"
                                                    {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                                    {{ $service->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                        @error('service_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                </div>

                              
                               

                                {{-- Message --}}
                                <div class="col-lg-12 col-12">

                                    <div class="form-group mb-3">

                                        <textarea name="message"
                                            rows="5"
                                            class="form-control @error('message') is-invalid @enderror"
                                            placeholder="Write Your Message">{{ old('message') }}</textarea>

                                        @error('message')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror

                                    </div>

                                </div>

                                {{-- Submit Button --}}
                                 <div class="col-12">
                                        <div class="form-group button">

                                            <button type="submit" class="read-btn">

                                                <i class="lni lni-heart"></i>

                                                Get Appointment

                                            </button>

                                        </div>
                                    </div>


                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection