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
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
		
		<link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />

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
						
						<li class="active">
                            <a href="profil.php?id=<?php echo $res[0]; ?>" >
                                <i class="fa fa-user"></i>
								<span>Mon profil</span>
                            </a>
                        </li>
						
						<li>
                            <a href="list_dem.php?id=<?php echo $res[0]; ?>" >
                                <i class="fa fa-wrench"></i>
								<span>Listes des demandes</span>
                            </a>
                        </li>
                        
						<li class="treeview">
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
                            <!-- general form elements disabled -->
                            <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Votre compte</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form  action="" method="post" role="form">
                                        <!-- text input -->
										
										<div class="form-group">											
											<label>Nom employé</label>
											<div class="input-group"> 
												<span class="input-group-addon"><div  class="fa fa-user"> </div></span>
												<input type="text" class="form-control disabled" id="firstname" value="<?php echo $res['nom_emp'] ; ?>" disabled>
											</div> <!-- /controls -->				
										</div> <!-- /form-group -->
										
										
										<div class="form-group">											
											<label>Prénom employé</label>
											<div class="input-group">
												<span class="input-group-addon"><div  class="fa fa-user"> </div></span>
												<input type="text" class="form-control disabled" id="lastname" value="<?php echo $res['prenom_emp'] ; ?>" disabled>
											</div> <!-- /controls -->				
										</div> <!-- /form-group -->
										
								<div class="form-group">											
											<label>Fonction</label>
											<div class="input-group">
												<span class="input-group-addon"><div class="fa fa-suitcase"></div></span>
												<input type="text" class="form-control" id="email" value="<?php echo $res['fonction_emp'] ; ?>">
											</div> <!-- /controls -->				
										</div> <!-- /form-group -->
										
										<div class="form-group">											
											<label>Service</label>
											<div class="input-group">
												<span class="input-group-addon"><div class="fa fa-wrench"></div></span>
												<input type="text" class="form-control" value="<?php echo $res['service_emp'] ; ?>" >
											</div> <!-- /controls -->				
										</div> <!-- /form-group -->
										
										<div class="form-group">											
											<label class="input-group" >Email</label>
											<div class="input-group">
												<span class="input-group-addon">@</span>
												<input type="text" class="form-control" value="<?php echo $res['email_emp'] ; ?>" >
											</div> <!-- /controls -->				
										</div> <!-- /form-group -->
										
										<div class="form-group">											
											<label>Adresse</label>
											<div class="input-group">
												<span class="input-group-addon"><div class="fa fa-edit "></div></span>
<?php echo"<input value='".$res['adresse_emp']."' type=\"text\" class=\"form-control\" >"; ?>
											</div> <!-- /controls -->				
										</div> <!-- /form-group -->
										
										<div class="form-group">											
											<label class="input-group" >Ville</label>
											<div class="input-group">
												<span class="input-group-addon"><div class="fa fa-pencil-square-o"></div></span>
												<input type="text" class="form-control" value="<?php echo $res['ville_emp'] ; ?>">
											</div> <!-- /controls -->				
										</div> <!-- /form-group -->
										
										<div class="form-group">											
											<label class="input-group" >Tel</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-phone"></i>
												</div>
												<input type="text" class="form-control" value="<?php echo $res['tel_emp'] ; ?>">
											</div> <!-- /controls -->				
										</div> <!-- /form-group -->

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                    </div><!-- /.row -->
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