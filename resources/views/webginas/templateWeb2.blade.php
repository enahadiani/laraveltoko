<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <!-- <meta name="author" content="INSPIRO" /> -->
    <meta name="description" content="PT Trengginas Jaya">
    <link rel="icon" type="image/png" href="images/favicon.png">   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>PT Trengginas Jaya</title>
    <!-- Stylesheets & Fonts -->
    <link href="{{ asset('asset_web/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_web/css/style.css') }}" rel="stylesheet">
    <style>
        /* .slide0{
            background-image: url("{{ asset('asset_web/homepages/business/WEB TJ NEW PROPERTY.jpg') }}");
        }
        .slide1{
            background-image: url("{{ asset('asset_web/homepages/business/WEB TJ NEW TRADING.jpg') }}");
        }
        .slide2{
            background-image: url("{{ asset('asset_web/homepages/business/WEB TJ NEW OS.jpg') }}");
        } */

        .text-red{
            color:#DD1F1A;
        }

        .bg-red{
            background:#DD1F1A !important;
            border:#DD1F1A !important;
        }
        
        .fa-detective{
            content: url("{{ asset('asset_web/homepages/layanan/detective.svg') }}");
            width:100px !important;
            height:100px !important;
        }
        .fa-car2{
            content: url("{{ asset('asset_web/homepages/layanan/car.svg') }}");
            width:100px !important;
            height:100px !important;
        }
        .fa-cleaning-cart{
            content: url("{{ asset('asset_web/homepages/layanan/cleaning-cart.svg') }}");
            width:100px !important;
            height:100px !important;
        }
        .fa-food-tray{
            content: url("{{ asset('asset_web/homepages/layanan/food-tray.svg') }}");
            width:100px !important;
            height:100px !important;
        }
        .fa-building{
            content: url("{{ asset('asset_web/homepages/layanan/building.svg') }}");
            width:100px !important;
            height:100px !important;
        }
        .fa-parking{
            content: url("{{ asset('asset_web/homepages/layanan/parking.svg') }}");
            width:100px !important;
            height:100px !important;
        }
        .fa-teacher{
            content: url("{{ asset('asset_web/homepages/layanan/teacher.svg') }}");
            width:100px !important;
            height:100px !important;
        }
        .fa-network-connection{
            content: url("{{ asset('asset_web/homepages/layanan/teacher.svg') }}");
            width:100px !important;
            height:100px !important;
        }

        .heading-text.heading-section h2::before {
            background-color:#DD1F1A !important;
        }

        .inspiro-slider.arrows-dark .flickity-button:hover, .carousel.arrows-dark .flickity-button:hover {
            background:#DD1F1A !important;
        }
        #scrollTop::after, #scrollTop::before 
        {
            background:#DD1F1A !important;
        }
        h2::before{
            background-color: #DD1F1A !important;
            width: 200px !important;
            margin-left: 50px !important;
        }
        h2.client::before{
            background-color: #DD1F1A !important;
            width: 200px !important;
            margin-left: 30px !important;
        }
        span.counter-klien::after{
            content: '+';
        }
        span.counter-nilai::after{
            content: ' M+';
        }
        span.counter-nilai::before{
            content: 'Rp ';
        }
        span.logo-default {
            font-size: 20px !important;
        }

        .list-submenu-text:hover {
            color: #DD1F1A;
            font-weight: bold;
            cursor: pointer;
        }

        .list-layanan {
            color: black;
        }
        .list-layanan:hover {
            color: #DD1F1A;
            font-weight: bold;
            cursor: pointer;
        }

        .nilai-proyek {
            margin-left:115px;
        }
        img.whatsapp-scroll {
            position: fixed;
            bottom: 70px;
            right: 25px;
            z-index: 99;
        }

        img.whatsapp-not-scroll {
            position: fixed;
            bottom: 20px;
            right: 25px;
            z-index: 99;
        }
        
        .iso {
            position: absolute;
            margin-left:110px;
            display:flex;
        }

        .border-head {
            text-align:center;
            padding:30px;
            background-color:#DD1F1A;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        @media (max-width: 768px) {
            /* .slide0{
                background-image: url("{{ asset('asset_web/homepages/business/WEB TJ MOBILE OS.jpg') }}");
            }
            .slide1{
                background-image: url("{{ asset('asset_web/homepages/business/WEB TJ MOBILE TRADING.jpg') }}");
             }
            .slide2{
                background-image: url("{{ asset('asset_web/homepages/business/WEB TJ MOBILE PROPERTY.jpg') }}");
            } */
            .layanan-container {
                margin-top: -70px;
            }
            .layanan-box {
                margin: 20px;
            }
            .nilai-proyek {
                margin-left: 0;
            }
            .berita {
                margin: 5px;
            }
            .iso {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        <header id="header" data-fullwidth="true" class="header-always-fixed header-mini">
            <div class="header-inner">
                <div class="container">
                    <!--Logo-->
                    <div id="logo">
                        <a href="{{url('/webginas2/')}}">
                            <span class="logo-default"><img src="{{ asset('asset_web/img/LOGO TJ baru.png') }}" width="40px" class="mr-2"> PT. Trengginas Jaya</span>
                            <span class="logo-dark">PT. Trengginas Jaya</span>
                        </a>
                    </div>
                    <!--End: Logo-->
                    <!-- Search -->
                    <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x"></i></a>
                        <form class="search-form" action="search-results-page.html" method="get">
                            <input class="form-control" name="q" type="text" placeholder="Type & Search..." />
                            <span class="text-muted">Start typing & press "Enter" or "ESC" to close</span>
                        </form>
                    </div>
                    <!-- end: search -->
                  
                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <!--end: Navigation Resposnive Trigger-->
                    <!--Navigation-->
                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="{{url('/webginas2/')}}" class="a_link" data-href="fHome">Home</a></li>
                                    <li class="dropdown mega-menu-item"><a href="#" class="a_link" data-href="fLayanan">Layanan</a>
                                        <ul class="dropdown-menu">
                                            <li class="mega-menu-content">
                                                <div class="row" id="menu-layanan">

                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{url('/webginas2/perusahaan')}}" class="a_link" data-href="fPerusahaan">Perusahaan</a></li>
                                    <li><a href="{{url('/webginas2/kontak')}}" class="a_link" data-href="fKontak">Kontak</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--end: Navigation-->
                </div>
            </div>
        </header>
        <!-- end: Header -->

        <!-- Inspiro Slider -->
        <div id="slider" class="inspiro-slider slider-halfscreen dots-dark arrows-dark dots-creative" data-fade="true" data-height-xs="360">

            <!-- Slide 0 -->
            <div class="slide slide-web background-image slide-0" ></div>
            <!-- end: Slide 0 -->

            <!-- Slide 1 -->
            <div class="slide slide-web background-image slide-1" ></div>
            <!-- end: Slide 1 -->

            <!-- Slide 2 -->
            <div class="slide slide-web background-image slide-2" ></div>
            {{-- <div class="slide slide-mobile background-image slide-web-2" ></div> --}}
            <!-- end: Slide 2 -->
        </div>
        <!--end: Inspiro Slider -->  
        
        
        <!-- ABOUT ME -->
        <section id="easy-fast" class="text-light p-b-40" style="background-color:#973735;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="100">
                        <div class="heading-text heading-section">
                            <h1 class="text-medium">Tentang Perusahaan</h1>
                        </div>
                    </div>

                    <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="300">
                        PT. Trengginas Jaya merupakan salah satu perusahaan subsidiary dari Yayasan Pendidikan Telkom
                        /Telkom Foundation yang berdiri sejak tahun 20012. Sebagai perusahaan penyedia pengeloaan jasa
                        Outsourcing, Bussiness retail, dan Property.
                    </div>

                    <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="600">
                        PT. Trengginas Jaya memegang komitmen untuk menjaga kualitas, mengutamakan dan meningkatkan
                        kepuasan pelanggan, menjaga kelestarian lingkungan dan menjaga serta meningkatkan kesehatan dan
                        keselamatan.
                    </div>

                </div>
            </div>
        </section>
        <!-- end: ABOUT ME -->

        <!-- Layanan Kami -->
        <section>
            <div class="container">

                <div class="heading-text heading-section m-b-80" style="display: flex;justify-content:center;align-items:center;">
                    <h2 class="judul-layanan">Layanan Kami</h2>
                </div>

                <div class="row layanan-container">

                </div>
            </div>
        </section>
        <!-- END Layanan Kami -->

        <!-- Mengapa memilih kami -->
        <section class="p-t-100 p-b-100" data-bg-parallax="{{ asset('asset_web/homepages/parallax/worker.jpg') }}">
             <div class="bg-overlay"></div>
                <div class="container xs-text-center sm-text-center text-light">
                    <div class="row">
                        <div class="col-lg-5 p-b-60">
                            <h2>Mengapa memilih<br>kami?</h2>
                            <p class="lead">Kami selalu meningkatkan mutu, inovatif, dan kerjasama strategis untuk memberikan kepuasan kepada pelanggan</p>
                        </div>
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <div class="counter text-lg"> 
                                            <span  class="counter-klien" data-speed="3000" data-refresh-interval="50" data-to="35" data-from="10" data-seperator="true"></span> 
                                        </div>
                                        <p>Klien Aktif</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <div class="counter text-lg"> <span data-speed="4500" data-refresh-interval="23" data-to="2500" data-from="100" data-seperator="true"></span> </div>
                                        <p>Outsourcing Aktif</p>
                                    </div>
                                </div>
                                <div class="col-lg-12" style="padding-bottom: 10px;">
                                    <div class="nilai-proyek" style="margin-bottom: 40px;">
                                        <div class="counter text-lg"> <span class="counter-nilai" data-speed="2000" data-refresh-interval="23" data-to="10" data-from="0" data-seperator="true"></span> </div>
                                        <div class="keterangan-proyek">
                                            <p>Nilai kemampuan pelaksanaan proyek</p>
                                            <p>Nilai kemampuan pemenuhan barang jasa</p>
                                        </div>
                                    </div>
                                    <div class="iso">
                                        <img style="margin-right: 20px;" src="{{ asset('asset_web/homepages/iso/ISO 90012015.png') }}" height="100" width="100" />
                                        <img style="margin-right: 20px;" src="{{ asset('asset_web/homepages/iso/Logo-ISO-14001.png') }}" height="100" width="100" />
                                        <img src="{{ asset('asset_web/homepages/iso/ISO 45001 Logo.png') }}" height="100" width="90" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- end: Mengapa memilih kami -->

        <!-- REVIEWS -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12">
                        <h2>Apa yang Klien katakan tentang kami?</h2>
                        <p class="lead">Cerita asli yang disampaikan atas pengalaman mereka menggunakan jasa kami.</p>
                    </div>

                    <div class="col-lg-7">
                        <div class="carousel arrows-visibile testimonial testimonial-single testimonial-left" data-items="1" data-animate-in="fadeIn" data-animate-out="fadeOut" data-arrows="false">
                            
                            @foreach ($review as $item)
                                <div class="testimonial-item">
                                    <img src="{{ config('api.url') }}admginas-auth/storage/{{$item['file_gambar']}}" alt="">
                                    <p>{{ $item['deskripsi']}} </p>
                                    <span>{{ $item['nama_client'] }}</span>
                                    <span>{{ $item['jabatan'] }} {{ $item['nama_perusahaan'] }}</span>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- end features box -->
                </div>
            </div>
        </section>
        <!-- end: REVIEWS -->

        <!-- CLIENTS -->
        <section>
            <div class="container">
                <div class="heading-text heading-section m-b-80" style="display: flex;justify-content:center;align-items:center;">
                    <h2 class="client">Klien Kami</h2>
                </div>
                <p class="lead text-center" style="margin-top: -90px;padding-bottom:25px;">Klien yang sudah mempercayai untuk bekerjasama dengan kami. </p>
                <ul class="grid grid-5-columns daftar-klien">
                    
                </ul>

            </div>
        </section>
        <!-- CLIENTS -->

        <!-- BLOG -->
        <section id="section-blog" class="content background-grey pb-0">
            <div class="container">

                <div class="heading-text heading-section text-center" style="display: flex;justify-content:center;align-items:center;">
                    <h2>Info Terbaru</h2>
                </div>


                <div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">
                    @foreach ($info as $item)
                    <div class="post-item border berita">
                        <div class="post-item-wrap" style="height: 437px !important;">
                            <div class="post-image">
                                <a href="{{url('webginas2/berita/'.$item['id_info'])}}">
                                    <img alt="" src="{{ config('api.url') }}admginas-auth/storage/{{$item['file_gambar']}}">
                                </a>
                            </div>
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{ $item['tanggal'] }}</span>
                                <h2>
                                    <a href="{{url('webginas2/berita/'.$item['id_info'])}}">
                                        {{ $item['judul'] }}
                                    </a>
                                </h2>
                                <a style="position:absolute;bottom: 0;margin-bottom:10px;" href="{{url('webginas2/berita/'.$item['id_info'])}}" class="item-link text-red">Selengkapnya <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>    
                    @endforeach
                </div>
                <div class="heading-text heading-section text-center py-0">
                    <a href="{{url('/webginas2/berita')}}"><button type="button" class="btn btn-rounded btn-reveal btn-lg bg-red"><span>Selengkapnya</span><i class="icon-chevron-right"></i></button></a>
                </div>
            </div>
        </section>
        <!-- end: BLOG -->
        <!-- LATEST WORK -->
        <section class="p-b-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 m-b-30" data-animate="fadeInLeft">

                        <div class="carousel" data-items="1">
                            <a href="{{ asset('asset_web/homepages/kegiatan/Rectangle23.png') }}" data-lightbox="gallery-image" title="Your image title here!"><img src="{{ asset('asset_web/homepages/kegiatan/Rectangle23.png') }}" alt=""></a>

                            <a href="{{ asset('asset_web/homepages/kegiatan/2.jpg') }}" data-lightbox="gallery-image" title="Your image title here!"><img src="{{ asset('asset_web/homepages/kegiatan/2.jpg') }}" alt=""></a>

                            <a href="{{ asset('asset_web/homepages/kegiatan/3.jpg') }}" data-lightbox="gallery-image" title="Your image title here!"><img src="{{ asset('asset_web/homepages/kegiatan/3.jpg') }}" alt=""></a>

                        </div>

                    </div>
                    <div class="col-lg-5 p-l-40 p-r-40" data-animate="fadeInRight">
                        <div class="m-b-40">
                            <h2>Kegiatan Kami</h2>
                            <p>Kami bekerja dengan semangat tinggi. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- LATEST WORK -->

        <!-- Contact -->
        <section class="p-t-100 background-grey p-b-200" style="background-position:71% 22%;">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-6">
                         <div class="row">
                             <div class="col-lg-12">
                                 <h2 class="m-b-10">Hubungi Kami</h2>
                             </div>
                             <div class="col-lg-6 m-b-30">
                                 <strong>Alamat:</strong><br>
                                 <span id="alamat"></span><br>
                                 <strong>Telp:</strong> <span id="telp"></span>
                                 <br>
                                 <strong>Fax:</strong> <span id="fax"></span>
                                 <br>
                                 <strong>Email:</strong> <span id="email"></span>
                             </div>
                             <div class="col-lg-12 m-b-30">
                                 <h4>Sosial Media</h4>
                                 <div class="social-icons social-icons-light social-icons-colored-hover">
                                     <ul>
                                         <li class="social-facebook"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                         </li>
                                         <li class="social-twitter"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                         <li class="social-instagram"><a href="#"><i class="fab fa-instagram"></i></a>
                                         <li class="social-youtube"><a href="#"><i class="fab fa-youtube"></i></a></li>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-5 offset-1">
                         <form class="widget-contact-form" novalidate action="include/contact-form.php" role="form" method="post">
                             <div class="row">
                                 <div class="form-group col-md-6">
                                     <label for="name">Nama</label>
                                     <input type="text" aria-required="true" required name="widget-contact-form-name" class="form-control required name" >
                                 </div>
                                 <div class="form-group col-md-6">
                                     <label for="email">Email</label>
                                     <input type="email" aria-required="true" required name="widget-contact-form-email" class="form-control required email" >
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="message">Pesan</label>
                                 <textarea type="text" required name="widget-contact-form-message" rows="8" class="form-control required" ></textarea>
                             </div>
                             <div class="form-group">
                                 <button class="btn bg-red" type="submit" id="form-submit">Kirim Pesan</button>
                             </div>
                         </form>

                     </div>
                 </div>
             </div>
         </section>
         <!-- end: Contact -->

           <!-- Footer -->
        <footer id="footer">
            <div class="copyright-content">
                <div class="container">
                    <div class="copyright-text text-center">&copy; 2020 PT Trengginas Jaya. All Rights Reserved.</div>
                </div>
            </div>
        </footer>
        <!-- end: Footer -->
    </div>
    <!-- end: Body Inner -->
    <!--Whatsapp-->
    <a id="link-wa" target="_blank"><img id="whatsapp" alt="whatsapp" class="whatsapp" height="40" width="40" src="{{ asset('asset_web/homepages/icon/whatsapp.png') }}"/></a>
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <script src="{{ asset('asset_web/js/jquery.js') }}"></script>
    <script src="{{ asset('asset_web/js/plugins.js') }}"></script>
    <!--Template functions-->
    <script src="{{ asset('asset_web/js/functions.js') }}"></script>
    <script type="text/javascript">
        var mobile = [];
        var web = [];
        $.ajax({
            type:'GET',
            url: "{{ url('webginas2/api-banner') }}",
            dataType: 'JSON',
            success: function(result) {
                if(result.status) {
                    var url = "{{ config('api.url') }}";
                    for(var i=0;i<result.daftar.length;i++) {
                        web.push(result.daftar[i].file_gambar);
                    }
                    for(var i=0;i<result.mobile.length;i++) {
                        mobile.push(result.mobile[i].file_gambar)
                    }
                    if($(window).width() > 768) {
                        for(var i=0;i<result.daftar.length;i++) {
                            $('.slide-'+i).css('background-image', `url('`+url+`admginas-auth/storage/${result.daftar[i].file_gambar}')`);
                        }

                    } else {
                        for(var i=0;i<result.mobile.length;i++) {
                            $('.slide-'+i).css('background-image', `url('`+url+`admginas-auth/storage/${result.mobile[i].file_gambar}')`);
                        }
                    }
                }
            }
        });

        $.ajax({
            type:'GET',
            url: "{{ url('webginas2/api-layanan') }}",
            dataType: 'JSON',
            success: function(result) {
                var data = Object.entries(result.daftar); 
                if(result.status) {
                    var html = "";
                    var height = (result.jumlah[0].jumlah * 10) + 20 + '%';
                    for(var i=0;i<data.length;i++) {
                        html += "<div class='col-lg-4 col-sm-12 layanan-box'>";
                        html += "<div class='border' style='padding: 0;border-radius: 15px;height:"+height+";'>";
                        html += "<a href='{{url('webginas2/layanan')}}/"+data[i][0]+"'>";
                        html += "<div class='border-head'>";
                        html += "<h4 style='color:white;'>"+data[i][1][0]['nama_layanan']+"</h4>"
                        html += "</div>";
                        html += "</a>";
                        html += "<div style='padding:15px 0 30px 10px;'>";
                        html += "<ol style='margin-left: 20px;'>";
                            for(var j=0;j<data[i][1].length;j++) {
                                html += "<a href='{{ url('webginas2/layanan') }}/"+data[i][1][j]['id_layanan']+"/"+data[i][1][j]['id_sublayanan']+"'><li class='list-layanan'>"+data[i][1][j]['nama_sublayanan']+"</li></a>"
                            }
                        html += "</ol>"
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";   
                    }
                    $('.layanan-container').append(html);
                    var menu = "";
                    for(var i=0;i<data.length;i++) {
                        menu += "<div class='col-lg-4'>";
                        menu += "<ul class='layanan-menu'>";
                        menu += "<a href='{{url('webginas2/layanan')}}/"+data[i][0]+"'><h5 style='font-weight: bold;padding-bottom:25px;'>"+data[i][1][0]['nama_layanan']+"</h5></a>"
                            for(var j=0;j<data[i][1].length;j++) {
                                menu += "<a href='{{ url('webginas2/layanan') }}/"+data[i][1][j]['id_layanan']+"/"+data[i][1][j]['id_sublayanan']+"'><li class='list-submenu'><p class='list-submenu-text'>"+data[i][1][j]['nama_sublayanan']+"</p></li></a>"
                            }
                        menu += "</ul>";
                        menu += "</div>";   
                    }
                    $('#menu-layanan').append(menu);
                }
            }
        });

        $.ajax({
            type:'GET',
            url: "{{ url('webginas2/api-kontak') }}",
            dataType: 'JSON',
            success: function(result) {
                if(result.status) {
                    var data = result.daftar[0];
                    $('#alamat').text(data.alamat);
                    $('#telp').text(data.no_telp);
                    $('#fax').text(data.no_fax);
                    $('#email').text(data.email);
                }
            }
        });

        $.ajax({
            type:'GET',
            url: "{{ url('webginas2/api-wa') }}",
            dataType: 'JSON',
            success: function(result) {
                if(result.status) {
                    $('#link-wa').attr('href', result.daftar[0].link_wa)
                }
            }
        });

        $.ajax({
            type:'GET',
            url: "{{ url('webginas2/api-klien') }}",
            dataType: 'JSON',
            success: function(result) {
                if(result.status) {
                    var html = "";
                    var url = "{{ config('api.url') }}";
                    for(var i=0;i<result.daftar.length;i++ ) {
                        html += "<li>";
                        html += "<a href='#'>";
                        html += "<img height='90' src='"+url+"admginas-auth/storage/"+result.daftar[i].file_gambar+"' alt=''/>";
                        html += "</a>";
                        html += "</li>";
                    }

                    $('.daftar-klien').append(html);
                }
            }
        });

        var whatsapp = $('#whatsapp');
        window.onscroll = function() {
            scrollFunction();
        }

        function scrollFunction() {
            if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
                whatsapp.removeClass('whatsapp-not-scroll');
                whatsapp.addClass('whatsapp-scroll');
            } else {
                whatsapp.removeClass('whatsapp-scroll');
                whatsapp.addClass('whatsapp-not-scroll');
            }
        }

        $(function() {
            $(window).resize(function() {
                var url = "{{ config('api.url') }}";
                if ($(window).width() < 768) {
                    for(var i=0;i<mobile.length;i++) {
                        $('.slide-'+i).css('background-image', `url('`+url+`admginas-auth/storage/${mobile[i]}')`);
                    }
                }
                else {
                    for(var i=0;i<web.length;i++) {
                        $('.slide-'+i).css('background-image', `url('`+url+`admginas-auth/storage/${web[i]}')`);
                    }
                }
            });
        });
    </script>
</body>

</html>