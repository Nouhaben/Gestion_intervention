<?php
	include "config.php";
										 
										
		
		
		$requete = mysql_query ("select id_demande from demande  ");
			while($resultat = mysql_fetch_array($requete))
								
		{
		$aff=mysql_query("SELECT COUNT(*) FROM interventions WHERE id_demande='".$resultat[0]."' ");
		$don=mysql_fetch_array($aff);
		
		$aff1=mysql_query("SELECT COUNT(*) FROM confirmations WHERE id_demande='".$resultat[0]."' ");
		$don1=mysql_fetch_array($aff1);
		
		
		if($don[0]==0 && $don1[0]==0){
		
		
		$sup = "DELETE FROM list_mat WHERE id_demande ='".$resultat[0]."'  ";
		$req = mysql_query($sup) or die( mysql_error() );
		
		$supprimer = "DELETE FROM demande WHERE id_demande ='".$resultat[0]."'  ";
		$requete = mysql_query($supprimer) or die( mysql_error() );
		
		if($requete)
				{
					echo '<script type="text/javascript">alert("La demande est bien supprimer ") </script>';
					echo '<script type="text/javascript">window.location.href="gerer.php ";</script>';
					}
				else
				{
					echo '<script type="text/javascript">alert("La suppression est échouée")</script>';
				}
		
											
	}
	else echo '<script type="text/javascript">alert("Vous pouvez pas supprimer cette demande") </script>';
	}										
?>
