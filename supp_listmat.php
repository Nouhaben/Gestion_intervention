 <?php
	include "config.php";
										 
										
		$id=$_GET['id_limat'];
		
		$supprim = mysql_query("SELECT *FROM list_mat WHERE id_limat =$id ");
		$requet = mysql_fetch_array($supprim);
		
		$my=mysql_query("SELECT count(id_demande) FROM confirmations where id_demande='".$requet['id_demande']."' ");
		$fetch=mysql_fetch_array($my);
		
		$mysql=mysql_query("SELECT count(id_demande) FROM interventions where  id_demande='".$requet['id_demande']."' ");
		$fet=mysql_fetch_array($mysql);
													
		if($fetch[0] == 0 && $fet[0]==0){
		
		$sup = "DELETE FROM list_mat WHERE id_limat =$id ";
		$req = mysql_query($sup) or die( mysql_error() );
		
			if($req)
				{
					echo '<script type="text/javascript">alert("La demande est bien supprimer ") </script>';
				}
				else
				{
					echo '<script type="text/javascript">alert("La suppression est échouée")</script>';
				}
		}
		else
			echo '<script type="text/javascript">alert("Vous pouvez pas le supprimer parce qu\'il contient une interventions ") </script>';
											
?>
