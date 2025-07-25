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
                            <div class="accordion">
                                <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                                    <h4>Why Choose Us Section Title...</h4>
                                </div>
                                <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                                    <div class="form-group">
                                        <label for="">Top Title</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Main Title</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Sub Title</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
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
