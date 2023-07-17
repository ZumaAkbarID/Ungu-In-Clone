@extends('Layouts.Main')
@section('content')
    <a href="#donasi" class="donation-overlay bg-pink flex-center align-items-center z1">
        <svg xmlns="http://www.w3.org/2000/svg"fill="currentColor" class="bi bi-coin nick-white donation-overlay-icon"
            viewBox="0 0 16 16">
            <path
                d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z" />
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z" />
        </svg>
    </a>

    <!-- Hero Start -->
    <section id="hero" class="hero">
        <div class="container">
            <div class="row align-items-center column-reverse">
                <div class="col-md-6">
                    <h1 style="color:#212529">Link tuh ringkas,</h1>
                    <h1>ga ribet!</h1>
                    <p>Pastikan alamat website kamu dikemas secara aesthetic dengan bantuan ungu.in tanpa bikin jari
                        keriting dan perut pusing.</p>
                </div>
                <div class="col-md-6 text-center relative">
                    <!-- <img class="illustration-hero" src="https://ungu.in/assets/img/illustration-hero.png" alt=""> -->
                    <img class="hero-girl" src="https://ungu.in/assets/img/hero-girl.png" alt="">
                    <img class="hero-accessories absolute" src="https://ungu.in/assets/img/hero-accessories.png"
                        alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Hero End -->

    <!-- shorten-link area start -->
    <section id="shorten-area" class="shorten-area relative">
        <img class="absolute z-1 wave-landing" src="https://ungu.in/assets/img/landing-wave.svg" alt="">
        <div class="pad-shorten-area">
            <div class="container" id="show-link">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        @if (session()->has('result'))
                            <div class="result-link mb-3">
                                <span>{!! session('result') !!}</span>
                                <button class="no-btn btn-copy result-link-copy text-purple"
                                    data-clipboard-text="{!! session('result') !!}">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-files" viewBox="0 0 16 16">
                                            <path
                                                d="M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z">
                                            </path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            <div class="text-center">
                                {{ $result['qr_code'] }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="make-link">
                            <h2 class="text-center nick-white mb-60px">Cus isi di bawah</h2>
                            <form action="{{ route('CreateLink') }}" method="post" autocomplete="off">
                                @csrf
                                <div class="mb-30px">
                                    <input class="form-control form-control-white" type="text" name="original"
                                        id="original" placeholder="Ketikkan link panjangmu" required>
                                </div>
                                <div class="mb-30px">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">{{ url('/') }}/</span>
                                        <input class="form-control form-control-white" type="text" name="shorten"
                                            id="shorten" placeholder="Ketikkan link singkatmu" required>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn bg-pink">Yuk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row data-info-wrapper flex-center">
                    <div class="col-md-4 col-6 circle-wrapper">
                        <div class="relative text-center flex-center">
                            <img class="z-1 absolute circle-info" src="https://ungu.in/assets/img/ellipse.svg"
                                alt="">
                            <img class="illustration-info absolute"
                                src="https://ungu.in/assets/img/illustration-info-user.png" alt="">
                        </div>
                        <div class="data-info">
                            <h3 class="nick-white">{{ number_format($showcase['users'], 0, ',', '.') }}</h3>
                            <p class="nick-white">Pengguna aktif</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-6 circle-wrapper">
                        <div class="relative text-center flex-center">
                            <img class="z-1 absolute circle-info" src="https://ungu.in/assets/img/ellipse.svg"
                                alt="">
                            <img class="illustration-info absolute"
                                src="https://ungu.in/assets/img/illustration-info-link.png" alt="">
                        </div>
                        <div class="data-info">
                            <h3 class="nick-white">{{ number_format($showcase['links'], 0, ',', '.') }}</h3>
                            <p class="nick-white">Link aesthetic dibuat</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-6 circle-wrapper">
                        <div class="relative text-center flex-center">
                            <img class="z-1 absolute circle-info" src="https://ungu.in/assets/img/ellipse.svg"
                                alt="">
                            <img class="illustration-info absolute"
                                src="https://ungu.in/assets/img/illustration-info-business.png" alt="">
                        </div>
                        <div class="data-info">
                            <h3 class="nick-white">85%</h3>
                            <p class="nick-white">Meningkatkan bisnis</p>
                        </div>
                    </div>

                </div>
            </div>
    </section>
    <!-- shorten-link area start -->

    <!-- user -->
    <section id="user" class="user">
        <div class="container text-center">
            <h1 class="mb-60px">Telah digunakan oleh</h1>
            <div class="row mb-30px opacity-05">
                <div class="col-md-2 col-4 mb-4">
                    <img class="w-100" src="https://ungu.in/assets/img/logo/amikom.png" alt="">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img class="w-100" src="https://ungu.in/assets/img/logo/koma.png" alt="">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img class="w-100" src="https://ungu.in/assets/img/logo/amcc.png" alt="">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img class="w-100" src="https://ungu.in/assets/img/logo/aec.png" alt="">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img class="w-100" src="https://ungu.in/assets/img/logo/uny.png" alt="">
                </div>
                <div class="col-md-2 col-4 mb-4">
                    <img class="w-100" src="https://ungu.in/assets/img/logo/uin.png" alt="">
                </div>
            </div>
            <p class="mb-30px">Kreasikan link aestheticmu dan dapatkan kebebasan dalam mengelola link menggunakan fitur
                dashboard yang secara gratis bisa kamu nikmati dengan menjadi bagian dari ungu.in.</p>
            <a href="https://ungu.in/register" class="btn bg-pink">Bergabung</a>
        </div>
    </section>
    <!-- user end -->

    <div class="relative">
        <img class="absolute landing-leaf-left" src="https://ungu.in/assets/img/furniture/landing-leaf.png"
            alt="">
        <img class="absolute landing-leaf-right" src="https://ungu.in/assets/img/furniture/landing-leaf.png"
            alt="">
    </div>

    <!-- member -->
    <section id="member" class="member text-center">
        <div class="container">
            <h1 class="mb-30px">Mau kenalan?</h1>
            <p class="mb-120px">Komunitas open source yang dibentuk pada saat April MOP 2021 yang dikenal dengan nama
                OSORA. Dipelopori oleh 3 orang beranggotakan Muh Zaki Choiruddin Rizky Oktafian Nur Muhammad, Meisha
                Afifah Putri yang penuh ide namun miskin eksekusi, dan pada akhirnya dipertemukan dalam berbagai projek
                dengan sejuta manfaat.</p>
            <div class="row">
                <div class="col-md-3 flex-center">
                    <div class="box-pict-member flex-center">
                        <div class="bg-pict-member"></div>
                        <img class="pict-member" src="https://ungu.in/assets/img/member/zaki.png" alt="">
                        <div id="name-tag-zaki" class="name-tag">
                            <a target="_blank" href="https://www.linkedin.com/in/muh-zaki-choiruddin/">Muh Zaki
                                Choiruddin</a>
                        </div>
                        <div id="name-tag-icon-zaki" class="name-tag-icon">
                            <img src="https://ungu.in/assets/img/name-tag.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 flex-center">
                    <div class="box-pict-member flex-center">
                        <div class="bg-pict-member"></div>
                        <img class="pict-member" src="https://ungu.in/assets/img/member/meisha.png" alt="">
                        <div id="name-tag-meisha" class="name-tag">
                            <a target="_blank" href="https://www.linkedin.com/in/meishafifah/">Meisha Afifah Putri</a>
                        </div>
                        <div id="name-tag-icon-meisha" class="name-tag-icon">
                            <img src="https://ungu.in/assets/img/name-tag.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 flex-center">
                    <div class="box-pict-member flex-center">
                        <div class="bg-pict-member"></div>
                        <img class="pict-member" src="https://ungu.in/assets/img/member/okta.png" alt="">
                        <div id="name-tag-okta" class="name-tag">
                            <a target="_blank" href="https://www.linkedin.com/in/rizky-oktafian-nur-muhammad/">Rizky
                                Oktafian</a>
                        </div>
                        <div id="name-tag-icon-okta" class="name-tag-icon">
                            <img src="https://ungu.in/assets/img/name-tag.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-3 flex-center">
                    <div class="box-pict-member flex-center">
                        <div class="bg-pict-member"></div>
                        <img class="pict-member" src="https://i.ibb.co/2yjMhCW/zoomex.png" alt="">
                        <div id="name-tag-zuma" class="name-tag">
                            <a target="_blank" href="https://instagram.com/zuma.akbar/">Rahmat Wahyuma Akbar (Cloner)</a>
                        </div>
                        <div id="name-tag-icon-zuma" class="name-tag-icon">
                            <img src="https://ungu.in/assets/img/name-tag.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body">
                Info! Link berhasil dicopy.
            </div>
        </div>
    </div>

    @include('Partials.Donate')
@endsection

@section('js')
    <script>
        var copy = new ClipboardJS('.btn-copy');
        copy.on('success', function(e) {
            $('#liveToast').toast('show');
        });

        $(document).ready(function() {
            $('#shorten').on('input', function() {
                var inputVal = $(this).val();

                // Memeriksa apakah input mengandung spasi
                if (inputVal.includes(' ')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: "Link tidak boleh mengandung spasi!"
                    });
                    $(this).val(inputVal.replace(/\s/g, ''));
                }
            });
        });
    </script>
@endsection
