<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAI Front End Dev</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminLTE/bower_components/font-awesome/css/font-awesome.min.css');?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminLTE/bower_components/Ionicons/css/ionicons.min.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminLTE/dist/css/AdminLTE.min.css');?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url("assets/adminLTE/dist/css/skins/".$this->session->userdata('theme').".css");?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminLTE/bower_components/morris.js/morris.css');?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminLTE/bower_components/jvectormap/jquery-jvectormap.css');?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css');?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css');?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url('assets/adminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/adminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
    
    <!-- Table Export -->
    <link href="<?php echo base_url('assets/plugins/tableexport/css/tableexport.css');?>" rel="stylesheet">
    
    <!-- SELECTIZE -->
    <link href="<?php echo base_url('assets/selectize/css/selectize.bootstrap3.css');?>" rel="stylesheet">
    
     <!--Jquery Treegrid -->
    <link href="<?php echo base_url('assets/plugins/jquery-treegrid/css/jquery.treegrid.css');?>" rel="stylesheet">
    
    <!--SAI GLOBAL ADMIN CSS-->
    <link href="<?php echo base_url('assets/css/sai.css');?>" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/favicon/apple-touch-icon.png');?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/img/favicon/favicon-32x32.png');?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/img/favicon/favicon-32x32.png');?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url('assets/img/favicon/manifest.json');?>">
    <link rel="mask-icon" href="<?php echo base_url('assets/img/favicon/safari-pinned-tab.svg');?>" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
</head>

