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
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
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
    <div class="flex h-full items-stretch" x-data="{ isSidebarExpanded: true, active: '' }">
        @include('components.sidebar-new')
        <div class="flex-1 flex flex-col max-w-[85%]">
            @include('components.navbar')
            <main>
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>

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
    </script>
    <script>
        $('.dropify').dropify({
            messages: {
                'default': 'Klik untuk menambahkan gambar',
                'replace': 'Klik untuk mengubah Gambar',
                'remove': 'Hapus',
                'error': 'Ooops, something wrong happened.'
            }
        });
    </script>

    @yield('scripts')
</body>

</html>
