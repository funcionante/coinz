<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    @include('app._head_scripts')

</head>
<body class="skin-black layout-top-nav fixed">
<div class="wrapper">

    <!-- Header -->
    @include('app.header')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>

                    @yield('title')
                    <small>@yield('description')</small>

                </h1>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Alerts -->
                @include('alerts._show')

                <!-- Errors -->
                @include('errors._list')

                <!-- Page Content Here -->
                @yield('content')

            </section>
        </div>
    </div>

    <!-- Footer -->
    @include('app.footer')

</div>

<!-- REQUIRED JS SCRIPTS -->
@include('app._bottom_scripts')

<!-- Any extra Scripts -->
@yield('scripts')

</body>
</html>