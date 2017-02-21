
<?php
 
require_once("dompdf/dompdf_config.inc.php");
 

 include "config.php";
 
 


		$qur=mysql_query("SELECT * FROM demande where id_demande='".$_GET['id_demande']."'");
			while ($d=mysql_fetch_array($qur)){ 
					$y=mysql_query("SELECT * FROM clients where id_cli='".$d['id_cli']."' ");
					$dat=mysql_fetch_array($y);

 
 $html ="<html> 
<head>
   <title>Création un PDF</title>
   </head>
 
<body>
	<center><h3><u>Ajouter une intervention</u></h3></center><br>
	

	<ul>
		<li>D&eacute;tails demande </li>
	</ul>
<table border=\"1\" style=\"width:750px\">
		
            <tr>
				<th> N&deg; demande </th>
				<th> Raison social</th>
				<th> Interlocuteur</th>
			</tr>
			
			<tr>
				<td>".$d['id_demande']."</td>
				<td>".$dat['raison_social']."</td>
				<td>".$dat['interlocuteur_cli']."</td>
			</tr>
</table><br>";
		}

		
$html .="<ul><li>D&eacute;tails probl&egrave;me </li></ul>
			
		<table border=\"1\" style=\"width:750px\">
			<tr>
				<th> N&deg; s&eacute;rie</th>
				<th> mat&eacute;riel</th>
				<th> Probl&egrave;me</th>
			</tr>";
			
			$q=mysql_query("SELECT * FROM list_mat where id_mat='".$_GET['id_mat']."'");
			$data=mysql_fetch_array($q);
														
			$r=mysql_query("select * from materiel_cli where id_mat='".$data['id_mat']."' ");
			$date=mysql_fetch_array($r);

$html .="<tr>
			<td>".$date['num_serie']."</td>
			<td>".$date['type_mat'].'&nbsp;'.$date['marque_mat'].'&nbsp;'.$date['desi_mat']."</td>
			<td>".$data['probleme_demande']."</td>
		<tr>
	</table><br>
	
	<ul><li>Votre interventions </li></ul>
	
	<table border=\"1\" style=\"width:750px\">
			<tr>
				<th>Intervention </th>
				<th>Observation </th>
				<th>Date - Heure</th>
				<th>R&eacute;gl&eacute;e</th>
				<th>Procaine inter</th>
				
			</tr>
			<tr>
				<td style=\" padding: 20px; height: 100px;\"></td>
				<td style=\" padding: 20px;\"></td>
				<td></td>
				<td></td>
				<td></td>
			</tr></table><br>
			
	<ul><li>Les pi&egrave;ces de rechanges </li></ul>
	
	<table border=\"1\" style=\"width:750px\">
			<tr>
				<th>Pi&egrave;ce </th>
				<th>D&eacute;signation </th>
				<th>Quantit&eacute;</th>
				
				
			</tr>
			<tr>
				<td style=\" padding: 20px; height: 100px;\"></td>
				<td style=\" padding: 20px;\"></td>
				<td></td>
				
			</tr></table><br>

			
			
			
		
	
 </body>
</html>
";
  
$dompdf = new DOMPDF(); 
$dompdf->load_html(utf8_encode($html));
$dompdf->render();
$dompdf->stream("ajouter_intervention.pdf");
 
?>