@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-9 mb-5 mb-xl-0">
                <div class="card shadow">
                        <div class="row align-items-center">
                            <div class="col">
                                 <!-- Card header -->
                                <div class="card-header border-0">
                                    <h3 class="mb-0">Posts Table</h3>
                                </div>
                                <!-- Light table -->
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                        <th class="text-center">Title</th>
                                        <th class="text-left">Popular Articles</th>
                                        <th class="text-left">Featured</th>
                                        <th class="text-left">Carousel</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach ($posts->take(5) as $p)
                                        <tr>
                                        <th scope="row">
                                                <div class="text-center">{{$p->title}}</div>
                                        </th>
                                        <td><span class="status ml-5">
                                            <input type="checkbox" data-id="{{ $p->id }}" data-status="{{$p->status}}" name="status" class="js-switch" id="status" {{ $p->status == 1 ? 'checked' : '' }}>
                                        </span></td>
                                        <td><span class="featured ml-3">
                                            <input type="checkbox" data-id="{{ $p->id }}" data-status="{{$p->featured}}" name="featured" class="js-switch2" id="featured" {{ $p->featured == 1 ? 'checked' : '' }}>
                                        </span></td>
                                        <td><span class="carousel ml-3">
                                            <input type="checkbox" data-id="{{ $p->id }}" data-status="{{$p->carousel}}" name="carousel" class="js-switch3" id="carousel" {{ $p->carousel == 1 ? 'checked' : '' }}>
                                        </span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                                <div class="m-3" style="text-align: right;">
                                    <a href="{{ route('posts.backend') }}">See more Posts
                                    <span class="text-blue mx-2"><i class="fas fa-arrow-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="card shadow">
                    <div class="row align-items-center">
                        <div class="col">
                        <div class="card-header border-0">
                            <h3 class="mb-0">Categories Table</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Options</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($cat->take(4) as $c)
                                <tr>
                                <th scope="row">
                                    <div class="text-center">{{$c->name}}</div>
                                </th>
                                <td class="text-center">
                                    <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{url('/cat/edit/'.$c->id)}}">Edit</a>
                                        <a class="dropdown-item" href="{{url('/cat/delete/'.$c->id)}}">Delete</a>
                                    </div>
                                    </div>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        <div class="m-3" style="text-align: right;">
                            <a href="{{ route('cat.index') }}">See more Categories
                            <span class="text-blue mx-1"><i class="fas fa-arrow-right"></i></span></a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function(){
        $('.js-switch').change(function () {
            var productId = $(this).attr("data-id");
            var status = $(this).attr("data-status");
            var toggle = 0;
            let userId = $(this).data('id');
            if(status == "1" || status == 1) {
                toggle = 0;
            } else {
                toggle = 1;
            }
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ url('/posts/changeStatus/') }}' + "/" + productId + "/" + toggle,
                success: function (data) {
                    console.log(data.message);
                    location.reload();
                }
            });
        });

        $('.js-switch2').change(function () {
            var productId = $(this).attr("data-id");
            var featured = $(this).attr("data-status");
            var toggle = 0;
            let userId = $(this).data('id');
            if(featured == "1" || featured == 1) {
                toggle = 0;
            } else {
                toggle = 1;
            }
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ url('/posts/changeFeatured/') }}' + "/" + productId + "/" + toggle,
                success: function (data) {
                    console.log(data.message);
                    location.reload();
                }
            });
        });

        $('.js-switch3').change(function () {
            var productId = $(this).attr("data-id");
            var carousel = $(this).attr("data-status");
            var toggle = 0;
            let userId = $(this).data('id');
            if(carousel == "1" || carousel == 1) {
                toggle = 0;
            } else {
                toggle = 1;
            }
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ url('/posts/changeCarousel/') }}' + "/" + productId + "/" + toggle,
                success: function (data) {
                    console.log(data.message);
                    location.reload();
                }
            });
        });
    });
    </script>
@endsection

