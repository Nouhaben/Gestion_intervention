 <?php
	include "config.php";
										 
										
		$id=$_GET['id_emp'];
		$supp = "DELETE FROM employes WHERE id_emp =$id";
											 
		$requete = mysql_query($supp) or die( mysql_error() );
			if($requete)
				{
					echo '<script type="text/javascript">alert("L\'employe est bien supprimer ") </script>';
					echo '<script type="text/javascript">window.location.href="consu_employe.php";</script>';
				}
				else
				{
					echo '<script type="text/javascript">alert("La suppression est échouée")</script>';
				}
											
											
?>