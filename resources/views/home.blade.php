@extends('layouts.app')

@php
    const HOURS_OF_OPERATIONS = [
        'MONDAY' => 'Closed',
        'TUESDAY' => '10AM-5PM',
        'WEDNESDAY' => '10AM-5PM',
        'THURSDAY' => '10AM-5PM',
        'FRIDAY' => '10AM-5PM',
        'SATURDAY' => '10AM-6PM',
        'SUNDAY' => '12PM-5PM'
    ];
@endphp

@section('title', 'Home - Videogame Museum')

@section('content')
    <div class="explore-museum-container">
        <div class="explore-museum-wrapper d-flex align-items-center">
            <div class="explore-museum-content d-flex flex-column align-items-center justify-content-between text-center px-3">
                <h1 class="explore-title">Step into the History of Gaming</h1>
                <p class="explore-description px-2">
                    The Videogame Museum is dedicated to preserving and showcasing the history and culture of video games, featuring interactive exhibits and educational programs.
                </p>
                <button class="explore-button" type="button">
                    Explore now!
                </button>
            </div>
        </div>
    </div>

    <div id="about-us" class="about-container container row mx-auto col-10 col-sm-12">
        <div class="col-12 col-lg-6 p-0 p-sm-2 about-info">
            <h2>What is the VGM?</h2>
            <p class="text-center text-lg-start mb-0">
                Videogame Museum (VGM), is a captivating destination for gamers and enthusiasts alike. Immerse yourself in the rich history and culture of video games as you explore interactive exhibits that showcase the evolution of gaming. From vintage consoles to modern technology, you’ll discover iconic games, rare artifacts, and intriguing displays that highlight the impact of gaming on society. What are you waiting for? Gaming bliss awaits!
            </p>
        </div>
        <div class="image-container col-md-6 d-none d-lg-block">
            <img src="{{ asset('img/about-us.jpg') }}" alt="Videogame Museum">
        </div>
    </div>

    <div class="container d-none d-lg-block">
        <div class="exhibits-container">
            <h2 class="mb-4">Much More Than a Museum</h2>
            <p class="mb-5">Discover Gaming’s Past and Present Through Dynamic, Interactive Exhibits</p>
            <div class="row">
                <div class="col-4 mb-4">
                    <div class="exhibit-card">
                        <img src="{{ asset('img/head-to-head-wall.jpg') }}" alt="Head to Head Wall">
                        <div class="card-body">
                            <h3 class="my-3">Head to Head Wall</h3>
                            <div class="separate-line mb-3"></div>
                            <p>
                                Face your friends at the Head to Head Wall, a unique exhibit that allows you to play classic and modern video games side-by-side, experiencing the evolution of gaming firsthand!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="exhibit-card">
                        <img src="{{ asset('img/giant-pong.jpg') }}" alt="Giant Pong">
                        <div class="card-body">
                            <h3 class="my-3">Giant Pong</h3>
                            <div class="separate-line mb-3"></div>
                            <p>
                                Experience Pong on an epic scale! Take control of the paddles and attempt to outscore your opponent. It’s a must-see exhibit for anyone who loves gaming, history, or just having fun!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-4">
                    <div class="exhibit-card">
                        <img src="{{ asset('img/80-bedroom.jpg') }}" alt="1980’s Bedroom">
                        <div class="card-body">
                            <h3 class="my-3">1980’s Bedroom</h3>
                            <div class="separate-line mb-3"></div>
                            <p>
                                Step into a meticulously recreated bedroom that captures the essence of gaming culture during that unforgettable decade. Explore the vibrant colors, retro décor, and authentic memorabilia!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="tickets-information" class="ticket-container container row mx-auto col-10 col-sm-12">
        <div class="col-12 col-md-6 ticket-info">
            <h2>TICKETS</h2>
            <ul>
                <li>Adult Admission – $12</li>
                <li>Kids Admission* – $10</li>
                <li>Educators Admission** – $15</li>
            </ul>
            <p class="note">* Ages 3-10. Kids under 3 get in FREE.</p>
            <p class="note mb-0">** Must show valid ID.</p>
        </div>
        <div class="image-container col col-6 d-none d-md-block">
            <img src="{{ asset('img/tickets.jpg') }}" alt="Videogame Museum">
        </div>
    </div>

    <div id="visit-information" class="schedule-wrapper container p-0 mx-auto">
        <div class="schedule-container row mx-auto col-10 col-sm-12 p-0 p-md-3">
            <h2 class="mb-3 text-center">Visit Information</h2>
            <div class="image-container col-md-6 d-none d-md-block">
                <img src="{{ asset('img/schedule.jpg') }}" alt="Videogame Museum">
            </div>
            <div class="col-12 col-md-6 px-0 px-md-3 schedule-info">
                <div id="table-collapse">
                    <div class="table-wrapper">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Day</th>
                                    <th scope="col">Hours</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (HOURS_OF_OPERATIONS as $day => $hour)
                                    <tr>
                                        <td>{{ $day }}</td>
                                        <td>{{ $hour }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection