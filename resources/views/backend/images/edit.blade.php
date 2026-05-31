@extends('layouts.backend.app')
@section('title', 'Edit Images')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <h5 class="card-header">Edit Images</h5>

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

            <form action="{{ route('admin.images.update', $category->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    {{-- Category --}}
                    <div class="col-md-4 mb-3">
                        <label class="form-label">
                            Category <span class="text-danger">*</span>
                        </label>

                        <select name="category_id"
                                class="form-select @error('category_id') is-invalid @enderror">

                            <option value="">Select Category</option>

                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ old('category_id', $category->id) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->title }}
                                </option>
                            @endforeach

                        </select>

                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Multiple Images Upload --}}
                    <div class="col-md-8 mb-3">
                        <label class="form-label">Add New Images</label>

                        <input type="file"
                               name="images[]"
                               multiple
                               class="form-control @error('images') is-invalid @enderror">

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

                        {{-- Old Images Preview --}}
                        <div class="row mt-3">

                            @foreach($images as $img)
                                <div class="col-3 mb-2">
                                    <img src="{{ $img->image_url }}"
                                         class="img-fluid rounded"
                                         style="height:80px; width:100%; object-fit:cover;">
                                </div>
                            @endforeach

                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-end gap-2 mt-3">

                    <a href="{{ route('admin.images.index') }}"
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