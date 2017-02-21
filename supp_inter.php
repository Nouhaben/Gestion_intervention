<?php
	include "config.php";
	session_start();									 
	$re = $_SESSION['email'];

	$rq = mysql_query ("select * from employes where email_emp='".$re."' ");
	$res = mysql_fetch_array($rq);
										
		$id_inter=$_GET['id_inter'];
		
		$sup = "DELETE FROM pieces_rechange WHERE id_intervention =$id_inter  ";
		$req = mysql_query($sup) or die( mysql_error() );
		
		$supp = "DELETE FROM interventions WHERE id_intervention =$id_inter";
		$requete = mysql_query($supp) or die( mysql_error() );
		
		
		
			if($requete)
				{
					echo '<script type="text/javascript">alert("L\'intervention est bien supprimer ") </script>';
					echo '<script type="text/javascript">window.location.href="gerer_inter.php?id='.$res[0].'";</script>';
					
				}
				else
				{
					echo '<script type="text/javascript">alert("La suppression est échouée")</script>';
				}
											
											
?>

