@extends('frontend.layout.master')
@section('content')
    <!--=============================
    BREADCRUMB START
==============================-->
    <x-frontend.breadcrumb title="sign up" currentPage="sign up"/>
    <!--=============================
        BREADCRUMB END
    ==============================-->



    <!--=========================
        SIGN UP START
    ==========================-->
    <section class="fp__signup" style="background: url(frontend/images/login_bg.jpg);">
        <div class="fp__signup_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
            <div class=" container">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                        <div class="fp__login_area">
                            <h2>Welcome back!</h2>
                            <p>sign up to continue</p>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">

                                    <!-- Name -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="name">name</label>
                                            <input type="text" placeholder="Name" id="name" name="name"
                                                   value="{{ old('name') }}" required autofocus autocomplete="name">
                                        </div>
                                    </div>

                                    <!-- Email Address -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="email">email</label>
                                            <input type="email" placeholder="Email" id="email" name="email"
                                                   value="{{ old('email') }}" required autocomplete="username">
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="password">password</label>
                                            <input type="password" placeholder="Password" id="password" name="password"
                                                   required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="password_confirmation">confirm password</label>
                                            <input type="password" placeholder="Confirm Password"
                                                   id="password_confirmation" name="password_confirmation" required
                                                   autocomplete="'new-password">
                                        </div>
                                    </div>

                                    <!-- Register Button-->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <button type="submit" class="common_btn">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="create_account">Dont’t have an aceount ? <a href="{{ route('login') }}">login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        SIGN UP END
    ==========================-->

@endsection