<body class="<?php echo $this->session->userdata('theme'); ?> fixed sidebar-mini sidebar-mini-expand-feature">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo $this->session->userdata('home_url'); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b></b> SAI</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b></b> SAI</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning" id='ajax-notification-number'></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu" id='ajax-notification-section'>
                            </ul>
                        </li>
                        <li class="footer"><a href="<?php echo $this->session->userdata('home_url').'/Index/notification'; ?>">View all</a></li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <?php
                        if($this->session->userdata('foto') !== null AND $this->session->userdata('foto') != '-'){
                            $img = $this->session->userdata('foto');
                        }else{
                            $img = base_url('assets/img/userdefault.png');
                        }
                    ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo $img;?>" class="user-image foto-ui-ajax" alt="User Image">
                    <span class="hidden-xs"><?php echo $this->session->userdata('profile_name'); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo $img; ?>" class="img-circle foto-ui-ajax" alt="User Image">

                            <p>
                            <?php echo $this->session->userdata('profile_name'); ?>
                            <!--<small>Member since Nov. 2012</small>-->
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <!--<div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>-->
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                            <!--<a href="#" class="btn btn-default btn-flat">Profile</a>-->
                            </div>
                            <div class="pull-right">
                            <a href="<?php echo $this->session->userdata('exit_url'); ?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
                </ul>
            </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
                <!--<li class="header">Menu</li>-->
                <!--<li class="header">Menu</li>-->
                <?php
                    $kode_menu = $this->session->userdata('kode_menu');
                    $kode_menu = $this->db->qstr($kode_menu);

                    $daftar_menu = $this->sai->getResultArray("SELECT a.kode_menu, a.nama, a.level_menu, b.id_form, a.kode_klp, a.icon from lab_menu a left join lab_form b on a.kode_form=b.kode_form where a.kode_klp=$kode_menu order by a.nu");

                    $pre_prt = 0;
                    $parent_array = array();
                    // node == i
                    for($i=0; $i<count($daftar_menu); $i++){
                        $form = str_replace("_","/", $daftar_menu[$i]["id_form"]);
                        $this_lv = $daftar_menu[$i]['level_menu'];
                        $this_link = site_url($form);

                        if(!ISSET($daftar_menu[$i-1]['level_menu'])){
                            $prev_lv = 0;
                        }else{
                            $prev_lv = $daftar_menu[$i-1]['level_menu'];
                        }

                        if(!ISSET($daftar_menu[$i+1]['level_menu'])){
                            $next_lv = $daftar_menu[$i]['level_menu'];
                        }else{
                            $next_lv = $daftar_menu[$i+1]['level_menu'];
                        }

                        if($this_lv == 0 AND $next_lv == 0){
                            echo " 
                            <li>
                                <a href='$this_link'>
                                    <i class='fa ".$daftar_menu[$i]["icon"]."'></i> <span>".$daftar_menu[$i]["nama"]."</span>
                                </a>
                            </li>";
                        }else if($this_lv == 0 AND $next_lv > 0){
                            echo " 
                            <li class='treeview'>
                                <a href='#'>
                                    <i class='fa ".$daftar_menu[$i]["icon"]."'></i> <span>".$daftar_menu[$i]["nama"]."</span>
                                    <span class='pull-right-container'>
                                        <i class='fa fa-angle-left pull-right'></i>
                                    </span>
                                </a>
                                <ul class='treeview-menu'>";
                        }else if(($this_lv > $prev_lv OR $this_lv == $prev_lv OR $this_lv < $prev_lv) AND $this_lv < $next_lv){
                            echo " 
                            <li class='treeview'>
                                <a href='#'>
                                    <i class='fa ".$daftar_menu[$i]["icon"]."'></i> <span>".$daftar_menu[$i]["nama"]."</span>
                                    <span class='pull-right-container'>
                                        <i class='fa fa-angle-left pull-right'></i>
                                    </span>
                                </a>
                                <ul class='treeview-menu'>";
                        }else if(($this_lv > $prev_lv OR $this_lv == $prev_lv OR $this_lv < $prev_lv) AND $this_lv == $next_lv){
                            echo " 
                            <li>
                                <a href='$this_link'>
                                    <i class='fa ".$daftar_menu[$i]["icon"]."'></i> <span>".$daftar_menu[$i]["nama"]."</span>
                                </a>
                            </li>";
                        }else if($this_lv > $prev_lv AND $this_lv > $next_lv){
                            echo " 
                            <li>
                                <a href='$this_link'>
                                    <i class='fa ".$daftar_menu[$i]["icon"]."'></i> <span>".$daftar_menu[$i]["nama"]."</span>
                                </a>
                            </li>";
                            for($i=0; $i<($this_lv - $next_lv); $i++){
                                echo "</ul></li>";
                            }
                        }else if(($this_lv == $prev_lv OR $this_lv < $prev_lv) AND $this_lv > $next_lv){
                            echo " 
                            <li>
                                <a href='$this_link'>
                                    <i class='fa ".$daftar_menu[$i]["icon"]."'></i> <span>".$daftar_menu[$i]["nama"]."</span>
                                </a>
                            </li>";
                            echo "</ul></li>";
                            // for($i=0; $i<($this_lv - $next_lv); $i++){
                            //     echo "</ul></li>";
                            // }
                        }
                    }
                ?>
            </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        

            <!-- Main content -->
            

            <div id="loading-overlay" style="background: #e9e9e9; display: none; position: absolute; top: 0; right: 0; bottom: 0; left: 0; z-index:5;">
                <center>
                    <img src="<?php echo base_url('assets/img/stackspinner.gif');?>" style='position:fixed; top: 50%; transform: translateY(-50%);'>
                </center>
            </div>
            <section class="content" id='ajax-content-section'>
                <?php
                    if(ISSET($print_url)){
                        echo "
                            <div class='row'>
                                <div class='col-xs-12'>
                                    <div class='box'>
                                        <div class='box-body'>
                                            <a href='$print_url' class='btn btn-primary pull-right'>
                                                <i class='fa fa-print'></i> Print
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                    } 
                    $this->load->view($page);
                ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!--<footer class="main-footer">
            <strong>PT. Samudra Aplikasi Indonesia &copy; 2017 <a href="http://mysai.co.id/">MySAI</a>.</strong> <br>
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>AdminLTE</strong> Template - Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>. All rights
            reserved.
        </footer>-->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <div class="tab-content">
                <div class="tab-pane active" id="control-sidebar-home-tab">
                    <select class='form-control input-sm' id='dash_dept' style="margin-bottom:5px;">
                        <option value=''>Pilih Lokasi</option>
                    </select>
                    <select class='form-control input-sm' id='dash_periode' style="margin-bottom:5px;">
                        <option value=''>Pilih Periode</option>
                    </select>
                    <a class="btn btn-sm btn-default pull-right" id='dash_refresh' style="position: cursor:pointer; max-height:30px;" data-toggle="control-sidebar"><i class="fa fa-refresh fa-1"></i> Refresh</a>
                </div>
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/adminLTE/bower_components/jquery/dist/jquery.min.js');?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url('assets/adminLTE/bower_components/jquery-ui/jquery-ui.min.js');?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets/adminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <!-- Highcharts -->
    <script src="<?php echo base_url('assets/highcharts/code/highcharts.js');?>"></script>
    <script src="<?php echo base_url('assets/highcharts/code/highcharts-more.js');?>"></script>
    <script src="<?php echo base_url('assets/highcharts/code/modules/exporting.js');?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url('assets/adminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js');?>"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url('assets/adminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');?>"></script>
    <script src="<?php echo base_url('assets/adminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url('assets/adminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js');?>"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url('assets/adminLTE/bower_components/moment/min/moment.min.js');?>"></script>
    <script src="<?php echo base_url('assets/adminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js');?>"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url('assets/adminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>
    <!-- CK Editor -->
    <script src="<?php echo base_url('assets/adminLTE/bower_components/ckeditor/ckeditor.js');?>"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url('assets/adminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/adminLTE/bower_components/fastclick/lib/fastclick.js');?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/adminLTE/dist/js/adminlte.min.js');?>"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url('assets/adminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
    <script src="<?php echo base_url('assets/adminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>
    <!-- Currency InputMask -->
    <script src="<?php echo base_url('assets/js/inputmask.js');?>"></script>
    <!-- TableExport Filesaver -->
    <script src="<?php echo base_url('assets/plugins/tableexport/js/FileSaver.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/tableexport/js/xlsx.core.min.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/tableexport/js/tableexport.js');?>"></script>

    <!-- Print This -->
    <script src="<?php echo base_url('assets/plugins/printThis/printThis.js');?>"></script>

    <!-- Selectize -->
    <script src="<?php echo base_url('assets/selectize/js/standalone/selectize.min.js');?>"></script>
    <!-- JS Tree -->
    <script src="<?php echo base_url('assets/plugins/jquery-treegrid/js/jquery.treegrid.js');?>"></script>

    <script src="https://cloud.tinymce.com/stable/tinymce.js?apiKey=sa1lt790zgz8br2z80uvqkg768zl0jcqspaags0kpc2539vy "></script>
    <script>
        tinymce.init({ 
            selector:'.cms-text-editor',
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            } ,
            plugins: "link, lists",
            // toolbar: "sizeselect | bold italic | fontsizeselect",
            toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | sizeselect fontsizeselect",
            fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt"
            //  toolbar: "numlist bullist"
        });
    </script>

    <!-- additional script -->
    <script src="<?php echo base_url('assets/js/additional_script.js');?>"></script>
    <?php
        if($this->session->userdata('js') != null){
            $js_file = explode(', ', $this->session->userdata('js'));
            for($i = 0; $i<count($js_file); $i++){
                echo "<script src='".base_url('assets/js/modul/').$js_file[$i]."'></script>";
            }
        }
    ?>
</body>
</html>

