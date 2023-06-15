<!doctype html>
<html>
<head>
    @include('template_lp.metadata')
</head>

<body>
    <div>
        @include('template_lp.navbar')
        @yield('content')
    </div>
    @include('template_lp.footer')
    @include('template_lp.metascript')
</body>

</html>