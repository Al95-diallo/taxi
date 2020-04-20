<!-- Nom &amp; Prénom: WOUMTANA P. Youssouf
            Téléphone: +226 63 86 22 46 / 73 35 41 41
                Email: issoufwoumtana@gmail.com -->
<?php
    include("query/fonction.php");
    include("dico.php");
    if(!isset($_SESSION['user_info']) && count($_SESSION['user_info']) == 0)
        header('Location: login.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title><?php echo $title; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="assets/plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">

    
	<style> 
        #map { 
            height: 500px; 
            width: 100%; 
        } 
	</style> 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <?php include('header.php') ?>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <?php include("menu.php"); ?>
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <?php
                $tab_requete[] = array();
                $tab_requete = getRequeteAmount();
                $tab_requete_canceled[] = array();
                $tab_requete_canceled = getRequeteCanceledAmount();
                $tab_requete_confirmed[] = array();
                $tab_requete_confirmed = getRequeteConfirmedAmount();
                $tab_requete_onride[] = array();
                $tab_requete_onride = getRequeteOnRideAmount();
                $tab_requete_completed[] = array();
                $tab_requete_completed = getRequeteCompletedAmount();
                $tab_requete_sales_today[] = array();
                $tab_requete_sales_today = getRequeteAllSaleTodayAmount();
                $tab_requete_earn_month[] = array();
                $tab_requete_earn_month = getRequeteMonthEarnAmount();
                $tab_requete_earn_today[] = array();
                $tab_requete_earn_today = getRequeteTodayEarnAmount();
                $tab_requete_earn_week[] = array();
                $tab_requete_earn_week = getRequeteWeekEarnAmount();
                $tab_requete_new[] = array();
                $tab_requete_new = getRequeteNewAmount();
                $tab_currency[] = array(); 
                $tab_currency = getEnabledCurrency();
                $tab_driver[] = array(); 
                $tab_driver = getConducteur();
                $tab_customer[] = array(); 
                $tab_customer = getUserApp();
            ?>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Earning: <?php if($tab_requete_completed[0]['earning']!=''){echo $tab_currency[0]['symbole'].' '.$tab_requete_completed[0]['earning'];}else{ echo $tab_currency[0]['symbole'].' 0';}  ?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <div>
                    <!-- <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button> -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-user"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php echo count($tab_driver) ?></h3>
                                    <h5 class="text-muted m-b-0">Driver</h5></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-user"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php echo count($tab_customer) ?></h3>
                                    <h5 class="text-muted m-b-0">Customer</h5></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3>
                                </div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info"><?php echo $tab_currency[0]['symbole'].' '.$tab_requete[0]['montant'] ?></h3>
                                    <h5 class="text-muted m-b-0">All ride</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php if($tab_requete_new[0]['montant']!=''){echo $tab_currency[0]['symbole'].' '.$tab_requete_new[0]['montant'];}else{ echo $tab_currency[0]['symbole'].' 0';}  ?></h3>
                                    <h5 class="text-muted m-b-0">New ride</h5></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php if($tab_requete_confirmed[0]['montant']!=''){echo $tab_currency[0]['symbole'].' '.$tab_requete_confirmed[0]['montant'];}else{ echo $tab_currency[0]['symbole'].' 0';}  ?></h3>
                                    <h5 class="text-muted m-b-0">Confirmed ride</h5></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php if($tab_requete_onride[0]['montant']!=''){echo $tab_currency[0]['symbole'].' '.$tab_requete_onride[0]['montant'];}else{ echo $tab_currency[0]['symbole'].' 0';}  ?></h3>
                                    <h5 class="text-muted m-b-0">On ride</h5></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php if($tab_requete_completed[0]['montant']!=''){echo $tab_currency[0]['symbole'].' '.$tab_requete_completed[0]['montant'];}else{ echo $tab_currency[0]['symbole'].' 0';}  ?></h3>
                                    <h5 class="text-muted m-b-0">Completed ride</h5></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php if($tab_requete_canceled[0]['montant']!=''){echo $tab_currency[0]['symbole'].' '.$tab_requete_canceled[0]['montant'];}else{ echo $tab_currency[0]['symbole'].' 0';}  ?></h3>
                                    <h5 class="text-muted m-b-0">Canceled ride</h5></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <h4>Earnings</h4>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php if($tab_requete_confirmed[0]['earning']!=''){echo $tab_currency[0]['symbole'].' '.$tab_requete_confirmed[0]['earning'];}else{ echo $tab_currency[0]['symbole'].' 0';}  ?></h3>
                                    <h5 class="text-muted m-b-0">Confirmed ride</h5></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php if($tab_requete_onride[0]['earning']!=''){echo $tab_currency[0]['symbole'].' '.$tab_requete_onride[0]['earning'];}else{ echo $tab_currency[0]['symbole'].' 0';}  ?></h3>
                                    <h5 class="text-muted m-b-0">On ride</h5></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php if($tab_requete_completed[0]['earning']!=''){echo $tab_currency[0]['symbole'].' '.$tab_requete_completed[0]['earning'];}else{ echo $tab_currency[0]['symbole'].' 0';}  ?></h3>
                                    <h5 class="text-muted m-b-0">Completed ride</h5></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php if($tab_requete_canceled[0]['earning']!=''){echo $tab_currency[0]['symbole'].' '.$tab_requete_canceled[0]['earning'];}else{ echo $tab_currency[0]['symbole'].' 0';}  ?></h3>
                                    <h5 class="text-muted m-b-0">Canceled ride</h5></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php if($tab_requete_sales_today[0]['nb_sales']!=''){echo $tab_requete_sales_today[0]['nb_sales'].' sales';}else{ echo '0 sales';}  ?></h3>
                                    <h5 class="text-muted m-b-0">Driver sale today</h5></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php if($tab_requete_earn_today[0]['earning']!=''){echo $tab_currency[0]['symbole'].' '.$tab_requete_earn_today[0]['earning'];}else{ echo $tab_currency[0]['symbole'].' 0';}  ?></h3>
                                    <h5 class="text-muted m-b-0">Commission for the day</h5></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php if($tab_requete_earn_week[0]['earning']!=''){echo $tab_currency[0]['symbole'].' '.$tab_requete_earn_week[0]['earning'];}else{ echo $tab_currency[0]['symbole'].' 0';}  ?></h3>
                                    <h5 class="text-muted m-b-0">Commission for the week</h5></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                <h3 class="m-b-0 text-info"><?php if($tab_requete_earn_month[0]['earning']!=''){echo $tab_currency[0]['symbole'].' '.$tab_requete_earn_month[0]['earning'];}else{ echo $tab_currency[0]['symbole'].' 0';}  ?></h3>
                                    <h5 class="text-muted m-b-0">Commission for the month</h5></div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><i class="mdi mdi-briefcase m-r-5 color-success"></i>Taxi booking</h4>
                                <h6 class="card-subtitle">Coordinate all actors involved in the Taxi services.</h6>
                                <div class="button-group">
                                    <!-- <a href="requete.php" class="btn waves-effect waves-light btn-lg btn-success">All </a> -->
                                    <a href="requete-new.php" class="btn waves-effect waves-light btn-lg btn-success">New</a>
                                    <a href="requete-confirmed.php" class="btn waves-effect waves-light btn-lg btn-success">Confirmed</a>
                                    <a href="requete-onride.php" class="btn waves-effect waves-light btn-lg btn-success">On Ride</a>
                                    <a href="requete-completed.php" class="btn waves-effect waves-light btn-lg btn-success">Completed</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><i class="mdi mdi-settings m-r-5 color-info"></i>Administration tools</h4>
                                <h6 class="card-subtitle">User and User Category Management Tool.</h6>
                                <div class="button-group">
                                    <a href="categorie-user.php" class="btn waves-effect waves-light btn-lg btn-info">Categorie of user</a>
                                    <!-- <a href="user.php" class="btn waves-effect waves-light btn-lg btn-info">User admin.</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><i class="mdi mdi-account m-r-5 color-warning"></i>User APP.</h4>
                                <h6 class="card-subtitle">Track the activities of users.</h6>
                                <div class="button-group">
                                    <a href="list-user.php" class="btn waves-effect waves-light btn-lg btn-warning">User List </a>
                                    <a href="conducteur.php" class="btn waves-effect waves-light btn-lg btn-warning">Driver List </a>
                                    <!-- <a href="suggestion.php" class="btn waves-effect waves-light btn-lg btn-warning">Suggestion</a>
                                    <a href="commentaire-avis.php" class="btn waves-effect waves-light btn-lg btn-warning">Commentaire & avis</a> -->
                                    <!-- <button type="button" class="btn waves-effect waves-light btn-lg btn-info">Type d'alerte</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3 col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><i class="mdi mdi-chart-areaspline m-r-5 color-primary"></i>Reporting &amp; Stats</h4>
                                <h6 class="card-subtitle">Reporting activities using reporting tools.</h6>
                                <div class="button-group">
                                    <a href="" class="btn waves-effect waves-light btn-lg btn-primary">Statistics</a>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </div>
                <div class="row m-t-0">
                    <div class="col-md-12">
                
                        <h3>Live Tracking</h3> 
                        <div id="map"></div> 
                        <script> 
                            // function initMap() { 
                            //     // var uluru = {lat: 28.501859, lng: 77.410320}; 
                            //     var map = new google.maps.Map(document.getElementById('map'), { 
                            //     zoom: 4, 
                            //     center: uluru 
                            //     }); 
                            //     // var marker = new google.maps.Marker({ 
                            //     // position: uluru, 
                            //     // map: map 
                            //     // }); 
                            // } 
                        </script> 
                        <script async defer 
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9pYFPSnzYV-IkWHTe0PXciACAsVwJU0E&callback=initMap"> 
                        </script> 

                    </div>
                </div>
                <!-- Row -->
                
                
                <!-- Row -->
                
                <!-- Row -->
                <!-- Row -->
                
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> <?php include("footer.php"); ?> </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--morris JavaScript -->
    <script src="assets/plugins/raphael/raphael-min.js"></script>
    <script src="assets/plugins/morrisjs/morris.min.js"></script>
    <!-- Chart JS -->
    <script src="js/dashboard1.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->

    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    
    <!--Custom JavaScript -->
    <!-- <script src="js/custom.min.js"></script> -->
    <script src="assets/plugins/toast-master/js/jquery.toast.js"></script>
    <script src="js/toastr.js"></script>

    <script>
        initMap();
        var gmarkers = [];
        var map;
        function initMap(){
            $.ajax({
                url: "query/ajax/getAllVehicle.php",
                type: "POST",
                data: {"id":"ok"},
                success: function (data) {
                    var data_parse = JSON.parse(data);
                    if(data_parse.length != 0){
                        for(var i=0; i<data_parse.length; i++){
                            var lat = data_parse[i].latitude;
                            var lng = data_parse[i].longitude;
                            var prenom = data_parse[i].prenom;
                            var phone = data_parse[i].phone;
                            var nom = data_parse[i].nom;
                            var online = data_parse[i].online;
                            var nom_prenom = prenom+" "+nom;
                            var uluru = {lat: parseFloat(lat), lng: parseFloat(lng)}; 
                            if(i==0){
                                map = new google.maps.Map(document.getElementById('map'), { 
                                zoom: 15,
                                center: uluru 
                                }); 
                            }
                            if(online == "yes")
                                var image = 'http://projets.hevenbf.com/on_demand_taxi/assets/images/marker.png';
                            else
                                var image = 'http://projets.hevenbf.com/on_demand_taxi/assets/images/marker_red.png';
                            var marker = new google.maps.Marker({ 
                                position: uluru, 
                                map: map, 
                                icon: image, 
                                title: nom_prenom 
                            }); 
                            var infoWindow = new google.maps.InfoWindow();
                            google.maps.event.addListener(marker, 'click', function () {
                                var markerContent = "<h4>Name : "+prenom+" "+nom+"</h4> <h6>Phone : "+phone+"</h6>";
                                infoWindow.setContent(markerContent);
                                infoWindow.open(map, this);
                            });
                            // Push your newly created marker into the array:
                            gmarkers.push(marker);
                        }
                    }else{
                        var uluru = {lat: parseFloat("11.111111"), lng: "-1.133344"}; 
                        map = new google.maps.Map(document.getElementById('map'), { 
                        zoom: 15,
                        center: uluru 
                        }); 
                    }
                    addYourLocationButton(map, marker);
                }
            });
        }
        function addYourLocationButton(map, marker) {
            var controlDiv = document.createElement('div');

            var firstChild = document.createElement('button');
            firstChild.style.backgroundColor = '#fff';
            firstChild.style.border = 'none';
            firstChild.style.outline = 'none';
            firstChild.style.width = '40px';
            firstChild.style.height = '40px';
            firstChild.style.borderRadius = '2px';
            firstChild.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
            firstChild.style.cursor = 'pointer';
            firstChild.style.marginRight = '10px';
            firstChild.style.padding = '0px';
            firstChild.title = 'Your Location';
            controlDiv.appendChild(firstChild);

            var secondChild = document.createElement('div');
            secondChild.style.margin = '10px';
            secondChild.style.width = '18px';
            secondChild.style.height = '18px';
            secondChild.style.backgroundImage = 'url(https://maps.gstatic.com/tactile/mylocation/mylocation-sprite-1x.png)';
            secondChild.style.backgroundSize = '180px 18px';
            secondChild.style.backgroundPosition = '0px 0px';
            secondChild.style.backgroundRepeat = 'no-repeat';
            secondChild.id = 'you_location_img';
            firstChild.appendChild(secondChild);

            google.maps.event.addListener(map, 'dragend', function() {
                $('#you_location_img').css('background-position', '0px 0px');
            });

            firstChild.addEventListener('click', function() {
                var imgX = '0';
                var animationInterval = setInterval(function(){
                    if(imgX == '-18') imgX = '0';
                    else imgX = '-18';
                    $('#you_location_img').css('background-position', imgX+'px 0px');
                }, 500);
                if(navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                        marker.setPosition(latlng);
                        map.setCenter(latlng);
                        clearInterval(animationInterval);
                        $('#you_location_img').css('background-position', '-144px 0px');
                    });
                }
                else{
                    clearInterval(animationInterval);
                    $('#you_location_img').css('background-position', '0px 0px');
                }
            });

            controlDiv.index = 1;
            map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);
        }
        
        function removeMarkers(){
            for (i = 0; i < gmarkers.length; i++) {
                gmarkers[i].setMap(null);
            }
        }
        function getVehicleAll2(){
            $.ajax({
                url: "query/ajax/getAllVehicle.php",
                type: "POST",
                data: {"id":"ok"},
                success: function (data) {
                    var data_parse = JSON.parse(data);
                    removeMarkers();
                    for(var i=0; i<data_parse.length; i++){
                        var lat = data_parse[i].latitude;
                        var lng = data_parse[i].longitude;
                        var prenom = data_parse[i].prenom;
                        var phone = data_parse[i].phone;
                        var nom = data_parse[i].nom;
                        var online = data_parse[i].online;
                        var nom_prenom = prenom+" "+nom;
                        var uluru = {lat: parseFloat(lat), lng: parseFloat(lng)}; 
                        if(online == "yes")
                            var image = 'http://projets.hevenbf.com/on_demand_taxi/assets/images/marker.png';
                        else
                            var image = 'http://projets.hevenbf.com/on_demand_taxi/assets/images/marker_red.png';
                        var marker = new google.maps.Marker({ 
                            position: uluru, 
                            map: map, 
                            icon: image, 
                            title: nom_prenom 
                        }); 
                        var infoWindow = new google.maps.InfoWindow();
                        google.maps.event.addListener(marker, 'click', function () {
                            var markerContent = "<h4>Name : "+prenom+""+nom+"</h4> <h6>Phone : "+phone+"</h6>";
                            infoWindow.setContent(markerContent);
                            infoWindow.open(map, this);
                        });
                        // Push your newly created marker into the array:
                        gmarkers.push(marker);
                    }
                }
            });
        }
        function foo() {
            var day = new Date().getDay();
            var hours = new Date().getHours();

            // alert('day: ' + day + '  Hours : ' + hours );
            getVehicleAll2();

            if (day === 0 && hours > 12 && hours < 13){}
            // Do what you want here:
        }

        setInterval(foo, 7000);
    </script>
    <!-- Custom Theme JavaScript -->

    <?php if(isset($_SESSION['status']) &&  $_SESSION['status'] == 1){ ?>
            <script>
                showInfo();
            </script>
    <?php }else if(isset($_SESSION['status']) &&  $_SESSION['status'] == 2){ ?>
            <script>
                showFailed();
            </script>
    <?php }else if(isset($_SESSION['status']) &&  $_SESSION['status'] == 3){ ?>
            <script>
                showWarningIncorrect();
            </script>
    <?php } unset($_SESSION['status']); ?>
</body>

</html>