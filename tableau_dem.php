  <!DOCTYPE html>
<?php
session_start();

if (!isset($_SESSION['email'])) {
        echo '<script type="text/javascript">window.location.href="index.php";</script>';
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
		<title>Espace responsable technique</title>
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

       
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="accueil.php" class="logo">
				Responsable technique
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
                                <span><?php echo $res['email'] ; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $res['email'] ; ?>
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
                        <li class="">
                            <a href="accueil.php?id=<?php echo $res[0]; ?>" >
                                <i class="fa fa-home"></i>
								<span>Accueil</span>
                            </a>
                        </li>
						
						
						
						
                        
						<li class="treeview active">
                            <a href="#">
                                <i class="fa fa-wrench"></i> 
								<span>Les demandes</span>
								<i class="fa fa-angle-left pull-right"></i>
                            </a>
							<ul class="treeview-menu">
								<li><a href="affect_dem.php"><i class="fa fa-angle-double-right"></i>Affecter demande</a></li>
								<li><a href="consultations.php"><i class="fa fa-angle-double-right"></i>Consultations</a></li>
								<li><a href="gerer.php"><i class="fa fa-angle-double-right"></i>Gérer</a></li>
                                
                            </ul>
							
                        </li>
						
						<li>
                            <a href="suivi_inter.php" >
                                <i class="fa fa-eye"></i>
								<span>Suivi des interventions<</span>
                            </a>
                        </li>
						
                        
                        <li>
                            <a href="messages.php?id=<?php echo $res[0]; ?>">
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
                        <li><a href="#"><i class="fa fa-dashboard"></i> Groupe Sunny</a></li>
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
                                    <h3 class="box-title">Affecter un employé</h3>
                                    
                                </div>
								<div class="box-body">
								
								
								<form class="form-horizontal" action="" method="post">
											<fieldset>
											
							
								<a style="float:right" href="pdf.php?id_demande=<?php echo $_GET['id_demande']; ?>" >
									<i class="fa fa-print"></i> Imprimer</button>
								</a><br><br><br>
						
											<?php
												if(isset($_GET['id_demande']))
													{
												
												$req = "select * from demande where id_demande='".$_GET['id_demande']."' ";
												$res = mysql_query($req);
												

											?>
												<div class="control-group">											
													<label class="control-label" for="firstname">N° demande</label>
													<div class="controls">
														<input type="text" class="form-control" name="id_demande" value="<?php echo $_GET['id_demande']; ?>"  >
													</div> <!-- /controls -->				
												</div>
											<?php } ?>
											</fieldset>
										</form><br><br>
										
												<div class="box-body table-responsive">
												  <table id="example2" class="table table-striped table-bordered">
													<thead>
													  <tr>
														
														<th> Raison social</th>
														<th> Matériel</th>
														<th> Problème</th>
													  </tr>
													</thead>
													<tbody>
								<?php
										include "config.php";
										 
										if(isset($_GET['id_demande']))
										{
										
											$q=mysql_query("SELECT * FROM list_mat where id_demande='".$_GET['id_demande']."'");
										
										//$response = mysql_query($q) or die(mysql_error());
												while ($data=mysql_fetch_array($q)){
												
												echo"<tr>"; 
												
														echo"<td>";
													
														if(isset($_GET['id_demande']))
										{
										
											$qur=mysql_query("SELECT * FROM demande where id_demande='".$_GET['id_demande']."'");
														  
														while ($d=mysql_fetch_array($qur)){ 
														 
														$y=mysql_query("SELECT * FROM clients where id_cli='".$d['id_cli']."' ");
														$dat=mysql_fetch_array($y);
													
													$rs=$dat['raison_social'];	
												
													echo $dat['raison_social'] ;
																
													}	}
														echo "</td>";
												
														echo "<td>";
													
														
												
														$r=mysql_query("select * from materiel_cli where id_mat='".$data['id_mat']."' ");
														$date=mysql_fetch_array($r);
														
													echo $date['num_serie'].'&nbsp'.$date['type_mat'].'&nbsp'.$date['marque_mat'].'&nbsp'.$date['desi_mat'] ;
												
												echo"</td>";
												
												echo"<td>".$data['probleme_demande']."<b></a></td>";
												
												echo"</tr>";	
												}
											}	
										
										
										
										
										?>
								 
								
								</tbody>
							  </table><br><br>
							</div>
								<form role="form" method="post">
									<fieldset>
										    <div class="form-group">										
											<label>affecter employé</label>
												<div class="controls">
													<?php	
										
														$q=mysql_query("SELECT * FROM employes");
															echo '<select name="id_emp" class="form-control">';
															while ($row = mysql_fetch_array($q)) 
														{
															echo '<option value="'.$row['id_emp'].'" >'.$row['nom_emp'].'&nbsp'.$row['prenom_emp'].'</option>';
														}
															echo '</select>';
															
													?>		
												</div>			
										</div> 
										
										 <div class="form-group">												
											<label>Responsable</label>
											
                                           
											
                                            <div class="controls">
                                            
                                              <input type="checkbox" name="responsable" value="yes" > Oui
                                            </label>
                                            
                                          </div>		<!-- /controls -->		
										</div>
										
										<div class="login-actions">
											<center><button type="submit" name="submit" class="button btn btn-success ">Affecter employés</button></center>
										</div>
										
									</fieldset>
								</form>
								<?php
								if ( isset($_POST['submit']) ) {
									$id_demande=$_GET['id_demande'];
									$id_emp=$_POST['id_emp'];
									$responsable=(isset($_POST['responsable']))? 1 : 0;
									

								$sql = "INSERT INTO confirmations(id_demande,id_emp,responsable,excuse) VALUES('$id_demande','$id_emp','$responsable','0')";
								$requete = mysql_query($sql) or die( mysql_error() ) ;
								 
								if($requete)
									{
										
									}
								else
									{
										echo '<script type="text/javascript">alert("Il y a un problème dans l\'ajout du l\'employe ");</script>';
									}
								}  
								else {}
								?>
							<br>
							<div class="box-body table-responsive">
												  <table id="example2" class="table table-striped table-bordered">
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
										 
										if(isset($_GET['id_demande']))
										{
										
											$q=mysql_query("SELECT * FROM confirmations where id_demande='".$_GET['id_demande']."'");
										
												while ($data=mysql_fetch_array($q)){
												
												echo"<tr>"; 
												
												echo "<td>";
												
													
														$y=mysql_query("SELECT * FROM employes where  id_emp='".$data['id_emp']."'");
														$dat=mysql_fetch_array($y);
												
													echo $dat['nom_emp'].'&nbsp'.$dat['prenom_emp'] ;
												
												echo"</td>";
													echo "<td>";
												
													
														$y=mysql_query("SELECT * FROM employes where  id_emp='".$data['id_emp']."'");
														$dat=mysql_fetch_array($y);
												
													echo $dat['fonction_emp'] ;
												
												echo"</td>";
												
													echo "<td>";
												
													
														$y=mysql_query("SELECT * FROM employes where  id_emp='".$data['id_emp']."'");
														$dat=mysql_fetch_array($y);
												
													echo $dat['service_emp'] ;
												
												echo"</td>";
												
												echo"<td>";
													if($data['responsable']=='1'){
													echo 'Oui' ;}
													else {echo ''; }
													
												echo"</td>";
												echo"</tr>";	
												}
											}	
										
										
										
										
										?>
								 
								
								</tbody>
							  </table><br><br>
							</div>
							
								
							</div>
							</fieldset>
							</form>
							
				
					<center>
									
						<form action="trai_mail.php" method="get" >
						
						<input type="text" name="rs" value="<?php echo $rs; ?>" >			
						<input type="text" name="id_demande" value="<?php echo $_GET['id_demande']; ?>" >
						
						<input type="submit" name="oui"  value="Envoyer" class="button btn btn-success "></center>
						
						</form>
								</div>
							</div>	
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