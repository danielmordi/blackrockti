@extends('layouts.guest')

@section('title')
    {{ config('app.name') }} Login
@endsection

@section('content')
    <!-- Begin page -->
    <div class="accountbg"
        style="background: url('{{ asset('build/assets/images/brand-logos/desktop-logo.png') }}');background-size: cover;background-position: center;">
    </div>
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
                                    <a href="/"><img src="{{ asset('assets/images/1.png') }}" width="200"
                                            alt="logo"></a>
                                </div>
                            </div>
                            <div class="p-3">
                                <h4 class="mt-2 text-center font-size-18">Welcome Back !</h4>
                                <p class="mb-4 text-center text-muted">Sign in to continue to {{ config('app.name') }}.</p>

                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form class="mt-4" action="login" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email or Username</label>
                                        <input type="text" name="email" value="{{ old('email') }}"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            placeholder="Enter email or username" style="">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" id="userpassword"
                                            style="" placeholder="Enter password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-sm-6">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" value=""
                                                    id="customControlInline" style="background-color: #fff;">
                                                <label class="form-check-label" for="customControlInline">Remember
                                                    me</label>
                                            </div>
                                        </div>
                                        <div class="g-recaptcha mb-2" data-sitekey="6Ldvn2kqAAAAAEL5_AcxrWYPZO4IfGR0CF7awdgl"></div>
                                        
                                        <div class="col-sm-6 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log
                                                In
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mt-2 mb-0 row">
                                        <div class="mt-3 col-12">
                                            <a href="/forgot-password" class="text-muted"><i class="mdi mdi-lock"></i>
                                                Forgot your password?</a>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center position-relative">
                        <p class="text-dark">Don't have an account ? <a href="register" class="fw-bold text-primary">
                                Signup Now </a> </p>
                        <p class="text-dark">
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
