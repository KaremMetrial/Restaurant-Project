@extends('frontend.layout.master')
@section('content')
    <!--=============================
    BREADCRUMB START
==============================-->
    <x-frontend.breadcrumb title="Reset Password" currentPage="Reset Password"/>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--=========================
        RESET PASSWORD START
    ==========================-->
    <section class="fp__signin" style="background: url(images/login_bg.jpg);">
        <div class="fp__signin_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                        <div class="fp__login_area">
                            <h2>Welcome back!</h2>
                            <p>Reset Password</p>
                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf

                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="row">
                                    <!-- Email -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="email">email</label>
                                            <input type="email" placeholder="Email" id="email" name="email"
                                                   value="{{ old('email',$request->email) }}" required autofocus>
                                        </div>
                                    </div>

                                    <!-- Password -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="password">password</label>
                                            <input type="password"  id="password" name="password"
                                                  required autofocus autocomplete="new-password">
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="password_confirmation">password</label>
                                            <input type="password"  id="password_confirmation"
                                                   name="password_confirmation" required autofocus autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <button type="submit" class="common_btn">verify mail</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        FORGOT PASSWORD END
    ==========================-->

@endsection
