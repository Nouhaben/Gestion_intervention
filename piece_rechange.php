  <!DOCTYPE html>
<?php
session_start();
include "config.php";
if (!isset($_SESSION['email'])) {
        echo '<script type="text/javascript">window.location.href="index.php";</script>';
    }
?>
<?php
$re = $_SESSION['email'];

$req = mysql_query ("select * from employes where email_emp='".$re."' ");
$res = mysql_fetch_array($req);

$rs=$res['nom_emp'].'&nbsp;'. $res['prenom_emp'];	
?>
<html>
    <head>
        <meta charset="UTF-8">
		<title>Espaces techniciens</title>
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
				Espaces techniciens
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
                                <span><?php echo $res['nom_emp'].'&nbsp'. $res['prenom_emp'] ; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $res['nom_emp'].'&nbsp'. $res['prenom_emp'] ; ?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="profil.php?id=<?php echo $res[0]; ?>" class="btn btn-default btn-flat">Profil</a>
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
                            <p>Bonjour, <?php echo $res['nom_emp'].'&nbsp'. $res['prenom_emp'] ; ?></p>

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
                        <li>
                            <a href="accueil.php?id=<?php echo $res[0]; ?>" >
                                <i class="fa fa-home"></i>
								<span>Accueil</span>
                            </a>
                        </li>
						
						<li>
                            <a href="profil.php?id=<?php echo $res[0]; ?>" >
                                <i class="fa fa-user"></i>
								<span>Mon profil</span>
                            </a>
                        </li>
						
						<li class="">
                            <a href="list_dem.php?id=<?php echo $res[0]; ?>" >
                                <i class="fa fa-wrench"></i>
								<span>Listes des demandes</span>
                            </a>
                        </li>
                        
						<li class="treeview active">
                            <a href="#">
                                <i class="fa fa-eye"></i> 
								<span>Les interventions</span>
								<i class="fa fa-angle-left pull-right"></i>
                            </a>
							<ul class="treeview-menu">
			<li><a href="suivi_inter.php?id=<?php echo $res[0]; ?>">Ajouter intervention</a></li>
			<li><a href="consult_inter.php?id=<?php echo $res[0]; ?>">Consulter les interventions</a></li>
			<li><a href="gerer_inter.php?id=<?php echo $res[0]; ?>">Gérer les interventions</a></li>
                                
                            </ul>
							
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
					
						<div class="col-md-10">
                            <!-- Danger box -->
                            <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Ajouter une intervention</h3>
                                    
                                </div>
								<div class="box-body">
								<?php
						include "config.php";
						
						if(!empty($_GET['id_intervention']))
							{
								$aff ="SELECT * FROM  interventions where id_intervention='".$_GET['id_intervention']."'";
								$respons = mysql_query($aff) or die(mysql_error());
								$enreg=mysql_fetch_array($respons);
					?>	
								<h3><u>L'interventions :</u></h3><br>
								
							  
							<form class="form-horizontal" action="" method="post">
								<fieldset>
									<div class="control-group">											
										<label class="control-label" for="firstname">Problème</label>
											<div class="controls">
												<textarea class="form-control" rows="3" name="probleme_inter" disabled><?php echo $enreg['probleme_inter'] ?></textarea>
											</div>
									</div><br>
								
								<div class="control-group">											
										<label class="control-label" for="firstname">Interventions</label>
											<div class="controls">
												<textarea class="form-control" rows="3"  name="interventions" disabled><?php echo $enreg['interventions']?></textarea>
											</div>
									</div><br>
									
									<div class="control-group">											
										<label class="control-label" for="firstname">Observations</label>
											<div class="controls">
												<textarea class="form-control" rows="3"  name="observation" disabled><?php echo $enreg['observation']?></textarea>
											</div>
									</div><br>
									
									<div class="control-group">											
										<label class="control-label" for="firstname">Date Intervention</label>
											<div class="controls">
												<input  class="form-control" name="date_inter" value="<?php echo $enreg['date_inter']?>" disabled>
											</div>
									</div><br>
									
									<div class="control-group">											
										<label class="control-label" for="firstname">heure Intervention</label>
											<div class="controls">
												<input class="form-control" name="heure_inter" value="<?php echo $enreg['heure_inter']?>"disabled >
											</div>
									</div><br>
									
									<div class="control-group">											
										<label class="control-label" for="regle">Reglé</label>
											<div class="controls">
												<?php
												echo '<select name="regle" class="form-control" disabled>';
												 
										{
												echo '<option>'.$enreg['regle'].'</option>';
											}
												echo '</select>';
											?>
											</div>
									</div><br>
									
									
									<div class="control-group">											
										<label class="control-label" for="firstname">Date prochaine interventions</label>
											<div class="controls">
												<input type="date" class="form-control" name="date_prochaine_inter" value="<?php echo $enreg['date_prochaine_inter']?>" disabled>
											</div>
									</div><br>
									
								</fieldset>	
							</form>	
							
							<?php
							}
							$a1=mysql_query("SELECT * FROM interventions WHERE id_intervention='".$_GET['id_intervention']."' ");		
							$o=mysql_fetch_array($a1);
							
							if($o['piec_rech']=='Oui'){
							?>
							
							<h3><u>Informations sur les pièces de rechange :</u></h3><br>
							<form class="form-horizontal" action="" method="post">
								<fieldset>
									<div class="control-group">											
										<label class="control-label" for="firstname">Pièce</label>
											<div class="controls">
												<input type="text" class="form-control"  name="pieces_pr" ></textarea>
											</div>
									</div><br>
									
									<div class="control-group">											
										<label class="control-label" for="firstname">Designation</label>
											<div class="controls">
												<textarea class="form-control" rows="3"  name="desi_pr"  ></textarea>
											</div>
									</div><br>
									
									<div class="control-group">											
										<label class="control-label" for="firstname">Quantité</label>
											<div class="controls">
												<input type="text" class="form-control" name="quantite"  >
											</div>
									</div><br><br>
									
									<div class="login-actions">
										<center><button style="float:right" type="submit" name="submit" class="button btn btn-info btn-large ">Ajouter</button></center>
									</div>
								</fieldset>
							</form>	
							<?php
								
								if ( isset($_POST['submit']) )
									{
									$id_intervention=$_GET['id_intervention'];
									$pieces_pr=addslashes($_POST['pieces_pr']);
									$desi_pr=addslashes($_POST['desi_pr']);
									$quantite=$_POST['quantite'];
                                    
									$ma="INSERT INTO pieces_rechange (id_intervention,pieces_pr,desi_pr,quantite) VALUES ('$id_intervention','$pieces_pr','$desi_pr','$quantite') ";
									$requete = mysql_query($ma) or die( mysql_error() ) ;
						
									  if($requete)
									  {
										echo '<script type="text/javascript">alert("Les pièces ont bien ajoutées");</script>';
									  
										
										
									  }
									  else
									  {
										echo '<script type="text/javascript">alert("Il y a un problème dans l\'ajout du client ");</script>';
									  }
									} 
									  else {}
								?>
								
							<div class="box-body">
								<h3><u>Listes pièces de rechanges</u></h3>
										<div class="box-body table-responsive">
										<table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                
                                                
                                                <th>Pièces </th>
                                                <th>Designations </th>
                                                <th>Quantités </th>
                                                
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										include "config.php";
										 
										if(isset($_GET['id_intervention']))
										{
										$query ="SELECT * FROM  pieces_rechange where id_intervention='".$_GET['id_intervention']."'";
										$response = mysql_query($query) or die(mysql_error());
												while ($data=mysql_fetch_array($response)){
												
												
												
												echo"<tr >"; 
												
												echo"<td>".$data['pieces_pr']."<b></a></td>";
												echo"<td>".$data['desi_pr']."<b></a></td>";
												echo"<td>".$data['quantite']."<b></a></td>";
												echo"</tr>";	
												}
												
										}
										
										}
										
										?>
                                            
                                           
								
								
                                        </tbody> 
                                        
                                    </table><br><br>
									
									
							
						</div>
						
								
					<form class="form-horizontal"  action="send_mail.php" method="get" >
					<div class="login-actions">	
						<input type="text" name="rs" value="<?php echo $rs; ?>" >			
						<input type="text" name="id_demande" value="<?php echo $_GET['id_demande']; ?>" >
						<input type="text" name="id_intervention" value="<?php echo $_GET['id_intervention']; ?>" >
						<input style="float:right" type="submit" name="oui"  value="Envoyer" class="button btn btn-info btn-large" ></center>
					</div>	
					</form>
						</div>
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->

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
                
            });
        </script>        

    </body>
</html>