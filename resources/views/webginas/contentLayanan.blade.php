<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
        span.lines::before {
            background-color: white;
        }
        span.lines::after {
            background-color: white
        }
        span.lines.close::before {
            background-color: black;
        }
        span.lines.close::after {
            background-color: black
        }
        span.logo-default {
            font-size: 20px !important;
        }
        h2::before{
            background-color: #DD1F1A !important;
            width: 200px !important;
            margin-left: 50px !important;
        }
        header.sticky-active > .header-inner > .container > #logo > a > span.name {
            color: black !important;
        }
        .white {
            color: white !important;
        }
        .black{
            color: black !important;
        }
        ul {
            list-style-type: none;
        }
        .list-submenu-text:hover {
            color: #DD1F1A;
            font-weight: bold;
            cursor: pointer;
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
        .box-layanan {
            margin: 0 0 10px 0;
        }
        @media (max-width: 768px) {
            .misi-box {
                height: 500px;
            }
            p.list-submenu-text {
                color: black !important;
            }
            .white {
                color: white !important;
            }
            .black{
                color: black !important;
             }
            .menu-prime {
                color: black !important;
            }
            .box-layanan {
                margin: 0 0 20px 0;
            }
        }
    </style>
</head>

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        <header id="header" data-fullwidth="true" data-transparent="true">
            <div class="header-inner">
                <div class="container">
                    <!--Logo-->
                    <div id="logo">
                        <a href="{{url('/webginas2/')}}">
                            <span class="watch-class white judul logo-default" style="font-size: 32px;"><img src="{{ asset('asset_web/img/LOGO TJ baru.png') }}" width="40px" class="mr-2"> PT. Trengginas Jaya</span>
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
                        <a class="lines-button x open-menu"><span class="lines background-white"></span></a>
                    </div>
                    <!--end: Navigation Resposnive Trigger-->
                    <!--Navigation-->
                    <div id="mainMenu">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li><a href="{{url('/webginas2/')}}" class="a_link watch-class white menu-prime" data-href="fHome">Home</a></li>
                                    <li class="dropdown mega-menu-item"><a href="#" class="a_link watch-class white menu-prime" data-href="fLayanan">Layanan</a>
                                        <ul class="dropdown-menu">
                                            <li class="mega-menu-content">
                                                <div class="row" id="menu-layanan">

                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="{{url('/webginas2/perusahaan')}}" class="a_link watch-class white menu-prime" data-href="fPerusahaan">Perusahaan</a></li>
                                    <li><a href="{{url('/webginas2/kontak')}}" class="a_link watch-class white menu-prime" data-href="fKontak">Kontak</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!--END: NAVIGATION-->
                </div>
            </div>
        </header>
        <!-- end: Header -->
        <!-- Page title -->
        <section id="page-title" class="page-title-center text-light" style="background-color:#DD1F1A;">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="page-title">
                    <h1 style="font-weight: bold;">Layanan</h1>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Layanan</a></li>
                        <li><a href="#">{{$content['nama_layanan']}}</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <!-- Content -->
        
        <!-- List Layanan-->
        <section>
            <div class="container">
                <div class="heading-text heading-section m-b-80" style="display: flex;justify-content:center;align-items:center;">
                    <h2>{{$content['nama_layanan']}}</h2>
                </div>
                <div class="row">

                    @foreach ($detail as $item)
                    <div class="col-lg-4 box-layanan">
                        <div class="border" style="height:229px;padding: 10px;">
                            <a href="{{url('webginas2/layanan')}}/{{$item['id_layanan']}}/{{$item['id_sublayanan']}}"><h2 style="color: #DD1F1A;">{{$item['nama_sublayanan']}}</h2></a>
                            <div style="padding:5px 0 0 5px;">
                                {!!
                                    $item['deskripsi_singkat']
                                !!}
                            </div>
                            <div style="position: absolute;bottom:0;margin-bottom: 10px;">
                                <a href="{{url('webginas2/layanan')}}/{{$item['id_layanan']}}/{{$item['id_sublayanan']}}" class="item-link">Selengkapnya <i class="icon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>    
                    @endforeach

                </div>
            </div>
        </section>
        <!-- End List Layanan-->

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
                                 <address>
                                     <strong>Alamat:</strong><br>
                                     Jl. Sumur Bandung No. 12, Bandung<br>
                                 </address>
                                 <strong>Telp:</strong> (022) 253205
                                 <br>
                                 <strong>Fax:</strong> (022) 2532053
                                 <br>
                                 <strong>Email:</strong> trengginasjaya@yahoo.co.id
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

        <!-- end: Content -->
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
    <a href="http://wa.me/6282240011462" target="_blank"><img id="whatsapp" alt="whatsapp" class="whatsapp" height="40" width="40" src="{{ asset('asset_web/homepages/icon/whatsapp.png') }}"/></a>
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <script src="{{ asset('asset_web/js/jquery.js') }}"></script>
    <script src="{{ asset('asset_web/js/plugins.js') }}"></script>
    <!--Template functions-->
    <script src="{{ asset('asset_web/js/functions.js') }}"></script>
    <script type="text/javascript">
        var whatsapp = $('#whatsapp');
        window.onscroll = function() {
            scrollFunction();
        }

        $.ajax({
            type:'GET',
            url: "{{ url('webginas2/api-layanan') }}",
            dataType: 'JSON',
            success: function(result) {
                var data = Object.entries(result.daftar);
                if(result.status) {
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

        function scrollFunction() {
            if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
                whatsapp.removeClass('whatsapp-not-scroll');
                whatsapp.addClass('whatsapp-scroll');
            } else {
                whatsapp.removeClass('whatsapp-scroll');
                whatsapp.addClass('whatsapp-not-scroll');
            }
        }

        function checkHeader(){
            if($(window).width() > 768) {
                if($('#header').hasClass('sticky-active')) {
                    $('.watch-class').removeClass('white');
                    $('.watch-class').addClass('black');                
                } else {
                    $('.watch-class').removeClass('black');
                    $('.watch-class').addClass('white');
                }
            }
        }
        setInterval(checkHeader, 500);

        $('.open-menu').click(function(){
            var children = $(this).children();
            children.toggleClass('close');
            var judul = $('.judul');
            if(judul.hasClass('white')) {
                judul.removeClass('white');
                judul.addClass('black');
            } else {
                judul.removeClass('black');
                judul.addClass('white');
            }
        })
    </script>
</body>

</html>