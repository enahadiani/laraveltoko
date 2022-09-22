<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SAKU - Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ asset('asset_dore/font/iconsmind-s/css/iconsminds.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/font/simple-line-icons/css/simple-line-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/smart_wizard.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap.rtl.only.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap-tagsinput.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/bootstrap-float-label.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/vendor/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_dore/css/main.css') }}" />        
    <!-- <link rel="stylesheet" href="{{ asset('asset_dore/css/loading.css') }}" /> -->
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
        body {
            font-family: 'Roboto', sans-serif !important;
        }
        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6, p,li,ul,a,input,select{
            font-family: 'Roboto', sans-serif !important;
        
        }
        h1 {
        font-size: 4rem !important;
        }

        h2 {
            font-size: 3.052rem !important;
        }

        h3 {
            font-size: 2.441rem !important;
        }

        h4{
            font-size: 1.953rem !important;
        }

        h5{
            font-size: 1.875rem !important;
        }

        h6{
            font-size: 1.25rem !important;
        }

        button,label{
            font-size: 0.75rem !important;
        }

        p,li,ul,a,input,select,textarea,span[class*="info-code"],span[class*="info-name"],.selectize-input,span{
            font-size: 0.8rem !important;
        }
        .bootstrap-tagsinput{
            font-size: 0.8rem !important;
        }
        .logo-single{
            background:url("{{ asset('asset_dore/images/sai_icon/SAKU2021.svg') }}") no-repeat;
            background-size: 150px;
            background-position-y: center;
            width:160px;
            height:45px;
            margin-bottom:30px;
        }
        .form-side{
            margin: 0 auto;
        }
        input{
            border-radius: 10px !important;
        }
        /* button{
            border-radius: 15px !important;
        } */
        .footer-content{
            width:60%;
            padding: 0 150px
        }
        @media (max-width: 991px) {
            .footer-content{
                width:100%;
                padding: 0;
            }
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
            top: 0px;right: 10px;left: unset;width: 40px;height: 40px;background: url("{{ asset('img/hide.svg') }}") no-repeat;background-blend-mode: lighten;background-size: 22px;background-position-x: center;background-position-y: center;opacity: 0.5;cursor: pointer;
        }
        #btn-lihat
        {
            position: absolute;
            top: 36px;
            font-size: 0.75rem !important;
            right: 25px;left: unset;
            height: 40px; opacity: 0.5;cursor: pointer;
        }

        .btn{
            border-radius: 8px !important;
        }

        .form-control {
            padding: 0.1rem 0.5rem; 
            height: calc(1.3rem + 1rem);
            border-radius:0.5rem !important;
            
        }
        .auth-card .form-side {
            width: 50%;
            padding: 80px; }
        .register-form {
            margin-top: -16px;
        }
        .btn-wizard {
            margin-top: 110px !important;
        }
        .keterangan-pembukuan {
            height: 50px;
            width: 350px;
            padding: 8px;
            margin-top: 100px;
            border-radius: 10px;
            background-color: #ffffd5;
        }
        .choose-saldo-awal-custom-1 {
           cursor: pointer;
           background-color: #eeeeee;
           height: 170px;
           width: 160px;
           padding: 8px 4px;
           border-radius: 10px;
        }
        .choose-saldo-awal-custom-2 {
           cursor: pointer;
           background-color: #a9a9a9;
           height: 170px;
           width: 160px;
           padding: 8px 4px;
           border-radius: 10px;
        }
        input[type='radio'] {
            position: absolute;
        }
        input[type='radio']:after {
            width: 15px;
            height: 15px;
            border-radius: 15px;
            top: -2px;
            left: -1px;
            position: relative;
            background-color: #fff;
            content: '';
            display: inline-block;
            visibility: visible;
            border: 2px solid white;
        }
        input[type='radio']:checked:after {
            background:#6495ED;
        }
        .saldo-awal-label {
            cursor: pointer;
            margin-top: 24px;
            margin-left: 16px;
        }
        .label-radio-saldo {
            cursor: pointer;
            margin-left: 8px;
            margin-top: 24px;
        }
        .custome-akun-config {
            height: 220px;
            border-radius: 15px;
            width: 470px;
            padding: 8px;
            background-color: #eeeeee;
        }
        .judul-doc-custome {
            padding-top: 8px;
            padding-left: 16px;
        }
        .list-doc-custome {
            list-style: none;
            margin-left: -24px;
        }
        .saldo-awal-form {
            margin-left: 2px;
        }
        .btn-light.btn-register {
            background-color: #0058e4;
            color: #fff;
            outline: none !important;
            box-shadow: none !important;
        }
        .data-akun {
            border: 1px solid #000;
            height: 450px;
        }
        .sw-main.sw-theme-check>ul.step-anchor>li.active>a:after {
            background: #0058e4 !important;
        }
        .sw-main>ul.step-anchor>li.active>a {
            color: #0058e4 !important;
        }
        #form-wizard-area.form-side {
            width: 40%;
        }
        @media (max-width: 991px) {
            .auth-card .image-side {
                width: 100%;
                padding: 30px; }
            .auth-card .form-side {
                width: 100%;
                padding: 30px; } 
        }
        
    </style>

    <script src="{{ asset('asset_dore/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.validate/additional-methods.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/jquery.smartWizard.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('asset_dore/js/dore.script.js') }}"></script>
    <script src="{{ asset('asset_dore/js/vendor/bootstrap-notify.min.js') }}"></script>
    <script>
        var $public_asset = "{{ asset('asset_dore') }}/";
        var $theme = "dore.light.redruby.min.css";
    </script>
    <script src="{{ asset('asset_dore/js/scripts.js') }}"></script>
    <script>
        $('div.theme-colors').hide();
    </script>
    <!-- <script src="{{ asset('asset_dore/js/loading.js') }}"></script> -->
