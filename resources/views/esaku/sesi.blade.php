@php
Session::put('pesan','Kembali');
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SAKU - Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ asset('asset_dore/font/iconsmind-s/css/iconsminds.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/font/simple-line-icons/css/simple-line-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap.rtl.only.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap-float-label.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/main.css') }}" />
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');


        body {
            font-family: 'Roboto', sans-serif !important;
        }
        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, p,li,ul,a,input,select{
            font-family: 'Roboto', sans-serif !important;
        }
        .form-side{
            margin: 0 auto;
        }
        input{
            border-radius: 10px !important;
        }
        .form-side{
            width:80%;
            padding: 0 150px
        }
        @media (max-width: 991px) {
            .form-side{
                width:100%;
                padding: 0;
            }
        }
        #eye
        {
            background:url("{{ asset('asset_dore/img/eye.svg') }}");
        }
        #span-password
        {
           position: absolute;
           cursor: text;
           font-size: 90%;
           opacity: 1;top: -0.4em;left: 0.75rem;z-index: 3;line-height: 1;padding: 0 1px
        }
        #btn-eye
        {
            top: 0px;right: 10px;left: unset;width: 40px;height: 40px;background: url("{{ asset('asset_dore/img/hide.svg') }}") no-repeat;background-blend-mode: lighten;background-size: 22px;background-position-x: center;background-position-y: center;opacity: 0.5;cursor: pointer;
        }
        
    </style>
    <script src="{{ asset('asset_dore/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/dore.script.js') }}"></script>
    <script>
        var $public_asset = "{{ asset('asset_dore') }}/";
        var $theme = "dore.light.redruby.min.css";
    </script>
    <script src="{{ asset('asset_dore/js/scripts.js') }}"></script>
    <script>
        $('div.theme-colors').hide();
        window.localStorage.removeItem('esaku-form');
    </script>
</head>

<body class="background show-spinner" style="border-radius:0 !important">
    <div class=""></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card" style="box-shadow:none">
                        <div class="form-side text-center px-0">
                            <img src="{{ asset('img/end_session.svg') }}" style="width:200px">
                            <h2 class="mt-3"><b>Sesi kamu sudah berakhir</b></h2>
                            <p class="mt-3" style="font-size:12px">Maaf demi keamanan data kamu jika tidak ada aktivitas selama 1 jam <br> maka sistem akan keluar secara otomatis. Jangan khawatir kamu bisa masuk kembali. </p>
                            <a type="button" href="{{ url('esaku-auth/login') }}" class="btn mt-3" style="border: 1px solid #000;width: 200px;">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            
            $('body').addClass('dash-contents');
        });
    </script>
    
</body>

</html>