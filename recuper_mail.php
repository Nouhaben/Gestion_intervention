 <?php 
	include "config.php";

if(isset($_POST['submit']) && !empty($_POST['email']))
	$email = $_POST['email'];
else
	exit("mail vide.");
 
//pas besoin de faire un count
$sql = "SELECT email FROM users WHERE email = '".$email."' and role='responsable_technique' ";
$req = mysql_query($sql) or die ('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
 
if(mysql_num_rows($req) != 1)//si le nombre de lignes retourne par la requete != 1
	exit("mail inconnu.");
else
{

$rq = mysql_query ("select email from users where role='administration' ");
$res = mysql_fetch_array($rq);
$from = $res['email'];


$destinataire = mysql_fetch_assoc($req);

$objet = 'Récupération de votre mot de passe';


$message = "Responsable technique :".$req['email'];
$message .= "<br><a href='index2.php?email=";
$message .=$req['email'];
$message .=" ' >Cliquez ici pour confirmer la demande</a>\n";
 
$headers = "Content-Type: text/html; charset=iso-8859-1\n"; 
$headers .= "From: Responsable Technique <".$from.">\n";
$headers .= "X-Sender: <".$from.">\n";
$headers .= "X-Mailer: PHP\n"; 
$headers .= "Return-Path: <".$from.">\n";  
		

 
if(!mail($destinataire['email'], $objet, $message, $headers))
echo 'probleme lors de l\'envoi du mail';
else
echo 'mail envoye';
}
?>