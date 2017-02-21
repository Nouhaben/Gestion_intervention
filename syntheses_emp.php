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
        <title>Siège du groupe Sunny</title>
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
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
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
                                <span><?php echo $res['email'] ; ?><i class="caret"></i></span>
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
                        <li><a href="#"><i class="fa fa-dashboard"></i> Groupe Sunny</a></li>
                        <li class="active"><a href="calendar.php">Tableau de bord</a></li>
                        <li class="active"><a href="calendar.php">Tableau de bord - Clients</a></li>
                    </ol>
                </section>
				
				
								
                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
					
					<?php
									$req = "select * from employes";
									$res = mysql_query($req);
									$num = 1;
									while($enreg=mysql_fetch_array($res))
									{ 
									$enr['id_emp'][$num] = $enreg['id_emp'];
									$enr['date_inscription'][$num] = strstr($enreg['date_inscription'], " ",true);
									$enr['nom_emp'][$num] = $enreg['nom_emp'];
									$enr['prenom_emp'][$num] = $enreg['prenom_emp'];
									$enr['fonction_emp'][$num] = $enreg['fonction_emp'];
									$num++;
								}
								
							
					?>
                        <div class="col-lg-12 col-xs-12">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    
                                    <p>
                                        Total clients inscrits : <h3> <?php echo count($enr['id_emp']); ?> </h3>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                
                            </div>
                        </div>
						
						
                        
                    </div>
	
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-12 connectedSortable"> 
                            <!-- Box (with bar chart) -->
                            <div class="box box-success" id="loading-example">
                                <div class="box-header">
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-success btn-sm refresh-btn" data-toggle="tooltip" title="Reload"><i class="fa fa-refresh"></i></button>
                                        <button class="btn btn-success btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-success btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                    </div><!-- /. tools -->
                                    <i class="fa fa-cloud"></i>

                                    <h3 class="box-title">Informations sur les employés</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <div class="row">
                                        
                                        <div class="col-sm-12">
                                            <div class="pad">
                                                <!-- Progress bars -->
                                                <div class="clearfix">
                                                    <h4><span class="pull-left">Employés inscrits aujourd'hui :</span></h4>
                                                    <small class="pull-right"><?php
													
													$employe_inscrits = array_count_values($enr['date_inscription']);
													if(isset($employe_inscrits[date('Y-m-d')])){
														echo $employe_inscrits[date('Y-m-d')]; 
													}else{
													 echo "Aucun employé n'est inscrit aujourd'hui."; 
													 }
													?></small>
                                                </div>
                                                <div class="progress">
                                                    <div  class="progress-bar progress-bar-aqua" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                                </div>

                                                <div class="clearfix">
                                                    <h4><span class="pull-left">Employés inscrits cette semaine :</span></h4>
                                                    <small class="pull-right"><?php
														 $semaine = isset($employe_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*7)]);
														 $jour6 = isset($employe_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*6)]);
														 $jour5 = isset($employe_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*5)]);
														 $jour4 = isset($employe_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*4)]);
														 $jour3 = isset($employe_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*3)]);
														 $jour2 = isset($employe_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*2)]);
														 $jour1 = isset($employe_inscrits[strftime("%Y-%m-%d", strtotime(date('Y-m-d')) - 60*60*24*1)]);
														 if(isset($employe_inscrits[date('Y-m-d')])) {
															$employe = $employe_inscrits[date('Y-m-d')]; 
														}else {
															$employe = 0;
														}
														 $nombretotal = $employe + $semaine + $jour1 + $jour2 + $jour3 + $jour4 + $jour5 + $jour6;

														 if($nombretotal == 0 ) {
															echo "Aucun employé n'est inscrit cette semaine.";
														 }else {
															echo $nombretotal;
														 }
														  ?></small>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-red" style="width: 100%;"></div>
                                                </div>

                                                <div class="clearfix">
                                                    <h4><span class="pull-left">Employés inscrits ce mois :</span></h4>
                                                    <small class="pull-right"><?php
													foreach ($enr['date_inscription'] as $key => $value) {
														$mois[$key] = substr($enr['date_inscription'][$key], 0,7);
													}
													$employe_inscrits = array_count_values($mois);
													if(isset($employe_inscrits[date('Y-m')])){
														echo $employe_inscrits[date('Y-m')]; 
													}else{
													 echo "Aucun employé n'est inscrit ce mois."; 
													 }
													?></small>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 100%;"></div>
                                                </div>

                                                <div class="box-footer clearfix no-border">
													<button class="btn btn-default pull-right"><a href="accueil.php"> retour aux autres statistiques</a></button>
												</div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>    
                            
                        
                        

                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>        

    </body>
</html>