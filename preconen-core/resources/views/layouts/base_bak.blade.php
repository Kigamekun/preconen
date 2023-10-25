<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | DASHBOARD</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.7.0/chosen.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendor/splide-4.1.3/dist/css/splide.min.css') }}">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')

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
    <div class="flex bg-gray-300 h-screen" x-data="{ isSidebarExpanded: true }">
        <aside class="flex flex-col text-gray-300 bg-gray-800 transition-all duration-300 ease-in-out"
            :class="isSidebarExpanded ? 'w-64' : 'w-20'">
            <a href="#"
                class="h-20 flex items-center px-4 bg-gray-900 hover:text-gray-100 hover:bg-opacity-50 focus:outline-none focus:text-gray-100 focus:bg-opacity-50 overflow-hidden">
                <svg viewBox="0 0 20 20" fill="currentColor" class="h-12 w-12 flex-shrink-0">
                    <path
                        d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                </svg>
                <span class="ml-2 text-xl font-medium duration-300 ease-in-out"
                    :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Dashboard</span>
            </a>
            <nav class="p-3 space-y-2 font-medium">
                <a href="#"
                    class="flex items-center h-10 px-3 text-white bg-blue-600 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 flex-shrink-0">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span class="ml-2 duration-300 ease-in-out"
                        :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Home</span>
                </a>
                <a href="#"
                    class="flex items-center h-10 px-3 hover:bg-blue-600 hover:bg-opacity-25 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 flex-shrink-0">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                    </svg>
                    <span class="ml-2 duration-300 ease-in-out"
                        :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Members</span>
                </a>
                <a href="#"
                    class="flex items-center h-10 px-3 hover:bg-blue-600 hover:bg-opacity-25 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 flex-shrink-0">
                        <path fill-rule="evenodd"
                            d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ml-2 duration-300 ease-in-out"
                        :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Reports</span>
                </a>
            </nav>
            <div class="border-t border-gray-700 p-4 font-medium mt-auto">
                <a href="#"
                    class="flex items-center h-10 px-3 hover:text-gray-100 hover:bg-gray-600 hover:bg-opacity-25 rounded-lg transition-colors duration-150 ease-in-out focus:outline-none focus:shadow-outline">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 flex-shrink-0">
                        <path fill-rule="evenodd"
                            d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="ml-2 duration-300 ease-in-out"
                        :class="isSidebarExpanded ? 'opacity-100' : 'opacity-0'">Settings</span>
                </a>
            </div>
        </aside>
        <div class="flex-1 flex flex-col">
            <header class="h-20 flex items-center px-6 bg-white">
                <button class="p-2 -ml-2 mr-2" @click="isSidebarExpanded = !isSidebarExpanded">
                    <svg viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 transform"
                        :class="isSidebarExpanded ? 'rotate-180' : 'rotate-0'">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="4" y1="6" x2="14" y2="6" />
                        <line x1="4" y1="18" x2="14" y2="18" />
                        <path d="M4 12h17l-3 -3m0 6l3 -3" />
                    </svg>
                </button>
                <span class="font-medium">Header</span>
            </header>
            <main class="flex-1 p-6">
                <p class="font-medium">Click on the menu button on top to expand/shrink the sidebar</p>
            </main>
        </div>
    </div>

    {{-- @include('components.footer')

    </div> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $('#card-none').toggle();
                $('#content').toggleClass('expanded');

                if ($('#content').hasClass('expanded')) {
                    $('#content').animate({
                        width: '100%'
                    }, 300); // Use slide animation
                } else {
                    $('#content').animate({
                        width: '78%'
                    }, 300); // Use slide animation
                }
            });


            $('#sidebarCollapse1').on('click', function() {
                $('#sidebar').toggleClass('active');
                $('#card-none').toggle();
                $('#content').toggleClass('expanded');

                if ($('#content').hasClass('expanded')) {
                    $('#content').animate({
                        width: '100%'
                    }, 300); // Use slide animation
                } else {
                    $('#content').animate({
                        width: '78%'
                    }, 300); // Use slide animation
                }
            });
        });
    </script>


    @if (!is_null(Session::get('message')))
        <script>
            Swal.fire({
                position: 'center',
                icon: @json(Session::get('status')),
                title: @json(Session::get('status')),
                html: @json(Session::get('message')),
                showConfirmButton: false,
                timer: 2000
            })
        </script>
    @endif
    @if (!empty($errors->all()))
        <script>
            var err = @json($errors->all());
            var txt = '';
            Object.keys(err).forEach(element => {
                txt += err[element] + '<br>';
            });
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Error',
                html: txt,
                showConfirmButton: false,
                timer: 4000
            })
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('#logoutForm').on('submit', function(e) {
                e.preventDefault(); // Prevent form submission

                Swal.fire({
                    title: 'Konfirmasi Logout',
                    text: 'Anda yakin ingin keluar?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Logout',
                    cancelButtonText: 'Batal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Proceed with form submission
                        $(this).off('submit').submit();
                    }
                });
            });
        });
    </script> --}}

    @yield('scripts')

</body>

</html>
