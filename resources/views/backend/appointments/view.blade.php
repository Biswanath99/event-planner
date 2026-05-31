@extends('layouts.backend.app')
@section('title', 'View Appointment')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">View Appointment</h5>

            <div class="card-body">
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" value="{{ $appointment->name }}" readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{ $appointment->email }}" readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Contact No</label>
                        <input type="text" class="form-control" value="{{ $appointment->contact_no }}" readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Service Name</label>
                        <input type="text" class="form-control" value="{{ $appointment->service->name ?? '' }}" readonly>
                    </div>


                    <div class="col-md-12 mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" rows="4" readonly>{{ $appointment->message }}</textarea>
                    </div>

                </div>

                <div class="d-flex justify-content-end gap-2 mt-3">
                    <a href="{{ route('admin.appointment.index') }}" class="btn btn-dark">
                        Back
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
