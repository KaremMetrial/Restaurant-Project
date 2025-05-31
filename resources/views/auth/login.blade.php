@extends('frontend.layout.master')
@section('content')
    <!--=============================
    BREADCRUMB START
==============================-->
    <x-frontend.breadcrumb title="sign in" currentPage="sign in"/>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--=========================
        SIGNIN START
    ==========================-->
    <section class="fp__signin" style="background: url(frontend/images/login_bg.jpg);">
        <div class="fp__signin_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                        <div class="fp__login_area">
                            <h2>Welcome back!</h2>
                            <p>sign in to continue</p>
                            <form method="POST" action="{{ route('login') }}" class="fp__login_form">
                                @csrf
                                <div class="row">

                                    <!-- Email section -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="email">email</label>
                                            <input type="email" placeholder="Email" name="email"
                                                   value="{{ old('email') }}" required autofocus>
                                        </div>
                                    </div>
                                    <!-- ./Email section -->

                                    <!-- Password section -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="password">password</label>
                                            <input type="password" placeholder="Password" name="password" required
                                                   autocomplete="current-password">
                                        </div>
                                    </div>
                                    <!-- ./Password section -->

                                    <div class="col-xl-12">
                                        <div class="fp__login_imput fp__login_check_area">
                                            <!-- Remember Me -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" name="remember"
                                                       id="remember_me">
                                                <label class="form-check-label" for="remember_me">
                                                    Remeber Me
                                                </label>
                                            </div>
                                            <!-- ./Remember Me -->

                                            @if (Route::has('password.request'))
                                                <!-- Forget Password -->
                                                <a href="{{ route('password.request') }}">Forgot Password ?</a>
                                                <!-- ./Forget Password -->
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <button type="submit" class="common_btn">login</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="create_account">Dont’t have an aceount ? <a href="{{ route('register') }}">Create Account</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        SIGNIN END
    ==========================-->

@endsection
