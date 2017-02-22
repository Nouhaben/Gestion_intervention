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
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php">Siège</a>
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
        <li><a href="profil.php"><i class=" icon-user"></i><span>Mon profil</span> </a> </li>
        <li class=" dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-ok"></i><span>Matériels</span> </a> <b class="caret"></b>
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
								
										
									<div class="widget-header">
										<i class="icon-pushpin"></i>
										<h3>Ajouter une demande de maintenance  / dépanage</h3>
									</div> <!-- /widget-header -->
									
									<div class="widget-content">
										
										<div class="tab-content">
										
								<div class="tab-pane active" id="formcontrols">
								<?php
								if ( isset($_POST['probleme_demande']) ) {
									$id_demande=$_GET['id_demande'];
									$id_mat=$_POST['id_mat'];
									$probleme_demande=addslashes($_POST['probleme_demande']);
										

	$sql = "INSERT INTO list_mat(id_demande,id_mat,probleme_demande) VALUES('$id_demande','$id_mat','$probleme_demande')";
	
	$requete = mysql_query($sql) or die( mysql_error() ) ;
 
  if($requete)
  {
    
	
				
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
											<?php	
											
											  if(isset($_GET['id']))
										{
											$q=mysql_query("SELECT * FROM clients where id_cli='".$_GET['id']."'");
												echo '<select class="span6"  name="id_cli" disabled >';
												while ($row = mysql_fetch_array($q)) 
										{
												echo '<option value="'.$row['id_cli'].'">'.$row['raison_social'].'</option>';
											}
												echo '</select>';
												}
											?></div> <!-- /controls -->				
										</div>
										
									<div class="control-group">											
											<label class="control-label" for="firstname">Matériel</label>
											<div class="controls">
												<?php	
											  if(isset($_GET['id']))
										{
										
											$q=mysql_query("SELECT * FROM materiel_cli where id_cli='".$_GET['id']."'");
												echo '<select name="id_mat" class="span6">';
												while ($row = mysql_fetch_array($q)) 
										{
												echo '<option value="'.$row['id_mat'].'" >'.$row['num_serie'].'&nbsp'.$row['type_mat'].'&nbsp'.$row['marque_mat'].'&nbsp'.$row['desi_mat'].'&nbsp'.$row['type_contrat'].'</option>';
											}
												echo '</select>';
												}
											?></div>			
									</div>
									
									<div class="control-group">											
											<label class="control-label" for="firstname">Probleme</label>
											<div class="controls">
												<textarea class="span6" rows="3" placeholder="Enter la votre probléme" name="probleme_demande" ></textarea>
										
											</div>			
									</div>
										
									<div class="login-actions">
											<center><button type="submit" name="submit" class="button btn btn-danger btn-large ">Ajouter</button></center>
										</div>
										
										
									</fieldset>
								</form>
								</div>
							</div>	
								<div class="widget-content">
								 <div class="box-body table-responsive">
							  <table class="table table-striped table-bordered">
								<thead>
								  <tr>
									<th> N° demande </th>
									<th> Matériel</th>
									<th> Problème</th>
								  </tr>
								</thead>
								<tbody>
								<?php
										include "config.php";
										 
										if(isset($_GET['id']))
										{
										
											$q=mysql_query("SELECT * FROM list_mat where id_demande='".$_GET['id_demande']."'");
										
												while ($data=mysql_fetch_array($q)){
												
												echo"<tr>"; 
												echo"<td>".$_GET['id_demande']."</td>";
												
												echo "<td>";
												
													
														$y=mysql_query("SELECT * FROM materiel_cli where  id_cli='".$_GET['id']."' and id_mat='".$data['id_mat']."' ");
														$dat=mysql_fetch_array($y);
												
													echo $dat['num_serie'].'&nbsp'.$dat['type_mat'].'&nbsp'.$dat['marque_mat'].'&nbsp'.$dat['desi_mat'] ;
												
												echo"</td>";
												
												echo"<td>".$data['probleme_demande']."<b></a></td>";
												echo"</tr>";	
												}
											}	
										
										
										
										
										?>
								  
								 
								
								</tbody>
							  </table>
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
