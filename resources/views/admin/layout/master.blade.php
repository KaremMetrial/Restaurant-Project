<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layout.head')
</head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        <!-- NavBar -->
        @include('admin.layout.navbar')
        <!-- ./NavBar -->

        <!-- SideBar -->
        @include('admin.layout.sidebar')
        <!-- ./SideBar -->

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>

        <!-- Footer -->
        @include('admin.layout.footer')
        <!-- ./Footer -->

    </div>
</div>
@include('admin.layout.scripts')
</body>
</html>
