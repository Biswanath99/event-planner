@php
    $contactPage = \App\Models\Cms::where('slug', 'contact-details')
        ->where('status', 'published')
        ->first();

    $contact   = $contactPage ? json_decode($contactPage->extra, true) : [];
    $site_info = \App\Models\Cms::where('slug', 'site-logo')->where('status', 'published')->first();
@endphp
 <footer class="footer overlay">

     <!-- Start Footer Middle -->
     <div class="footer-middle">
         <div class="container">
             <div class="row">
                 <div class="col-lg-3 col-md-6 col-12">
                     <!-- Single Widget -->
                     <div class="single-footer f-about">
                         <div class="logo">
                             <a href="index.html">
                                 <img src="{{ optional($site_info)->image_url ?? asset('assets/images/logo/logo.png') }}" alt="#">
                             </a>
                         </div>
                         <p>{{$site_info->text_content}}</p>

                     </div>
                     <!-- End Single Widget -->
                 </div>
                 <div class="col-lg-3 col-md-6 col-12">
                     <!-- Single Widget -->
                     <div class="single-footer f-link">
                         <h3>Useful Links</h3>
                         <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <ul>
                                    <li><a href="{{ route('index') }}">Home</a></li>
                                    <li><a href="{{ route('about-us') }}">About Us</a></li>
                                    <li><a href="{{ route('gallery') }}">Gallery</a></li>
                                    <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                                    <li><a href="{{ route('appointment') }}">Book Appointment</a></li>
                                </ul>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12">
                                <ul>
                                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                                    <li><a href="{{ route('privacy-policy') }}">Privacy & Policy</a></li>
                                    <li><a href="{{ route('terms-conditions') }}">Terms & Conditions</a></li>
                                </ul>
                            </div>
                         </div>
                     </div>
                     <!-- End Single Widget -->
                 </div>

                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer last f-contact">

                            <h3>
                                Get In Touch
                            </h3>

                            <ul>
                                @if(!empty($contact['items']))
                                    @foreach($contact['items'] as $item)
                                        <li>
                                            <i class="{{ $item['icon'] ?? '' }}"></i>
                                            {{ $item['text'] ?? '' }}
                                        </li>
                                    @endforeach
                                @endif
                            </ul>

                        </div>
                    </div>

                 <div class="col-lg-3 col-md-6 col-12">

                     <div class="map-area mt-4">

                         <iframe
                             src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3683.846447148275!2d88.36389587407324!3d22.595768132366526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0277c4f1b1b1b1%3A0x123456789abcdef!2sKolkata!5e0!3m2!1sen!2sin!4v1710000000000!5m2!1sen!2sin"
                             width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                             referrerpolicy="no-referrer-when-downgrade">
                         </iframe>

                     </div>

                 </div>
             </div>
         </div>
     </div>
     <!--/ End Footer Middle -->
     <!-- Start Footer Bottom -->
     <div class="footer-bottom">
         <div class="container">
             <div class="inner">
                 <div class="row">
                     <div class="col-lg-6 col-md-6 col-12">
                         <div class="content">
                             <p class="copyright-text">Designed & Developed by <a href="https://github.com/riyaroy2002" rel="nofollow" target="_blank">Riya Roy</a>
                             </p>
                         </div>
                     </div>
                     <div class="col-lg-6 col-md-6 col-12">
                         <ul class="extra-link">
                             <li><a href="#">Terms & Conditions</a></li>
                             <li><a href="{{ route('faq') }}">FAQ</a></li>
                             <li><a href="#">Privacy Policy</a></li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Footer Middle -->
 </footer>
