 <?php
	include "config.php";
										 
										
		$id=$_GET['id_limat'];
		
		$req = mysql_query ("select * from users, clients");
		
		$sup = "DELETE FROM list_mat WHERE id_limat =$id ";
		$req = mysql_query($sup) or die( mysql_error() );
		
			if($req)
				{
					echo '<script type="text/javascript">alert("La demande est bien supprimer ") </script>';
					echo '<script type="text/javascript">window.location.href="accueil.php ";</script>';
				}
				else
				{
					echo '<script type="text/javascript">alert("La suppression est échouée")</script>';
				}
											
											
?>
