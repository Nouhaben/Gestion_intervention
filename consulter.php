  <!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['email'])) {
         header('location:index.php');
    }

$re = $_SESSION['email'];

include "config.php";


$req = mysql_query ("select * from users where email='".$re."' ");
$res = mysql_fetch_array($req);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Directeur</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="accueil.php" class="logo">
              Directeur            
			</a>
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
                           
                        </li>
                       
                        
                       <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $res['email'] ; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $res['email'] ; ?> -  <?php echo $res['role'] ; ?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    
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
                        <li>
                            <a href="syntheses_mat.php">
                                <i class="fa  fa-shopping-cart"></i> 
								<span>Suivi des matériels</span> 
								
                            </a>
							
                        </li>
						 
						<li>
                            <a href="syntheses_emp.php">
                                <i class="fa fa-group"></i> 
								<span>suivi des employés</span>
								
                            </a>
							
                        </li>
						<li>
                            <a href="syntheses_dem.php">
                                <i class="fa fa-wrench"></i> 
								<span>Suivi des demande </span>
								
                            </a>
							
							
                        </li>
						
						<li>
                            <a href="syntheses_inter.php">
                                <i class="fa fa-eye-slash"></i> 
								<span>Suivi des interventions</span>
								
                            </a>
							
							
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
                        <li><a href="#"><i class="fa fa-dashboard"></i> Direction</a></li>
                        <li class="active"><a href="accueil.php">Accueil</a></li>
                    </ol>
                </section>	
				
								
                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
					
						<div class="col-md-12">
                            <!-- Danger box -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">Conulter les affectations</h3>
                                    
                                </div>
								<div class="box-body">
								
								<div class="box-body table-responsive">
								<table  id="example2" class="table table-striped table-bordered">
									<thead>
                                            <tr>
												<th> N° demande </th>
												<th> Raison social</th>
												<th> Nombre problème</th>
												<th> Confirmation employé</th>
												<th> Consulations</th>
											</tr>
                                        </thead>
                                        <tbody>
										<?php
										include "config.php";
											
										 
											$quer=mysql_query("SELECT * FROM confirmations ");
												$d=mysql_fetch_array($quer);
												
											$q=mysql_query("SELECT * FROM demande ORDER BY  `demande`.`id_demande` DESC  ");
										
										//$response = mysql_query($q) or die(mysql_error());
												while ($data=mysql_fetch_array($q)){
												
												$my=mysql_query("SELECT count(id_demande) as total FROM confirmations where  id_demande='".$data['id_demande']."'  ");
													$fetch=mysql_fetch_assoc($my);
													
												$query1=mysql_query("SELECT * FROM confirmations where id_demande='".$data['id_demande']."'");
												$mysql1=mysql_fetch_array($query1);
												
												
													
													if($fetch['total'] == 0 ){
														
													}
													else{
													if($mysql1['confirmation']=='0'){
														echo"<tr>"; 
														echo"<td>".$data['id_demande']."</td>";
														echo "<td>";
												
													
														$y=mysql_query("SELECT * FROM clients where id_cli='".$data['id_cli']."' ");
														$dat=mysql_fetch_array($y);
												
													echo $dat['raison_social'] ;
												
												echo"</td>";
												
												
												echo"<td>";
												
										
												$y=mysql_query("SELECT count(*) as total FROM list_mat where  id_demande='".$data['id_demande']."'  ");
														$d=mysql_fetch_assoc($y);
												echo $d['total'];
												
												echo"</td>";
												echo "<td>";
												$query=mysql_query("SELECT * FROM confirmations where id_demande='".$data['id_demande']."'");
												$mysql=mysql_fetch_array($query);
												
												
														
												
														if($mysql['confirmation']=='0'){
															echo" <input class=\"btn btn-warning btn-xs\" value=\"En attente\" disabled>";
														}
														elseif($mysql['confirmation']=='1'){
															echo" <input class=\"btn btn-success btn-xs\" value=\"Confirmé\" disabled>";
														}
														else
															echo" <input class=\"btn btn-danger btn-xs\" value=\"s'excusé\" disabled>";
												
												
												echo"</td>";
												
												
												echo"<td><a href='consu.php?id_demande=".$data[0]." '><input class=\"btn btn-primary btn-xs\" value=\"Consulter\" ></a></td>";
												echo"</tr>";	
												
												}}
											}
										
										
										?>
                                        </tbody> 
                                        </tbody> 
							  </table><br>
							</div> 	
                        
                    </div><!-- /.row -->

                    

                    

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- page script -->
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