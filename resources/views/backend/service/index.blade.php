@extends('layouts.backend.app')
@section('title', 'Services')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-dark fw-bold">Manage Services</span>
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
            <a href="{{ route('admin.service.create') }}"
                class="btn btn-success">
                <i class="bx bx-plus"></i> Add Service
            </a>
        </div>

        <div class="card">

            <h5 class="card-header">Service List</h5>

            <div class="table-responsive text-nowrap">

                <table class="table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody class="table-border-bottom-0">

                        @forelse($services as $index => $item)

                            <tr>

                                {{-- Serial Number --}}
                                <td>
                                    {{ ($services->currentPage() - 1) * $services->perPage() + ($index + 1) }}
                                </td>

                                 <td>
                                    {{ $item->name }}
                                </td>

                                 <td>
                                    {{ $item->slug }}
                                </td>

                                {{-- Image --}}
                                <td>
                                    @if ($item->border_image)
                                        <img src="{{ $item->image_url }}"
                                            alt="{{ $item->name }}"
                                            class="rounded"
                                            width="60"
                                            height="60"
                                            style="object-fit: cover;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>

                                {{-- Name --}}
                               

                                {{-- Slug --}}
                               

                                {{-- Description --}}
                                <td>
                                    {{ Str::limit($item->description, 60) }}
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
                                                href="{{ route('admin.service.edit', $item->id) }}">

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
                                    No Service Found
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}
            @if ($services->hasPages())
                <div class="card-footer d-flex justify-content-end">
                    {{ $services->links() }}
                </div>
            @endif

        </div>

    </div>

@endsection