<?php
	include "config.php";
										
		$id=$_GET['id_cli'];
		$supp = "DELETE FROM clients WHERE id_cli =$id";
											 
		$requete = mysql_query($supp) or die( mysql_error() );
			if($requete)
				{
					echo '<script type="text/javascript">alert("Le client est bien supprimer ") </script>';
					echo '<script type="text/javascript">window.location.href="consu_clients.php";</script>';
				}
				else
				{
					echo '<script type="text/javascript">alert("La suppression est échouée")</script>';
				}
											
											
?>

