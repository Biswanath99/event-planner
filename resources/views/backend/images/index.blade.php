@extends('layouts.backend.app')
@section('title', 'Images')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-dark fw-bold">Manage Images</span>
    </h4>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.images.create') }}"
            class="btn btn-success">
            <i class="bx bx-plus"></i> Add Images
        </a>
    </div>

    <div class="card">

        <h5 class="card-header">Images List</h5>

        <div class="table-responsive text-nowrap">

            <table class="table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                       
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody class="table-border-bottom-0">

                    @forelse($images as $index => $image)

                        <tr>

                            <td>
                                {{ ($images->currentPage() - 1) * $images->perPage() + ($index + 1) }}
                            </td>

                            <td>
                                {{ $image->category->title ?? 'N/A' }}
                            </td>

                           

                            <td class="text-center">

                                <div class="dropdown">

                                    <button type="button"
                                        class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">

                                        <i class="bx bx-dots-vertical-rounded"></i>

                                    </button>

                                    <div class="dropdown-menu">

                                        <a class="dropdown-item"
                                            href="{{ route('admin.images.edit', $image->category_id) }}">

                                            <i class="bx bx-edit-alt me-1"></i> Edit

                                        </a>

                                    </div>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="12" class="text-center text-danger">
                                <i class="bx bx-error-circle me-2"></i>
                                No Images Found
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        @if ($images->hasPages())
            <div class="card-footer d-flex justify-content-end">
                {{ $images->links() }}
            </div>
        @endif

    </div>

</div>

@endsection