<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['email'])) {
         header('location:index.php');
    }
?>

<?php
$re = $_SESSION['email'];

include "config.php";


$req = mysql_query ("select * from users where email='".$re."' ");
$res = mysql_fetch_array($req);
?>

<?php 
	
	
	
	
if ( isset($_POST['type_mat']) ) {
	$type_contrat=$_POST['type_contrat'];
	$num_serie= $_POST['num_serie'];
	$id_cli=$_GET['id'];
	$type_mat=	addslashes($_POST['type_mat']);
	$marque_mat=addslashes($_POST['marque_mat']);
	$desi_mat=addslashes($_POST['desi_mat']);
	$date_achat=$_POST['date_achat'];
	$ref_achat=addslashes($_POST['ref_achat']);

	$sql = "INSERT INTO materiel_cli(type_contrat,num_serie,id_cli,type_mat,marque_mat,desi_mat,date_achat,ref_achat) VALUES('$type_contrat','$num_serie', '$id_cli','$type_mat','$marque_mat','$desi_mat','$date_achat','$ref_achat')";
	$req = mysql_query($sql) or die( mysql_error() ) ;
	
	
	
	  if($req)
	  {
		echo '<script type="text/javascript">alert("Le matériel est bien ajouté");</script>';
		
	  }

	  else {
		echo '<script type="text/javascript">alert("Il y a un problème dans l\'ajout du client ");</script>';
	  }
	  }
	  
	  else{}
	
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Siège du groupe Sunny</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
		
		<link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
		<link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

       
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="accueil.php" class="logo">
              
                Administration            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar3.png" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li><!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        
                        
                       <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $res['email'] ; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $res['email'] ; ?> - <?php echo $res['role'] ; ?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">Se déconnecter</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Bonjour, <?php echo $res['email'] ; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="accueil.php">
                                <i class="fa fa-home"></i>
								<span>Accueil</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-group"></i> 
								<span>Clients</span> 
								<i class="fa fa-angle-left pull-right"></i>
                            </a>
							<ul class="treeview-menu">
                                <li><a href="ajout_client.php"><i class="fa fa-angle-double-right"></i> Ajouter</a></li>
                                <li><a href="consu_clients.php"><i class="fa fa-angle-double-right"></i> Consulter</a></li>
                                <li><a href="gerer_client.php"><i class="fa fa-angle-double-right"></i> Gérer</a></li>
                            </ul>
                        </li>
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-suitcase"></i> 
								<span>Employés</span>
								<i class="fa fa-angle-left pull-right"></i>
                            </a>
							<ul class="treeview-menu">
								<li><a href="ajout_employe.php"><i class="fa fa-angle-double-right"></i> Ajouter</a></li>                                
								<li><a href="consu_employe.php"><i class="fa fa-angle-double-right"></i> Consulter</a></li>
								<li><a href="gerer_employe.php"><i class="fa fa-angle-double-right"></i> Gérer</a></li>
                                
                            </ul>
							
                        </li>
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-truck"></i> 
								<span>Matériel</span>
								<i class="fa fa-angle-left pull-right"></i>
                            </a>
							<ul class="treeview-menu">
								<li><a href="ajout_materiel.php"><i class="fa fa-angle-double-right"></i> Ajouter</a></li>
                                <li><a href="consu_materiel.php"><i class="fa fa-angle-double-right"></i> Consulter</a></li>
                                <li><a href="gerer_materiel.php"><i class="fa fa-angle-double-right"></i> Gérer</a></li>
                            </ul>
							
                        </li>
                        
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-truck"></i> 
								<span>Comptes</span>
								<i class="fa fa-angle-left pull-right"></i>
                            </a>
							<ul class="treeview-menu">
								<li class="treeview">
									<a href="#">
										<i class="fa fa-angle-double-right"></i> 
										<span>Clients</span>
										<i class="fa fa-angle-left pull-right"></i>
										
									</a>
									<ul class="treeview-menu">
										<li><a href="ajoucomt_cli.php"><i class="fa fa-angle-double-right"></i> Ajouter</a></li>
										<li><a href="consucomt_cli.php"><i class="fa fa-angle-double-right"></i> Consulter</a></li>
										<li><a href="gerecomt_cli.php"><i class="fa fa-angle-double-right"></i> Gérer</a></li>
                                
									</ul>
								</li>
								
                                <li class="treeview">
									<a href="#">
										<i class="fa fa-angle-double-right"></i> 
										<span>Employés</span>
										<i class="fa fa-angle-left pull-right"></i>
										
									</a>
									<ul class="treeview-menu">
										<li><a href="ajoutcomt_emp.php"><i class="fa fa-angle-double-right"></i> Ajouter</a></li>
										<li><a href="consucomt_emp.php"><i class="fa fa-angle-double-right"></i> Consulter</a></li>
										<li><a href="gerecomt_emp.php"><i class="fa fa-angle-double-right"></i> Gérer</a></li>
                                
									</ul>
								</li>
                                
                            </ul>
							
                        </li>
						
                        <li>
                            <a href="messages.php">
                                <i class="fa fa-envelope"></i> <span>Message</span>
                                <small class="badge pull-right bg-yellow">12</small>
                            </a>
                        </li>
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Bienvenue 
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="accueil.php"><i class="fa fa-home"></i> Groupe Sunny</a></li>
                        <li class="active">Clients</li>
						<li class="active"><a href="ajout_client.php">Ajouter un client</a></li>
                    </ol>
                </section>
				
				<section class="content">
                    <div class="row">
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->
                            <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Ajouter Matériel</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form  action="" method="post" role="form">
                                        <!-- text input -->
										<div class="form-group">
                                        <label>Type contrat</label>   
												<select  class="form-control" name="type_contrat">
													<option>avec contrat</option>
													<option>sans contrat</option>
												</select>
										</div>
										
										<div class="form-group">
										<?php
										include "config.php";
										$req=mysql_query("SELECT MAX(id_mat)+1 as max FROM materiel_cli");
									   $row2 = mysql_fetch_array($req);
							   
									   $d=date('Y/m/d');
									   $rest=substr($d,0,4); 
									   $res=$row2['max']."/".$rest;
										?>
                                        <label>Numéro de série</label>
										<input type="text" class="form-control" name="num_serie" value="<?php echo $res;?>" />
										
										</div>
								
									<div class="form-group">
											<label>Raison social</label>
									<?php	
											
											  if(isset($_GET['id']))
										{
											$q=mysql_query("SELECT * FROM clients where id_cli='".$_GET['id']."'");
												echo '<select class="form-control"  name="id_cli" disabled >';
												while ($row = mysql_fetch_array($q)) 
										{
												echo '<option value="'.$row['id_cli'].'">'.$row['raison_social'].'</option>';
											}
												echo '</select>';
												}
											?>
									</div>
										
										<div class="form-group">
                                        <label>Type matériel</label>
										<input type="text" class="form-control" placeholder="Enter le type" name="type_mat" />
										
										</div>
										<div class="form-group">
                                        <label>Marque matériel</label>
										<input type="text" class="form-control" placeholder="Enter la marque" name="marque_mat">
										
										</div>

                                        <div class="form-group">
                                        <label>Designation matériel</label>
										<textarea class="form-control" rows="3" placeholder="Enter la désignation du matériel" name="desi_mat" ></textarea>
										
										</div>
										
										<div class="form-group">
											<label>Date d'achat</label>
											<input type="date" class="form-control" placeholder="Enter la date" name="date_achat">
										</div>
										
										<div class="form-group">
                                        <label>Réference d'achat</label>
										<textarea class="form-control" rows="3" placeholder="Enter la réference d'achat du matériel" name="ref_achat" ></textarea>
										
										</div>
										
										<center><button type="submit" class="btn btn-danger">Ajouter</button></a></center>
		
                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content --
				
				<section class="content">

					<div class="row">
                        <div class="col-md-12">
                            <!-- Danger box -->
                            <div class="box box-solid box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Listes des matériels</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-danger btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-danger btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
								
                        <div class="col-xs-15">
                            <div class="box">
                                <div class="box-body">
									
									<form>
									
									<?php
										include "config.php";

									if(isset($_GET['id']))
										{
									
									$req = "select * from clients where id_cli='".$_GET['id']."' ";
									$res = mysql_query($req);
									while($enreg=mysql_fetch_array($res))
									{ 

								?>
									
										<div class="form-group">
											<label>Raison social</label>
											<input type="text" class="form-control" name="raison_social" value="<?php echo $enreg['raison_social'] ?>"/>
										</div>
								<?php
								}}
								?>
										<div class="form-group">
											<label>Liste des matériels</label>
											</div>
										<div class="box-body table-responsive">
										<table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                
                                                <th>Numéro de série </th>
                                                <th>type contrat </th>
                                                <th>type matériel </th>
                                                <th>Marque matériel </th>
                                                <th>Désignation matériel </th>
                                                <th>date d'achat </th>
                                                <th>Réference d'achat </th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										include "config.php";
										 
										 if(isset($_GET['id']))
										{
										$query ="SELECT * FROM  materiel_cli where id_cli='".$_GET['id']."' ORDER BY  `materiel_cli`.`num_serie` DESC";
										$response = mysql_query($query) or die(mysql_error());
												while ($data=mysql_fetch_array($response)){
												
												
												
												echo"<tr >"; 
												echo"<td>".$data['num_serie']."<b></a></td>";
												echo"<td>".$data['type_contrat']."<b></a></td>";
												echo"<td>".$data['type_mat']."<b></a></td>";
												echo"<td>".$data['marque_mat']."<b></a></td>";
												echo"<td>".$data['desi_mat']."<b></a></td>";
												echo"<td>".$data['date_achat']."<b></a></td>";
												echo"<td>".$data['ref_achat']."<b></a></td>";
												echo"</tr>";	
												}
												
										
										}
										
										
										?>
                                            
                                           
  
                                        </tbody> 
                                        
                                    </table><br><br>
										<div class="box-footer clearfix no-border">
										<a href="ajout_materiel.php"class="btn btn-default pull-right"> retour</a>
									</div></form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
				
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
		<!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- InputMask -->
        <script src="js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <!-- date-range-picker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- bootstrap color picker -->
        <script src="js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        <!-- bootstrap time picker -->
        <script src="js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        
		

		<script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                'Last 7 Days': [moment().subtract('days', 6), moment()],
                                'Last 30 Days': [moment().subtract('days', 29), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                            },
                            startDate: moment().subtract('days', 29),
                            endDate: moment()
                        },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                );

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
        </script>
		<script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": false,
                    "bInfo": true,
                    "bAutoWidth": true
                });
            });
        </script>
    </body>
</html>