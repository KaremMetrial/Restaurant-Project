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
                                    $('#whychooseus-table').DataTable().draw();
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
