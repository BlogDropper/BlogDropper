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
            <h6 class="h2 text-white d-inline-block mb-0">Web Users Table</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><i class="fas fa-home"></i></li>
                <li class="breadcrumb-item">WebUsers</li>
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
            <h3 class="mb-0">Web Users Table</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th class="text-center">Name</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody class="list">
                @foreach ($webuser as $w)
                <tr>
                  <th scope="row">
                        <div class="text-center">{{$w->name}}</div>
                  </th>
                  <td>
                        <div class="text-center">{{$w->email}}</div>
                  </td>
                  <td class="text-center">
                    <div class="dropdown">
                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="{{url('/webusershow/edit/'.$w->id)}}">Edit</a>
                        <a class="dropdown-item" href="{{url('/webusershow/delete/'.$w->id)}}">Delete</a>
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
            {{$webuser->links()}}
        </div>
    </div>
    @include('layouts.footers.auth')
  </div>
@endsection
