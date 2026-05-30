@extends('layouts.backend.app')
@section('title', 'Create Service Details')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <h5 class="card-header">Create Service Details</h5>

        <div class="card-body">

            <form action="{{ route('admin.service-details.store') }}"
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

                    {{-- Title --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Title <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                               name="title"
                               class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}"
                               placeholder="Enter Title">

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Image --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Image</label>

                        <input type="file"
                               name="image"
                               class="form-control @error('image') is-invalid @enderror">

                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Description</label>

                        <textarea name="description"
                                  rows="5"
                                  class="form-control @error('description') is-invalid @enderror"
                                  placeholder="Enter Description">{{ old('description') }}</textarea>

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

                    <button type="submit" class="btn btn-success">
                        <i class="bx bx-save"></i> Save
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
@endsection