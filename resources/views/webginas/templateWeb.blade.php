<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PT Trengginas Jaya</title>
	
    <!-- core CSS -->
    <link href="{{ asset('asset_corlate/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_corlate/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_corlate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_corlate/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_corlate/main.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_corlate/responsive.css') }}" rel="stylesheet">  

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('asset_adminlte/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('asset_adminlte/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset_adminlte/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('asset_adminlte/img/favicon/manifest.json') }}">
    <link rel="mask-icon" href="{{ asset('asset_adminlte/img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <style>
        /* custom css */

        /* .navbar-inverse .navbar-nav > li > a:hover{
            background-color: #bce7f5;
            color: black;
        } */
        

        .dropdown-menu{
            background:white;
            min-width:230px;
        }
        
        .gmap-area {
            padding: 5px 0;
        }

        body > section {
            padding: 30px 0;
        }

        .article-list-end-fade:before {
            content:'';
            width:100%;
            height:30%;    
            position:absolute;
            left:0;
            bottom:0;
            background:linear-gradient(transparent 10px, white);
        }

        /* .portfolio-filter > li a {
            background: none repeat scroll 0 0 #FFFFFF;
            font-size: 14px;
            font-weight: 400;
            margin-right: 20px;
            transition: all 0.9s ease 0s;
            -moz-transition: all 0.9s ease 0s;
            -webkit-transition: all 0.9s ease 0s;
            -o-transition: all 0.9s ease 0s;
            border: 1px solid #F2F2F2;
            outline: none;
            border-radius: 3px;
        }

        .portfolio-filter > li a:hover,
        .portfolio-filter > li a.active{
            color:#fff;
            background: #c52d2f;
            border: 1px solid #c52d2f;
            box-shadow: none;
            -webkit-box-shadow: none;
        } */

        /* .navbar-inverse .navbar-nav .dropdown-menu > li > a {
            padding: 8px 15px;
            color: #7e7767;
        } */

        /* .navbar-inverse .navbar-nav .dropdown-menu > li:hover > a,
        .navbar-inverse .navbar-nav .dropdown-menu > li:focus > a,
        .navbar-inverse .navbar-nav .dropdown-menu > li.active > a {
            background-color: #bce7f5;
            color: black;
        } */

        #bottom ul li {
            display: block;
            padding: 1px 0;
        }
        .navbar-nav.navbar-right:last-child {
            margin-right: 100px;
        }

        .navbar-nav > li {
            margin-left: 5px;
            padding-bottom: 10px;
        }

        .navbar-inverse .navbar-nav .dropdown-menu:last-child{
            right:0;
        }
    </style>
</head><!--/head-->

<body class="homepage">

    <header id="header">

        <nav class="navbar navbar-inverse" style='background:white;'>
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style='background-color:#333'>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#"></a>
                </div>

                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                    </ul>
                </div>
            </div>
        </nav>

    </header><!--/header-->

    <div class="body-content">


    </div>

    <script src="{{ asset('asset_corlate/jquery.js') }}"></script>

    <!--js bootstrap khusus corlate-->
    <script src="{{ asset('asset_corlate/bootstrap.min.js') }}"></script>

    <script src="{{ asset('asset_corlate/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('asset_corlate/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('asset_corlate/main.js') }}"></script>
    <script src="{{ asset('asset_corlate/wow.min.js') }}"></script>

    <script type="text/javascript"> 
        function initialize(){
            var lat = $('.latitude').text();
            var lon = $('.longitude').text();
            
            var myLatLng = {lat: +lat, lng: +lon};

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: myLatLng
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map
            });
        }

        function loadMenu(){
            $.ajax({
                type: 'GET',
                url: "{{ url('webginas/menu') }}",
                dataType: 'json',
                async:false,
                success:function(result){
                    if(result[0].status){
                        $('#myNavbar').html('');
                        $('<ul class="nav navbar-nav navbar-right" style="margin-right:10px;">'+result[0].html+'</ul>').appendTo('#myNavbar').slideDown();
                        var tmp = result[0].logo.split("/");
                        var logo = "{{ config('api.url') }}webginas/storage/trengginas-logo.png";
                        
                        $('.navbar-brand').html(`<img src="`+logo+`" style="padding-left:15px; padding-bottom:10px; height:60px; width:auto" alt="logo">`);

                    }
                },
                fail: function(xhr, textStatus, errorThrown){
                    alert('request failed:'+textStatus);
                }
            });
        }

        function loadForm(url){
            $('.body-content').load(url);
        }

        loadMenu();

        loadForm("{{ url('webginas/form/home') }}");

        $('#myNavbar').on('click','.a_link',function(e){
            e.preventDefault();
            var form = $(this).data('href');
            var url = form;
            console.log(url);
            if(form == "" || form == "-"){
                // alert('Form dilock!');
                return false;
            }else{
                loadForm(url);
                
            }
        });
        
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwdyiC2sZ3B1O2nMdhUy6Z0ljoK3gbA_U&callback=initialize">
    </script>
</body>
</html>