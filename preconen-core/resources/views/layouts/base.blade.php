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


    @vite('resources/css/app.css')
    @yield('styles')

</head>

<body data-theme="light">

    <div class="wrapper">


        @include('components.navigation')
        @yield('content')
        @include('components.footer')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>


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

    @yield('scripts')

</body>

</html>
