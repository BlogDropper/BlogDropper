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
            <h6 class="h2 text-white d-inline-block mb-0">Categories Table</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><i class="fas fa-home"></i></li>
                <li class="breadcrumb-item">Category</li>
                <li class="breadcrumb-item active" aria-current="page">Index</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="#" class="btn btn-lg btn-neutral" id="newPostButton">Add a new Category</a>
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
            <h3 class="mb-0">Categories Table</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th class="text-center">Title</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              @if ($errors->any())
                <div class="text-danger mx-4">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
              <tbody class="list">
                @foreach ($category as $c)
                <tr>
                  <th scope="row">
                        <div class="text-center">{{$c->name}}</div>
                  </th>
                  <td class="text-center"><span class="status">
                    <input type="checkbox" data-id="{{ $c->id }}" data-status="{{$c->status}}" name="status" class="js-switch" id="status" {{ $c->status == 1 ? 'checked' : '' }}>
                  </span></td>
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
        </div>
      </div>
    </div>
    @include('layouts.footers.auth')
  </div>

    <!-- New Post Modal -->
    <div class="modal fade" id="newPostModal" tabindex="-1" role="dialog" aria-labelledby="newPostModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="newPostModalLabel">Add Category</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('cat.store')}}" method="POST">
                        @csrf

                        <div class="form-row">

                        <div class="form-group col">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="title" class="form-control" required>
                        </div>

                        <div class="form-group col">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="0">Pending</option>
                                <option value="1">Published</option>
                            </select>
                        </div>

                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
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
                url: '{{ url('/cat/changeStatus/') }}' + "/" + productId + "/" + toggle,
                success: function (data) {
                    console.log(data.message);
                    location.reload();
                }
            });
        });
    });
    </script>
@endsection
