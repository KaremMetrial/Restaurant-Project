<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.layout.head')
</head>

<body>

<!--=============================
    TOPBAR START
==============================-->
@include('frontend.layout.topbar')
<!--=============================
    TOPBAR END
==============================-->


<!--=============================
    MENU START
==============================-->
@include('frontend.layout.menu')
<!--=============================
    MENU END
==============================-->

@yield('content')

<!--=============================
    FOOTER START
==============================-->
@include('frontend.layout.footer')
<!--=============================
    FOOTER END
==============================-->


<!--=============================
    SCROLL BUTTON START
==============================-->
<div class="fp__scroll_btn">
    go to top
</div>
<!--=============================
    SCROLL BUTTON END
==============================-->

@include('frontend.layout.scripts')
</body>

</html>
