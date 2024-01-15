<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind css</title>
    <!-- favicon link -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- google font link -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- tailwind css cdn -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ionicons cdn -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!-- alpine js cdn -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- style css -->
    <script type="text/javascript" src="{{ asset('assets/floating-whatsapp-master/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/floating-whatsapp-master/floating-wpp.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/floating-whatsapp-master/floating-wpp.min.css') }}">
    @vite(['resources/css/app.css','resources/js/app.js']) 
</head>
<body>
    <div id="myDiv"></div>
  </body>
  <script type="text/javascript">
    $(function () {
      $('#myDiv').floatingWhatsApp({
        phone: '6282340170686',
        showPopup: 'True',
        popupMessage: "Hello Word",
        headerTitle: "whatsapp Chat",
        message: "Test",
        position: "right"
      });
    });
  </script>
</html>