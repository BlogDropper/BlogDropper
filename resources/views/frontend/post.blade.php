@extends('frontend.partials.body')

@section('body')
<section class="background"> <!-- Color for background-->

        <!-- Page Header-->
            <div id="backgroundimage" style="background-image: url('/storage/{{$posts->banner}}');">
                <div class="container">
                    <div class="row justify-content-center">
                    <div class="col-md-8">
                    <div class="title">
                        <div class="titlehead">{{$posts->title}}</div>
                        <div class="subtitle">{{$posts->description}}</div>
                        <div class="rest">
                        <span style="font-family: cursive;">
                            Posted by {{$posts->author}} on {{ \Carbon\Carbon::parse($posts->date)->format('d-M-Y') }}
                        </span>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>

        <!-- Post Content-->
        <article class="forsmallpost">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 text-center">
                       <p>{{$posts->introduction}}</p>
                        <p>{{$posts->body}}</p>

                        @php
                        $multipleImages = json_decode($posts->multipleimages);
                        @endphp
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">
                            <div class="carousel-inner">
                                @foreach ($multipleImages as $key => $multipleimg)
                                    <div class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                                        <img src="{{ asset('storage/' . $multipleimg) }}" class="d-block w-100 postimg" alt="multipleimg">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <br>
                        <p>{{$posts->conclusion}}</p>
                    </div>
                </div>
            </div>
        </article>

        <!-- Comments Section -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-center text-success">Add Comments</h4>
                            @if(Auth::guard('webuser')->check())
                            <h6 class="text-center text-secondary">What are your thoughts on this article ?</h6>
                            @else
                            <h6 class="text-center text-secondary"><a href="{{route('frontend.login')}}">Login to comment</a></h6>
                            @endif
                            @if (count($posts->comments) >=1)
                            <hr />
                            @include('frontend.partials.commentDisplay', ['comments' => $posts->comments, 'post_id' => $posts->id])
                            <hr/>
                            @if(Auth::guard('webuser')->check())
                            <h5 class="text-center text-success">Add comments</h4>
                            @else
                            <h5 class="text-center text-secondary">
                                <a href="{{route('frontend.login')}}">Login to comment</a>
                            </h5>
                            @endif
                            @endif
                            @if(Auth::guard('webuser')->check())
                            <form method="post" action="{{ route('comments.store') }}">
                                @csrf
                                <div class="form-group">
                                    @if ($errors->any())
                                        <div class="text-danger text-center">
                                            <ul class="list-unstyled">
                                                @foreach ($errors->all() as $error)
                                                    <li class="">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <textarea class="form-control" name="body" rows="6" required></textarea>
                                    <input type="hidden" name="post_id" value="{{ $posts->id }}"/>
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success mx-1" value="Add Comment" />
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </section>
@endsection
