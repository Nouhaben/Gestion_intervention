<?php
	include "config.php";
	session_start();									 
	$re = $_SESSION['email'];

$req = mysql_query ("select * from clients where email_cli='".$re."' ");
$res = mysql_fetch_array($req);					
		
			$requete = mysql_query ("select id_demande from demande  ");
			while($resultat = mysql_fetch_array($requete))
								
		{
		$aff=mysql_query("SELECT COUNT(*) FROM interventions WHERE id_demande='".$resultat[0]."' ");
		$don=mysql_fetch_array($aff);
		
		$aff1=mysql_query("SELECT COUNT(*) FROM confirmations WHERE id_demande='".$resultat[0]."' ");
		$don1=mysql_fetch_array($aff1);
		
		$y=mysql_query("SELECT count(*) FROM list_mat where  id_demande='".$resultat[0]."' ");
		$data=mysql_fetch_array($y);
		
		if($data[0]==0 && $don[0]==0 && $don1[0]==0){
		
		$sup = "DELETE FROM demande WHERE id_demande ='".$resultat[0]."' ";
		$req = mysql_query($sup) or die( mysql_error() );
		
		if($req)
				{
					echo '<script type="text/javascript">alert("Le matériel est bien supprimer ") </script>';
					echo '<script type="text/javascript">window.location.href="gerer.php?id='.$res[0].'";</script>';
				}
				else
				{
					echo '<script type="text/javascript">alert("La suppression est échouée")</script>';
				}
		
		}
		
		
	}
?>
