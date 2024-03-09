@extends('frontend.partials.body')
@section('body')

        <!-- Page Image -->
        <section class="headphoto">
            <section class="backimg" style="background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.6)), url('{{ asset('frontend_assets/assets/img/md.jpg')}}');">
                <div class="text-phrase textindex">
                <h1>Welcome to BlogDropper</h1>
                <span>"Embark on a Journey Through Our Blog Platform's Wealth of Content"</span><br>
                <span>"Discover & Navigate our Blogosphere with Ease"</span><br>
                <span class="d-none d-md-inline">
                    <button class="mt-4 py-2 btn btn-transparent" onclick="scrollDown()">
                        <svg xmlns="http://www.w3.org/2000/svg" style="fill:white" width="24" height="24">
                            <g data-name="Double down left">
                                <path d="M13 17H8a1 1 0 0 1-1-1v-5a1 1 0 0 1 2 0v4h4a1 1 0 0 1 0 2z"/>
                                <path d="M16 14h-5a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0v4h4a1 1 0 0 1 0 2z"/>
                            </g>
                        </svg>
                        Let's Get Started
                        <svg xmlns="http://www.w3.org/2000/svg" style="fill: white" width="24" height="24">
                            <g data-name="Double down right">
                                <path d="M16 17h-5a1 1 0 0 1 0-2h4v-4a1 1 0 0 1 2 0v5a1 1 0 0 1-1 1z"/>
                                <path d="M13 14H8a1 1 0 0 1 0-2h4V8a1 1 0 0 1 2 0v5a1 1 0 0 1-1 1z"/>
                            </g>
                        </svg>
                    </button>
                </span>
                </div>
                <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 210"><path fill="#f0f0f0" fill-opacity="1" d="M0,160L80,144C160,128,320,96,480,101.3C640,107,800,149,960,154.7C1120,160,1280,128,1360,112L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
                {{-- <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f0f0f0" fill-opacity="1" d="M0,256L60,240C120,224,240,192,360,197.3C480,203,600,245,720,261.3C840,277,960,267,1080,266.7C1200,267,1320,277,1380,282.7L1440,288L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg> --}}
            </section>
        </section>
        <!-- Main -->
        <section class="blog-listing background">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col-lg-8 m-15px-tb">
                        <h3 class="px-3 textc" data-aos="slide-up">Featured Posts</h3>
                        <div class="row">
                            @foreach ($featured_posts->take(4) as $p)
                            <div class="col-sm-6" data-aos="slide-up">
                                <a href="{{ url('blog/title/' . $p->slug) }}">
                                <div class="blog-grid">
                                    <div class="blog-img">
                                        <div class="date">
                                            <span>{{ \Carbon\Carbon::parse($p->date)->format('d') }}</span>
                                            <label>{{ \Carbon\Carbon::parse($p->date)->format('M') }}</label>
                                        </div>
                                            <img src="{{ asset('storage/' . $p->banner) }}" class="fixed-image" alt="{{ $p->title }}">
                                    </div>
                                    <div class="blog-info">
                                        <h5>{{ $p->title }}</h5>
                                        <p>{{ $p->description }}</p><br>
                                        <p style="display: flex; align-items: center;">
                                            <span style="font-family: cursive; margin-right: 10px;">
                                                <i class="fas fa-user"></i> {{$p->author}}
                                            </span>
                                            <span>
                                                @foreach ($p->categories as $category)
                                                    <i class="fas fa-coffee"></i> {{ $category->name }}
                                                @endforeach
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div id="post-container">
                            <!-- Featured posts will be appended here -->
                        </div>
                        @if(count($featured_posts)>3)
                        <div class="d-flex justify-content-end py-3 px-3 justify-content-cent">
                            <span id="show" class="btn showmorebutton" data-aos="slide-up">
                                Show more Posts <svg xmlns="http://www.w3.org/2000/svg" class="mx-1" width="24" height="26"><path style="fill:#36454F" d="m17.5 5.999-.707.707 5.293 5.293H1v1h21.086l-5.294 5.295.707.707L24 12.499l-6.5-6.5z" data-name="Right"/></svg>
                            </span>
                        </div>
                    @endif
                    </div>

                    <div class="col-lg-4 m-15px-tb blog-aside">
                        <!-- Author -->
                        <div class="widget" data-aos="slide-up">
                            <div class="widget-title">
                                <h3 class="text-center">Announcement</h3>
                            </div>
                            <div class="widget-body">
                                <p>Elevate your blogging experience with BlogDropper version 1.0.
                                Explore limitless categories with a vibrant community through our blogs weekly.</p>
                            </div>
                        </div>
                        <!-- End Author -->

                        <!-- Trending Post -->
                        <div class="widget widget-post" data-aos="slide-up">
                            <div class="widget-title">
                                <h3 class="text-center">Categories</h3>
                            </div>
                            <div class="widget-body">
                                @foreach ($cat as $c)
                                <div class="mb-2 mx-4">
                                    <a href="{{url('/blog/category/'.$c->name)}}">
                                        <div class="text-center">{{$c->name}} <span>( {{ $c->posts()->count() }} )</span></div>
                                    </a>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        <!-- End Trending Post -->

                        <!-- Latest Post -->
                        <div class="widget widget-latest-post" data-aos="slide-up">
                            <div class="widget-title">
                                <h3 class="text-center">Popular Articles</h3>
                            </div>
                            <div class="widget-body">
                                @foreach ($posts->take(4) as $post)
                                <div class="my-4 mx-2 d-flex align-items-center">
                                    <a href="{{ url('blog/title/' . $post->slug) }}" class="d-flex">
                                    <img class="roundimg" src="{{ asset('storage/' . $post->image) }}" height="100" width="100" alt="Blog">
                                    <div class="ms-2 px-2 d-flex flex-column justify-content-center fontsizee">
                                        <span class="mb-2"> {{$post->title}} </span>
                                        <span style="font-family: cursive;">
                                            <span class="fas fa-user"></span>
                                            {{$post->author}}
                                            <br>
                                            <span class="fas fa-calendar-alt"></span>
                                            {{ \Carbon\Carbon::parse($post->date)->format('d-M-Y') }}
                                        </span>
                                    </div>
                                    </a>
                                </div>
                            @endforeach
                            <div id="showmorepops" >
                                <!-- Popular posts will be appended here -->
                            </div>
                            </div>
                        </div>
                        <!-- End Latest Post -->
                    </div>
                </div>
            </div>
        <style>
        /*button transparency*/
        .btn-transparent {
            background-color: rgba(255, 255, 255, 0.2); /* Transparent white color on hover */
            border-color: transparent;
            color: #fff; /* Text color */
        }

        .btn-transparent:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Transparent white color on hover */
            border-color: transparent;
            border: 1px solid #fff; /* Border on hover */
            color: #fff; /* Text color */
        }

        .blog-listing {
        padding-top: 0rem;
        padding-bottom: 3rem;
        }
        /* Blog
        ---------------------*/
        .blog-grid {
        box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
        border-radius: 5px;
        overflow: hidden;
        background: #ffffff;
        margin-top: 12px;
        margin-bottom: 12px;
        color: #36454F;
        }
        .blog-grid .blog-img {
        position: relative;
        }
        .blog-grid .blog-img .date {
        position: absolute;
        background: #ffffff;
        color: #36454F;
        padding: 8px 15px;
        left: 10px;
        top: 10px;
        border: #f0f0f0 2px solid;
        border-radius: 4px;
        z-index: 1;
        }
        .blog-grid .blog-img .date span {
        font-size: 22px;
        display: block;
        line-height: 22px;
        font-weight: 700;
        }
        .blog-grid .blog-img .date label {
        font-size: 14px;
        margin: 0;
        }
        .blog-grid .blog-info {
        padding: 20px;
        }
        .blog-grid .blog-info h5 {
        font-size: 20px;
        font-weight: 700;
        margin: 0 0 10px;
        }
        .blog-grid .blog-info p {
        margin: 0;
        }
        /* Blog Sidebar
        -------------------*/
        .blog-aside .widget {
        box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
        border-radius: 5px;
        overflow: hidden;
        background: #ffffff;
        margin-top: 15px;
        margin-bottom: 15px;
        width: 100%;
        display: inline-block;
        vertical-align: top;
        }
        .blog-aside .widget-body {
        padding: 20px;
        }
        .blog-aside .widget-title {
        padding: 12px;
        border-bottom: 1px solid #eee;
        }
        .blog-aside .widget-title h3 {
        font-size: 18px;
        font-weight: 700;
        color: #36454F;
        margin: 0;
        }
        </style>

        <section class="bubble" data-aos="fade-in" data-aos-delay="300">
        <!-- Blog Carousel -->
        @if(count($gallery) >= 4)
        <section class="innerbubble" data-aos="fade-in" data-aos-delay="750">
            <div class="container container-fluid">
                <div class="mw-lg mx-auto text-center">
                    <h3 class="text-secondary mb-3 mx-3" >Trending from the Blog</h3>
                    <p class="text-secondary mb-4 mx-3" >Have a look at some of BlogDropper's latest entries.</p>
                </div>
                    <div class="owl-carousel owl-theme">
                        @foreach ($gallery as $item)
                        <div class="item">
                            <div class="card cardbackground">
                                <a href="{{ url('blog/' . $item->id) }}">
                                <img src="/storage/{{ $item->image }}" class="card-img-top custom-card-img p-3" alt="Image">
                                <div class="card-body text-center">
                                    <h5 class="card-title fontsizeetitle">{{ $item->title }}</h5><hr>
                                    <p>
                                        <span class="fas fa-user mx-1"></span>
                                        <span style="font-family: cursive;">{{ $item->author }}</span><br>
                                        <span class="fas fa-calendar-alt mx-1"></span>
                                        <span style="font-family: cursive;">
                                            {{ \Carbon\Carbon::parse($item->date)->format('d-M-Y') }}
                                        </span>
                                    </p>
                                </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
            </div>
        </section>
        @endif
        <!-- content here -->
        </section>
    </section>
@endsection

@section('scripts')
<!--For Card Carousel-->
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 22,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 5000,
        responsive: {
            0: {
                items: 1
            },
            380: {
                items: 2
            },
            800:{
                items: 3
            },
            1200: {
                items: 4
            }
        }
    })
</script>
<!--For view more option-->
<script>
    $(document).ready(function(){
            $('#show').on('click', function () {
            $.ajax({
                type: "GET",
                url: "{{ route('frontend.showmoreposts') }}",
                dataType: "html",
                success: function (data) {
                    $('#post-container').append(data);
                    $('#show').remove(); // Remove the #show element after success
                }
            });

            $.ajax({
                type: "GET",
                url: "{{ route('frontend.showmorepops') }}",
                dataType: "html",
                success: function (data) {
                    $('#showmorepops').append(data);
                    $('#show').remove(); // Remove the #show element after success
                }
            });

        })
    })
</script>

<script>
    function scrollDown() {
        // Calculate the vertical scroll position
        const scrollAmount = 920;

        $('html, body').animate({
            scrollTop: scrollAmount
        }, 1200);
    }
</script>
@endsection
