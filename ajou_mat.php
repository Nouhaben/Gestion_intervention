﻿ <!DOCTYPE html>

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

<?php 
	
	
	
	
if ( isset($_POST['num_serie']) ) {
	$type_contrat=$_POST['type_contrat'];
	$num_serie= $_POST['num_serie'];
	$id_cli=$_POST['id_cli'];
	$type_mat=addslashes($_POST['type_mat']);
	$marque_mat=addslashes($_POST['marque_mat']);
	$desi_mat=addslashes($_POST['desi_mat']);
	$date_achat=$_POST['date_achat'];
	$ref_achat=addslashes($_POST['ref_achat']);

	$sql = "INSERT INTO materiel_cli(type_contrat,num_serie,id_cli,type_mat,marque_mat,desi_mat,date_achat,ref_achat) VALUES('$type_contrat','$num_serie', '$id_cli','$type_mat','$marque_mat','$desi_mat','$date_achat','$ref_achat')";
	$req = mysql_query($sql) or die( mysql_error() ) ;
	
	
	
	  if($req)
	  {
		echo '<script type="text/javascript">alert("Le matériel est bien ajouté");</script>';
		
	  }

	  else {
		echo '<script type="text/javascript">alert("Il y a un problème dans l\'ajout du client ");</script>';
	  }
	  }
	  
	  else{}
	
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
                            class="icon-user"></i><?php echo $res['email'] ; ?> <b class="caret"></b></a>
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
        <li class="active dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-ok"></i><span>Matériels</span> </a> <b class="caret"></b>
		<ul class="dropdown-menu">
			<li><a href="ajou_mat.php">Ajouter matériel</a></li>
			<li><a href="consultations_mat.php">Consulter</a></li>
			<li><a href="gerer_mat.php">Gérer</a></li>
        </ul>
        </li>
		
        <li class=" dropdown" ><a href="javascript:;"   class="dropdown-toggle" data-toggle="dropdown"><i class=" icon-wrench"></i><span>Les demandes</span> </a> <b class="caret"></b>
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
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>

<!-- /subnavbar -->
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
	      <div class="row">
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>Ajouter un matériel sans contrat <h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<div>
							<div class="tab-content">
								<div>
								
								
								<form action="" method="post">
									<fieldset>
									
										
										<div class="control-group">
                                        <label class="control-label" for="firstname">Type contrat</label>   
												<select  class="span6" name="type_contrat"  >
													<option >sans contrat</option>
												</select>
										</div>
										
										<div class="control-group">
										<?php
										include "config.php";
										$req=mysql_query("SELECT MAX(id_mat)+1 as max FROM materiel_cli");
									   $row2 = mysql_fetch_array($req);
							   
									   $d=date('Y/m/d');
									   $rest=substr($d,0,4); 
									   $res=$row2['max']."/".$rest;
										?>
                                       <label class="control-label" for="firstname">Numéro de série</label>
									   <div class="controls">
										<input type="text" class="span6" name="num_serie" value="<?php echo $res;?>" />
										</div>
										</div>
								
									<div class="control-group">
                                        <label class="control-label" for="firstname">Raison social</label>
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
										
										<div class="control-group">
                                        <label class="control-label" for="firstname">Type matériel</label>
										<input type="text" class="span6" placeholder="Enter le type" name="type_mat" />
										
										</div>
										<div class="control-group">
                                        <label class="control-label" for="firstname">Marque matériel</label>
										<input type="text" class="span6" placeholder="Enter la marque" name="marque_mat">
										
										</div>

                                        <div class="control-group">
                                        <label class="control-label" for="firstname">Designation matériel</label>
										<textarea class="span6" rows="3" placeholder="Enter la désignation du matériel" name="desi_mat" ></textarea>
										
										</div>
										
										<div class="control-group">
                                        <label class="control-label" for="firstname">Date d'achat</label>
											<input type="date" class="span6" placeholder="Enter la date" name="date_achat">
										</div>
										
										<div class="control-group">
                                        <label class="control-label" for="firstname">Réference d'achat</label>
										<textarea class="span6" rows="3" placeholder="Enter la réference d'achat du mat"riel" name="ref_achat" ></textarea>
										
										</div>
										
										<center><button type="submit" class="btn btn-danger">Ajouter</button></a></center>
		
										
										
										
									</fieldset>
								</form>
								</div>
								
								
                    </div>
								</div>
								
								
								
							</div>
						  
						  
						</div>
						
					
						
						
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
	      		
		    </div> <!-- /span8 -->
	      	
	      	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->

<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="js/jquery-1.7.2.min.js"></script> 
<script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="js/full-calendar/fullcalendar.min.js"></script>
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

        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
				{
				    fillColor: "rgba(220,220,220,0.5)",
				    strokeColor: "rgba(220,220,220,1)",
				    pointColor: "rgba(220,220,220,1)",
				    pointStrokeColor: "#fff",
				    data: [65, 59, 90, 81, 56, 55, 40]
				},
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    pointColor: "rgba(151,187,205,1)",
				    pointStrokeColor: "#fff",
				    data: [28, 48, 40, 19, 96, 27, 100]
				}
			]

        }

        var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);


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

        $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var calendar = $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          selectable: true,
          selectHelper: true,
          select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
              calendar.fullCalendar('renderEvent',
                {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
              );
            }
            calendar.fullCalendar('unselect');
          },
          editable: true,
          events: [
            {
              title: 'All Day Event',
              start: new Date(y, m, 1)
            },
            {
              title: 'Long Event',
              start: new Date(y, m, d+5),
              end: new Date(y, m, d+7)
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d-3, 16, 0),
              allDay: false
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d+4, 16, 0),
              allDay: false
            },
            {
              title: 'Meeting',
              start: new Date(y, m, d, 10, 30),
              allDay: false
            },
            {
              title: 'Lunch',
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false
            },
            {
              title: 'Birthday Party',
              start: new Date(y, m, d+1, 19, 0),
              end: new Date(y, m, d+1, 22, 30),
              allDay: false
            },
            {
              title: 'EGrappler.com',
              start: new Date(y, m, 28),
              end: new Date(y, m, 29),
              url: 'http://EGrappler.com/'
            }
          ]
        });
      });
    </script><!-- /Calendar -->
</body>
</html>
