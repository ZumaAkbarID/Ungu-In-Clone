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
                        <div class="mt-3">
                            <canvas id="pengunjungTahunan" height="100px"></canvas>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        var labels = {{ Js::from($years['labels']) }};
        var visitors = {{ Js::from($years['data']) }};

        const dataTahunan = {
            labels: labels,
            datasets: [{
                label: 'Pengunjung {{ date('Y') }}',
                data: visitors,
                borderColor: 'rgb(154, 82, 208)',
                backgroundColor: 'rgb(154, 82, 208)',
                tension: 0.4,
            }, ]
        };

        const configTahunan = {
            type: 'line',
            data: dataTahunan,
            options: {
                animations: {
                    radius: {
                        duration: 400,
                        easing: 'linear',
                        loop: (context) => context.active
                    }
                },
                hoverRadius: 12,
                hoverBackgroundColor: 'yellow',
                interaction: {
                    mode: 'nearest',
                    intersect: false,
                    axis: 'x'
                },
                plugins: {
                    tooltip: {
                        enabled: false
                    }
                }
            },
        };

        const pengunjungTahunan = new Chart(
            document.getElementById('pengunjungTahunan'),
            configTahunan
        );
    </script>
@endsection
