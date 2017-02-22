<?php
	include "config.php";
										
		$id_conf=$_GET['id_conf'];
		
		$supp = "DELETE FROM confirmations WHERE id_confirmation =$id_conf";
											 
		$requete = mysql_query($supp) or die( mysql_error() );
			if($requete)
				{
					echo '<script type="text/javascript">alert("Le client est bien supprimer ") </script>';
					echo '<script type="text/javascript">window.location.href="affect_dem.php";</script>';
				}
				else
				{
					echo '<script type="text/javascript">alert("La suppression est échouée")</script>';
				}
											
											
?>

