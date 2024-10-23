@extends('layouts.guest')

@section('title')
  {{ config('app.name') }} | Reset Password
@endsection

@section('content')
  <!-- Begin page -->
  <div class="accountbg"
    style="background: url('{{ asset('assets/images/login_home.jpg') }}');background-size: cover;background-position: center;">
  </div>
  <div class="accountbg"
    style="background-color: #000;background-size: cover;background-position: center;opacity: 0.5;"></div>

  <div class="account-pages">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5 col-xl-4">
          <div class="card">
            <div class="card-body">
              <div class="mt-4 text-center">
                <div class="mb-3">
                  <a href="index.html"><img src="{{ asset('assets/images/1.png') }}" height="30" alt="logo"></a>
                </div>
              </div>
              <div class="p-3">
                <h4 class="mt-2 text-center font-size-18">Forgotten Password!</h4>
                <p class="mb-4 text-center text-muted">Enter your email to reset your password.</p>

                @if (session('status'))
                  <div class="alert alert-success">
                    {{ session('status') }}
                  </div>
                @endif

                <form class="mt-4" action="/forgot-password" method="POST">
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
                    <div class="w-100">
                      <button class="btn btn-block btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                    </div>
                  </div>
                </form>

              </div>

            </div>
          </div>
          <div class="mt-5 text-center position-relative">
            <p class="">Remember It ?<a href="{{ url('/login') }}" class="fw-medium text-primary"> Sign In Here </a> </p>
            <p class="">
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
