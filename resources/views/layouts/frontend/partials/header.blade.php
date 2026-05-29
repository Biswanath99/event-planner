@php
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
                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                                    </li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                                    </li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-youtube"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-pinterest"></i></a></li>
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
                            <img src="assets/images/logo/logo.svg" alt="Logo">
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
                                    <a  class="active" href="{{ route('index') }}" aria-label="Toggle navigation">Home</a>
                                </li>

                                 <li class="nav-item">
                                    <a href="{{ route('about-us') }}" aria-label="Toggle navigation">About Us</a>
                                </li>


                               <li class="nav-item">

    <a class="page-scroll dd-menu collapsed"
        href="javascript:void(0)"
        data-bs-toggle="collapse"
        data-bs-target="#submenu-1-2"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation">

        Services

    </a>

    <ul class="sub-menu collapse" id="submenu-1-2">

        @forelse($services_card as $service)

            <li class="nav-item">

                <a href="{{ url($service->slug) }}">

                    {{ $service->name }}

                </a>

            </li>

        @empty

            <li class="nav-item">
                <a href="#">
                    No Services Found
                </a>
            </li>

        @endforelse

    </ul>

</li>

                                 <li class="nav-item">
                                    <a href="{{ route('gallery') }}" aria-label="Toggle navigation">Gallery</a>
                                 </li>

                                <li class="nav-item">
                                    <a href="{{ route('contact-us') }}" aria-label="Toggle navigation">Contact Us</a>
                                </li>




                            </ul>
                        </div> <!-- navbar collapse -->
                        <div class="button add-list-button">
                            <a class="read-btn" href="{{ route('appointment') }}" class="btn">Book Appointment</a>
                        </div>
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</header>
