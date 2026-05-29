@extends('layouts.backend.app')
@section('title', 'Create Banner')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">
        <h5 class="card-header">
            Create Banner
        </h5>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show m-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body">

            <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label"> Sub Title</label>
                        <input type="text" name="sub_title" class="form-control @error('sub_title') is-invalid @enderror" placeholder="Enter sub title" value="{{ old('sub_title') }}">
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
                               value="{{ old('title') }}">

                        @error('title')

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

                    </div>

                      <!-- DESCRIPTION -->
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="description"
                                  rows="5"
                                  class="form-control @error('description') is-invalid @enderror"
                                  placeholder="Enter description">{{ old('description') }}</textarea>

                        @error('description')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-end gap-2 mt-3">

                    <a href="{{ route('admin.banner.index') }}"
                       class="btn btn-dark">

                        Back

                    </a>

                    <button type="submit"
                            class="btn btn-success">

                        <i class="bx bx-save"></i>
                        Save Banner

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection