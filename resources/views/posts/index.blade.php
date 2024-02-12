@extends('layouts.app')

@section('content')

<div class="header bg-primary pb-4 pt-5 pt-md-5">
    <div class="container-fluid">
        <div class="header-body">
        </div>
    </div>
</div>
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Posts Table</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><i class="fas fa-home"></i></li>
                <li class="breadcrumb-item">Posts</li>
                <li class="breadcrumb-item active" aria-current="page">Index</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <div class="row">
                    <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" name="search" placeholder="Search" type="text">
                            </div>
                        </div>
                    </form>
                    <a href="#" class="btn btn-lg btn-neutral" id="newPostButton">Add a new blog post</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6 pb-5">
    <div class="row">
      <div class="col">
        <div class="card">
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
                  <th class="text-center">Author</th>
                  <th class="text-center">Category</th>
                  <th class="text-left">Popular Articles</th>
                  <th class="text-left">Featured</th>
                  <th class="text-left">Carousel</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody class="list">
                @foreach ($posts as $p)
                <tr>
                  <th scope="row">
                        <div class="text-center">{{$p->title}}</div>
                  </th>
                  <td><div class="avatar-group text-center">{{$p->author}}</div></td>
                  @foreach ($p->categories as $c)
                      <td class="text-center">{{$c->name}}</td>
                  @endforeach
                  @if ($p->categories->isEmpty())
                      <td class="text-center">Not Assigned</td>
                  @endif
                  <td><span class="status ml-5">
                    <input type="checkbox" data-id="{{ $p->id }}" data-status="{{$p->status}}" name="status" class="js-switch" id="status" {{ $p->status == 1 ? 'checked' : '' }}>
                  </span></td>
                  <td><span class="featured ml-3">
                    <input type="checkbox" data-id="{{ $p->id }}" data-status="{{$p->featured}}" name="featured" class="js-switch2" id="featured" {{ $p->featured == 1 ? 'checked' : '' }}>
                  </span></td>
                  <td><span class="carousel ml-3">
                    <input type="checkbox" data-id="{{ $p->id }}" data-status="{{$p->carousel}}" name="carousel" class="js-switch3" id="carousel" {{ $p->carousel == 1 ? 'checked' : '' }}>
                  </span></td>
                  <td class="text-center">
                    <div class="dropdown">
                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="{{url('/posts/edit/'.$p->id)}}">Edit</a>
                        <a class="dropdown-item" href="{{url('/posts/delete/'.$p->id)}}">Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-2">
            {{$posts->links()}}
        </div>
    </div>
    @include('layouts.footers.auth')
  </div>

    <!-- New Post Modal -->
    <div class="modal fade" id="newPostModal" tabindex="-1" role="dialog" aria-labelledby="newPostModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="newPostModalLabel">New Post for the Blog</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" maxlength="64" placeholder="max 64 characters" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" maxlength="123" id="description" placeholder="max 123 characters" class="form-control" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" maxlength="40" name="author" placeholder="max 40 characters" id="author" class="form-control" required>
                        </div>

                        <div class="form-row">
                        <div class="form-group col">
                            <label for="category">Category</label>
                            <select name="category" id="status" class="form-control" required>
                                @foreach ($category as $c)
                                <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="date">Date</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>
                        </div>

                        <div class="form-row">

                        <div class="form-group col">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="0">Pending</option>
                                <option value="1">Published</option>
                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="featured">Featured</label>
                            <select name="featured" id="featured" class="form-control" required>
                                <option value="0">Pending</option>
                                <option value="1">Published</option>
                            </select>
                        </div>

                        <div class="form-group col">
                            <label for="carousel">Carousel</label>
                            <select name="carousel" id="carousel" class="form-control" required>
                                <option value="0">Pending</option>
                                <option value="1">Published</option>
                            </select>
                        </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control-file" required>
                            </div>

                            <div class="form-group col">
                                <label for="banner">Banner</label>
                                <input type="file" name="banner" id="banner" class="form-control-file" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="multipleimages">Multiple Image Upload</label>
                                <input type="file" name="multipleimages[]" id="multipleimages" class="form-control-file" multiple required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="introduction">Introduction</label>
                            <textarea name="introduction" id="intro" class="form-control" rows="6" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" id="body" class="form-control" rows="6" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="conclusion">Conclusion</label>
                            <textarea name="conclusion" id="conc" class="form-control" rows="6" required></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        document.getElementById('newPostButton').addEventListener('click', function () {
            $('#newPostModal').modal('show');
        });
    </script>
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
