@extends('layouts.loginLayout')
@section('title', 'Login')

@section('content')

<body class="bg-gradient-primary">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="col-xl-10 col-lg-12 col-md-9 login-form">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row align-self-center">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h1 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email" name="email" autofocus aria-describedby="emailHelp"
                                            placeholder="Enter Email Address..." required autofocus value="{{ old('email') }}">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert"></span>
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" required autocomplete="current-password">
                                                <!-- Show Hide Password Component -->
                                                <a href=""><div class="input-group-addon eye">
                                                    <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                </div></a>
                                                <!-- Show Hide Password Component -->
                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                            </span>
                                            @enderror
                                        </div>
                                        <button href="{{ url('dashboard') }}" type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
