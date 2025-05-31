<!--=============================
    BREADCRUMB START
==============================-->
<section class="fp__breadcrumb" style="background: url(frontend/images/counter_bg.jpg);">
    <div class="fp__breadcrumb_overlay">
        <div class="container">
            <div class="fp__breadcrumb_text">
                <h1>{{ $title }}</h1>
                <ul>
                    <li><a href="{{ route('home') }}">home</a></li>
                    <li><a href="#">{{ $currentPage }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--=============================
    BREADCRUMB END
==============================-->
