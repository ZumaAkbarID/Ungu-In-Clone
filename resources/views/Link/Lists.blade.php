@extends('Layouts.Main')
@section('content')
    <div class="container mt-60px mb-60px">
        <div class="row">
            @include('Layouts.Sidebar')
            <div class="col-lg-9 col-md-12">
                <!-- dashboard -->
                <section id="dashboard" class="dashboard min-vh-100">
                    <div class="container">
                        <div>
                            <p class="mb-30px">Filter pencarian</p>
                            <form action="" method="get">
                                <div class="row mb-60px">
                                    <div class="col-md-6 mb-3">
                                        <input name="keyword" type="text" class="form-control"
                                            placeholder="Ketikkan linkmu" value="{{ Request::get('keyword') }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="month" class="form-control" name="monthYear" id="monthYear"
                                            value="{{ Request::get('monthYear') }}">
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <button type="submit" class="btn bg-pink btn-filter">
                                            <p>Cari</p>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- links -->
                        <section id="links" class="links">

                            @forelse ($links as $link)
                                <div class="box-unguin mb-30px">
                                    <div class="d-flex-links justify-content-between">
                                        <div class="d-flex">
                                            <div class="accent">
                                                <div class="box-unguin-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        class="bi bi-link-45deg" viewBox="0 0 16 16">
                                                        <path
                                                            d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z" />
                                                        <path
                                                            d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="ms-4 overflow-wrap-anywhere relative">
                                                <p class="mb-2 bold">
                                                    <span>
                                                        <button class="btn-copy no-btn me-1"
                                                            data-clipboard-text="{{ url('/') }}/{{ $link->shorten }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor" class="bi bi-files"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z" />
                                                            </svg>
                                                        </button>
                                                    </span>
                                                    {{ url('/') }}/{{ $link->shorten }}
                                                </p>
                                                <p class="thin"> {{ $link->original }}</p>
                                            </div>
                                        </div>

                                        <div class="link-date">
                                            <p class="mb-2 text-end">{{ date('d M Y', strtotime($link->created_at)) }}</p>
                                            <div class="d-flex justify-content-between">
                                                <a href="" class="text-white">
                                                    <span class="me-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-eye"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                            <path
                                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                        </svg>
                                                    </span>
                                                    {{ number_format($link->counter, 0, ',', '.') }}
                                                </a>
                                                <div class="d-flex justify-content-end">
                                                    <div class="me-3">

                                                        <a href="https://ungu.in/dashboard/edit/testing1"
                                                            class="anchor-svg">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16px"
                                                                height="16px" fill="currentColor"
                                                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <form action="https://ungu.in/dashboard/delete/testing1"
                                                            method="post">
                                                            <input type="hidden" name="_token"
                                                                value="WEU85EloVxi9sp3pH2cGjNJhA6AGc1vwREbg2x8B"> <input
                                                                type="hidden" name="_method" value="delete">
                                                            <button class="no-btn" type="submit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16px"
                                                                    height="16px" fill="currentColor" class="bi bi-trash"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                </svg>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h3 class="text-center">Link tidak ditemukan</h3>
                            @endforelse

                        </section>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                Info! Link berhasil dicopy.
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var copy = new ClipboardJS('.btn-copy');
        copy.on('success', function(e) {
            $('#liveToast').toast('show');
        });
    </script>
@endsection
