@extends('layouts.frontend')
@section('content')
    <div class="container">
        <h2 class="text-center color-white mt-5"> Frequently Asked Questions (FAQ):</h2>

        <div class="row">
            <div class="col-lg-2 col-md-2"></div>
            <div class="col-lg-8 col-md-8">
                <!--Accordion wrapper-->
                <div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">

                    <!-- Accordion card -->
                    <div class="card card-4">

                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingTwo1">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo1"
                                aria-expanded="false" aria-controls="collapseTwo1">
                                <h5 class="mb-0">
                                    What is Topedges about? <i class="fas fa-angle-down rotate-icon"
                                        style="float: right;"></i>
                                </h5>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="collapseTwo1" class="collapse" role="tabpanel" aria-labelledby="headingTwo1"
                            data-parent="#accordionEx1">
                            <div class="card-body text-black-50">
                                Topedges is an ai arbitrage investment platform.
                            </div>
                        </div>

                    </div>
                    <!-- Accordion card -->

                    <!-- Accordion card -->
                    <div class="card card-4">

                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingTwo2">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo21"
                                aria-expanded="false" aria-controls="collapseTwo21">
                                <h5 class="mb-0">
                                    How secured is Topedges? <i class="fas fa-angle-down rotate-icon"
                                        style="float: right;"></i>
                                </h5>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="collapseTwo21" class="collapse" role="tabpanel" aria-labelledby="headingTwo21"
                            data-parent="#accordionEx1">
                            <div class="card-body text-black-50">
                                Topedges is an AI Crypto Arbitrage Trading Bot system, it is a well tested bot with all
                                funds in a verifiable broker (Pepper Stone), also we have a trust fund system that helps us
                                to be accountable for Investors' funds.
                            </div>
                        </div>

                    </div>
                    <!-- Accordion card -->

                    <!-- Accordion card -->
                    <div class="card card-4">

                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingThree31">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseThree31"
                                aria-expanded="false" aria-controls="collapseThree31">
                                <h5 class="mb-0">
                                    How long does it takes to withdraw? <i class="fas fa-angle-down rotate-icon"
                                        style="float: right;"></i>
                                </h5>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="collapseThree31" class="collapse" role="tabpanel" aria-labelledby="headingThree31"
                            data-parent="#accordionEx1">
                            <div class="card-body text-black-50">
                                After a 30 days Trading period investors can take out their invested capital and returns.

                                <h6><b>Topedges Product:</b></h6>

                                <p>* Topedges Passive Income: Investors trades a minimum of $100, this will be engaged by
                                    our Arbitrage Trading Bot to generate return 1% daily compounded ROI.</p>
                            </div>
                        </div>

                    </div>


                    <div class="card card-4">

                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingFour41">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseFour41"
                                aria-expanded="false" aria-controls="collapseFour41">
                                <h5 class="mb-0">
                                    Are there loses in arbitrage? <i class="fas fa-angle-down rotate-icon"
                                        style="float: right;"></i>
                                </h5>
                            </a>
                        </div>

                        <!-- Card body -->
                        <div id="collapseFour41" class="collapse" role="tabpanel" aria-labelledby="headingFour41"
                            data-parent="#accordionEx1">
                            <div class="card-body text-black-50">

                                <p>- Arbitrage Trading doesn't loss it only generate little profits but if compounded, it
                                    becomes meaningful.</p>
                            </div>
                        </div>

                    </div>

                    <!-- Accordion card -->

                </div>
                <!-- Accordion wrapper -->

            </div>
            <div class="col-lg-2 col-md-2"></div>
        </div>
    </div>
@endsection
