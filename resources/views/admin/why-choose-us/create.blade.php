@extends('admin.layout.master')
@push('admin-css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-iconpicker.css') }}">
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ ucwords(str_replace('-', ' ', request()->segment(2))) }}</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Create New</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.why-choose-us.index') }}" class="btn btn-danger">
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Form-->
                    <form action="{{ route('admin.why-choose-us.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Icon-->
                        <div class="form-group">
                            <label>Icon</label>
                            <br>
                            <button class="btn btn-primary iconpicker-component" name="icon" role="iconpicker"></button>
                        </div>
                        <!-- Icon-->

                        <!-- Title-->
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                   placeholder="Enter Title" required autofocus>
                        </div>
                        <!-- Title-->

                        <!-- Short Description-->
                        <div class="form-group">
                            <label>Short Description</label>
                            <textarea class="form-control" name="short_description" required
                                      autofocus>{{ old('short_description') }}</textarea>
                        </div>
                        <!-- Short Description-->

                        <!-- Status-->
                        <div class="form-group">
                            <div class="control-label">Active</div>
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="status" value="1"
                                       class="custom-switch-input" {{ old('status', 1) ? 'checked' : '' }}>
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                        <!-- Status-->

                        <!-- Bottun-->
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                        <!-- Bottun-->
                    </form>
                    <!-- Form-->
                </div>
            </div>
        </div>

    </section>
@endsection
@push('admin-js')
    <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/page/features-post-create.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/js/bootstrap-iconpicker.bundle.min.js') }}"></script>
@endpush
