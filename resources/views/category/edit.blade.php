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
            <h6 class="h2 text-white d-inline-block mb-0">Edit Category</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><i class="fas fa-home"></i></li>
                <li class="breadcrumb-item">Category</li>
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
            <form action="{{url('cat/update/'.$cat->id)}}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="title" class="form-control" value="{{$cat->name}}" required>
                    </div>

                    <div class="form-group col">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="0" {{ $cat->status == 0 ? 'selected' : '' }}>Pending</option>
                            <option value="1" {{ $cat->status == 1 ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required>{{$cat->description}}</textarea>
                </div>

                <div class="mb-5">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection


