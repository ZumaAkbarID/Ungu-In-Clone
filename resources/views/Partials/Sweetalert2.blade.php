<script>
    @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: "{!! implode('', $errors->all('<div>:message</div>')) !!}"
        });
    @endif
    @if (session()->has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: "{!! session('error') !!}"
        });
    @endif
    @if (session()->has('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            html: "{!! session('success') !!}"
        });
    @endif
    @if (session()->has('info'))
        Swal.fire({
            icon: 'info',
            title: 'Perhatian',
            html: "{!! session('info') !!}"
        });
    @endif
</script>
