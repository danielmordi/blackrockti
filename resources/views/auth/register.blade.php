@extends('layouts.guest')

@section('title')
{{ config('app.name') }} Register
@endsection

@section('content')
  <!-- Begin page -->
  <div class="accountbg"
    style="background: url('{{ asset('homepage-assets/bg-2.jpeg') }}');background-size: cover;background-position: center;">
  </div>
  <div class="accountbg"
    style="background-color: #000;background-size: cover;background-position: center;opacity: 0.5;"></div>

  <div class="account-pages mt-3">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5 col-xl-4">
          <div class="card">
            <div class="card-body">
              <div class="mt-4 text-center">
                <div class="mb-3">
                  <a href="/"><img src="{{ asset('assets/images/1.png') }}" width="200" alt="logo"></a>
                </div>
              </div>
              <div class="p-3">
                <p class="mb-2 text-center text-muted">Register to start investing today.</p>

                @if (session('status'))
                  <div class="alert alert-success">
                    {{ session('status') }}
                  </div>
                @endif

                <form class="mt-2" action="register" method="POST">
                  @csrf
                  <div class="mb-2">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" name="username" required
                      class="form-control @error('username') is-invalid @enderror" id="username" style=""
                      placeholder="Enter username">
                    @error('username')
                      <span class="invalid-feedback">
                        {{ $message }}
                      </span>
                    @enderror
                  </div>

                  <div class="mb-2">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" name="name" required class="form-control @error('name') is-invalid @enderror"
                      id="name" style="" placeholder="Enter name">
                    @error('name')
                      <span class="invalid-feedback">
                        {{ $message }}
                      </span>
                    @enderror
                  </div>

                  <div class="mb-2">
                    <label class="form-label" for="useremail">Email</label>
                    <input type="email" name="email" required class="form-control @error('email') is-invalid @enderror"
                      id="useremail" style="" placeholder="Enter email">
                    @error('email')
                      <span class="invalid-feedback">
                        {{ $message }}
                      </span>
                    @enderror
                  </div>

                  <div class="mb-2">
                    <label class="form-label" for="userpassword">Password</label>
                    <input type="password" name="password" required
                      class="form-control @error('password') is-invalid @enderror " id="userpassword" style=""
                      placeholder="Enter password">
                    @error('password')
                      <span class="invalid-feedback">
                        {{ $message }}
                      </span>
                    @enderror
                  </div>

                  <div class="mb-2">
                    <label class="form-label" for="confirmuserpassword">Confirm Password</label>
                    <input type="password" required name="password_confirmation" class="form-control"
                      id="confirmuserpassword" style="" placeholder="Confirm password">
                  </div>

                  <div class="d-flex gap-2 mb-2">
                    <input type="checkbox" name="" id="" required>
                    <small class="mb-0 text-muted">By registering you agree to the  
                      <a href="/terms">Terms of Use</a> 
                    </small>
                  </div>

                  <div class="mb-2">
                    <div class="text-end">
                      <button class="btn btn-primary w-md waves-effect waves-light" type="submit">
                        Register
                      </button>
                    </div>
                  </div>
                </form>

              </div>

            </div>
          </div>
          <div class="mt-5 text-center position-relative">
            <p class="text-dark">Already have an account ? <a href="{{ route('login') }}" class="fw-medium text-primary"> Login </a></p>
            <p class="text-dark">
              <script>
                document.write(new Date().getFullYear())
              </script> © {{ config('app.name') }}.</p>
          </div>

        </div>
      </div>
    </div>
  </div>

  @include('includes.script')
@endsection
