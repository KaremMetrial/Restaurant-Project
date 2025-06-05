@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ ucwords(request()->segment(2)) }}</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Update Profile Info</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{ auth()->user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                   value="{{ auth()->user()->email }}">
                        </div>
                        <button class="btn btn-primary" type="submit"> Save</button>
                    </form>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Update Password</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profile.update.password') }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" name="current_password" id="current_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control">
                        </div>
                        <button class="btn btn-primary" type="submit"> Save</button>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
