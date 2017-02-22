 <?php
	include "config.php";
										 
										
		$id=$_GET['id_mat'];
		$supp = "DELETE FROM materiel_cli WHERE id_mat =$id";
											 
		$requete = mysql_query($supp) or die( mysql_error() );
			if($requete)
				{
					echo '<script type="text/javascript">alert("Le matériel est bien supprimer ") </script>';
				}
				else
				{
					echo '<script type="text/javascript">alert("La suppression est échouée")</script>';
				}
											
											
?>

