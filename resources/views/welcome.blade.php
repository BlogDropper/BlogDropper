@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-black py-7 py-lg-9">
        <div class="container">
            <div class="header-body text-center mt-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ __('Welcome to BlogDropper') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
