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
            <h6 class="h2 text-white d-inline-block mb-0">Edit Posts</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><i class="fas fa-home"></i></li>
                <li class="breadcrumb-item">Posts</li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
              </ol>
            </nav>
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
            <h3 class="mb-0">Edit Post</h3>
          </div>
          <!-- Light table -->
          <div class="container">
            <form action="{{url('posts/update/'.$post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-row">
                    <div class="form-group col">
                        <label for="title">Title</label>
                        <input type="text" maxlength="64" name="title" id="title" class="form-control" value="{{$post->title}}" required>
                    </div>

                    <div class="form-group col">
                        <label for="author">Author</label>
                        <input type="text" maxlength="40" name="author" id="author" class="form-control" value="{{$post->author}}" required>
                    </div>

                    <div class="form-group col">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control" required>
                            @foreach ($category as $c)
                            <option value="{{ $c->id }}" {{ in_array($c->id, $selectedCategories) ? 'selected' : '' }}>{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" maxlength="123" id="description" class="form-control" rows="4" required>{{$post->description}}</textarea>
                </div>

                <div class="form-row">

                <div class="form-group col">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Pending</option>
                        <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Published</option>
                    </select>
                </div>

                <div class="form-group col">
                    <label for="featured">Featured</label>
                    <select name="featured" id="featured" class="form-control" required>
                        <option value="0" {{ $post->featured == 0 ? 'selected' : '' }}>Pending</option>
                        <option value="1" {{ $post->featured == 1 ? 'selected' : '' }}>Published</option>
                    </select>
                </div>

                <div class="form-group col">
                    <label for="carousel">Carousel</label>
                    <select name="carousel" id="carousel" class="form-control" required>
                        <option value="0" {{ $post->carousel == 0 ? 'selected' : '' }}>Pending</option>
                        <option value="1" {{ $post->carousel == 1 ? 'selected' : '' }}>Published</option>
                    </select>
                </div>

                <div class="form-group col">
                    <label for="date">Date</label>
                    <input type="date" value="{{$post->date}}" name="date" id="date" class="form-control" required>
                </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control-file" required><br>
                        <img src="/storage/{{$post->image}}" width="100" alt="image">
                    </div>

                    <div class="form-group col">
                        <label for="banner">Banner</label>
                        <input type="file" name="banner" id="banner" class="form-control-file" required><br>
                        <img src="/storage/{{$post->banner}}" width="100" alt="banner">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col">
                    <label for="multipleimages">Multi-Image</label>
                    <input type="file" name="multipleimages[]" id="multipleimages" class="form-control-file" multiple required><br>
                        @php
                            $multiimages = json_decode($post->multipleimages);
                        @endphp
                        @if ($multiimages && count($multiimages) > 0)
                            @foreach ($multiimages as $a)
                                <img class="ml-3" src="{{ asset('storage/' . $a) }}" width="100" alt="image">
                            @endforeach
                        @else
                            <p>Images not available</p>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="introduction">Introduction</label>
                    <textarea name="introduction" id="intro" class="form-control" rows="6" required>{{$post->introduction}}</textarea>
                </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea name="body" id="body" class="form-control" rows="6" required>{{$post->body}}</textarea>
                </div>

                <div class="form-group">
                    <label for="conclusion">Conclusion</label>
                    <textarea name="conclusion" id="conc" class="form-control" rows="6" required>{{$post->conclusion}}</textarea>
                </div>

                <div class="mb-5 mt--2">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection


