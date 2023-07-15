<div id="iwa" class="py-3" style="background-color: #8732c9">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center nick-white">
            <a href="javascript:void(0)">
                <h6 class="mb-0 text-center nick-white">
                    Terima kasih karena tetap setia
                </h6>
            </a>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <!-- button sidebar -->
        <button id="sidebar-toggler" type="button" class="d-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="bi bi-list"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="https://ungu.in/assets/img/logo/unguin.svg" alt="">
        </a>

        @if (Auth::check())
            <a href="{{ route('Dashboard') }}" class="d-flex align-items-center ms-auto">
                <div>
                    <img class="avatar me-3"
                        src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim(Auth::user()->email))) }}?d=robohash&amp;s=600"
                        alt="">
                </div>
                <div>
                    <p>{{ Auth::user()->username }}</p>
                </div>
            </a>
        @else
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex ms-auto btn-auth">
                    <a class="nick-white bold" href="{{ route('Auth.Register') }}">
                        <button class="btn bg-purple me-3 btn-register">
                            Daftar
                        </button>
                    </a>
                    <a class="nick-white bold" href="{{ route('Auth.Login') }}">
                        <button class="btn bg-pink">
                            Masuk
                        </button>
                    </a>
                </div>
            </div>
        @endif
    </div>
</nav>
