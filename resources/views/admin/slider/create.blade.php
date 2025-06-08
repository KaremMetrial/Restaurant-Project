@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ ucwords(request()->segment(2)) }}</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Create New Slider</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.sliders.index') }}" class="btn btn-danger">
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Form-->
                    <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Image-->
                        <div class="form-group">
                            <label>Image</label>
                            <div class="image-preview" id="image-preview">
                                <label for="image-upload" id="imager-label">Choose File</label>
                                <input type="file" name="image" id="image-upload"/>
                            </div>
                        </div>
                        <!-- Image-->

                        <!-- Title-->
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                   placeholder="Enter Title" required autofocus>
                        </div>
                        <!-- Title-->

                        <!-- Offer-->
                        <div class="form-group">
                            <label>Offer</label>
                            <input type="text" class="form-control" name="offer" value="{{ old('offer') }}"
                                   placeholder="Enter Offer" autofocus>
                        </div>
                        <!-- Offer-->

                        <!-- Sub Titile-->
                        <div class="form-group">
                            <label>Sub Titile</label>
                            <input type="text" class="form-control" name="sub_title" value="{{ old('sub_title') }}"
                                   placeholder="Enter Sub Titile" required autofocus>
                        </div>
                        <!-- Sub Titile-->

                        <!-- Short Description-->
                        <div class="form-group">
                            <label>Short Description</label>
                            <textarea class="form-control" name="short_description" required
                                      autofocus>{{ old('short_description') }}</textarea>
                        </div>
                        <!-- Short Description-->

                        <!-- Link-->
                        <div class="form-group">
                            <label>Link</label>
                            <input type="text" class="form-control" name="link" value="{{ old('link') }}"
                                   placeholder="Enter Link" autofocus>
                        </div>
                        <!-- Link-->

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
@endpush
