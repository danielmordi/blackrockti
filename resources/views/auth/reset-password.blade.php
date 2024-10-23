@extends('layouts.app')

@section('title')
  Cloud Cryptomines | Reset Passwordd
@endsection

@section('content')
  <!-- Begin page -->
  <div class="accountbg"
    style="background: url('{{ asset('assets/images/login_home.jpg') }}');background-size: cover;background-position: center;"></div>
  <div class="accountbg"
    style="background-color: #000;background-size: cover;background-position: center;opacity: 0.5;"></div>

  <div class="pt-5 mt-5 account-pages">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5 col-xl-4">
          <div class="card">
            <div class="card-body">
              <div class="mt-4 text-center">
                <div class="mb-3">
                  <a href="/"><img src="{{ asset('assets/images/1.png') }}" height="30" alt="logo"></a>
                </div>
              </div>
              <div class="p-3">
                <h4 class="mt-2 text-center font-size-18">Reset Password!</h4>

                @if (session('status'))
                  <div class="alert alert-success">
                    {{ session('status') }}
                  </div>
                @endif

                <form class="mt-4" action="/reset-password" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label class="form-label" for="useremail">Email</label>
                    <input type="email" name="email" class="form-control" id="useremail" placeholder="Enter email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
  
                  <div class="mb-3">
                    <label class="form-label" for="password">New Password</label>
                    <input type="password" name="password" class="form-control" id="newPassword" placeholder="Enter new password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
  
                  <div class="mb-3">
                    <label class="form-label" for="confirmPassword">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="useremail" placeholder="Enter email">
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
  
                  <input type="hidden" name="token" value="{{ request()->route('token') }}">
  
                  <div class="mb-3">
                    <div class="text-end">
                      <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                    </div>
                  </div>
                </form>

              </div>

            </div>
          </div>
          <div class="mt-5 text-center position-relative">
            <p class="text-white">Remember It ?<a href="{{ url('/login') }}" class="fw-medium text-primary"> Sign In Here </a> </p>
            <p class="text-white">
              <script>
                document.write(new Date().getFullYear())
              </script> © {{ config('app.name') }}.
            </p>
          </div>

        </div>
      </div>
    </div>
  </div>  

  @include('includes.script')
@endsection
