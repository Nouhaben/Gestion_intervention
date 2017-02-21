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
<title>Espaces clients</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/plans.css" rel="stylesheet">
 

</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php">Espaces Clients </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> <?php echo $res['raison_social'] ; ?>
									 <b class="caret"></b></a>
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
        <li class="active"><a href="accueil.php?id=<?php echo $res[0]; ?>"><i class=" icon-home"></i><span>Accueil</span> </a> </li>
        <li><a href="profil.php?id=<?php echo $res[0]; ?>"><i class=" icon-user"></i><span>Mon profil</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-ok"></i><span>Matériels</span> </a> <b class="caret"></b>
		<ul class="dropdown-menu">
			<li><a href="ajou_mat.php?id=<?php echo $res[0]; ?>">Ajouter matériel</a></li>
			<li><a href="consultations_mat.php?id=<?php echo $res[0]; ?>">Consulter</a></li>
			<li><a href="gerer_mat.php?id=<?php echo $res[0]; ?>">Gérer</a></li>
        </ul>
        </li>
        
		<li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-wrench"></i><span>Les demandes</span> </a> <b class="caret"></b>
		<ul class="dropdown-menu">
			<li><a href="dem_maint.php?id=<?php echo $res[0]; ?>">Ajouter une demande</a></li>
			<li><a href="consultations.php?id=<?php echo $res[0]; ?>">Consulter</a></li>
			<li><a href="gerer.php?id=<?php echo $res[0]; ?>">Gérer</a></li>
		</ul>
		</li>
        <li><a href="suivi_inter.php?id=<?php echo $res[0]; ?>"><i class="icon-eye-open"></i><span>Suivi des interventions</span> </a></li>
        <li><a href="messages.php?id=<?php echo $res[0]; ?>"><i class="icon-envelope"></i><span>Mes messages</span> </a> </li>
        
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>

<!-- /subnavbar -->

<div class="container">
	
	<div class="row">
		
		<div class="span12">
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-th-large"></i>
						<h3>Tableau de bord</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						
						
						<div class="pricing-plans plans-1">
					<div class="plan-container">
						</div>
					<div class="plan-container">
					        <div class="plan green">
						        <div class="plan-header">
					                
						        	<div class="plan-title">
						        		<h3>	Informations des interventions	  </h3>      		
					        		</div> <!-- /plan-title -->
					          <?php
										include "config.php";
										
										 if(isset($_GET['id']))
											{
											$quer=mysql_query("SELECT * FROM confirmations ");
												$d=mysql_fetch_array($quer);
												
											$q=mysql_query("SELECT * FROM demande where id_cli='".$_GET['id']."' ORDER BY  `demande`.`id_demande` DESC ");
											$a=0; $nr=0; $rg=0;
										
												while ($data=mysql_fetch_array($q)){
													$my=mysql_query("SELECT count(id_demande) as total FROM confirmations where  id_demande='".$data['id_demande']."' ");
													$fetch=mysql_fetch_assoc($my);
													
													if($fetch['total'] == 0){
														
													}
													else {
														
												
												
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
															
															 $a++;
														}
														else
														{
														
														if($etat==false && $test1==0){
															
															$nr++;
														}
														else
															$rg++;
														}
														
												
												}}}
											
										
										
										?>


										
						            <div class="plan-price">
					                	<span class="term"><?php echo "<a href=\"enattente.php?id=".$res[0]."\"><h2><FONT COLOR=\"red\" >".$a."&nbsp; En attente</font></h2></a>"; ?></span>
					                	<span class="term"><?php echo "<a href=\"non_regle.php?id=".$res[0]."\"><h2><FONT COLOR=\"yellow\">".$nr."&nbsp; Non réglé</font></h2></a>"; ?></span>
					                	<span class="term"><?php echo "<a href=\"regle.php?id=".$res[0]."\"><h2><FONT COLOR=\"white\">".$rg."&nbsp; Regle</font></h2></a>"; ?></span>
									</div> <!-- /plan-price -->
									
						        </div> <!-- /plan-header -->	          
						        
						       
								
								
					
							</div> <!-- /plan -->
					    </div> <!-- /plan-container -->
				
				
							
			</div> <!-- /error-container -->			
			
		</div> <!-- /span12 -->
		
	</div> <!-- /row -->
	
</div> <!-- /container -->



<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="js/jquery-1.7.2.min.js"></script>

<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>
</body>
</html>
