<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>BlogDropper</title>
        <link rel="icon" type="image/x-icon" href="{{asset('frontend_assets/assets/favicon.ico')}}" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="{{asset('frontend_assets/css/styles.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" />
    </head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usermodal').on('click', function(e) {
                $('#newModel').modal('show');
            });
        });
    </script>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container px-4 cutnav">
                <h1 class="navbar-brand"><a href="{{route('frontend.index')}}">BlogDropper</a></h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse mt-3" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-0">
                        @if(!request()->routeIs('frontend.showcat'))
                        <li class="nav-item">
                            <form action="{{ route('frontend.search') }}" method="GET" class="d-flex nav-link px-lg-1 py-3 py-lg-3">
                                <input name="search" class="form-control" type="search" placeholder="Blog Search Engine" aria-label="Search">
                                <button class="btn" type="submit">
                                    <svg width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                      </svg>
                                </button>
                            </form>
                        </li>
                        @endif
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('frontend.index')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('frontend.about')}}">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle px-lg-3 py-3 py-lg-4" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($cat as $c)
                                    <li><a class="dropdown-item text-center" href="{{url('/blog/category/'.$c->name)}}" data-category="{{$c->name}}">{{$c->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a id="usermodal" class="nav-link px-lg-3 py-3 py-lg-4" href="{{ Auth::guard('webuser')->check() ? '#' : route('frontend.login') }}">
                            @if (Auth::guard('webuser')->check())
                                <p>{{ Auth::guard('webuser')->user()->name }}</p>
                            @else
                                <p>Login/Signup</p>
                            @endif
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- New Post Modal -->
        @if(Auth::guard('webuser')->check())
        <div class="modal fade" id="newModel" tabindex="-1" role="dialog" aria-labelledby="newModelLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="newModelLabel">Account Details</h2>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                                <p>Email : {{ Auth::guard('webuser')->user()->email }}</p>
                                <p>Username : {{ Auth::guard('webuser')->user()->name }}</p>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <form id="logoutForm" action="{{ route('frontend.userlogout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif

