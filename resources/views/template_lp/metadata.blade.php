<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" type="image/png" sizes="76x76" href="{{ asset('assets/LogoTittle.png') }}" />
<title>
    {{ request()->segment(1) == '' ? 'Home' : '' }} 
    {{ request()->segment(1) == 'paket' ? 'Paket' : '' }}
    {{ request()->segment(1) == 'about' ? 'About' : '' }}
    {{ request()->segment(1) == 'login' ? 'Login' : '' }}
    {{ request()->segment(1) == 'registrasi' ? 'Registrasi' : '' }}
</title>
<link rel="stylesheet" href="{{ asset('font/css/all.min.css') }}">
<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<!-- Nucleo Icons -->
<link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
<!-- Popper -->
<script src="https://unpkg.com/@popperjs/core@2"></script>
<!-- Main Styling -->
<link href="{{ asset('assets/css/soft-ui-dashboard-tailwind.css?v=1.0.4') }}" rel="stylesheet" /> 
<!-- google font link -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<!-- tailwind css cdn -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- ionicons cdn -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<!-- alpine js cdn -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!-- style css -->
<style type="text/tailwindcss">
    body{
        font-family: 'Inter', sans-serif;
    }
</style>
@vite('resources/css/app.css')