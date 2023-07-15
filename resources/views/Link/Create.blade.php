@extends('Layouts.Main')

@section('content')
    <div class="container mt-60px mb-60px">
        <div class="row">
            @include('Layouts.Sidebar')
            <div class="col-lg-9 col-md-12">
                <!-- dashboard -->
                <section id="dashboard" class="dashboard min-vh-100">
                    <div class="container">
                        <div class="box-unguin-40 bg-purple nick-white text-center">
                            <div class="text-center flex-center">
                                <div class="box-unguin-icon bg-purple-accent width-fit-content mb-30px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-link-45deg"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z" />
                                        <path
                                            d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z" />
                                    </svg>
                                </div>
                            </div>

                            <h3 class="bold mb-2">Buat link singkatmu dibawah</h3>
                        </div>
                        <form action="" method="POST" class="make-link">
                            @csrf
                            <div class="mb-30px mt-60px">
                                <input type="text" name="original" id="original" class="form-control"
                                    placeholder="Ketikkan link panjangmu">
                            </div>
                            <div class="input-group mb-30px">
                                <span class="input-group-text bg-purple nick-white" id="basic-addon1">ungu.in/</span>
                                <input type="text" class="form-control" name="shorten" id="shorten"
                                    placeholder="Ketikkan link singkatmu">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-pink">Submit</button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
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
