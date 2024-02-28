@extends('frontend.partials.body')
@section('body')

        <!-- Page Image -->
        <header class="masthead" style="background-image: url('{{ asset('frontend_assets/assets/img/md.jpg') }}');">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h2>Welcome to BlogDropper</h2>
                            <span class="subheading">A Blog Platform</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main -->

        <!-- Featured & Catgeories Content -->
        <section class="pb-5 background"> <!-- Color for background-->
            <section>
                <div class="row">
                <!-- Featured Blogs-->
                    <div class="col-md-7 col-lg-8 col-xl-9">
                        <div class="container mt-4">
                        <div class="marginpadding">
                        <h3 class="marginbot2">Featured Posts</h3>
                        @foreach ($featured_posts->take(3) as $p)
                        <div class="post-preview">
                            <a href="{{ url('blog/title/' . $p->slug) }}">
                                <h2 class="post-title">{{$p->title}}</h2>
                                <h2 class="post-subtitle">{{$p->description}}</h2>
                            </a>
                            <p>
                            <span class="mx-1"></span>
                            <span class="fas fa-user"></span>
                            <span style="font-family: cursive;">{{$p->author}}</span>
                            <span class="mx-2"></span>
                            <span class="fas fa-calendar-alt"></span>
                            <span style="font-family: cursive;">
                                {{ \Carbon\Carbon::parse($p->date)->format('d-M-Y') }}
                            </span>
                            </p>
                        </div>
                        <hr class="my-3" />
                        @endforeach

                        <div id="post-container">
                            <!-- Featured posts will be appended here -->
                        </div>

                    </div>
                    @if(count($featured_posts)>3)
                        <div class="d-flex justify-content-end px-5 justify-content-cent"><span id="show" class="showmorebutton border rounded mb-3">Show more Posts</span></div>
                    @endif
                    </div>
                </div>


                <!-- Categories Blogs-->
                    <div class="col-xl-3 col-md-5 col-lg-4 d-none d-md-block catbackground">
                        <div class="">
                            <h3 class="mt-4 text-center">Categories</h3>
                            @foreach ($cat as $c)
                                <div class="mb-2 mx-4">
                                    <a href="{{url('/blog/category/'.$c->name)}}">
                                        <div class="text-center">{{$c->name}} <span>( {{ $c->posts()->count() }} )</span></div>
                                    </a>
                                </div>
                            @endforeach
                            <h3 class="mt-4 text-center">Popular Articles</h3>
                            @foreach ($posts->take(2) as $post)
                                <div class="mb-4 mx-3 d-flex align-items-center">
                                <a href="{{ url('blog/title/' . $post->slug) }}">
                                    <img class="roundimg" src="/storage/{{$post->image}}" height="100" width="100" alt="image">
                                    <div class="ms-2 px-2 d-flex flex-column justify-content-center fontsizee">
                                        <span class="mb-1 overflow-hidden noflow"> {{$post->title}} </span>
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

                            <div id="showmorepops">
                                <!-- Popular posts will be appended here -->
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        <!-- Blog Carousel -->
        @if(count($gallery) >= 4)
        <section>
            <div class="container container-fluid">
                <div class="mw-lg mx-auto text-center">
                    <h3 class="mb-3 mx-3" >Trending from the Blog</h3>
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
@endsection
