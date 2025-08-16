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
    <script>
        $(document).ready(function () {
            $('body').on('click', '.delete-btn', function (e) {
                e.preventDefault();
                let url = $(this).attr('href');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success: function (response) {
                                if (response.status === 'success') {
                                    toastr.success(response.message)
                                    $('#sliders-table').DataTable().draw();
                                } else if (response.status === 'warning') {
                                    toastr.warning(response.message)
                                }
                            }, error: function (error) {
                                console.log(error);
                            }
                        });
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });
            });
        });
    </script>
@endpush
