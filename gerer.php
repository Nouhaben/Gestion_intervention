﻿<!DOCTYPE html>
<?php
session_start();
include "config.php";
if (!isset($_SESSION['email'])) {
        echo '<script type="text/javascript">window.location.href="index.php";</script>';
    }
?>
<?php
$re = $_SESSION['email'];



$req = mysql_query ("select * from users, clients, demande where email='".$re."' and users.email=clients.email_cli ");
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
                            class="icon-user"></i> <?php echo $res['raison_social'] ; ?>  <b class="caret"></b></a>
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
			<li><a href="gérer_mat.php">Gérer</a></li>
        </ul>
        </li>
        <li class="active dropdown" ><a href="javascript:;"   class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-wrench"></i><span>Les demandes</span> </a> <b class="caret"></b>
		<ul class="dropdown-menu">
            <li><a href="dem_maint.php">Ajouter demande</a></li>
            <li><a href="consultations.php">Consulter</a></li>
			<li><a href="gerer.php">Gérer</a></li>
		</ul>
		</li>
        <li><a href="suivi_inter.php"><i class="icon-eye-open"></i><span>Suivi des interventions</span> </a></li>
        <li><a href="messages.php"><i class="icon-envelope"></i><span>Mes messages</span> </a> </li>
        
      </ul>
    </div>
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->

							<script language="javascript">
									function confirme( id )
								  {
									var confirmation = confirm( "Voulez vous vraiment supprimer cette demande ?" ) ;
								if( confirmation )
								{
								  document.location.href = "supp_demande.php?id_demande="+id ;
								}
								  }
								</script>
								<script language="javascript">
									function confirmer( id )
								  {
									var confirmation = confirm( "Voulez vous vraiment supprimer cette demande ?" ) ;
								if( confirmation )
								{
								  document.location.href = "suppall.php?id_demande="+id ;
								}
								  }
								</script>
    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
				<div class="row">
							
							<div class="span12">
								
								
								
							<div class="widget-header"> <i class="icon-th-list"></i>
							  <h3>Consultation l'etat des interventions</h3>
							  
							</div>
							<!-- /widget-header -->
							<div class="widget-content">
							
							<a style="float:right" href="#" class="btn btn-danger btn-small" onClick="confirmer(<?php echo $res[0]; ?>)"><i class="btn-icon-only icon-remove"> </i></a><br><br>
							 <div class="box-body table-responsive">
							  <table id="example2" class="table table-striped table-bordered">
								<thead>
								  <tr>
									<th> N� demande </th>
									<th> Raison social</th>
									<th> Date_heure</th>
									<th> Nombre problème</th>
									<th> Gérer</th>
									<th> Supprimer</th>
								  </tr>
								</thead>
								<tbody>
								
									<?php
										include "config.php";
										
										
											$q=mysql_query("SELECT * FROM demande ORDER BY  `demande`.`id_demande` DESC ");
										
										//$response = mysql_query($q) or die(mysql_error());
												while ($data=mysql_fetch_array($q)){
												
												echo"<tr>"; 
												echo"<td>".$data['id_demande']."</td>";
												echo "<td>";
												
													
														$y=mysql_query("SELECT * FROM clients where id_cli='".$data['id_cli']."' ");
														$dat=mysql_fetch_array($y);
												
													echo $dat['raison_social'] ;
												
												echo"</td>";
												
												echo "<td>".$data['dateheure_demande']."</td>";
												echo"<td>";
												
										
												$y=mysql_query("SELECT count(*) as total FROM list_mat where  id_demande='".$data['id_demande']."'  ");
												$date=mysql_fetch_assoc($y);
												echo $date['total'];
												
												echo"</td>";
												
												echo"<td><a href='tab_dem.php?id_demande=".$data[0]." '><input class=\"btn btn-primary btn-small\" value=\"Consulter\" ></a></a></td>";
												
												echo "<td>";
													$my=mysql_query("SELECT count(id_demande) FROM confirmations where id_demande='".$data['id_demande']."' ");
													$fetch=mysql_fetch_array($my);
													
													$mysql=mysql_query("SELECT count(id_demande) FROM interventions where  id_demande='".$data['id_demande']."' ");
													$fet=mysql_fetch_array($mysql);
																								
																								
													
													if($date['total']==0 && $fetch[0] == 0 && $fet[0]==0){
														echo "<a href=\"#\" class=\"btn btn-danger btn-small\" onClick=\"confirme(".$data[0].")\"><i class=\"btn-icon-only icon-remove\"> </i></a>";
													}
												
												echo"</td>";
												echo"</tr>";	
												}
											
										
										
										
										
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
 
<script src="js/base.js"></script> 
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
