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
	
	
	
	$y=mysql_query("SELECT * FROM confirmations where confirmation ='0' and id_demande='".$_GET['id_demande']."'");
	while($dat=mysql_fetch_array($y)){
	
	
	$sql2=mysql_query("SELECT * FROM employes where id_emp='".$dat['id_emp']."'");
	while($dat2=mysql_fetch_array($sql2))
	{
	
	$sql=mysql_query("SELECT count(id_confirmation) as total FROM confirmations where id_emp='".$dat['id_emp']."' and confirmation ='0' ");
$total=mysql_fetch_array($sql);

$tt=$total['total'];
	
	if($_GET['oui'] == "Envoyer" ){
	
		//$destinataire = "Email :".$dat['email_emp']."\r\n";
		
		//echo $tt;
		
		echo $dat2['email_emp'];
		
		//$dat['email_emp']="aziz.mabrouk@gmail.com";
		
		$destinataire = "Email :".$dat2['email_emp'];
		$sujet = "demande à confirmer";
		
		$message = $tt;
		$message .=" demande(s) en attente :<br> <br> Date: ".$data['dateheure_demande'];
		$message .="<br>Client :".$_GET['rs'];
		$message .= "<br><a href='http://ticservices.ma/gestion_interventions1106/employe/tab_dem.php?id_demande=";
		$message .=$_GET['id_demande'];
		$message .=" ' >Cliquez ici pour confirmer la demande</a>\n";
		
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
		
		echo $message;
		echo $destinataire;
		echo "<br> Envoyé à : ".$dat2['email_emp'];
		
		if (mail($destinataire,$sujet,$message,$headers)){
			
			
		} else {
			echo "<br> N'est pas envoyé à : ".$dat2['email_emp'];
 			
		}
	}
	}
	}

?>