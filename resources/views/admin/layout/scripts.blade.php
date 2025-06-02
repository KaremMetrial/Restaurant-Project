
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
