 <?php
session_start();

include "config.php";

if (!isset($_SESSION['email'])) {
         echo '<script type="text/javascript">window.location.href="index.php";</script>';
    }
    $re = $_SESSION['email'];
    


$req = mysql_query ("select * from users where email='".$re."' ");
$res = mysql_fetch_array($req);

$from = $res['email'];





	
	$yy=mysql_query("SELECT * FROM demande where id_demande='".$_GET['id_demande']."' ");
	$data=mysql_fetch_array($yy);
	
	
	$sql2=mysql_query("SELECT * from users where role='responsable_technique'");
	while($dat2=mysql_fetch_array($sql2))
	{
	
	$yy=mysql_query("SELECT count(*) as total FROM list_mat where  id_demande='".$data['id_demande']."'  ");
	$d=mysql_fetch_assoc($yy);

	$tt=$d['total'];
	
	
	if($_GET['oui'] == "Envoyer" ){
	
		//$destinataire = "Email :".$dat['email_emp']."\r\n";
		
		//echo $tt;
		
		
		
		//$dat['email_emp']="aziz.mabrouk@gmail.com";
		
		$destinataire = "Email :".$dat2['email'];
		$sujet = "demande à confirmer";
		
		$message =" Nombre de problème : ";
		$message .= $tt;
		$message .=" <br> Date: ".$data['dateheure_demande'];
		$message .="<br>Client :".$_GET['rs'];
		$message .= "<br><a href='tab_dem.php?id_demande=";
		$message .=$_GET['id_demande'];
		$message .=" ' >Cliquez ici pour l'affecter</a>\n";
		
		$headers = "Content-Type: text/html; charset=iso-8859-1\n"; 
									
		$headers .= "From: client <".$from.">\n";
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