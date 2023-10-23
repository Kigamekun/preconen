<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | DASHBOARD</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/splide-4.1.3/dist/css/splide.min.css') }}">


    @yield('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body data-theme="light">
    <style>
        .color-calendar {
            width: 100%;
            height: 100%;
        }

        .calendar__weekdays {
            grid-template-columns: repeat(7, 1fr) !important;
        }

        .calendar__header {
            grid-template-columns: repeat(7, 1fr) !important;
        }

        .calendar__days {
            grid-template-columns: repeat(7, 1fr) !important;
        }

        .color-calendar.basic .calendar__days .calendar__day-selected .calendar__day-box {
            background-color: #89B565;


        }

        .color-calendar .calendar__days .calendar__day-event .calendar__day-box {
            background-color: #FFCA2A;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: calc(55% + 8px);
            height: 90%;
            opacity: 1;
            z-index: -1;
            cursor: pointer;
            transition: opacity 0.3s ease-out;
            will-change: opacity;
        }

        .color-calendar .calendar__days .calendar__day-event .calendar__day-bullet {
            background-color: #FFCA2A;
        }

        .color-calendar.basic {
            color: #495E57
        }
    </style>
    <div class="flex h-full items-stretch" x-data="{ isSidebarExpanded: true }">
        @include('components.sidebar-new')
        <div class="flex-1 flex flex-col max-w-[85%]">
            @include('components.navbar')
            <main>
                @yield('content')
            </main>
        </div>
    </div>
    @include('components.footer')
    @yield('scripts')
</body>

</html>
