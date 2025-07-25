@extends('admin.layout.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ ucwords(request()->segment(2)) }}</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Slider List</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
                            Create New Slider
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
