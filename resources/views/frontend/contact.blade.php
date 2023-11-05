@extends('layouts.frontend')

@section('pageTitle', 'About')

@section('content')
    <section class="py-50">
        <div class="container">
            <div class="row align-items-stretch mb-4 align-content-middle">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="card pt-0">
                        <div class="card-body px-10 text-dark">
                            <h5 class="mb-3 text-dark">Head Office</h5>
                            <p class="mb-0 text-1100">Utoquai 29 8007 Zürich,, <br /> Switzerland</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="card pt-0">
                        <div class="card-body px-10 text-dark">
                            <h5 class="mb-3">Email Address</h5>
                            <p class="mb-0 text-1100">info@coynarb.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-none">
                <div class="card-body ext-white">
                    <h3 class="mb-3 text-white">Write to us</h3>
                    <form>
                        <div class="mb-4">
                            <input class="form-control bg-white p-3" type="text" placeholder="Your Name"
                                required="required"></div>
                        <div class="mb-4"><input class="form-control bg-white p-3" type="email" placeholder="Email"
                                required="required"></div>
                        <div class="mb-4">
                            <textarea class="form-control bg-white py-3" rows="11" placeholder="Enter your descriptions here..."
                                required="required"></textarea>
                        </div><button class="btn btn-md-lg btn-primary" type="Submit"> <span
                                class="color-white fw-600">Send Now</span></button>
                    </form>
                </div>
            </div>
        </div><!-- end of .container-->
    </section>
@endsection)
