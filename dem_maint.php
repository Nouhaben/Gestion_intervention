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

$req = mysql_query ("select * from users where email='".$re."' ");
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
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php">Siège </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> <?php echo $res['email'] ; ?>
									 <b class="caret"></b></a>
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
        <li class=""><a href="accueil.php"><i class=" icon-home"></i><span>Accueil</span> </a> </li>
		<li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-ok"></i><span>Matériels</span> </a> <b class="caret"></b>
		<ul class="dropdown-menu">
			<li><a href="ajou_mat.php">Ajouter matériel</a></li>
			<li><a href="consultations_mat.php">Consulter</a></li>
			<li><a href="gerer_mat.php">Gérer</a></li>
        </ul>
        </li>
		<li class="active dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-wrench"></i><span>Les demandes</span> </a> <b class="caret"></b>
		<ul class="dropdown-menu">
			<li><a href="dem_maint.php">Ajouter une demande</a></li>
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
    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
				<div class="row">
							
							<div class="span12">
								
								<div class="widget">
										
									<div class="widget-header">
										<i class="icon-pushpin"></i>
										<h3>Ajouter une demande de maintenance  / dépanage</h3>
									</div> <!-- /widget-header -->
									
									<div class="widget-content">
										
										<div class="tab-content">
								<div class="tab-pane active" id="formcontrols">
								<?php
								$re = mysql_query ("select max(id_demande) from demande ");
								$rs = mysql_fetch_array($re);
								
								if ( isset($_POST['submit']) ) {
									
									$id_cli=$_POST['id_cli'];
									
										


	
	mysql_query( "INSERT INTO demande (id_cli,etat) VALUES ('$id_cli','non vu')");
	$ma=mysql_query("select MAX(id_demande) from demande");
	$requete=mysql_fetch_array($ma);
	
  if($requete)
  {
	
    
	echo '<script type="text/javascript">window.location.href="affect_mat.php?id='.$_POST['id_cli'].'&id_demande='.$requete[0].' ";</script>';
				
  }
  else
  {
    echo '<script type="text/javascript">alert("Il y a un problème dans l\'ajout du client ");</script>';
  }
} 
  else {}
  
 
   
?>
								
								<form class="form-horizontal" action="" method="post">
									<fieldset>
										<div class="control-group">											
											<label class="control-label" for="firstname">Raison social</label>
											<div class="controls">
												</div>	
										<?php	
										
											$q=mysql_query("SELECT * FROM clients");
												echo '<select name="id_cli" class="span6">';
												while ($row = mysql_fetch_array($q)) 
										{
												echo '<option value="'.$row['id_cli'].'" >'.$row['raison_social'].'</option>';
											}
												echo '</select>';
												
											?>												
									</div>
										<div class="login-actions">
											<center><button type="submit" name="submit" class="button btn btn-primary btn-large ">Ajouter matériel</button></center>
										</div>
										
									</fieldset>
								</form>
								</div>
										
										
										
										
									</div> <!-- /widget-content -->
										
								</div> <!-- /widget -->	
								
							</div> <!-- /spa12 -->
							
							
							
							
							
							
							
						  </div> <!-- /row -->
					
						</div> <!-- /container -->
					
					</div> <!-- /main-inner -->
						
				</div> <!-- /main -->
					


    

<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/excanvas.min.js"></script>
<script src="js/chart.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js"></script>
<script src="js/base.js"></script>
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
