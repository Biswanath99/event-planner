@php
    $site_info     = \App\Models\Cms::where('slug', 'site-logo')->where('status', 'published')->first();
    $contactPage   = \App\Models\Cms::where('slug', 'top-contact')->where('status', 'published')->first();
    $contact       = $contactPage ? json_decode($contactPage->extra, true) : [];
    $email         = collect($contact['items'] ?? [])->firstWhere('type', 'email');
    $phone         = collect($contact['items'] ?? [])->firstWhere('type', 'phone');
    $services_card = \App\Models\Services::latest()->get();
@endphp

<header class="header navbar-area style2">
    <!-- Start Topbar -->
    <div class="top-bar">
        <div class="container">
            <div class="inner-topbar">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="top-contact">
                            <ul>

                                @if($email)
                                    <li>
                                        <i class="{{ $email['icon'] }}"></i>
                                        <a href="mailto:{{ $email['text'] }}">
                                            {{ $email['text'] }}
                                        </a>
                                    </li>
                                @endif

                                @if($phone)
                                    <li>
                                        <i class="{{ $phone['icon'] }}"></i>
                                        <a href="tel:{{ $phone['text'] }}">
                                            {{ $phone['text'] }}
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="right-content">

                           <div class="top-social">
                                <ul>
                                    @foreach($contact['items'] ?? [] as $item)

                                        @if(in_array($item['type'], [
                                            'facebook',
                                            'twitter',
                                            'instagram',
                                            'youtube',
                                            'pinterest'
                                        ]))

                                            <li>
                                                <a href="{{ $item['text'] }}"
                                                    target="_blank"
                                                    rel="noopener noreferrer">

                                                    <i class="{{ $item['icon'] }}"></i>

                                                </a>
                                            </li>

                                        @endif

                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="nav-inner">
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.html">
                           <img src="{{ optional($site_info)->image_url ?? asset('assets/images/logo/logo.png') }}" alt="Logo">
                        </a>
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">

                                <li class="nav-item">
                                    <a class="{{ request()->routeIs('index') ? 'active' : '' }}"
                                        href="{{ route('index') }}">
                                        Home
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="{{ request()->routeIs('about-us') ? 'active' : '' }}"
                                        href="{{ route('about-us') }}">
                                        About Us
                                    </a>
                                </li>

                                <li class="nav-item">

                                    <a class="page-scroll dd-menu {{ request()->routeIs('service-details') ? 'active' : 'collapsed' }}"
                                        href="javascript:void(0)"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#submenu-1-2"
                                        aria-expanded="{{ request()->routeIs('service-details') ? 'true' : 'false' }}" >
                                            
                                        Services

                                    </a>

                                    <ul class="sub-menu collapse {{ request()->routeIs('service-details') ? 'show' : '' }}"
                                        id="submenu-1-2">

                                        @foreach($services_card as $service)

                                            <li class="nav-item">

                                                <a class="{{ request()->is('service-details/'.$service->slug) ? 'active' : '' }}"
                                                    href="{{ url('service-details/'.$service->slug) }}">

                                                    {{ $service->name }}

                                                </a>

                                            </li>

                                        @endforeach

                                    </ul>

                                </li>

                                <li class="nav-item">
                                    <a class="{{ request()->routeIs('gallery') ? 'active' : '' }}"
                                        href="{{ route('gallery') }}">
                                        Gallery
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="{{ request()->routeIs('contact-us') ? 'active' : '' }}"
                                        href="{{ route('contact-us') }}">
                                        Contact Us
                                    </a>
                                </li>

                            </ul>
                        </div> <!-- navbar collapse -->
                        <div class="button add-list-button">
                            <a class="read-btn" href="{{ route('appointment') }}" class="btn"> <i class="lni lni-heart"></i> Book Appointment</a>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</header>
