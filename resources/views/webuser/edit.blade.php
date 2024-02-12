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
            <h6 class="h2 text-white d-inline-block mb-0">Edit Webusers</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><i class="fas fa-home"></i></li>
                <li class="breadcrumb-item">WebUsers</li>
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
            <h3 class="mb-0">Edit WebUsers</h3>
          </div>
          <!-- Light table -->
          <div class="container">
            <form action="{{url('webusershow/update/'.$webuser->id)}}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$webuser->name}}" required>
                    </div>

                    <div class="form-group col">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{$webuser->email}}" required>
                    </div>

                </div>

                <div class="form-row">
                <div class="form-group col-6">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
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


