@extends('layouts.backend.app')
@section('title', 'Edit Service Details')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <h5 class="card-header">Edit Service Details</h5>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card-body">

            <form action="{{ route('admin.service-details.update', $serviceDetails->id) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
              

                <div class="row">

                    {{-- Service --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Service <span class="text-danger">*</span>
                        </label>

                        <select name="service_id"
                            class="form-select @error('service_id') is-invalid @enderror">

                            <option value="">Select Service</option>

                            @foreach($services as $service)
                                <option value="{{ $service->id }}"
                                    {{ old('service_id', $serviceDetails->service_id) == $service->id ? 'selected' : '' }}>
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

                    {{-- Title --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Title <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                            name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title', $serviceDetails->title) }}"
                            placeholder="Enter title">

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Image --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Image
                        </label>

                        <input type="file"
                            name="image"
                            class="form-control @error('image') is-invalid @enderror">

                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        @if($serviceDetails->image)
                            <img src="{{ $serviceDetails->image_url }}"
                                alt="Service Detail Image"
                                class="img-fluid mt-2 rounded"
                                style="max-height:120px;">
                        @endif
                    </div>

                    {{-- Description --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            Description
                        </label>

                        <textarea name="description"
                            rows="6"
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="Enter description">{{ old('description', $serviceDetails->description) }}</textarea>

                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="d-flex justify-content-end gap-2 mt-3">

                    <a href="{{ route('admin.service-details.index') }}"
                        class="btn btn-dark">
                        Back
                    </a>

                    <button type="submit" class="btn btn-warning">
                        <i class="bx bx-save"></i> Update
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
@endsection