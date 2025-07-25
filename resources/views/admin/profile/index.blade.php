@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ ucwords(request()->segment(2)) }}</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Update Profile</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-4">
                            <div class="col-sm-12 col-md-7">
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="avatar" id="image-upload">
                                </div>
                            </div>
                        </div>
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
                    <form action="{{ route('admin.profile.update.password') }}" method="POST">
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
@push('admin-js')
    <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/page/features-post-create.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.image-preview').css({
                'background-image': 'url({{ Storage::url( auth()->user()->avatar ) }})',
                'background-size': 'cover',
                'background-position': 'center',
            })
        });
    </script>
@endpush



