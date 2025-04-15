<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HydroWash</title>

    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body data-page="landing">

    {{-- navbar --}}
    <x-landing-navbar></x-landing-navbar>



    {{-- home section --}}
    <x-landing-home></x-landing-home>



    {{-- services section --}}
    <x-landing-services></x-landing-services>



    {{-- review section --}}
    <x-landing-review></x-landing-review>




    {{-- services2 section --}}
    <x-landing-services2></x-landing-services2>


    {{-- footer --}}
    <x-landing-footer></x-landing-footer>


</body>

<script>
    
</script>



</html>
