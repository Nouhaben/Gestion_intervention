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
$req = mysql_query ("select * from clients where email_cli='".$re."' ");
$res = mysql_fetch_array($req);
?>
<html lang="en">
  
 <head>
    <meta charset="utf-8">
    <title>Espace clients</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
    
    <link href="css/pages/reports.css" rel="stylesheet">
	<link href="css/pages/dashboard.css" rel="stylesheet">
	<link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

   

  </head>

<body>

<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php">Espaces Clients </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> <?php echo $res['raison_social'] ; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="profil.php?id=<?php echo $res[0]; ?>">Profile</a></li>
              <li><a href="login.php">se déconnecter</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="accueil.php?id=<?php echo $res[0]; ?>"><i class=" icon-home"></i><span>Accueil</span> </a> </li>
		<li><a href="profil.php?id=<?php echo $res[0]; ?>"><i class=" icon-user"></i><span>Mon profil</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-ok"></i><span>Matériels</span> </a> <b class="caret"></b>
		<ul class="dropdown-menu">
			<li><a href="ajou_mat.php?id=<?php echo $res[0]; ?>">Ajouter matériel</a></li>
			<li><a href="consultations_mat.php?id=<?php echo $res[0]; ?>">Consulter</a></li>
			<li><a href="gerer_mat.php?id=<?php echo $res[0]; ?>">Gérer</a></li>
        </ul>
        </li>
		
		<li class="dropdown" ><a href="javascript:;"   class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-wrench"></i><span>Les demandes</span> </a> <b class="caret"></b>
		<ul class="dropdown-menu">
            <li><a href="dem_maint.php?id=<?php echo $res[0]; ?>">Ajouter demande</a></li>
            <li><a href="consultations.php?id=<?php echo $res[0]; ?>">Consulter</a></li>
			<li><a href="gerer.php?id=<?php echo $res[0]; ?>">Gérer</a></li>
		</ul>
		</li>
        <li class="active"><a href="suivi_inter.php?id=<?php echo $res[0]; ?>"><i class="icon-eye-open"></i><span>Suivi des interventions</span> </a></li>
        <li><a href="messages.php?id=<?php echo $res[0]; ?>"><i class="icon-envelope"></i><span>Mes messages</span> </a> </li>
        
      </ul>
    </div>
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
				<div class="row">
							
							<div class="span12">
								
								
										
								
								
								
							<div class="widget-header"> <i class="icon-th-list"></i>
							  <h3>Consultation l'etat des interventions</h3><br>
							</div>
							<!-- /widget-header -->
							<div class="widget-content">
							<div class="box-body">
                                  <div class="box-body table-responsive">
							  <table id="example2"class="table table-bordered table-striped"><br>
                                        <thead>
                                            <tr>
												<th> N° demande </th>
												<th> Raison social</th>
												<th> Nombre problème</th>
												<th> Etat</th>
												<th> Consulations</th>
											</tr>
                                        </thead>
                                        <tbody>
										<?php
										include "config.php";
										
										 if(isset($_GET['id']))
											{
											$quer=mysql_query("SELECT * FROM confirmations ");
												$d=mysql_fetch_array($quer);
												
											$q=mysql_query("SELECT * FROM demande where id_cli='".$_GET['id']."' ORDER BY  `demande`.`id_demande` DESC ");
											
										
												while ($data=mysql_fetch_array($q)){
													$my=mysql_query("SELECT count(id_demande) as total FROM confirmations where  id_demande='".$data['id_demande']."' ");
													$fetch=mysql_fetch_assoc($my);
													
													if($fetch['total'] == 0){
														
													}
													else {
												//*****************
												$qu=mysql_query("SELECT * FROM list_mat where id_demande='".$data['id_demande']."'");
												$etat=true;
												$test=0;
												while($ta=mysql_fetch_array($qu)){
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
														}
														else
														{
														
														if($etat==false && $test1==0){
												
												
												//**************
														
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
												
												$qu=mysql_query("SELECT * FROM list_mat where id_demande='".$data['id_demande']."'");
												$etat=true;
												$test=0;
												while($ta=mysql_fetch_array($qu)){
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
															echo" <input class=\"btn btn-danger btn-small\" value=\"En attente\" disabled>";
														}
														else
														{
														
														if($etat==false && $test1==0)
															echo" <input class=\"btn btn-warning btn-small\" value=\"Non reglée\" disabled>";
														else
															echo" <input class=\"btn btn-success btn-small\" value=\"Reglée\" disabled>";
														}
														
												echo"</td>";
												echo"<td><a href='consu_inter.php?id_demande=".$data[0]." '><input class=\"btn btn-primary btn-small\" value=\"Consulter\" ></a></td>";
												echo"</tr>";	
												
												}}}}}
											
										
										
										?>
								</tbody>
							  </table>
							</div>
            <!-- /widget-content --> 
         				
							
						  </div> <!-- /row -->
					
						</div> <!-- /container -->
					
					</div> <!-- /main-inner -->
						
				</div> <!-- /main -->
					


    

<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/excanvas.min.js"></script>
<script src="js/chart.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>

<script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
 
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
