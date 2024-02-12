@extends('frontend.partials.body')
@section('body')


<section class="background">
    <div class="container py-5">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="https://images.unsplash.com/photo-1534783965283-e7fd2e58c8a4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDIwfHx8ZW58MHx8fHx8&w=1000&q=80"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form action="{{route('frontend.newwebuser')}}" method="POST">
                    @csrf
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <span class="h1 fw-bold mb-0">BlogDropper</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Create an Account</h5>

                    <div class="form-outline mb-4">
                        <span class="text-danger">
                            @error('name')
                                {{$message}}
                            @enderror
                        </span>
                        <input type="name" name="name" id="name" class="form-control" >
                        <label for="Name">Name</label>
                    </div>

                    <div class="form-outline mb-3">
                        <span class="text-danger">
                            @error('email')
                                {{$message}}
                            @enderror
                        </span>
                        <input type="email" name="email" id="email" class="form-control" >
                        <label for="Email">Email</label>
                    </div>

                    <div class="form-outline mb-3">
                        <span class="text-danger">
                            @error('password')
                                {{$message}}
                            @enderror
                        </span>
                        <input type="password" name="password" id="pasword" class="form-control" >
                        <label for="password">Password</label>
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-md btn-block" type="submit">Create Account</button>
                    </div>

                  </form>
                  <p class="mb-2 pb-lg-2">Already have an account?
                </p>
                    <a href="{{route('frontend.login')}}" style="color: #393f81;">Login Here</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
