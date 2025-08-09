@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ ucwords(str_replace('-', ' ', request()->segment(2))) }}</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-body">
                    <div class="card-body">
                        <div id="accordion">
                            <!-- why choose us title form -->
                            <div class="accordion">
                                <div class="accordion-header" role="button" data-toggle="collapse"
                                     data-target="#panel-body-1" aria-expanded="true">
                                    <h4>Why Choose Us Section Title...</h4>
                                </div>
                                <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                                    <form action="{{ route('admin.why-choose-us-title.update') }}" method="POST"
                                          enctype="multipart/form-data" class="form-horizontal" }}
                                    ">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="">Top Title</label>
                                        <input name="why_choose_us_top_title"
                                               value="{{ $sectionTitle['why_choose_us_top_title'] }}" type="text"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Main Title</label>
                                        <input name="why_choose_us_main_title"
                                               value="{{ $sectionTitle['why_choose_us_main_title'] }}" type="text"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Sub Title</label>
                                        <input name="why_choose_us_sub_title"
                                               value="{{ $sectionTitle['why_choose_us_sub_title'] }}" type="text"
                                               class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    </form>
                                </div>
                            </div>
                            <!-- why choose us title form -->
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <section class="section">
        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>All Items</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.why-choose-us.create') }}" class="btn btn-primary">
                            Create New
                        </a>
                    </div>
                </div>
                <!-- DataTable -->
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
                <!-- DataTable -->

            </div>
        </div>

    </section>
@endsection
@push('admin-js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
