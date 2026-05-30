@extends('layouts.backend.app')
@section('title', 'Create FAQ')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <h5 class="card-header">Create FAQ</h5>

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

            <form action="{{ route('admin.faq.store') }}" method="POST">
                @csrf

                <div class="row">

                    {{-- Question --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            Question <span class="text-danger">*</span>
                        </label>

                        <input type="text"
                            name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            placeholder="Enter question"
                            value="{{ old('title') }}">

                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Answer --}}
                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            Answer <span class="text-danger">*</span>
                        </label>

                        <textarea name="description"
                            rows="6"
                            class="form-control @error('description') is-invalid @enderror"
                            placeholder="Enter answer">{{ old('description') }}</textarea>

                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="d-flex justify-content-end gap-2 mt-3">

                    <a href="{{ route('admin.faq.index') }}"
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