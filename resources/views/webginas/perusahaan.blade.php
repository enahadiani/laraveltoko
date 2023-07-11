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
        h2::before{
            background-color: #DD1F1A !important;
        }
        header.sticky-active > .header-inner > .container > #logo > a > span.name {
            color: black !important;
        }
        .background-white {
            background-color: white;
        }
        .background-black {
            background-color: black;
        }
        .white {
            color: white !important;
        }
        .black{
            color: black !important;
        }
        .list-submenu-text:hover {
            color: #DD1F1A;
            font-weight: bold;
            cursor: pointer;
        }
        .misi-box{
            background-color: #DD1F1A;
            min-height:400px;
        }
        .pg-2{
            margin-top: 50px;
        }
        span.logo-default {
            font-size: 20px !important;
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
        .highcharts-label, .highcharts-data-label > span > div > div > h4 {
            color: white !important;
        }
        @media (max-width: 768px) {
            .misi-box {
                min-height: 500px;
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
            .pg-2 {
                margin-top: 30px;
            }
            .pg-2-mobile {
                margin-top: 12px;
            }
            #organisasi {
                display: none;
            }
        }
        .col-grid{
            display: grid;
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
                    <div id="search"><a id="btn-search-close" class="btn-search-close" aria-label="Close search form"><i class="icon-x black"></i></a>
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
                    <h1 style="font-weight: bold;">Perusahaan</h1>
                </div>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Home</a>
                        </li>
                        <li><a href="#">Perusahaan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- end: Page title -->
        <!-- Content -->
        
        <!-- About -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="100">
                        <div class="heading-text heading-section m-b-80">
                            <h2>Tentang Kami</h2>
                        </div>
                    </div>
                    <div id="deskripsi-1" class="col-lg-4" data-animate="fadeInUp" data-animate-delay="300">
                        {!!
                            $deskripsi
                        !!}
                        <div id="paragraph-1"></div>
                        <div id="paragraph-3" class="pg-2"></div>
                    </div>
                    <div id="deskripsi-2" class="col-lg-4" style="padding-right:10px;" data-animate="fadeInUp" data-animate-delay="300">
                        <div id="paragraph-2" class="pg-2-mobile"></div>
                        <div id="paragraph-4" class="pg-2"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About -->

        <!-- Visi Misi -->
        <section>
            <div class="row" style="padding: 0 !important; margin: 0 !impotant;">
                <div class="col-lg-6 col-grid" style="background-color: #ff0000;" data-animate="fadeInUp" data-animate-delay="300">
                    <div class="container">
                        <h2 class="white" style="font-weight: bold;padding:40px 40px 0 100px;">Visi</h2>
                        <p class="white" style="padding:10px 40px 40px 100px;">
                            {!!$visi !!}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-grid misi-box" data-animate="fadeInUp" data-animate-delay="300">
                    <h2 class="white" style="font-weight: bold;padding:40px 40px 0 100px;">Misi</h2>
                        @foreach ($misi as $item)
                        <p class="white" style="padding:0 40px 40px 100px;">
                            {{$item['no_urut']}}. {{ $item['misi'] }}
                        </p>    
                        @endforeach
                </div>
            </div>
        </section>
        <!-- End Visi Misi -->

        <!-- Organisasi -->
        <section id="organisasi">
            <div class="container">
                <div class="heading-text heading-section text-center" style="display: flex;justify-content:center;align-items:center;">
                    <h2>Struktur Organisasi</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12" data-animate="fadeInUp" data-animate-delay="300">
                       <figure class="highcharts-figure">
                            <div id="organization"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Organisasi -->

        <!-- Sertifikasi -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" data-animate="fadeInUp" data-animate-delay="100">
                        <div class="heading-text heading-section m-b-80">
                            <h2>Sertifikasi</h2>
                        </div>
                    </div>
                    <div class="col-lg-8" data-animate="fadeInUp" data-animate-delay="300">
                        <div class="carousel testimonial testimonial-box" data-items="{{count($sertifikat)}}" data-margin="30" data-arrows="false">
                            @foreach ($sertifikat as $item)
                            <div style="height: 250px;">
                                <img height="250" src="{{ config('api.url') }}admginas-auth/storage/{{$item['file_gambar']}}"/>
                            </div>    
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Sertifikasi -->
        
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
    <a id="link-wa" target="_blank"><img id="whatsapp" alt="whatsapp" class="whatsapp" height="40" width="40" src="{{ asset('asset_web/homepages/icon/whatsapp.png') }}"/></a>
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <script src="{{ asset('asset_web/js/jquery.js') }}"></script>
    <script src="{{ asset('asset_web/js/plugins.js') }}"></script>
    <!--Template functions-->
    <script src="{{ asset('asset_web/js/functions.js') }}"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/sankey.js"></script>
    <script src="https://code.highcharts.com/modules/organization.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">

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

        $('#deskripsi-1').children('p').each(function(index, element){
            $(this).attr('id', 'text-'+(index+1))
        });
        
        var paragraph1 = $('#text-1').text();
        var paragraph2 = $('#text-2').text();
        var paragraph3 = $('#text-3').text();
        var paragraph4 = $('#text-4').text();
        $('#deskripsi-1').children('p').remove();
        $('#paragraph-1').append(paragraph1);
        $('#paragraph-3').append(paragraph3);
        $('#paragraph-2').append(paragraph2);
        $('#paragraph-4').append(paragraph4);

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

        Highcharts.chart('organization', {
            chart: {
                height: 800,
                inverted: true
            },
            credits:{
                enabled: false
            },
            title: {
                text: 'Struktur Organisasi PT. Trengginas Jaya'
            },
            accessibility: {
                point: {
                    descriptionFormatter: function (point) {
                        var nodeName = point.toNode.name,
                            nodeId = point.toNode.id,
                            nodeDesc = nodeName === nodeId ? nodeName : nodeName + ', ' + nodeId,
                            parentDesc = point.fromNode.id;
                        return point.index + '. ' + nodeDesc + ', reports to ' + parentDesc + '.';
                    }
                }
            },
            series: [{
                type: 'organization',
                name: 'PT. Trengginas Jaya',
                keys: ['from', 'to'],
                data: [
                    ['Direktur', 'Commisioner'],
                    ['Direktur', 'Advisor'],
                    ['Direktur', 'MFHC'],
                    ['Direktur', 'SCDC'],
                    ['Direktur', 'MOLC'],
                    ['Direktur', 'MTBR'],
                    ['Direktur', 'MP'],
                    ['Direktur', 'MQBT'],
                    ['MFHC', 'AMF'],
                    ['AMF', 'CBT'],
                    ['AMF', 'CAT'],
                    ['CBT', 'CAT'],
                    ['MFHC', 'CHC'],
                    ['MOLC', 'AMA'],
                    ['MOLC', 'AMO'],
                    ['MTBR', 'AMT'],
                    ['MTBR', 'ABR'],
                    ['MP', 'ABM'],
                    ['MP', 'AMC'],
                    ['MQBT', 'AQM'],
                    ['AMA', 'CSD'],
                    ['AMA', 'CHM'],
                    ['CSD', 'CHM'],
                    ['AMO', 'CDP'],
                    ['AMO', 'CES'],
                    ['CDP', 'CES'],
                    ['AMT', 'CL'],
                    ['AMT', 'CE'],
                    ['CL', 'CE'],
                    ['ABR', 'CRS'],
                    ['ABR', 'CCS'],
                    ['CRS', 'CCS'],
                    ['ABM', 'CBM'],
                    ['ABM', 'CDS'],
                    ['AMC', 'CEP'],
                    ['AQM', 'QM'],
                    ['AQM', 'BD'],
                    ['AQM', 'CM'],
                ],
                levels: [
                {
                    level: 0,
                    color: '#980104',
                    dataLabels: {
                        style: {
                            fontSize: '8px',
                            color: '#FFFFFF'
                        }
                    }
                },
                {
                    level: 1,
                    color: '#007ad0',
                    dataLabels: {
                        color: 'white',
                        style: {
                            fontSize: '6px',
                        }
                    }
                },
                {
                    level: 2,
                    color: '#9cba8f',
                    dataLabels: {
                        style: {
                            fontSize: '6px'
                        }
                    }
                },
                {
                    level: 3,
                    color: '#529b9c',
                    dataLabels: {
                        style: {
                            fontSize: '6px'
                        }
                    }
                },
                {
                    level: 4,
                    color: '#eac392',
                    dataLabels: {
                        style: {
                            fontSize: '6px'
                        }
                    }
                }
                ],
                nodes: [
                    {
                    id: 'Direktur'
                },
                {
                    id: 'Commisioner',
                    color: '#980104',
                    column: 0,
                    offset: '75%'
                },
                {
                    id: 'Advisor',
                    column: 1,
                    offset: '75%'
                },
                {
                    id: 'SCDC',
                    column: 2,
                    name: 'Secretary & Document Center'
                },
                {
                    id: 'MFHC',
                    column: 3,
                    name: 'Manager Financial & Human Capital',
                    layout: 'hanging'
                },
                {
                    id: 'MOLC',
                    column: 3,
                    name: 'Manager Outsourcing & Legal Compilance',
                    layout: 'hanging'
                },
                {
                    id: 'MTBR',
                    column: 3,
                    name: 'Manager Trading & Bussiness Retail',
                    layout: 'hanging'
                },
                {
                    id: 'MP',
                    column: 3,
                    name: 'Manager Property',
                    layout: 'hanging'
                },
                {
                    id: 'MQBT',
                    column: 3,
                    name: 'Manager Quality Mgt & Bussiness Development',
                    layout: 'hanging'
                },
                {
                    id: 'AMF',
                    column: 4,
                    name: 'As. Man Financial',
                    layout: 'hanging'
                },
                {
                    id: 'CHC',
                    column: 4,
                    name: 'Coord. Human Capital'
                },
                {
                    id: 'AMA',
                    column: 4,
                    name: 'As. Man Management Area',
                    layout: 'hanging'
                },
                {
                    id: 'AMO',
                    column: 4,
                    name: 'As. Man Outsourcing Service',
                    layout: 'hanging'
                },
                {
                    id: 'AMT',
                    column: 4,
                    name: 'As. Man Trading',
                    layout: 'hanging'
                },
                {
                    id: 'ABR',
                    column: 4,
                    name: 'As. Man Bussiness Retail',
                    layout: 'hanging'
                },
                {
                    id: 'ABM',
                    column: 4,
                    name: 'As. Man Building Maintenanace & Dormitory',
                    layout: 'hanging'
                },
                {
                    id: 'AMC',
                    column: 4,
                    name: 'As. Man Construction',
                    layout: 'hanging'
                },
                {
                    id: 'AQM',
                    column: 4,
                    name: 'As. Man Analyst QM & Bussiness Dev',
                    layout: 'hanging'
                },
                {
                    id: 'CBT',
                    name: 'Coord. Budgeting & Taxation',
                    layout: 'hanging'
                },
                {
                    id: 'CAT',
                    name: 'Coord. Accounting & Treasury'
                },
                {
                    id: 'CSD',
                    name: 'Coord. Security & Driver',
                    layout: 'hanging'
                },
                {
                    id: 'CHM',
                    name: 'Coord. Housekeeping & ME'
                },
                {
                    id: 'CDP',
                    name: 'Coord. Data processing',
                    layout: 'hanging'
                },
                {
                    id: 'CES',
                    name: 'Coord. Employment Service'
                },
                {
                    id: 'CL',
                    name: 'Coord. Logistic',
                    layout: 'hanging'
                },
                {
                    id: 'CE',
                    name: 'COV & Equipment'
                },
                {
                    id: 'CRS',
                    name: 'Coord. Retail Sales',
                    layout: 'hanging'
                },
                {
                    id: 'CCS',
                    name: 'Coord. Catering Service'
                },
                {
                    id: 'CBM',
                    name: 'Coord. Building Maintenance',
                },
                {
                    id: 'CDS',
                    name: 'Coord. Dormitory Service'
                },
                {
                    id: 'CEP',
                    name: 'Constructions Experts'
                },
                {
                    id: 'QM',
                    name: 'Analyst Quality Management'
                },
                {
                    id: 'BD',
                    name: 'Analyst Bussiness Dev'
                },
                {
                    id: 'CM',
                    name: 'Coord. Marketing'
                },
                ],
                colorByPoint: false,
                dataLabels: {
                    color: '#FFFFFF',
                },
                borderColor: '#FFFFFF',
                nodeWidth: 65
            }],
            tooltip: {
                outside: true,
            },
            exporting: {
                enabled: false
            }
    });
    </script>
</body>

</html>