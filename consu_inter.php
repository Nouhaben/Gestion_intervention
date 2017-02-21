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
        <!-- DATA TABLES -->
        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
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
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Directeur            </a>
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
                            </ul>   
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
                                    <p><?php echo $res['email'] ; ?> - <?php echo $res['role'] ; ?>
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
                        <li><a href="accueil.php"><i class="fa fa-home"></i> Groupe Sunny</a></li>
                        <li class="active">Comptes</li>
						<li class="active"><a href="ajoucomt_cli.php">Ajouter un compte pour les client</a></li>
                    </ol>
                </section>
				
                        
						
				 <section class="content" id="list_mat">
                    <div class="row">
                        <!-- right column -->
                        <div class="col-md-12">
				<div class="box box-solid box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">Suivi des interventions</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-warning btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-warning btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
								
                        <div class="col-xs-15">
                            <div class="box">
                                <div class="box-body">
									
									
							<form class="form-horizontal" action="" method="post">
											<fieldset>
											<?php
												if(isset($_GET['id_demande']))
													{
												
												$rq = "select * from demande where id_demande='".$_GET['id_demande']."' ";
												$rs = mysql_query($rq);
												

											?>
												<div class="form-group">
													<label>N° demande</label>
													<input type="text" name="raison_social" value="<?php echo $_GET['id_demande']; ?>" disabled />
												</div>
											<?php } ?>
											
											</fieldset>
									</form><br><br>
									
								<div class="form-group">
											<h3></u>Equipes affectés</u></h3>
												</div>
							
												  <table class="table table-striped table-bordered">
													<thead>
													  <tr>
														
														<th> Employé</th>
														<th> Fonction</th>
														<th> Service</th>
														<th> Responsable</th>
													  </tr>
													</thead>
													<tbody>
													<?php
															include "config.php";
															 
															
															
																$q=mysql_query("SELECT * FROM confirmations where id_demande='".$_GET['id_demande']."'");
															
																	while ($d=mysql_fetch_array($q)){
																	
																	echo"<tr>"; 
																	
																	echo "<td>";
																	
																		
																			$y=mysql_query("SELECT * FROM employes where  id_emp='".$d['id_emp']."'");
																			$dat=mysql_fetch_array($y);
																	
																		echo $dat['nom_emp'].'&nbsp'.$dat['prenom_emp'] ;
																	
																	echo"</td>";
																		echo "<td>";
																	
																		
																			$y=mysql_query("SELECT * FROM employes where  id_emp='".$d['id_emp']."'");
																			$dat=mysql_fetch_array($y);
																	
																		echo $dat['fonction_emp'] ;
																	
																	echo"</td>";
																	
																		echo "<td>";
																	
																		
																			$y=mysql_query("SELECT * FROM employes where  id_emp='".$d['id_emp']."'");
																			$dat=mysql_fetch_array($y);
																	
																		echo $dat['service_emp'] ;
																	
																	echo"</td>";
																	
																	echo"<td>";
																		if($d['responsable']=='1'){
																		echo 'Oui' ;}
																		else {echo ''; }
																		
																	echo"</td>";
																	
																	echo"</tr>";	
																	}
															
															?>
													 
								
								</tbody>
							  </table><br><br>
							  
							  <table id="example1"class="table table-bordered table-striped">
                                        <thead>
											<tr>
												<th> Code intervention </th>
												<th> Problème intervetion</th>
												<th> Intervention</th>
												<th> Observation</th>
												<th> Date Intervention</th>
												<th> Heure Intervention</th>
												<th> Reglé</th>
												<th> Date prochaine intervention</th>
												<th> pièce de rechange</th>
											</tr>
                                        </thead>
                                        <tbody>
										<?php
										include "config.php";
										 if(isset($_GET['id_demande']))
										{
											$quer=mysql_query("SELECT * FROM interventions where id_demande='".$_GET['id_demande']."'");
												
												while ($data=mysql_fetch_array($quer)){
											
                                            
												echo"<tr>"; 
												echo"<td>".$data['id_intervention']."</td>";
												echo"<td>".$data['probleme_inter']."</td>";
												echo"<td>".$data['interventions']."</td>";
												echo"<td>".$data['observation']."</td>";
												echo"<td>".$data['date_inter']."</td>";
												echo"<td>".$data['heure_inter']."</td>";
												echo"<td>".$data['regle']."</td>";
												echo"<td>".$data['date_prochaine_inter']."</td>";
												echo"<td>";
												
												$a1=mysql_query("SELECT * FROM interventions WHERE id_intervention='".$data['id_intervention']."' ");
												
												$o=mysql_fetch_array($a1);
							
													if($o['piec_rech']=='Oui'){
														echo" <a href='consu_piece.php?id_intervention=".$o['id_intervention']."'><input class=\"btn btn-warning btn-small\" value=\"Consulter\" ></a>";
													
												}
													else echo $data['piec_rech']; 
												
												echo"</td>";
												echo"</tr>";	
												
												}
											
										
										}
										?>
                                        </tbody> 
										
                                        
                                    </table><br><br>
									
							</div>
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
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

    </body>
</html>