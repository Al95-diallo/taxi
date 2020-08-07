
<!-- Nom &amp; Prénom: WOUMTANA P. Youssouf
            Téléphone: +226 63 86 22 46 / 73 35 41 41
                Email: issoufwoumtana@gmail.com -->
<?php
    if(isset($_COOKIE['lang'])) {
        switch($_COOKIE['lang']){
            case 'bn' : include("lang/bn.php"); break;
            case 'cn' : include("lang/cn.php"); break;
            case 'de' : include("lang/de.php"); break;
            case 'en' : include("lang/en.php"); break;
            case 'esp' : include("lang/esp.php"); break;
            case 'fr' : include("lang/fr.php"); break;
            case 'in' : include("lang/in.php"); break;
            case 'jp' : include("lang/jp.php"); break;
            case 'ko' : include("lang/ko.php"); break;
            case 'pt' : include("lang/pt.php"); break;
            case 'ru' : include("lang/ru.php"); break;
            default : include("lang/sa.php"); break;
        }
    }else{
        include("lang/en.php");
    }
    include("query/fonction.php");
    include("dico.php");
    $tab_infos_user[] = array();
    $id_user = "";
    if(!isset($_SESSION['user_info']) && count($_SESSION['user_info']) == 0)
        header('Location: login.php');
    else{
        $tab_infos_user = $_SESSION['user_info'];
        $id_user = $tab_infos_user['id'];
    }
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
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
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
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><?php echo $vehicle_type ?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><?php echo $home; ?></a></li>
                        <li class="breadcrumb-item"><?php echo $codification ?></li>
                        <li class="breadcrumb-item active"><?php echo $vehicle_type ?></li>
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $list_of_vehicle_types ?></h4>
                                <!-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#add-type-vehicule"><i class="fa fa-plus m-r-10"></i>Add</button>
                                <div id="add-type-vehicule" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content bg-gris">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel"><?php echo $add_a_vehicle_type ?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form class="form-horizontal " action="query/action.php" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-12 m-b-0">
                                                                <div class="form-group mb-3">
                                                                    <label class="mr-sm-2" for="designation"><?php echo $name ?></label>
                                                                    <input type="text" class="form-control " placeholder="" name="libelle_type_vehicule" required> 
                                                                    <div class="invalid-feedback">
                                                                        Désolé, entrez l'intitulé de la catégorie de devis
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 m-b-0">
                                                                <div class="form-group mb-3">
                                                                    <label class="mr-sm-2" for="designation"><?php echo $cost_per_km ?></label>
                                                                    <input type="number" class="form-control " placeholder="" name="price_vehicule" required> 
                                                                    <div class="invalid-feedback">
                                                                        Désolé, entrez l'intitulé de la catégorie de devis
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 m-b-0">
                                                                <div class="form-group mb-3">
                                                                    <label class="mr-sm-2" for="designation"><?php echo $image ?></label>
                                                                    <input type="file" class="form-control " placeholder="" name="image_vehicule" id="image_vehicule" required> 
                                                                    <div class="invalid-feedback">
                                                                        Désolé, entrez l'intitulé de la catégorie de devis
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-dark waves-effect"><?php echo $save ?></button>
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo $cancel ?></button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <div id="type-vehicule-mod" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content bg-gris">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel"><?php echo $modify_a_vehicle_type ?></h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form class="form-horizontal " action="query/action.php" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <input type="hidden" name="id_type_vehicule_mod" id="id_type_vehicule_mod" value="<?php echo $id_user; ?>">
                                                            <div class="col-md-12 m-b-0">
                                                                <div class="form-group mb-3">
                                                                    <label class="mr-sm-2" for="designation"><?php echo $name ?></label>
                                                                    <input type="text" class="form-control " placeholder="" name="libelle_type_vehicule_mod" id="libelle_type_vehicule_mod" required> 
                                                                    <div class="invalid-feedback">
                                                                        Désolé, entrez l'intitulé de la catégorie de devis
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 m-b-0">
                                                                <div class="form-group mb-3">
                                                                    <label class="mr-sm-2" for="designation"><?php echo $cost_per_km ?></label>
                                                                    <input type="number" class="form-control " placeholder="" name="price_vehicule_mod" id="price_vehicule_mod" required> 
                                                                    <div class="invalid-feedback">
                                                                        Désolé, entrez l'intitulé de la catégorie de devis
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 m-b-0">
                                                                <div class="form-group mb-3">
                                                                    <label class="mr-sm-2" for="designation"><?php echo $image ?></label>
                                                                    <input type="file" class="form-control " placeholder="" name="image_vehicule_mod" id="image_vehicule_mod" required> 
                                                                    <div class="invalid-feedback">
                                                                        Désolé, entrez l'intitulé de la catégorie de devis
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-dark waves-effect"><?php echo $save ?></button>
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"><?php echo $cancel ?></button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <div class="table-responsive m-t-10">
                                    <?php
                                        $tab_type_vehicule[] = array(); 
                                        $tab_type_vehicule = getTypeVehicule();
                                        $tab_currency[] = array(); 
                                        $tab_currency = getEnabledCurrency();
                                    ?>
                                    <table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th><?php echo $name ?></th>
                                                <th><?php echo $cost_per_km ?> (<?php echo $tab_currency[0]['symbole'] ?>)</th>
                                                <th><?php echo $image ?></th>
                                                <th><?php echo $created ?></th>
                                                <th><?php echo $modified ?></th>
                                                <!-- <th>Actions</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                for($i=0; $i<count($tab_type_vehicule); $i++){
                                                    echo'
                                                        <tr>
                                                            <td>'.($i+1).'</td>
                                                            <td>'.$tab_type_vehicule[$i]['libelle'].'</td>
                                                            <td>'.$tab_type_vehicule[$i]['prix'].'</td>
                                                            <td width="10%"><img width="100%" src="assets/images/type_vehicle/'.$tab_type_vehicule[$i]['image'].'" alt=""></td>
                                                            <td>'.$tab_type_vehicule[$i]['creer'].'</td>
                                                            <td>'.$tab_type_vehicule[$i]['modifier'].'</td>
                                                            
                                                        </tr>
                                                    ';
                                                }
                                            ?>
                                            <!-- <td>
                                                <input type="hidden" value="'.$tab_type_vehicule[$i]['id'].'" name="" id="id_type_vehicule_'.$i.'">
                                                <button type="button" onclick="modTypeVehicule(id_type_vehicule_'.$i.'.value);" class="btn btn-warning btn-sm" data-original-title="Modifiy" data-toggle="modal" data-target="#type-vehicule-mod"><i class="fa fa-pencil"></i></button>
                                                <a href="query/action.php?id_type_vehicule='.$tab_type_vehicule[$i]['id'].'" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash"></i> </a>
                                            </td> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
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
                </div>
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
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- This is data table -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example24').DataTable();
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script>
        function modTypeVehicule(id_type){
            $.ajax({
                url: "query/ajax/getTypeVehiculeById.php",
                type: "POST",
                data: {"id_type":id_type},
                success: function (data) {
                    $("#id_type_vehicule_mod").empty();
                    $("#libelle_type_vehicule_mod").empty();
                    $("#price_vehicule_mod").empty();

                    var data_parse = JSON.parse(data);

                    $("#id_type_vehicule_mod").val(data_parse[0].id);
                    $("#libelle_type_vehicule_mod").val(data_parse[0].libelle);
                    $("#price_vehicule_mod").val(data_parse[0].prix);
                }
            });
        }
    </script>

    
    <!--Custom JavaScript -->
    <!-- <script src="js/custom.min.js"></script> -->
    <script src="assets/plugins/toast-master/js/jquery.toast.js"></script>
    <script src="js/toastr.js"></script>
    <!-- Custom Theme JavaScript -->

    <?php if(isset($_SESSION['status']) &&  $_SESSION['status'] == 1){ ?>
            <script>
                showSuccess();
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
