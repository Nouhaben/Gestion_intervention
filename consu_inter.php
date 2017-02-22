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
    <title>Siège</title>
    
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
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php">Siège </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> <?php echo $res['raison_social'] ; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
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
        <li><a href="accueil.php"><i class=" icon-home"></i><span>Accueil</span> </a> </li>
		<li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-ok"></i><span>Matériels</span> </a> <b class="caret"></b>
		<ul class="dropdown-menu">
			<li><a href="ajou_mat.php">Ajouter matériel</a></li>
			<li><a href="consultations_mat.php">Consulter</a></li>
			<li><a href="gerer_mat.php">Gérer</a></li>
        </ul>
        </li>
		
        <li class="dropdown" ><a href="javascript:;"   class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-wrench"></i><span>Les demandes</span> </a> <b class="caret"></b>
		<ul class="dropdown-menu">
            <li><a href="dem_maint.php?id=<?php echo $res[0]; ?>">Demande de maintenance</a></li>
            <li><a href="consultations.php">Consultations</a></li>
			<li><a href="gerer.php">Gérer</a></li>
		</ul>
		</li>
        <li class="active"><a href="suivi_inter.php"><i class="icon-eye-open"></i><span>Suivi des interventions</span> </a></li>
        <li><a href="messages.php"><i class="icon-envelope"></i><span>Mes messages</span> </a> </li>
        
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
							  <h3>Consultation l'etat des interventions</h3>
							</div>
							<!-- /widget-header -->
							<div class="widget-content"><br>
							<form class="form-horizontal" action="" method="post">
											<fieldset>
											<?php
												if(isset($_GET['id_demande']))
													{
												
												$req = "select * from demande where id_demande='".$_GET['id_demande']."' ";
												$res = mysql_query($req);
												

											?>
												<div class="control-group">											
													<label class="control-label" for="firstname">N° demande</label>
													<div class="controls">
														<input type="text" class="span6" name="id_demande" value="<?php echo $_GET['id_demande']; ?>" disabled >
													
													</div> <!-- /controls -->	
												</div>
											<?php } ?>
											
											</fieldset>
									</form>
									
								<div class="form-group">
											<h3></u>Equipes affectés</u></h3>
												</div>
							
												  <table class="table table-striped table-bordered">
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
															 
															
															
																$q=mysql_query("SELECT * FROM confirmations where id_demande='".$_GET['id_demande']."'");
															
																	while ($d=mysql_fetch_array($q)){
																	
																	echo"<tr>"; 
																	
																	echo "<td>";
																	
																		
																			$y=mysql_query("SELECT * FROM employes where  id_emp='".$d['id_emp']."'");
																			$dat=mysql_fetch_array($y);
																	
																		echo $dat['nom_emp'].'&nbsp'.$dat['prenom_emp'] ;
																	
																	echo"</td>";
																		echo "<td>";
																	
																		
																			$y=mysql_query("SELECT * FROM employes where  id_emp='".$d['id_emp']."'");
																			$dat=mysql_fetch_array($y);
																	
																		echo $dat['fonction_emp'] ;
																	
																	echo"</td>";
																	
																		echo "<td>";
																	
																		
																			$y=mysql_query("SELECT * FROM employes where  id_emp='".$d['id_emp']."'");
																			$dat=mysql_fetch_array($y);
																	
																		echo $dat['service_emp'] ;
																	
																	echo"</td>";
																	
																	echo"<td>";
																		if($d['responsable']=='1'){
																		echo 'Oui' ;}
																		else {echo ''; }
																		
																	echo"</td>";
																	
																	echo"</tr>";	
																	}
															
															?>
													 
								
								</tbody>
							  </table></br></br>
							  
							  <table id="example2"class="table table-bordered table-striped">
                                        <thead>
											<tr>
												<th> Code intervention </th>
												<th> Matériel </th>
												<th> Problème intervetion</th>
												<th> Intervention</th>
												<th> observation</th>
												<th> Date-Heure Intervention</th>
												<th> Reglé</th>
												<th> Date prochaine intervention</th>
												<th> pièce de rechange</th>
											</tr>
                                        </thead>
                                        <tbody>
										<?php
										include "config.php";
										 if(isset($_GET['id_demande']))
										{
											$quer=mysql_query("SELECT * FROM interventions where id_demande='".$_GET['id_demande']."' ORDER BY  `interventions`.`id_intervention` DESC");
												
												while ($data=mysql_fetch_array($quer)){
											$r=mysql_query("select * from materiel_cli where id_mat='".$data['id_mat']."' ");
													$date=mysql_fetch_array($r);
                                            
												echo"<tr>"; 
												echo"<td>".$data['id_intervention']."</td>";
												echo "<td>"; 
													echo $date['num_serie'].'&nbsp'.$date['type_mat'].'&nbsp'.$date['marque_mat'].'&nbsp'.$date['desi_mat'] ; 
												echo"</td>";
												echo"<td>".$data['probleme_inter']."</td>";
												echo"<td>".$data['interventions']."</td>";
												echo"<td>".$data['observation']."</td>";
												echo"<td>".$data['date_inter'].'&nbsp'.$data['heure_inter']."</td>";
												echo"<td>";
													if($data['regle']=='Oui'){
														echo" <input class=\"btn btn-success btn-small\" value=\"Reglée\" disabled>";
													}
													else
														echo" <input class=\"btn btn-warning btn-small\" value=\"Non reglée\" disabled>";
													
												
												echo"</td>";
												echo"<td>".$data['date_prochaine_inter']."</td>";
												echo"<td>";
												
												$a1=mysql_query("SELECT * FROM interventions WHERE id_intervention='".$data['id_intervention']."' ");
												
												$o=mysql_fetch_array($a1);
							
													if($o['piec_rech']=='Oui'){
														echo" <a href='consu_piece.php?id_intervention=".$o['id_intervention']."'><input class=\"btn btn-warning btn-small\" value=\"Consulter\" ></a>";
													
												}
													else echo $data['piec_rech']; 
												
												echo"</td>";
												echo"</tr>";	
												
												}
											
										
										}
										?>
                                        </tbody> 
										
                                        
                                    </table><br><br>
									
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

<script>

    var pieData = [
				{
				    value: 30,
				    color: "#F38630"
				},
				{
				    value: 50,
				    color: "#E0E4CC"
				},
				{
				    value: 100,
				    color: "#69D2E7"
				}

			];

    var myPie = new Chart(document.getElementById("pie-chart").getContext("2d")).Pie(pieData);

    var barChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
				{
				    fillColor: "rgba(220,220,220,0.5)",
				    strokeColor: "rgba(220,220,220,1)",
				    data: [65, 59, 90, 81, 56, 55, 40]
				},
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    data: [28, 48, 40, 19, 96, 27, 100]
				}
			]

    }

    var myLine = new Chart(document.getElementById("bar-chart").getContext("2d")).Bar(barChartData);
	var myLine = new Chart(document.getElementById("bar-chart1").getContext("2d")).Bar(barChartData);
	var myLine = new Chart(document.getElementById("bar-chart2").getContext("2d")).Bar(barChartData);
	var myLine = new Chart(document.getElementById("bar-chart3").getContext("2d")).Bar(barChartData);
	
	</script>


  </body>

</html>
