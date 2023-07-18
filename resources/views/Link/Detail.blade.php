@extends('Layouts.Main')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
@endsection
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
                            <p class="mb-2 text-secondary">Data mungkin akan terlambat, karena sistem melakukan sinkronisasi
                                di belakang
                                layar</p>
                            <div class="card p-3 border-0 shadow-sm">
                                <canvas id="pengunjungTahunan" height="350px"></canvas>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 col-sm-12">
                                <div class="card border-0 p-3 shadow-sm">
                                    <p>Kota</p>
                                    <canvas id="city" height="350px"></canvas>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="card border-0 p-3 shadow-sm">
                                    <p>Region</p>
                                    <canvas id="region" height="350px"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 col-sm-12">
                                <div class="card border-0 p-3 shadow-sm">
                                    <p>Internet Service Provider</p>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <td>No.</td>
                                                <td>Nama ISP</td>
                                                <td>Jumlah</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $counterIsp = 1;
                                            @endphp
                                            @forelse ($isp as $key => $value)
                                                <tr>
                                                    <td>{{ $counterIsp++ }}</td>
                                                    <td>{{ $key }}</td>
                                                    <td>{{ $value }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">Data belum tersedia</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="card border-0 p-3 shadow-sm">
                                    <p>Pengguna VPN</p>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <td>Pakai</td>
                                                <td>Jumlah</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($vpn as $key => $value)
                                                <tr>
                                                    <td>{{ $key == 1 ? 'Ya' : 'Tidak' }}</td>
                                                    <td>{{ $value }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">Data belum tersedia</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 col-sm-12">
                                <div class="card border-0 p-3 shadow-sm">
                                    <p>Negara</p>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <td>No.</td>
                                                <td>Negara</td>
                                                <td>Jumlah</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $counterCountry = 1;
                                            @endphp
                                            @forelse ($country as $key => $value)
                                                <tr>
                                                    <td>{{ $counterCountry++ }}</td>
                                                    <td>
                                                        <img src="{{ $value[0]['flag'] }}" alt="" width="30">
                                                        {{ $key }}
                                                    </td>
                                                    <td>{{ $value[0]['count'] }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">Data belum tersedia</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="card border-0 p-3 shadow-sm">
                                <p>List</p>
                                <table class="table table-responsive" id="tb-list">
                                    <thead>
                                        <tr>
                                            <td>No.</td>
                                            <td>Alamat IP</td>
                                            <td>Region</td>
                                            <td>Negara</td>
                                            <td>Koneksi</td>
                                            <td>ISP</td>
                                            <td>Maps</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counterList = 1;
                                        @endphp
                                        @forelse ($lists as $item)
                                            <tr>
                                                <td>{{ $counterList++ }}</td>
                                                <td>{{ $item->ip_address }}</td>
                                                <td>{{ $item->region }}</td>
                                                <td>
                                                    <img src="{{ $value[0]['flag'] }}" alt="" width="30">
                                                    {{ $item->country }}
                                                </td>
                                                <td>{{ $item->connection_type }}</td>
                                                <td>{{ $item->isp_name }}</td>
                                                <td><a href="http://maps.google.com/maps?z=12&t=m&q={{ $item->latitude }},{{ $item->longitude }}"
                                                        target="_blank" rel="noopener noreferrer">Buka Maps</a></td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">Data belum tersedia</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="//cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        function getRandomColor() {
            var r = Math.floor(Math.random() * 256); // Nilai acak antara 0 dan 255 untuk komponen merah (R)
            var g = Math.floor(Math.random() * 256); // Nilai acak antara 0 dan 255 untuk komponen hijau (G)
            var b = Math.floor(Math.random() * 256); // Nilai acak antara 0 dan 255 untuk komponen biru (B)

            var rgb = 'rgb(' + r + ', ' + g + ', ' + b + ')'; // Menggabungkan komponen R, G, B menjadi format RGB

            return rgb;
        }

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
                        enabled: true
                    }
                },
                scales: {
                    y: {
                        max: labels.length + 4,
                        min: 0,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            },
        };

        const pengunjungTahunan = new Chart(
            document.getElementById('pengunjungTahunan'),
            configTahunan
        );

        var labelsCity = {{ Js::from($city['labels']) }};
        var visitorsCity = {{ Js::from($city['data']) }};
        let cityBgColor = [];
        for (let iCity = 0; iCity < labelsCity.length; iCity++) {
            cityBgColor[iCity] = getRandomColor();
        }

        const dataCity = {
            labels: labelsCity,
            datasets: [{
                label: labelsCity,
                data: visitorsCity,
                backgroundColor: cityBgColor,
                hoverOffset: 4
            }]
        };
        const configCity = {
            type: 'doughnut',
            data: dataCity,
        };
        const city = new Chart(
            document.getElementById('city'),
            configCity
        );

        var labelsRegion = {{ Js::from($region['labels']) }};
        var visitorsRegion = {{ Js::from($region['data']) }};
        const dataRegion = {
            labels: labelsRegion,
            datasets: [{
                label: labelsRegion,
                data: visitorsRegion,
                backgroundColor: getRandomColor(),
            }, ]
        };
        let delayedRegion;
        const configRegion = {
            type: 'bar',
            data: dataRegion,
            options: {
                animation: {
                    onComplete: () => {
                        delayedRegion = true;
                    },
                    delay: (context) => {
                        let delay = 0;
                        if (context.type === 'data' && context.mode === 'default' && !delayedRegion) {
                            delay = context.dataIndex * 300 + context.datasetIndex * 100;
                        }
                        return delay;
                    },
                },
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true,
                        max: labelsRegion.length + 4,
                        min: 0,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        };
        const region = new Chart(
            document.getElementById('region'),
            configRegion
        );

        new DataTable('#tb-list', {
            info: false,
            ordering: false,
        });
    </script>
@endsection
