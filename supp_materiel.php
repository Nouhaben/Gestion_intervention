 <?php
	include "config.php";
										 
		
			$requete = mysql_query ("select id_demande from demande  ");
			while($resultat = mysql_fetch_array($requete))
								
		{
		$aff=mysql_query("SELECT COUNT(*) FROM interventions WHERE id_demande='".$resultat[0]."' ");
		$don=mysql_fetch_array($aff);
		
		$af=mysql_query("SELECT COUNT(*) FROM confirmations WHERE id_demande='".$resultat[0]."' ");
		$do=mysql_fetch_array($af);
		
		$y=mysql_query("SELECT count(*) FROM list_mat where  id_demande='".$resultat[0]."' ");
		$data=mysql_fetch_array($y);
		
		if($data[0]==0 && $don[0]==0 && $do[0]==0 ){
		
		$sup = "DELETE FROM materiel_cli WHERE id_mat ='".$data[0]."' ";											 
		$req = mysql_query($sup) or die( mysql_error() );
			
			if($req)
				{		
				echo '<script type="text/javascript">alert("Vous pouvez pas supprimer ce matériel ") </script>';
				echo '<script type="text/javascript">window.location.href="gerer_materiel.php";</script>';
				}							
		}
		else{
		
			$id=$_GET['id_mat'];
		
		$supprimer = "DELETE FROM materiel_cli WHERE id_mat =$id ";											 
		$requ = mysql_query($supprimer) or die( mysql_error() );
		
			
			if($requ)
				{
					echo '<script type="text/javascript">alert("Le matériel est bien supprimer ") </script>';
					echo '<script type="text/javascript">window.location.href="gerer_materiel.php";</script>';
				}
				else
				{
					echo '<script type="text/javascript">alert("La suppression est échouée")</script>';
				}
		}
				
}		
?>

