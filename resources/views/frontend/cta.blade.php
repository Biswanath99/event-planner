@php
    $ctaSection = \App\Models\Cms::where('slug', 'cta-section')
        ->where('status', 'published')
        ->first();

    $extra = $ctaSection ? json_decode($ctaSection->extra, true) : [];
@endphp

<section class="cta-section">

    <div class="container">

        <div class="cta-wrapper">

            {{-- Top Shape --}}
            <div class="cta-shape">

                <img src="{{ asset('assets/images/services/slide-border.png') }}"
                    alt="">

            </div>

            {{-- CMS Title --}}
            <h4>
                {{ $ctaSection->text_content ?? 'WE ARE HERE FOR YOU!' }}
            </h4>

            {{-- JSON Description --}}
            <p >
                {{ $extra['description'] ?? '' }}
            </p>

            {{-- Appointment Button --}}
            <a href="{{ route('appointment') }}"
                class="cta-btn">

                <i class="lni lni-heart"></i>

                BOOK APPOINTMENT

            </a>

        </div>

    </div>

</section>