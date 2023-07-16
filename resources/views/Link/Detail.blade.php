@extends('Layouts.Main')
@section('content')
    <div class="container mt-60px mb-60px">
        <div class="row">
            @include('Layouts.Sidebar')
            <div class="col-lg-9 col-md-12">
                <section id="dashboard" class="dashboard min-vh-100">
                    <div class="container">
                        <div class="box-unguin-40 bg-purple nick-white text-center">
                            <div class="text-center flex-center mb-2">
                                {{ $qr }}
                            </div>

                            <p class="bold mb-2"><a target="_BLANK" class="text-white"
                                    href="{{ url('/') }}/{{ $link->shorten }}">{{ url('/') }}/{{ $link->shorten }}</a>
                            </p>
                            <p class="thin"><a target="_BLANK" class="text-white"
                                    href="{{ $link->original }}">{{ $link->original }}</a></p>
                        </div>
                        <div class="make-link">
                            hfiuhsdfhsdhf
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
