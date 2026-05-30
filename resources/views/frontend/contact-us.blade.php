@extends('layouts.frontend.app')
@section('content')

<section id="contact-us" class="contact-us section">
    <div class="container">

        {{-- Section Title --}}
        <div class="row">
            <div class="col-12">

                <div class="section-title text-center">

                    {{-- CMS Title --}}
                    <h2>
                        {{ $contact->title ?? 'Get in touch' }}
                    </h2>

                    <div class="title-shape">
                        <img src="{{ asset('assets/images/services/section-line.png') }}"
                            alt="">
                    </div>

                    {{-- CMS Text Content --}}
                    <p>
                        {{ $contact->text_content ?? '' }}
                    </p>

                </div>

            </div>
        </div>

        <div class="contact-head wow fadeInUp" data-wow-delay=".4s">

            <div class="row">

                {{-- Contact Form --}}
                <div class="col-lg-8 col-12">

                    <div class="form-main">

                        <div class="form-title">
                            <h2>
                                {{ $extra['intro_text'] ?? ' Feel free to contact us for any query.' }}
                            </h2>
                        </div>

                         @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form class="form" action="{{ route('contact-us.store') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-lg-6 col-12">
                                   <div class="form-group mb-3">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-12">
                                   <div class="form-group mb-3">
                                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror"
                                            placeholder="Subject" value="{{ old('subject') }}">
                                        @error('subject')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror"
                                            placeholder="Your Message">{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                    <div class="col-12">
                                        <div class="form-group button">

                                            <button type="submit" class="read-btn">

                                                <i class="lni lni-telegram-original"></i>

                                                Send Message

                                            </button>

                                        </div>
                                    </div>

                            </div>

                        </form>

                    </div>

                </div>

                {{-- Dynamic Contact Card --}}
                <div class="col-lg-4 col-12">

                    <div class="single-head">

                        <h2 class="main-title">
                            {{ $extra['section_title'] ?? 'Contact Information' }}
                        </h2>

                        {{-- Address --}}
                        <div class="single-info">

                            <div class="info-icon">
                                <i class="{{ $extra['address']['icon'] ?? '' }}"></i>
                            </div>

                            <h3>
                                {{ $extra['address']['title'] ?? 'Address' }}
                            </h3>

                            <ul>

                                <li>
                                    {{ $extra['address']['line_one'] ?? '' }}
                                </li>

                                <li>
                                    {{ $extra['address']['line_two'] ?? '' }}
                                </li>

                            </ul>

                        </div>

                       
                        <div class="single-info">

                            <div class="info-icon">
                                <i class="{{ $extra['phone_support']['icon'] ?? '' }}"></i>
                            </div>

                            <h3>
                                {{ $extra['phone_support']['title'] ?? 'Contact Number' }}
                            </h3>

                            <ul>

                                <li>
                                    {{ $extra['phone_support']['line_one'] ?? '' }}
                                </li>

                                <li>
                                    {{ $extra['phone_support']['line_two'] ?? '' }}
                                </li>

                            </ul>

                        </div>

                        {{-- Email Support --}}
                        <div class="single-info">

                            <div class="info-icon">
                                <i class="{{ $extra['email_support']['icon'] ?? '' }}"></i>
                            </div>

                            <h3>
                                {{ $extra['email_support']['title'] ?? 'Email Support' }}
                            </h3>

                            <ul>

                                <li>
                                    <a href="mailto:{{ $extra['email_support']['line_one'] ?? '' }}">
                                        {{ $extra['email_support']['line_one'] ?? '' }}
                                    </a>
                                </li>

                                <li>
                                    <a href="mailto:{{ $extra['email_support']['line_two'] ?? '' }}">
                                        {{ $extra['email_support']['line_two'] ?? '' }}
                                    </a>
                                </li>

                            </ul>

                        </div>

                        {{-- Social Contact --}}
                        <div class="single-info contact-social">

                            <h3>
                                {{ $extra['social_contact']['title'] ?? 'Social Contact' }}
                            </h3>

                            <div class="info-icon">
                                <i class="{{ $extra['social_contact']['icon'] ?? '' }}"></i>
                            </div>

                            <ul>

                                @foreach ($extra['social_contact']['social_links'] ?? [] as $social)

                                    <li>
                                        <a href="{{ $social['url'] }}"
                                            target="_blank">

                                            <i class="{{ $social['icon'] }}"></i>

                                        </a>
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

@endsection