<?php
	include "config.php";
										
		$id=$_GET['id'];
		$supp = "DELETE FROM users WHERE id =$id";
											 
		$requete = mysql_query($supp) or die( mysql_error() );
			if($requete)
				{
					echo '<script type="text/javascript">alert("Le client est bien supprimer ") </script>';
					echo '<script type="text/javascript">window.location.href="gerecomt_emp.php";</script>';
					
				}
				else
				{
					echo '<script type="text/javascript">alert("La suppression est échouée")</script>';
				}
											
											
?>