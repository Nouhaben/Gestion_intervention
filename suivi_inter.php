
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
					
						<div class="col-md-12">
                            <!-- Danger box -->
                            <div class="box box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">Ajouter une intervention</h3>
                                    
                                </div>
								
                        <div class="col-xs-15">
                                <div class="box-body">
								
								
								
								
					<div class="row no-print">
                        <div class="col-xs-12">
                           <a href="pdf.php?id=<?php echo $res[0]; ?>"  ><button style="float:right"  class="btn btn-default" ><i class="fa fa-print"></i> Imprimer</button>
                           </a>
                        </div>
                    </div><br><br>
								
									
									
                                   <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-striped">
								 <thead>
                                            <tr>
												<th> N° demande </th>
												<th> Raison social</th>
												<th> Nombre demande</th>
												<th> Etat</th>
												<th> Ajouter intervention</th>
											</tr>
                                        </thead>
                                        <tbody>
										<?php
										include "config.php";
										 if(isset($_GET['id']))
										{
											$quer=mysql_query("SELECT * FROM confirmations where id_emp='".$_GET['id']."'");
											while ($d=mysql_fetch_array($quer)){
												
											$q=mysql_query("SELECT * FROM demande where id_demande='".$d['id_demande']."' ORDER BY  `demande`.`id_demande` DESC");
											$data=mysql_fetch_array($q);
											
											//**************************
											
											
											$q=mysql_query("SELECT * FROM list_mat where id_demande='".$data['id_demande']."'");
												$etat=true;
												$test=0;
												while($ta=mysql_fetch_array($q)){
																									
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
															
														
														
											//********************************
												
												$ql=mysql_query("SELECT * FROM confirmations where id_demande='".$d['id_demande']."'");
												$arr=mysql_fetch_array($ql);
														
													if($arr['responsable']=='1' && $arr['confirmation']=='1'){
													
														
														
												echo"<tr>"; 
												echo"<td><a href='tableau_demande.php?id_demande=".$data[0]." '>".$data['id_demande']."</td>";
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
												
												$q=mysql_query("SELECT * FROM list_mat where id_demande='".$data['id_demande']."'");
												$etat=true;
												$test=0;
												while($ta=mysql_fetch_array($q)){
																									
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
												
												echo "<td>";
												
													$a=mysql_query("SELECT COUNT(id_demande) FROM interventions WHERE id_demande='".$data['id_demande']."' ");
												$do=mysql_fetch_array($a);
												
														if($do[0]==0 ){
															echo" <a href='details.php?id_demande=".$data[0]." '><input class=\"btn btn-danger btn-xs\" value=\"Ajouter\" ></a>";
														}
														else{
														if($etat==false)
															echo" <a href='details.php?id_demande=".$data[0]." '><input class=\"btn btn-warning btn-xs\" value=\"Ajouter\" ></a>";
														
														}
														
														
														
												echo"</td>";
												
												echo"</tr>";
												}}
														else
														{
													
														
														if($etat==false && $test1==0){
														
														$ql=mysql_query("SELECT * FROM confirmations where id_demande='".$d['id_demande']."'");
												$arr=mysql_fetch_array($ql);
														
													if($arr['responsable']=='1' && $arr['confirmation']=='1'){
													
														
														
												echo"<tr>"; 
												echo"<td><a href='tableau_demande.php?id_demande=".$data[0]." '>".$data['id_demande']."</td>";
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
												
												$q=mysql_query("SELECT * FROM list_mat where id_demande='".$data['id_demande']."'");
												$etat=true;
												$test=0;
												while($ta=mysql_fetch_array($q)){
																									
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
												
												echo "<td>";
												
													$a=mysql_query("SELECT COUNT(id_demande) FROM interventions WHERE id_demande='".$data['id_demande']."' ");
												$do=mysql_fetch_array($a);
												
														if($do[0]==0 ){
															echo" <a href='details.php?id_demande=".$data[0]." '><input class=\"btn btn-danger btn-xs\" value=\"Ajouter\" ></a>";
														}
														else{
														if($etat==false)
															echo" <a href='details.php?id_demande=".$data[0]." '><input class=\"btn btn-warning btn-xs\" value=\"Ajouter\" ></a>";
														
														}
														
														
														
												echo"</td>";
												
												echo"</tr>";
												}
															
														}else{
															
														}
												
																		
												}
											
										}}
										
										?>
                                           
  
                                        </tbody> 
									</table>
									
								
								</div>
								
								
							</div>
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