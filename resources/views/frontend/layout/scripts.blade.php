<!--jquery library js-->
<script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
<!--bootstrap js-->
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<!--font-awesome js-->
<script src="{{ asset('frontend/js/Font-Awesome.js') }}"></script>
<!-- slick slider -->
<script src="{{ asset('frontend/js/slick.min.js') }}"></script>
<!-- isotop js -->
<script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
<!-- simplyCountdownjs -->
<script src="{{ asset('frontend/js/simplyCountdown.js') }}"></script>
<!-- counter up js -->
<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.countup.min.js') }}"></script>
<!-- nice select js -->
<script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
<!-- venobox js -->
<script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
<!-- sticky sidebar js -->
<script src="{{ asset('frontend/js/sticky_sidebar.js') }}"></script>
<!-- wow js -->
<script src="{{ asset('frontend/js/wow.min.js') }}"></script>
<!-- ex zoom js -->
<script src="{{ asset('frontend/js/jquery.exzoom.js') }}"></script>
<!--toastr js-->
<script src="{{ asset('frontend/js/toastr.min.js') }}"></script>
<!--main/custom js-->
<script src="{{ asset('frontend/js/main.js') }}"></script>
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
@stack('frontend-js')
