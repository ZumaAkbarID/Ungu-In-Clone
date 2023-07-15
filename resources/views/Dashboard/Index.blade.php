@extends('Layouts.Main')
@section('content')
    <div class="container mt-60px mb-60px">
        <div class="row">
            @include('Layouts.Sidebar')
            <div class="col-lg-9 col-md-12">
                <!-- dashboard -->
                <section id="dashboard" class="dashboard min-vh-100">
                    <div class="container">
                        <div class="box-unguin-40 bg-lilac mb-60px">
                            <h2>Hi, {{ implode(' ', [Auth::user()->first_name, Auth::user()->last_name]) }}</h2>
                            <p class="text-purple">Selamat datang di dashboard ungu.in clone, maksimalkan manajemen linkmu
                                disini.</p>
                        </div>
                        <p class="mb-30px">Overview</p>
                        <div class="row">
                            <div class="col-md-12 col-lg-4">
                                <div class="box-unguin bg-pink-2">
                                    <div class="d-flex">
                                        <div class="box-unguin-icon bg-pink-accent">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="bi bi-link-45deg" viewBox="0 0 16 16">
                                                <path
                                                    d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z" />
                                                <path
                                                    d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z" />
                                            </svg>
                                        </div>
                                        <div class="ms-2">
                                            <h3 class="mb-2">{{ number_format($counter['links'], 0, ',', '.') }}</h3>
                                            <p class="mb-0">Link dibuat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="box-unguin bg-magenta">
                                    <div class="d-flex">
                                        <div class="box-unguin-icon bg-magenta-accent">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                <path
                                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                            </svg>
                                        </div>
                                        <div class="ms-2">
                                            <h3 class="mb-2">{{ number_format($counter['views'], 0, ',', '.') }}</h3>
                                            <p class="mb-0">Views link</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="box-unguin bg-purple-2">
                                    <div class="d-flex">
                                        <div class="box-unguin-icon bg-purple-accent">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                                <path
                                                    d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                                <path fill-rule="evenodd"
                                                    d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                            </svg>
                                        </div>
                                        <div class="ms-2">
                                            <h3 class="mb-2">{{ $counter['profile'] }}%</h3>
                                            <p class="mb-0">Profil lengkap</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
