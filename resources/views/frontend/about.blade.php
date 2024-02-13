@extends('frontend.partials.body')

@section('body')
<section class="background">
<div class="container py-0">
    <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-12">
            <div class="ml-lg-5 mx-3" style="color: #696969">
                <h3 class="font-weight-normal mb-3">About Us</h3>
                <p class="text-muted mb-2">
                    Greetings from blogdropper, where words become engrossing narratives, captivating stories and perceptive information. Our commitment is to provide an environment that fosters the growth of ideas and information.
                </p>
                <p class="text-muted mb-2">
                    With an enthusiastic group of writers, readers, and thinkers, we hope to elicit dialogue, exchange stories, and shed light on fresh viewpoints.  Dive into our curated collection of articles, explore thought-provoking content and join us on a journey of discovery and inspiration.
                </p>
                <p class="text-muted">
                    We are happy to have you as a member of our active community, whether you are here to read, write or interact. Together, let's go on this narrative journey!"
                </p>

                <div class="row text-center dontshow">
                    <div class="col-lg-6 mt-2 pt-2">
                        <div class="media align-items-center rounded shadow p-3 cardbackground border rounded">
                            <i class="fa fa-info h4 mb-0 "></i>
                            <h6 class="ml-3 mb-0">Information</h6>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-2 pt-2">
                        <div class="media align-items-center rounded shadow p-3 cardbackground border rounded">
                            <i class="fa fa-image h4 mb-0 "></i>
                            <h6 class="ml-3 mb-0">Engagement</h6>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-2 pt-2">
                        <div class="media align-items-center rounded shadow p-3 cardbackground border rounded">
                            <i class="fa fa-user h4 mb-0 "></i>
                            <h6 class="ml-3 mb-0">Perspectives</h6>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-2 pt-2">
                        <div class="media align-items-center rounded shadow p-3 cardbackground border rounded">
                            <i class="fa fa-users h4 mb-0 "></i>
                            <h6 class="ml-3 mb-0">Connections</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->

        <div class="col-lg-6 col-md-6 mt-4 pt-2 mt-sm-0 opt-sm-0">
            <div class="row align-items-center mx-1">
                <div class="col-lg-6 col-md-6 col-6">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mt-4 pt-2">
                            <div class="card work-desk rounded border-0 shadow-lg overflow-hidden">
                                <img src="{{ asset('frontend_assets/assets/img/martin.jpg') }}" class="img-fluid" alt="Image description" />                                <div class="img-overlay bg-dark"></div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end col-->

                <div class="col-lg-6 col-md-6 col-6">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card work-desk rounded border-0 shadow-lg overflow-hidden">
                                <img src="{{ asset('frontend_assets/assets/img/sunny.jpg') }}" class="img-fluid" alt="Image description" />                                <div class="img-overlay bg-dark"></div>
                                <div class="img-overlay bg-dark"></div>
                            </div>
                        </div>
                        <!--end col-->

                        <div class="col-lg-12 col-md-12 mt-4 pt-2">
                            <div class="card work-desk rounded border-0 shadow-lg overflow-hidden">
                                <img src="{{ asset('frontend_assets/assets/img/band.jpg') }}" class="img-fluid" alt="Image description" />                                <div class="img-overlay bg-dark"></div>
                                <div class="img-overlay bg-dark"></div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end col-->

    </div>
    <!--enr row-->
</div>
</section>
@endsection
