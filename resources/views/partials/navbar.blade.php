<div class="container-fluid navbar-wrapper">
    <div class="container-md navbar-content d-flex justify-content-between align-items-center py-2">
        <a class="logo-wrapper py-2" href="{{ route('home') }}">
            <img src="{{ asset('img/logo.svg') }}" alt="Videogame Museum" width="96">
        </a>
        <div class="d-none d-md-flex justify-content-between align-items-center">
            <ul class="d-flex nav">
                <li class="nav-item">
                    <a href="#visit-information">Visit Information</a>
                </li>
                <li class="nav-item">
                    <a href="#tickets-information">Tickets</a>
                </li>
                <li class="nav-item">
                    <a href="#about-us">About Us</a>
                </li>
            </ul>
            <button class="cta-button ms-4" type="button">Buy Tickets!</button>
        </div>
        <div class="d-inline-flex d-md-none">
            <button class="hamburger-menu" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample">
                <div class="hamburger-bar"></div>
                <div class="hamburger-bar"></div>
                <div class="hamburger-bar"></div>
            </button>
            <div class="collapse text-center mobile-collapse-menu" id="collapseExample">
                <ul class="d-flex flex-column nav">
                    <li class="nav-item">
                        <a href="#visit-information">Visit Information</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tickets-information">Tickets</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about-us">About Us</a>
                    </li>
                </ul>
                <button class="cta-button mt-3" type="button">Buy Tickets!</button>
            </div>
        </div>
    </div>
</div>
