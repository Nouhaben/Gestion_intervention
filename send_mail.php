 <?php
session_start();

include "config.php";

if (!isset($_SESSION['email'])) {
         echo '<script type="text/javascript">window.location.href="index.php";</script>';
    }
    $re = $_SESSION['email'];
    


$req = mysql_query ("select * from employes where email_emp='".$re."' ");
$res = mysql_fetch_array($req);

$from = $res['nom_emp'].'&nbsp;'. $res['prenom_emp'];	


	
	$sql2=mysql_query("SELECT * from users where role='responsable_technique'");
	while($dat2=mysql_fetch_array($sql2))
	{
	
		$aff ="SELECT * FROM  interventions where id_intervention='".$_GET['id_intervention']."'";
		$respons = mysql_query($aff) or die(mysql_error());
		$enreg=mysql_fetch_array($respons);
	
	if($_GET['oui'] == "Envoyer" ){
	
		//$destinataire = "Email :".$dat['email_emp']."\r\n";
		
		//echo $tt;
		
		// echo $dat2['email'];
		
		//$dat['email_emp']="aziz.mabrouk@gmail.com";
		
		$destinataire = "Email :".$dat2['email'];
		$sujet = "Nouvelle intervention";
		
		$message =" Problème : ".$enreg['probleme_inter'];
		$message .="<br> Interventions: ".$enreg['interventions'];
		$message .="<br> Observations :".$enreg['observation'];
		$message .="<br> Date - Heure d'intervention :".$enreg['date_inter'].'&nbsp;'. $enreg['heure_inter'];
		$message .="<br> Reglé :".$enreg['regle'];
		$message .="<br> Date prochaine interventions :".$enreg['date_prochaine_inter'];
		
		$message .="<br><br><table border=\"1\" style=\"width:750px\">
			<tr>
				<th>Pi&egrave;ce </th>
				<th>D&eacute;signation </th>
				<th>Quantit&eacute;</th>
				
				
			</tr>";
		$query ="SELECT * FROM  pieces_rechange where id_intervention='".$_GET['id_intervention']."'";
		$response = mysql_query($query) or die(mysql_error());
		while ($data=mysql_fetch_array($response)){
		
		
		$message .= "<tr>
				<td>".$data['pieces_pr']."</td>
				<td>".$data['desi_pr']."</td>
				<td>".$data['quantite']."</td>
				
			</tr></table><br>";
		
		}
		$headers = "Content-Type: text/html; charset=iso-8859-1\n"; 
									
		$headers .= "From: Responsable Technique <".$from.">\n";
		$headers .= "X-Sender: <".$from.">\n";
		$headers .= "X-Mailer: PHP\n"; 
		$headers .= "Return-Path: <".$from.">\n";  
		
		
		////$entete = "Content-Type: text/html; charset=iso-8859-1\n"; 
		//$entete = 'From: Responsable@gmail.com ."\r\n".
        	//"Reply-To: Responsable@gmail.com ."\r\n".
		//"X-Mailer: PHP\n"';
		
		//$entete = "Content-Type: text/html; charset=iso-8859-1\n"; 
		//$entete .= "From:".$from;
        	//$entete .= "Reply-To: ".$from;
		//$entete .= "X-Mailer: PHP\n";
		
		
		
		if (mail($destinataire,$sujet,$message,$headers)){
			echo "<br> Envoyé à : ".$dat2['email'];
			
		} else {
			echo "<br> N'est pas envoyé à : ".$dat2['email'];
 			
		}
	}
	}

?>