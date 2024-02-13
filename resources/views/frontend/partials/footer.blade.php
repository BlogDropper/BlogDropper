<!-- Footer-->
<footer class="footer">
    <div class="container my-3">
        <div class="container text-center">
            {{--Advertisement Section--}}
        </div>
    </div>
    <div class="py-1" style="color: #36454F;">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-lg-9 pe-xxl-10">
                    <div class="row mb-4 mx-2">
                        <div class="col-6 col-md-3 col-lg-4">
                            <h5 class="">
                                @if (Auth::guard('webuser')->check())
                                <p>Welcome, {{ Auth::guard('webuser')->user()->name }}</p>
                                @else
                                <p>Navigations</p>
                                @endif
                            </h5>
                            <ul class="list-unstyled">
                                <li><a class="text-opacity-75" href="{{route('frontend.index')}}">Home</a></li>
                                <li><a class="text-opacity-75" href="{{route('frontend.about')}}">About</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-md-3 col-lg-4">
                            <h5>Categories</h5>
                            <ul class="list-unstyled">
                                @foreach ($cat as $c)
                                    <li><a class=" text-center" href="{{url('/blog/category/'.$c->name)}}" data-category="{{$c->name}}">{{$c->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-lg-3 mb-4">
                    <h5 class="text-center fs-5">Subscribe to our Blog.</h5>
                    <div>
                        <form class="form-row d-flex flex-row mb-2 p-1">
                            <input type="email" class="form-control" placeholder="Your Email" value="@if(Auth::guard('webuser')->check()){{Auth::guard('webuser')->user()->email}}@endif">
                            <button class="btn btn-secondary" type="submit">Subscribe</button>
                        </form>
                        <p class="fs-sm text-opacity-75 text-center">I agree to receive newsletters.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="py-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start py-1">
                    <p class="m-0  text-opacity-75 mb-3 mx-5">© 2023 copyright reserved</a></p>
                </div>
                <div class="col-md-6 text-center text-md-end py-1">
                    <ul class="nav justify-content-center justify-content-md-end list-unstyled m-0">
                        <li class="p-0 mx-3 ms-md-0 me-md-3">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="p-0 mx-3 ms-md-0 me-md-3">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="p-0 mx-3 ms-md-0 me-md-3">
                            <a href="#!">
                                <span class="fa-stack fa-lg">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- JQuery script-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
crossorigin="anonymous"></script>
<!-- Font Awesome icons (free version)-->
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</body>
@yield('scripts')
</html>
