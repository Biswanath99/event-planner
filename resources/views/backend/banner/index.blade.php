@extends('layouts.backend.app')

@section('title', 'Banner')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-dark fw-bold">
            Manage Banner
        </span>
    </h4>

    <!-- SUCCESS MESSAGE -->
    @if (session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif

    <!-- ERROR MESSAGE -->
    @if (session('error'))

        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    @endif

    <!-- VALIDATION ERROR -->
    @if ($errors->any())

        <div class="alert alert-danger alert-dismissible fade show">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <!-- ADD BUTTON -->
    <div class="d-flex justify-content-end mb-3">

        <a href="{{ route('admin.banner.create') }}"
           class="btn btn-success">

            <i class="bx bx-plus"></i>
            Add Banner

        </a>

    </div>

    <!-- TABLE -->
    <div class="card">

        <h5 class="card-header">
            Banner List
        </h5>

        <div class="table-responsive text-nowrap">

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sub Title</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Border Image</th>
                        <th>Banner Image</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody class="table-border-bottom-0">
                    @forelse($banners as $index => $item)

                        <tr>
                                <td>{{ ($banners->currentPage() - 1) * $banners->perPage() + ($index + 1) }}</td>
                                <td>{{ $item->sub_title }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ Str::limit($item->description, 40) }}</td>

                                <td class="text-center">
                                    @if ($item->border_image_url)
                                        <img src="{{ $item->border_image_url }}"
                                            alt="{{ $item->title }}"
                                            class="rounded"
                                            style="width:70px;height:50px;object-fit:cover;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    @if ($item->image_url)
                                        <img src="{{ $item->image_url }}"
                                            alt="{{ $item->title }}"
                                            class="rounded"
                                            style="width:70px;height:50px;object-fit:cover;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    @if ($item->status == 'published')
                                        <span class="badge bg-label-success me-1">Published</span>
                                    @else
                                        <span class="badge bg-label-warning me-1">Draft</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('admin.banner.edit', $item->id) }}">
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
                                No Data Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


        @if ($banners->hasPages())
            <div class="card-footer d-flex justify-content-end">
                {{ $banners->links() }}
            </div>
        @endif
    </div>
</div>
@endsection