@extends('layouts.backend.app')
@section('title', 'Create Service')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card">
            <h5 class="card-header">Create Service</h5>

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

                <form action="{{ route('admin.service.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        {{-- Service Name --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Service Name <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter service name"
                                value="{{ old('name') }}">

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Slug --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Slug <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="slug" id="slug"
                                class="form-control @error('slug') is-invalid @enderror"
                                readonly
                                value="{{ old('slug') }}">

                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="col-md-12 mb-3">
                            <label class="form-label">
                                Description
                            </label>

                            <textarea name="description" rows="6"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Enter service description">{{ old('description') }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Border Image --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Border Image
                            </label>

                            <input type="file" name="border_image"
                                class="form-control @error('border_image') is-invalid @enderror">

                            @error('border_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-3">

                        <a href="{{ route('admin.service.index') }}"
                            class="btn btn-dark">
                            Back
                        </a>

                        <button type="submit" class="btn btn-success">
                            <i class="bx bx-save"></i> Save Service
                        </button>

                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('name').addEventListener('input', function() {

            let name = this.value;

            let slug = name
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');

            document.getElementById('slug').value = slug;
        });
    </script>
@endpush