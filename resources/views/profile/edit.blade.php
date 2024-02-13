@extends('layouts.app', ['title' => __('User Profile')])

@section('content')

<div class="bg-gradient-danger pb-8 pt-5 pt-md-8">
</div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-7">
                        <div class="text-center mt-5">
                            <h3>{{ auth()->user()->name }}</h3>
                            <div>
                                <i class="ni education_hat mr-2"></i>{{ __('Authenticated Super Admin of BlogDropper') }}
                            </div>
                            <hr class="my-3" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mx-2">{{ __('Edit Profile') }}</h3>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="text-danger mx-4">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ url('superadminupdate/update/' . Auth::user()->id) }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="col" class="form-control">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}">
                                </div>

                                <div class="col" class="form-control">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}">
                                </div>
                            </div>

                            <div>
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Add New Password">
                            </div>

                            <div class="text-center my-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                        <hr class="my-2" />
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
