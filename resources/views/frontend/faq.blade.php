@extends('layouts.frontend.app')
@section('content')
    <section class="faq section">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="section-title text-center">

                            <h2>{{ $faq->text_content ?? 'Frequently Asked Questions' }}</h2>

                            <div class="title-shape">
                                <img src="{{ asset($faq->image_url ?? 'assets/images/services/section-line.png') }}" alt="">
                            </div>

                            <p>
                                {{ $faq_ext['description'] ?? '' }}
                            </p>

                        </div>

                    </div>
                </div>
            <div class="row">
                <div class="col-12">

                    <div class="accordion" id="accordionExample">

                        @foreach($faq_details as $index => $faq)

                            <div class="accordion-item">

                                <h2 class="accordion-header" id="heading{{ $faq->id }}">

                                    <button class="accordion-button {{ $index != 0 ? 'collapsed' : '' }}"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $faq->id }}"
                                        aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $faq->id }}">

                                        <span class="title">

                                            <span class="serial">
                                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                            </span>

                                            {{ $faq->title }}

                                        </span>

                                        <i class="lni lni-plus"></i>

                                    </button>

                                </h2>

                                <div id="collapse{{ $faq->id }}"
                                    class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                    aria-labelledby="heading{{ $faq->id }}"
                                    data-bs-parent="#accordionExample">

                                    <div class="accordion-body">

                                        {!! $faq->description !!}

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </section>
  
@endsection
