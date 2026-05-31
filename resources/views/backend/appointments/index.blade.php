@extends('layouts.backend.app')
@section('title', 'Appointments')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-dark fw-bold">Manage Appointments</span>
        </h4>

       

        <div class="card">
            <h5 class="card-header">Appointments List</h5>

            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th>Service</th>
                            <th>Message</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody class="table-border-bottom-0">
                        @forelse($appointments as $index => $appointment)
                            <tr>
                                <td>
                                    {{ ($appointments->currentPage() - 1) * $appointments->perPage() + $index + 1 }}
                                </td>

                                <td>{{ $appointment->name }}</td>
                                <td>{{ $appointment->email }}</td>
                                <td>{{ $appointment->contact_no }}</td>
                                <td>{{ $appointment->service->name ?? '-' }}</td>
                                <td>{{ Str::limit($appointment->message, 50) }}</td>

                                <td class="text-center">
                                    <a href="{{ route('admin.appointment.view', $appointment->id) }}"
                                        class="btn btn-sm btn-dark">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-danger">
                                    <i class="bx bx-error-circle me-2"></i>
                                    No Appointments Found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($appointments->hasPages())
                <div class="card-footer d-flex justify-content-end">
                    {{ $appointments->links() }}
                </div>
            @endif
        </div>

    </div>
@endsection
