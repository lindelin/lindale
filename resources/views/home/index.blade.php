@extends('layouts.home')

@section('title')
    {{ trans('header.home') }} - {{ config('app.title') }}
@endsection

@section('content')
    <home-dashboard></home-dashboard>
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
            <!--weather card-->
            <div class="card card-weather">
                <div class="card-body">
                    <div class="weather-date-location">
                        <h3>Monday</h3>
                        <p class="text-gray">
                            <span class="weather-date">25 October, 2016</span>
                            <span class="weather-location">London, UK</span>
                        </p>
                    </div>
                    <div class="weather-data d-flex">
                        <div class="mr-auto">
                            <h4 class="display-3">21
                                <span class="symbol">&deg;</span>C</h4>
                            <p>
                                Mostly Cloudy
                            </p>
                        </div>
                    </div>
                </div>
                <div class="p-0">
                    <div class="d-flex weakly-weather">
                        <div class="weakly-weather-item">
                            <p class="mb-0">
                                Sun
                            </p>
                            <i class="mdi mdi-weather-cloudy"></i>
                            <p class="mb-0">
                                30°
                            </p>
                        </div>
                        <div class="weakly-weather-item">
                            <p class="mb-1">
                                Mon
                            </p>
                            <i class="mdi mdi-weather-hail"></i>
                            <p class="mb-0">
                                31°
                            </p>
                        </div>
                        <div class="weakly-weather-item">
                            <p class="mb-1">
                                Tue
                            </p>
                            <i class="mdi mdi-weather-partlycloudy"></i>
                            <p class="mb-0">
                                28°
                            </p>
                        </div>
                        <div class="weakly-weather-item">
                            <p class="mb-1">
                                Wed
                            </p>
                            <i class="mdi mdi-weather-pouring"></i>
                            <p class="mb-0">
                                30°
                            </p>
                        </div>
                        <div class="weakly-weather-item">
                            <p class="mb-1">
                                Thu
                            </p>
                            <i class="mdi mdi-weather-pouring"></i>
                            <p class="mb-0">
                                29°
                            </p>
                        </div>
                        <div class="weakly-weather-item">
                            <p class="mb-1">
                                Fri
                            </p>
                            <i class="mdi mdi-weather-snowy-rainy"></i>
                            <p class="mb-0">
                                31°
                            </p>
                        </div>
                        <div class="weakly-weather-item">
                            <p class="mb-1">
                                Sat
                            </p>
                            <i class="mdi mdi-weather-snowy"></i>
                            <p class="mb-0">
                                32°
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--weather card ends-->
        </div>
        <div class="col-lg-4 grid-margin">
            <div class="row">
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bottom aligned media</h4>
                            <div class="media">
                                <i class="mdi mdi-earth icon-md text-info d-flex align-self-end mr-3"></i>
                                <div class="media-body">
                                    <p class="card-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bottom aligned media</h4>
                            <div class="media">
                                <i class="mdi mdi-earth icon-md text-info d-flex align-self-end mr-3"></i>
                                <div class="media-body">
                                    <p class="card-text">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection