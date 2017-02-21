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
					
						<?php
									$req = "select * from materiel_cli";
									$res = mysql_query($req);
									$num = 1;
									while($enreg=mysql_fetch_array($res))
									{ 
									$enr['id_mat'][$num] = $enreg['id_mat'];
									$enr['date_inscription'][$num] = strstr($enreg['date_inscription'], " ",true);
									$enr['type_mat'][$num] = $enreg['type_mat'];
									$enr['marque_mat'][$num] = $enreg['marque_mat'];
									$num++;
								}
							
						?>
						
                        <div class="col-lg-3 col-xs-8">
                            <!-- small box -->
                            <div class="small-box bg-teal">
                                <div class="inner">
                                    <h3>
                                        <?php echo count($enr['id_mat']); ?>
                                    </h3>
                                    <p>
                                        Infos clients et son matériels
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="syntheses_mat.php" class="small-box-footer">
                                    plus infos <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
					
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
                        <div class="col-lg-3 col-xs-8">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>
                                        <?php echo count($enr['id_emp']); ?>
                                    </h3>
                                    <p>
                                        Infos employés
                                    </p>
                                </div>
                               <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="syntheses_emp.php" class="small-box-footer">
                                    plus info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
						
						
						
						<?php
									$req = "select * from demande";
									$res = mysql_query($req);
									$num = 1;
									while($enreg=mysql_fetch_array($res))
									{ 
									$enr['id_demande'][$num] = $enreg['id_demande'];
									$enr['dateheure_demande'][$num] = strstr($enreg['dateheure_demande'], " ",true);
									$num++;
								}
							
					?>
                        <div class="col-lg-3 col-xs-8">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>
                                        <?php echo count($enr['id_demande']); ?>
                                    </h3>
                                    <p>
                                        Infos demande
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="syntheses_dem.php" class="small-box-footer">
                                    plus infos <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
						
						<?php
									$req = "select * from interventions";
									$res = mysql_query($req);
									$num = 1;
									while($enreg=mysql_fetch_array($res))
									{ 
									$enr['id_intervention'][$num] = $enreg['id_intervention'];
									$enr['dateheure_tamp'][$num] = strstr($enreg['dateheure_tamp'], " ",true);
									$enr['date_inter'][$num] = $enreg['date_inter'];
									$num++;
								}
							
					?>
                        <div class="col-lg-3 col-xs-8">
                            <!-- small box -->
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3>
                                        <?php echo count($enr['id_intervention']); ?>
                                    </h3>
									
									
                                    <p>
                                        Infos interventions
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-briefcase-outline"></i>
                                </div>
                                <a href="syntheses_inter.php" class="small-box-footer">
                                    plus infos <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
						
					</div>
					<div class="row">
						
						<div class="col-lg-4 col-xs-8">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
										<?php
				$at=0;
				$test=0;					
													
				$q=mysql_query("SELECT * FROM demande  ");
				while($data=mysql_fetch_array($q)){
				
				$y1=mysql_query("SELECT count(*) as total FROM list_mat where  id_demande='".$data['id_demande']."'  ");
				$d1=mysql_fetch_assoc($y1);
												
				if($d1['total'] !=0){
												


			
				$my=mysql_query("SELECT count(id_demande) as total FROM confirmations where  id_demande='".$data['id_demande']."' ");
				while($fetch=mysql_fetch_assoc($my)){
				
				if($fetch['total'] == 0){
															
								
							$at++;
						}
						
						}}
						}
							?>
                                    <h3>
                                         <?php echo $at; ?>
											
                                    </h3>
                                    <p>
                                         <?php echo" demande En attente d'affectation"; ?>
											
                                    </p>
                                </div>
                                <div class="icon">
										<i class="ion ion-stats-bars"></i>
									</div>
                                <a href="affectation.php" class="small-box-footer">
										Plus infos <i class="fa fa-arrow-circle-right"></i>
								</a>
                            </div>
						</div>
                        
						<div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-maroon">
                                <div class="inner">
								<?php
						$nv=0;
						$v=0;
						$at=0;
	
	$y=mysql_query("SELECT * FROM demande  ");
	while($d=mysql_fetch_array($y)){
		
		$y1=mysql_query(" SELECT * FROM EMPLOYES");
		$y2=mysql_fetch_array($y1);
	
	$query=mysql_query("SELECT * FROM confirmations where id_demande='".$d['id_demande']."'  and confirmation='0' and responsable='1' ");
		while ($mysql=mysql_fetch_array($query))
		{
		
		$at++;								
										
			
		}
		

		}	

			?>
                                    <h3>
                                       <?php echo $at; ?>
											
                                    </h3>
                                    <p>
                                       <?php echo" En attente de confirmation<br>"; ?>
											
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-pricetag-outline"></i>
                                </div>
                                <a href="consulter.php" class="small-box-footer">
										Plus infos <i class="fa fa-arrow-circle-right"></i>
								</a>
                            </div>
                        </div><!-- ./col -->
                        
						
						<div class="col-lg-4 col-xs-8">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
								<?php
										
									$quer=mysql_query("SELECT * FROM confirmations");
												$d=mysql_fetch_array($quer);
												
											
												
											$q=mysql_query("SELECT * FROM demande ORDER BY  `demande`.`id_demande` DESC");
										$a=0; $nr=0; $rg=0;
										while ($data=mysql_fetch_array($q)){
												
													$my=mysql_query("SELECT count(id_demande) as total FROM confirmations where  id_demande='".$data['id_demande']."' ");
													$fetch=mysql_fetch_assoc($my);
													
													$que=mysql_query("SELECT * FROM confirmations where  id_demande='".$data['id_demande']."' ");
													$dd=mysql_fetch_array($que);
													
													
													if($fetch['total'] == 0){
														
													}
													elseif($dd['confirmation']=='1') {
													
														
												
												
												$qu=mysql_query("SELECT * FROM list_mat where id_demande='".$data['id_demande']."'");
												$etat=true;
												$test=0;
												while($ta=mysql_fetch_array($qu)){
												 
												$r=mysql_query("select * from materiel_cli where id_mat='".$ta['id_mat']."'");
												$date=mysql_fetch_array($r);
												
												$etat=true;
												$test=0;	
												
												$aff=mysql_query("SELECT COUNT(id_demande) FROM interventions WHERE id_demande='".$data['id_demande']."' and id_mat='".$ta['id_mat']."'");
												
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
															
															 $a++;
														}
														else
														{
														
														if($etat==false && $test1==0){
															
															$nr++;
															}
														else{
															
															$rg++;
															}
														}
												
												
												}}
											
										
								  ?>
                                    <h4>
									
									</h4>
                                    <p>
                                        <?php
echo "<a href=\"enattente.php\"><h4><FONT COLOR=\"red\" >".$a."&nbsp; En attente</font></h4></a>";
echo "<a href=\"non_regle.php\"><h4><FONT COLOR=\"yellow\">".$nr."&nbsp; Non réglé</font></h4></a>";
echo "<a href=\"regle.php\"><h4><FONT COLOR=\"white\">".$rg."&nbsp; Regle</font></h4></a>";
														
										?>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios7-cart-outline"></i>
                                </div>
								<a href="consulter.php" class="small-box-footer">
										Plus infos <i class="fa fa-arrow-circle-right"></i>
								</a>
                               
                            </div>
						</div>
						
						
                        
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