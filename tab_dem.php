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

					<div class="row">
                        <div class="col-md-12">
                            <!-- Danger box -->
                            <div class="box box-solid box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Consultations des matériels concernant chaque clients</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-danger btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-danger btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
								
								<div class="col-xs-15">
                            <div class="box">
                                <div class="box-body">
                                  
                                   <?php
										

									if(isset($_GET['id']))
										{
									
									$req = "select * from clients where id_cli='".$_GET['id']."' ";
									$res = mysql_query($req);
									while($enreg=mysql_fetch_array($res))
									{ 

								?>
									
										<div class="form-group">
											<label>Raison social</label>
											<input type="text" class="form-control" name="raison_social" value="<?php echo $enreg['raison_social'] ?>" disabled />
										</div>
								<?php
								}}
								?>
										<div class="form-group">
											<label>Liste des demande</label>
											</div>
										<table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                
                                                
                                                <th> Code de demande</th>
												<th> Date-Heure de demande</th>
												<th> Nombre de problème</th>
												<th> Etat de demande</th>
												<th> Détails du problème</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										
										 
										 if(isset($_GET['id']))
										{
										
										
										$qq=mysql_query("SELECT * FROM demande where id_cli='".$_GET['id']."' ORDER BY  `demande`.`id_demande` DESC");
										while ($data=mysql_fetch_array($qq)){
										
												echo"<tr>";
												echo"<td>".$data['id_demande']."</td>";
												echo "<td>".$data['dateheure_demande']."</td>";
												echo"<td>";
												
										
												$y=mysql_query("SELECT count(*) as total FROM list_mat where  id_demande='".$data['id_demande']."'  ");
														$dat=mysql_fetch_assoc($y);
												echo $dat['total'];
												
												echo"</td>";
												echo "<td>";
												
												$q=mysql_query("SELECT * FROM list_mat where id_demande='".$data['id_demande']."'");
												$etat=true;
												$test=0;
												while($ta=mysql_fetch_array($q)){
												//$r=mysql_query("select * from materiel_cli where id_mat='".$ta['id_mat']."' //");
												//$date=mysql_fetch_array($r);
													
												$aff=mysql_query("SELECT COUNT(id_demande) FROM interventions WHERE id_demande='".$data['id_demande']."' and id_mat='".$ta['id_mat']."' ");
												$don=mysql_fetch_array($aff);
												
												
														if($don[0]==0 && $etat==true){
														
														
															$etat=false;
															$test=0;
														}
												
															else {
															
															
												$aff1=mysql_query("SELECT * FROM interventions WHERE id_demande='".$data['id_demande']."' and id_mat='".$ta['id_mat']."'");		
														$test1=0;
														while($on=mysql_fetch_array($aff1)){
														
													
														
														
															if($on['regle']=='Non' && $etat==true && $test1==0){
																
																$etat=false;
																$test=1;
															}
															
															if($on['regle']=='Oui')
															{
															$test=1;
															$test1=1;
															$etat=true;
															
															}															
														}
														}}
														
														if($test==0)
														{
															echo" <input class=\"btn btn-danger btn-xs\" value=\"En attente\" disabled>";
														}
														else
														{
														
														if($etat==false && $test1==0)
															echo" <input class=\"btn btn-warning btn-xs\" value=\"Non reglée\" disabled>";
														else
															echo" <input class=\"btn btn-success btn-xs\" value=\"Reglée\" disabled>";
														}
														
												echo"</td>";
												echo"<td><a href='table_dem.php?id=".$_GET['id']."&id_demande=".$data[0]." '><input class=\"btn btn-primary btn-xs\" value=\"Consulter\" ></a></td>";
												
												echo"</tr>";	
												}
											}	
										
										
										
										
										?>
                                            
                                           
  
                                        </tbody> 
										</table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                       

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