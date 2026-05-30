@extends('layouts.backend.app')
@section('title', 'Service Details')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-4">
        <span class="text-dark fw-bold">Manage Service Details</span>
    </h4>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error Message --}}
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Add Button --}}
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('admin.service-details.create') }}"
            class="btn btn-success">
            <i class="bx bx-plus"></i> Add Service Details
        </a>
    </div>

    <div class="card">

        <h5 class="card-header">Service Details List</h5>

        <div class="table-responsive text-nowrap">

            <table class="table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Service Name</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody class="table-border-bottom-0">

                    @forelse($serviceDetails as $index => $item)

                        <tr>

                            {{-- Serial Number --}}
                            <td>
                                {{ ($serviceDetails->currentPage() - 1) * $serviceDetails->perPage() + ($index + 1) }}
                            </td>

                            {{-- Service Name --}}
                            <td>
                                {{ $item->service->name ?? 'N/A' }}
                            </td>

                            {{-- Title --}}
                            <td>
                                {{ $item->title }}
                            </td>

                            {{-- Image --}}
                            <td>
                                @if ($item->image)
                                    <img src="{{ $item->image_url }}"
                                        alt="{{ $item->title }}"
                                        class="rounded"
                                        width="60"
                                        height="60"
                                        style="object-fit: cover;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>

                            {{-- Description --}}
                            <td>
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->description), 80) }}
                            </td>

                            {{-- Action --}}
                            <td class="text-center">

                                <div class="dropdown">

                                    <button type="button"
                                        class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">

                                        <i class="bx bx-dots-vertical-rounded"></i>

                                    </button>

                                    <div class="dropdown-menu">

                                        <a class="dropdown-item"
                                            href="{{ route('admin.service-details.edit', $item->id) }}">

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
                                No Service Details Found
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- Pagination --}}
        @if ($serviceDetails->hasPages())
            <div class="card-footer d-flex justify-content-end">
                {{ $serviceDetails->links() }}
            </div>
        @endif

    </div>

</div>

@endsection