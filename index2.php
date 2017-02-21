<!DOCTYPE php>


    <head>
        <meta charset="UTF-8">
        <title>Espace employés</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Identifiez-vous</div>
			
			<?php 
include "config.php";

if(isset($_GET['email'])){
	$requete = "SELECT * from users where email = '".$_GET['email']."' and role='employe' ";
	$enreg = mysql_query($requete);
		while($resultat=mysql_fetch_array($enreg)){ 
	
			
?>
            <form action="" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" value="<?php echo $resultat['email'] ?>"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="mot de passe"/>
                    </div>
					<div class="form-group">
                        <input type="password" name="password_confirm" class="form-control" placeholder="Confirmer le mot de passe"/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/>Garder ma session active
                    </div>
                </div>
                <div class="footer">                                                               
                    <button name="submit" type="submit" style="background: #B9121B; color:white" class="btn btn-block">Connexion</button>  
            
            </form>
			
<?php }} 
								
if(isset($_POST['submit'])){
	$password=$_POST['password'];
	$password_confirm=$_POST['password_confirm'];
	
	if(isset($_POST["password"])&& !empty($password) && strlen($password) >=5 && $password_confirm==$password){
				
	$sql = "update users set password = '".$password."'
	where email ='".$_GET['email']."' ;";
	
	$requete = mysql_query($sql) or die( mysql_error() );
 
		if($requete){
			echo '<script type="text/javascript">alert("Votre avez bien modifier votre mot de passe ")</script>';
			echo '<script type="text/javascript">window.location.href="index.php";</script>';
				
				
				  }
				  else
				  {
				echo '<script type="text/javascript">alert("La modification à échouée")</script>';
				  }
			}}
			else{}
?>	         
        </div>
		


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>