
<?php
 
require_once("dompdf/dompdf_config.inc.php");
 
include "config.php";
 

 
 $html ="<html> 
<head>
   <title>Création un PDF</title>
   </head>
 
<body>
	<center><h3><u>Listes des demande en attente d'interventions</u></h3></center><br><br>
	
	
	
<table border=\"1\" style=\"width:750px\">
		
            <tr>
				<th> N&deg; demande </th>
				<th> Raison social</th>
				<th> Nombre demande</th>
				<th> Etat</th>
			</tr>";
		
$a=0; $nr=0; $rg=0;		
$q=mysql_query("SELECT * FROM demande ORDER BY  `demande`.`id_demande` DESC");
while ($data=mysql_fetch_array($q)){

	$que=mysql_query("SELECT * FROM confirmations where  id_demande='".$data['id_demande']."' ");
	$dd=mysql_fetch_array($que);
	
	if($dd['confirmation']=='1') {
	
		$y=mysql_query("SELECT * FROM clients where id_cli='".$data['id_cli']."' ");
		$dat=mysql_fetch_array($y);
		
		$yy=mysql_query("SELECT count(*) as total FROM list_mat where  id_demande='".$data['id_demande']."'  ");
		$d=mysql_fetch_assoc($yy);
												
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
															
					if($on['regle']=='Oui'){
						$test=1;
						$test1=1;
						$etat=true;
					}															
				}
			}}
														
$html .="<tr>
			<td>".$data['id_demande']." </td>
			<td>".$dat['raison_social']." </td>
			<td>".$d['total']." </td>
			<td>";
			
if($test==0){
			
		$html .=" En attente";
}
else{
	if($etat==false && $test1==0){
		$html .="Non regl&eacute;e";
	}
	else{
		$html .="Regl&eacute;e";
		}
}

	}}
		
$html .="</tr></table><center>
 </body>
</html>
";
  
$dompdf = new DOMPDF(); 
$dompdf->load_html(utf8_encode($html));
$dompdf->render();
$dompdf->stream("Suivi_des_interventions.pdf");
 
?>