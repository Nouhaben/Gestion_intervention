<!DOCTYPE html>
<?php 
	include "config.php";

session_start();
       
       if (isset($_POST['email'])){
           $email = $_POST['email'];
           $password = $_POST['password'];
       
			
			
			$query = mysql_query ("SELECT * from users where email = '".$email."' and password='".$password."' and role='siege' ");
			
			if($rows=mysql_fetch_array($query)){
				
				$_SESSION['email'] = $email ;
				echo '<script type="text/javascript">window.location.href="accueil.php";</script>';
			}else{
				echo '<script type="text/javascript">alert("Votre email ou mot de passe est incorrecte");</script>';
			}
	
}
?>



<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Siège</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.php">
				Siège				
			</a>		
			
			
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->

<div class="account-container">
	
	<div class="content clearfix">
		
		<form action="" method="post">
		
			<h1> Login </h1>		
			
			<div class="login-fields">
				
				<p>Veuillez saisir vos coordonnées</p>
				
				<div class="field">
					<label for="username">Nom d'utilisateur</label>
					<input type="text" id="username" name="email" value="" placeholder="Nom d'utilisateur" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Mot de passe:</label>
					<input type="password" id="password" name="password" value="" placeholder="Mot de passe" class="login password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				
									
				<button class="button btn btn-info btn-large">Connexion</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->






<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>

<script src="js/signin.js"></script>

</body>

</html>
