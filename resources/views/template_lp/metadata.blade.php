<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" type="image/png" sizes="76x76" href="{{ asset('assets/LogoTittle.png') }}" />
<title>@yield('title')</title>
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
    .bg-modal-overlay {
        background-color: rgba(0, 0, 0, 0.5);
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

{{-- <!-- Gaya Tombol WhatsApp -->
<style>
    .whatsapp-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #25d366;
        color: #fff;
        padding: 10px 20px;
        border-radius: 50%;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }

    .whatsapp-popup {
        position: fixed;
        bottom: 70px;
        right: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        display: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Gaya Tambahan jika diperlukan */
    .whatsapp-popup h3 {
        margin-bottom: 10px;
    }

    .whatsapp-popup img {
        width: 20px;
        height: 20px;
        margin-right: 5px;
    }
</style> --}}
<script type="text/javascript" src="{{ asset('assets/floating-whatsapp-master/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/floating-whatsapp-master/floating-wpp.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/floating-whatsapp-master/floating-wpp.min.css') }}">
@vite(['resources/css/app.css','resources/js/app.js']) 