<?php
 
require_once("dompdf/dompdf_config.inc.php");
 
include "config.php";



 
 $html ="<html> 
<head>
   <title>Création un PDF</title>
   </head>
 
<body>
	<center><h3><u>Affecter des employ&eacute;s</u></h3></center><br><br>
	

	N&deg; demande : ".$_GET['id_demande']." <br><br>";
	
	
$html .="<table border=\"1\" style=\"width:750px\">
		
            <tr>
				<th style=\" padding: 10px;\"> Raison social</th>
				<th style=\" padding: 10px;\"> mat&eacute;riel</th>
				<th style=\" padding: 10px;\"> Probl&egrave;me</th>
			</tr>";
			
		$q=mysql_query("SELECT * FROM list_mat where id_demande='".$_GET['id_demande']."' ");
			while ($data=mysql_fetch_array($q)){
			
			$qur=mysql_query("SELECT * FROM demande where id_demande='".$_GET['id_demande']."'");
				while ($d=mysql_fetch_array($qur)){ 
														 
				$y=mysql_query("SELECT * FROM clients where id_cli='".$d['id_cli']."' ");
				$dat=mysql_fetch_array($y);
														
			$r=mysql_query("select * from materiel_cli where id_mat='".$data['id_mat']."' ");
			$date=mysql_fetch_array($r);
			
$html .="<tr>
				<td>".$dat['raison_social']."</td>
				<td>".$date['num_serie'].'&nbsp;'.$date['type_mat'].'&nbsp;'.$date['marque_mat'].'&nbsp;'.$date['desi_mat']."</td>
				<td>".$data['probleme_demande']."</td>
			</tr>
	
		
		";
		}

	}
$html .="</table><br><br><br>
<ul>
				<li>Affecter des employ&eacute;s </li>
			</ul>
			
			<table border=\"1\" style=\"width:750px\">
			<tr>
				<th> Employ&eacute;</th>
				<th> Fonction</th>
				<th> Service</th>
				<th> Responsable</th>
			</tr>
			
			<tr>
				<td style=\" padding: 20px; height: 100px;\"></td>
				<td style=\" padding: 20px;\"></td>
				<td></td>
				<td></td>
			<tr>
	</table><br>
	
 </body>
</html>
";
  
$dompdf = new DOMPDF(); 
$dompdf->load_html(utf8_encode($html));
$dompdf->render();
$dompdf->stream("affecter_emp.pdf");
 
?>