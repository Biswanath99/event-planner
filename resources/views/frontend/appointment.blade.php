@extends('layouts.frontend.app')
@section('content')
    <section class="appointment page section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <!-- Appointment Form -->
                    <div class="appointment-form">
                        <div class="row">
                            <div class="col-12">
                                <div class="appointment-title">
                                    <h2>Book An Appointment</h2>
                                    <p>Please feel welcome to contact our friendly reception staff with any general or
                                        medical
                                        enquiry. Our doctors will receive or return any urgent calls.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 p-0">
                                <div class="appointment-input">
                                    <label for="name"><i class="lni lni-user"></i></label>
                                    <input type="text" name="name" id="name" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 p-0">
                                <div class="appointment-input">
                                    <label for="email"><i class="lni lni-envelope"></i></label>
                                    <input type="email" name="email" id="email" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 p-0">
                                <div class="appointment-input">
                                    <label for="number"><i class="lni lni-phone-set"></i></label>
                                    <input type="text" name="number" id="number" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 p-0">
                                <div class="appointment-input">
                                    <label for="department"><i class="lni lni-notepad"></i></label>
                                    <select name="department" id="department">
                                        <option value="none" selected="" disabled="">Department</option>
                                        <option value="none">General Surgery</option>
                                        <option value="none">Gastroenterology</option>
                                        <option value="none">Nutrition & Dietetics</option>
                                        <option value="none">Cardiology</option>
                                        <option value="none">Neurology</option>
                                        <option value="none">Pediatric</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 p-0">
                                <div class="appointment-input">
                                    <label for="doctor"><i class="lni lni-sthethoscope"></i></label>
                                    <select name="doctor" id="doctor">
                                        <option value="none" selected="" disabled="">Doctor</option>
                                        <option value="none">Dr.Felica Queen</option>
                                        <option value="none">Dr.Alice Williams</option>
                                        <option value="none">Dr.Michael Bean</option>
                                        <option value="none">Dr.Harry Russell</option>
                                        <option value="none">Dr.Mellissa Doe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 p-0">
                                <div class="appointment-input">
                                    <label for="date"><i class="lni lni-user"></i></label>
                                    <input type="date" name="date" id="date">
                                </div>
                            </div>
                            <div class="col-12 p-0">
                                <div class="appointment-input">
                                    <textarea placeholder="Write Your Message Here....."></textarea>
                                </div>
                            </div>
                           <div class="col-lg-6 col-md-6 col-12 p-0">
    <div class="appointment-btn">
        <button type="submit">
            Get Appointment
        </button>
    </div>
</div>
                        </div>
                    </div>
                    <!-- End Appointment Form -->
                </div>
            </div>
        </div>
    </section>
@endsection
