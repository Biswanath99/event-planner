@extends('layouts.backend.app')
@section('title', 'Create Images')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <h5 class="card-header">Create Images</h5>

        <div class="card-body">

            <form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row">

                    {{-- Category --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Category <span class="text-danger">*</span>
                        </label>

                        <select name="category_id"
                                class="form-select @error('category_id') is-invalid @enderror">

                            <option value="">Select Category</option>

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach

                        </select>

                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Multiple Images --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                             Images <span class="text-danger">*</span>
                        </label>

                        <input type="file"
                               name="images[]"
                               multiple
                               class="form-control @error('images') is-invalid @enderror">

                        <small class="text-muted">
                            Hold Ctrl (Windows) / Cmd (Mac) to select multiple images.
                        </small>

                        @error('images')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        @error('images.*')
                            <div class="text-danger small">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                <div class="d-flex justify-content-end gap-2 mt-3">

                    <a href="{{ route('admin.images.index') }}"
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