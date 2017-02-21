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
                                    <p><?php echo $res['email'] ; ?> - <?php echo $res['role'] ; ?>
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
                        <li class="active">Comptes</li>
						<li class="active"><a href="ajoucomt_cli.php">Ajouter un compte pour les client</a></li>
                    </ol>
                </section>
	
                
				 <section class="content">
                    <div class="row">
                        <!-- right column -->
                        <div class="col-md-12">
				<div class="box box-solid box-success">
                                <div class="box-header">
                                    <h3 class="box-title">Listes des comptes clients</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
								
                        <div class="col-xs-15">
                            <div class="box">
                                <div class="box-body">
									
									<form>
									
										<table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                
                                                <th>Numéro de compte </th>
                                                <th>Email</th>
                                                <th>Mot de passe </th>
                                                <th>Rôle </th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
										include "config.php";
										 
										$query ="SELECT * FROM  users where role='client' ";
										$response = mysql_query($query) or die(mysql_error());
												while ($data=mysql_fetch_array($response)){
												
												
												
												echo"<tr >"; 
												echo"<td>".$data['id']."<b></a></td>";
												echo"<td>".$data['email']."<b></a></td>";
												echo"<td>".$data['password']."<b></a></td>";
												echo"<td>".$data['role']."<b></a></td>";
												
												echo"</tr>";	
												}
												
										
										
										
										
										?>
                                            
                                           
  
                                        </tbody>
                                        
                                    </table>
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