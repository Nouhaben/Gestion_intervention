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



$req = mysql_query ("select * from users, clients where email='".$re."' and users.email=clients.email_cli ");
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
                            class="icon-user"></i> <?php echo $res['email'] ; ?>  <b class="caret"></b></a>
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
    
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
				<div class="row">
							
							<div class="span12">
								
								<div class="widget">
										
								
								
								
							<div class="widget-header"> <i class="icon-th-list"></i>
							  <h3>Consultation l'etat des interventions</h3>
							</div>
							<!-- /widget-header -->
							<div class="widget-content">
							
										<form action="" method="post">
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
														<input type="text" class="span6 disabled" id="firstname" value="<?php echo $_GET['id_demande']; ?>" >
													</div> <!-- /controls -->				
												</div>
											<?php } ?>
											</fieldset>
										</form>
										<div class="form-group">
											<label>Liste des demandes</label>
										</div>
							
							  <table class="table table-striped table-bordered">
								<thead>
								  <tr>
									
									<th> Raison social</th>
									<th> Matériel</th>
									<th> Problème</th>
									<th> Etat</th>
								  </tr>
								</thead>
								<tbody>
								<?php
										include "config.php";
										 
										if(isset($_GET['id_demande']))
										{
										$qq=mysql_query("SELECT * FROM demande ");
										$dd=mysql_fetch_array($qq);
										
											$q=mysql_query("SELECT * FROM list_mat where id_demande='".$_GET['id_demande']."'");
										
										//$response = mysql_query($q) or die(mysql_error());
												while ($data=mysql_fetch_array($q)){
												
												
												echo"<tr>"; 
												
												echo "<td>";
												
													
														$y=mysql_query("SELECT * FROM clients where id_cli='".$dd['id_cli']."' ");
														$da=mysql_fetch_array($y);
												
													echo $da['raison_social'] ;
												
												echo"</td>";
												
												echo "<td>";
													
														
												
														$r=mysql_query("select * from materiel_cli where id_cli='".$_GET['id']."' and id_mat='".$data['id_mat']."' ");
														$date=mysql_fetch_array($r);
														
													echo $date['num_serie'].'&nbsp'.$date['type_mat'].'&nbsp'.$date['marque_mat'].'&nbsp'.$date['desi_mat'] ;
												
												echo"</td>";
												
												echo"<td>".$data['probleme_demande']."<b></a></td>";
												
												echo"<td>";
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
												
												echo"</tr>";	
												}
											}	
										
										
										
										
										?>
								 
								
								</tbody>
							  </table>
							</div>
         				
							
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
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
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
