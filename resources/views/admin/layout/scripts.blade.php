<!-- General JS Scripts -->
<script src="{{ asset('admin/assets/modules/jquery.min') }}.js"></script>
<script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
<script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom.js') }}"></script>

<!--toastr js-->
<script src="{{ asset('admin/assets/js/toastr.min.js') }}"></script>

<!--DataTables js-->
<script src="{{ asset('admin/assets/js/datatables.js') }}"></script>

<!-- SweetAlert js -->
<script src="{{ asset('admin/assets/js/sweetalert2.all.min.js') }}"></script>
<!-- SweetAlert js -->

<script>
    // Success Message
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif

    // Info Message
    @if(Session::has('info'))
    toastr.info("{{ Session::get('info') }}")
    @endif

    // Warning Message
    @if(Session::has('warning'))
    toastr.warning("{{ Session::get('warning') }}")
    @endif

    // Error Message
    @if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}")
    @endif

    // Validation Errors
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error("{{ $error }}")
    @endforeach
    @endif
</script>
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
@stack('admin-js')
