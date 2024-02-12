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
            <h6 class="h2 text-white d-inline-block mb-0">Edit Comments</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><i class="fas fa-home"></i></li>
                <li class="breadcrumb-item">Comments</li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">Edit Comments</h3>
          </div>
          <!-- Light table -->
          <div class="container">
            <form action="{{url('showcomments/update/'.$comment->id)}}" method="POST">
                @csrf
                <div class="container">
                <div class="form-row">
                    <div class="form-group col">
                        <label for="user_id">User Name</label>
                        <select class="form-control" name="user_id" id="user_id" required>
                            @foreach($webuser as $w)
                                <option value="{{ $w->id }}" {{ $w->id == $selectedUserId ? 'selected' : '' }}>
                                    {{ $w->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col">
                        <label for="post_id">Post Name</label>
                        <select class="form-control" name="post_id" id="post_id" required>
                            @foreach($post as $p)
                                <option value="{{ $p->id }}" {{ $p->id == $selectedPostId ? 'selected' : '' }}>
                                    {{ $p->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col" hidden>
                        <label for="parent_id">Parent ID</label>
                        <input class="form-control" type="text" name="parent_id" id="parent_id" value="{{ $comment->parent_id }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label class="form-group" for="body">Body</label>
                        <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{$comment->body}}</textarea>
                    </div>
                </div>

                <div class="my-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
