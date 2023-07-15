@extends('Layouts.Main')
@section('content')
    <div class="relative">
        <img class="absolute whats-new-top" src="https://ungu.in/assets/img/furniture/whats-new-top.png" alt="">
        <img class="absolute whats-new-bottom" src="https://ungu.in/assets/img/furniture/whats-new-bottom.png" alt="">
        <div class="container mt-60px mb-60px">
            <div class="row">
                @include('Layouts.Sidebar')
                <div class="col-lg-9 col-md-12">
                    <!-- dashboard -->
                    <section id="dashboard" class="whats-new min-vh-100">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <img class="whats-new-char"
                                        src="https://ungu.in/assets/img/furniture/whats-new-char.png" alt="">
                                </div>
                                <div class="col-md-6 text-end">
                                    <div class="mb-60px">
                                        <h2 class="mb-30px">What's New?</h2>
                                        <p>Di ungu.in versi 2.0 kami menambahkan panel <span
                                                class="text-purple">Dashboard</span> yang berfungsi sebagai tempat untuk
                                            mengakses berbagai fitur. Terdapat fitur <span class="text-purple">Kelola
                                                Link</span>, yang
                                            membantu pengguna untuk mengelola link-link yang pernah dibuat sebelumnya.
                                            Tersedia juga
                                            bagian
                                            untuk menambahkan data tentang profil pengguna. </p>
                                    </div>
                                    <div class="mb-60px">
                                        <h2 class="mb-30px">Update Clone</h2>
                                        <p>Di ungu.in versi clone kami menambahkan <span class="text-purple">QR Code</span>
                                            . Serta analisa insight <span class="text-purple">Kota, Negara, Long, Lat,
                                                Koneksi, Hingga ISP</span>. </p>
                                    </div>

                                    <h2 class="mb-30px">What's Next?</h2>
                                    <p class="bold text-purple">Catet.in</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
