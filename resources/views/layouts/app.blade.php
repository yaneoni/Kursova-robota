<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Videogame Museum')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body>
        @include('partials.navbar')

        <div class="success-message">
            @if(session('success'))
                <div id="success-alert" class="alert alert-warning text-dark fw-bold">
                    {{ session('success') }}
                    <button type="button" class="ms-2 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <div class="container-fluid main-content-wrapper p-0">
            @yield('content')
        </div>

        @include('partials.footer')
        @include('partials.modal')

        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $('#success-alert').fadeOut('slow');
                }, 2500);

                $('.hamburger-menu').click(function() {
                    $(this).toggleClass('active');
                });

                $(".cta-button").click(function() {
                    $("#modal-overlay, #buy-tickets-modal").fadeIn();
                });

                $("#close-modal").click(function() {
                    $("#modal-overlay, #buy-tickets-modal").fadeOut();
                });

                const navbarHeight = $('.navbar-wrapper').outerHeight();
                $('a[href^="#"]').on('click', function(e) {
                    e.preventDefault();
                    const target = $(this).attr('href');

                    if ($(target).length) {
                        const targetPosition = $(target).offset().top - navbarHeight;

                        $('html, body').animate({
                            scrollTop: targetPosition
                        }, 'fast');
                    }
                });
            });
        </script>
        @stack('scripts')
    </body>
</html>