</head>
<body class="background show-spinner" style="border-radius:0 !important">
    <div class=""></div>
    <main id="register-1">
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card" style="box-shadow:none">
                        <div class="form-side">
                        <a href="#" style="display: block;text-align: center;">
                                <span class="logo-single"></span>
                            </a>
                            <form method="POST" id="form-register" class="register-form">
                                @csrf
                                @if(Session::has('alert'))
                                <div class="alert alert-danger rounded" role="alert" style="border-radius: 0.5rem !important;">
                                    {{ Session::get('alert') }}
                                </div>
                                @endif
                                <div class="form-row mt-1">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <label for="nama">Nama</label>
                                                <input class="form-control" type="text" id="nama" name="nama">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mt-1">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <label for="nama">Email</label>
                                                <input class="form-control" type="email" id="email" name="email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mt-1">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <label for="telp">No. Telp</label>
                                                <input class="form-control" type="text" id="telp" name="telp">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-top: -0.5rem;">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="status-wa" name="statusWa">
                                            <label class="custom-control-label" for="status-wa">Whatsapp aktif</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <label for="password">Password</label>
                                                <input class="form-control" type="password" name="password" placeholder="" id="password">
                                                <span id="btn-lihat">Lihat</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <button class="btn btn-light btn-register btn-block" id="btn-register-1" type="button">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="page-footer" style="border:none">
            <div class="footer-content" style="margin: 0 auto !important;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-10 mx-auto my-auto">
                            <div class="row" style="margin:0 auto;">
                                <div class="col-12 col-sm-12 text-center"><span style="font-size: 9px !important;">&copy;2020 PT Samudra Aplikasi Indonesia</span></div>
                            </div>
                        </div>                
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <main id="register-2">
        <div class="container">
            <div class="row h-100">
                <div class="col-12 mx-auto my-auto">
                    <div class="card card-auth" style="box-shadow: none;">
                        <div id="form-wizard-area" class="form-side">
                            <div id="smartWizardValidation">
                                <ul class="card-header">
                                    <li><a href="#step-0">Langkah 1<br /><small>Data Perusahaan</small></a></li>
                                    <li><a href="#step-1">Langkah 2<br /><small>Periode Pembukuan</small></a></li>
                                    <li><a href="#step-2">Langkah 3<br /><small>Saldo Awal</small></a></li>
                                </ul>
                                 <div class="card-body">
                                    <div id="step-0">
                                        <form id="form-step-0" class="tooltip-label-right" novalidate>
                                            <div class="form-group position-relative">
                                                <label for="nama_perusahaan">Nama Perusahaan</label>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <select name="jenis_perusahaan" id="jenis_perusahaan" class="form-control">
                                                            <option value="PT" selected>PT</option>
                                                            <option value="CV">CV</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-8">
                                                        <input class="form-control" type="text" name="nama_perusahaan" id="nama_perusahaan">
                                                    </div>
                                                    <div class="col-12 mt-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="status-perusahaan" name="statusPerusahaan">
                                                            <label class="custom-control-label" for="status-perusahaan">Pribadi</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group position-relative">
                                                <label for="nama_perusahaan">Alamat</label>
                                                <input type="text" class="form-control" name="alamat" id="alamat">
                                            </div>
                                            <div class="form-group position-relative">
                                                <label for="telp_perusahaan">No. Telepon Perusahaan</label>
                                                <input type="text" class="form-control" name="telp_perusahaan" id="telp_perusahaan" >
                                            </div>
                                            <div class="form-group position-relative">
                                                <label for="jenis_usaha">Jenis Usaha</label>
                                                <select class="form-control" name="jenis_usaha" id="jenis_usaha">
                                                    <option value="DG" selected>Dagang</option>
                                                    <option value="JS">Jasa</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="step-1">
                                        <form id="form-step-1" class="tooltip-label-right" novalidate>
                                            <div class="form-group position-relative">
                                                <label for="periode_pembukuan">Periode mulai pembukuan</label>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <select name="tanggal" id="tanggal" class="form-control">
                                                            <option disabled selected>Tanggal</option>
                                                            @for ($i = 1; $i <= 31; $i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-4">
                                                        <select name="bulan" id="bulan" class="form-control">
                                                            <option disabled selected>Bulan</option>
                                                            <option value="01">Januari</option>
                                                            <option value="02">Februari</option>
                                                            <option value="03">Maret</option>
                                                            <option value="04">April</option>
                                                            <option value="05">Mei</option>
                                                            <option value="06">Juni</option>
                                                            <option value="07">Juli</option>
                                                            <option value="08">Agustus</option>
                                                            <option value="09">September</option>
                                                            <option value="10">Oktober</option>
                                                            <option value="11">November</option>
                                                            <option value="12">Desember</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-4">
                                                        <select name="tahun" id="tahun" class="form-control">
                                                            <option disabled selected>Tahun</option>
                                                            <option value="{{ date('Y') }}">{{ date('Y') }}</option>
                                                            <option value="{{ date('Y', strtotime('+1 year')) }}">{{ date('Y', strtotime('+1 year')) }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="keterangan-pembukuan">
                                            <p>Periode pembukuan merupakan periode awal anda memulai melakukan 
                                            pencatatan transaksi di sistem esaku.</p>
                                        </div>
                                    </div>
                                    <div id="step-2">
                                        <form id="form-step-2" class="tooltip-label-right" novalidate>
                                            <div id="saldo-awal-jenis" class="row">
                                                <div class="col-6">
                                                    <div class="choose-saldo-awal-custom-1">
                                                        <input type="radio" name="saldo-awal" id="custome" value="0">
                                                        <label for="custome" class="saldo-awal-label">
                                                            <p style="text-align: center;">Custome Akun</p>
                                                            <p>Bagi anda yang sudah memiliki standar akun Akuntansi.</p>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="choose-saldo-awal-custom-2">
                                                        <input type="radio" name="saldo-awal" id="standar" value="1">
                                                        <label for="standar" class="saldo-awal-label">
                                                            <p style="text-align: center;">Standar Akun</p>
                                                            <p>Kami memberikan referensi standarisasi akun 
                                                            dalam akuntansi.</p>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="custome-akun-config" class="custome-akun-config">
                                                <div class="doc-custome-akun">
                                                    <p class="judul-doc-custome">Custome Akun</p>
                                                    <ul class="list-doc-custome">
                                                        <li>1. Download format template saldo awal.</li>
                                                        <li>2. Sesuaikan saldo awal anda dengan format template yang kami sediakan.</li>
                                                        <li>3. Upload saldo awal anda yang sesuai dengan format kami.</li>
                                                    </ul>
                                                    <div class="row saldo-awal-form">
                                                        <div class="col-6">
                                                            <div class="form-group position-relative">
                                                                <input type="text" class="form-control" name="saldo_awal" id="saldo_awal" placeholder="Masukkan saldo awal manual">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <button type="button" class="btn btn-light btn-register">Download</button>
                                                        </div>
                                                        <div class="col-3">
                                                            <input type="file" name="upload-akun" id="upload-akun" style="display: none;">
                                                            <button type="button" class="btn btn-light btn-register">Upload</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="btn-toolbar custom-toolbar text-center card-body btn-wizard">
                                    <button class="btn btn-light btn-register prev-btn" type="button">Sebelumnya</button>
                                    <button class="btn btn-light btn-register next-btn" type="button">Selanjutnya</button>
                                    <button id="btn-done" class="btn btn-light btn-register finish-btn" type="button">Selanjutnya</button>
                                </div>
                            </div>
                        </div>
                        <div id="table-data-akun" class="table-data-akun">
                            <div id="table-data-akun-header" class="row w-100">
                                <div class="col-12">
                                    <button class="btn btn-light btn-register float-right" type="submit">Simpan</button>
                                    <button id="tambah-akun" class="btn btn-light btn-register float-right" type="button">Tambah Akun</button>
                                    <button class="btn btn-light btn-register float-right" type="button">Lihat Laporan</button>
                                </div>
                                <div class="col-12 mt-1 data-akun" id="data-akun">
                                    <table class="table table-borderless" id="table-akun">
                                        <thead>
                                            <tr>
                                                <th>Kode Akun</th>
                                                <th>Nama Akun</th>
                                                <th>Jenis Akun</th>
                                                <th>Nilai</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            localStorage.setItem('dore-theme-color', 'dore.light.blueyale.min.css');
            var $value = "";
            $('#register-1').show();
            $('#register-2').hide();
            $('#custome-akun-config').hide();
            $('#table-data-akun').hide();

            $('.finish-btn').click(function(){
                if($value == "") {
                    alert('Harap pilih salah satu untuk input akun')
                    return;
                }
                
                $('#form-wizard-area').hide();
                $('#table-data-akun').show();

                if($value === "0") {
                    $('#tambah-akun').hide();
                } else {
                    $('#tambah-akun').show();
                }
            })

            $('#btn-register-1').click(function(){
                $('#register-1').hide();
                $('#register-2').show();
            });

            $('#saldo-awal-jenis input:radio').click(function(){
                var value = $(this).val();
                $value = value;
                if(value === "0") {
                    $('#saldo-awal-jenis').hide();
                    $('#custome-akun-config').show();
                }
            })

            $('body').addClass('dash-contents');

            $('#btn-lihat').click(function(){
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                    $("#btn-lihat").html("Sembunyikan");
                } else {
                    x.type = "password";
                    $("#btn-lihat").html("Lihat");
                }
            });
        });
    </script>
</body>

</html>