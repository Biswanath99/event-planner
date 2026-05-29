@extends('layouts.backend.app')

@section('title', 'Edit Banner')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <h5 class="card-header">
            Edit Banner
        </h5>

       

        <div class="card-body">

         @if ($errors->any())

            <div class="alert alert-danger alert-dismissible fade show">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

            <form action="{{ route('admin.banner.update', $banner->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
              

                <div class="row">

                    <!-- SUB TITLE -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Sub Title
                        </label>

                        <input type="text"
                               name="sub_title"
                               class="form-control @error('sub_title') is-invalid @enderror"
                               placeholder="Enter sub title"
                               value="{{ old('sub_title', $banner->sub_title) }}">

                        @error('sub_title')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                    <!-- TITLE -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Title
                        </label>

                        <input type="text"
                               name="title"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="Enter title"
                               value="{{ old('title', $banner->title) }}">

                        @error('title')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                    <!-- DESCRIPTION -->
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="description"
                                  rows="5"
                                  class="form-control @error('description') is-invalid @enderror"
                                  placeholder="Enter description">{{ old('description', $banner->description) }}</textarea>

                        @error('description')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                    <!-- BORDER IMAGE -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Border Image
                        </label>

                        <input type="file"
                               name="border_image"
                               class="form-control @error('border_image') is-invalid @enderror">

                        @error('border_image')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                           @if ($banner->border_image_url)
                                <img src="{{ $banner->border_image_url }}" alt="Border Image" class="img-fluid mt-2"
                                    style="max-height: 100px;">
                            @endif

                    </div>

                    <!-- MAIN IMAGE -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Banner Image
                        </label>

                        <input type="file"
                               name="image"
                               class="form-control @error('image') is-invalid @enderror">

                        @error('image')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                            @if ($banner->image_url)
                                <img src="{{ $banner->image_url }}" alt="Banner Image" class="img-fluid mt-2" style="max-height: 100px;">
                            @endif

                    </div>

                   

                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-end gap-2 mt-3">

                    <a href="{{ route('admin.banner.index') }}"
                       class="btn btn-dark">

                        Back

                    </a>

                    <button type="submit"
                            class="btn btn-warning">

                        <i class="bx bx-save"></i>
                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection