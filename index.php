
<?php 
	include "config.php";

session_start();
       
       if (isset($_POST['email'])){
           $email = $_POST['email'];
           $password = $_POST['password'];
       
			
			
			$query = mysql_query ("SELECT * from users where email = '".$email."' and password='".$password."' and role='responsable_technique' ");
			
			if($rows=mysql_fetch_array($query)){
				
				$_SESSION['email'] = $email ;
				echo '<script type="text/javascript">window.location.href="accueil.php";</script>';
			}else{
				echo '<script type="text/javascript">alert("Votre email ou mot de passe est incorrecte");</script>';
			}
	
}
?>

    <head>
        <meta charset="UTF-8">
        <title>Espace responsable technique</title>
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
            <form action="" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Nom d'utilisateur"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="mot de passe"/>
                    </div>          
                    
                </div>
                <div class="footer">                                                               
                    <button type="submit" style="background: #D3732F; color:white" class="btn btn-block">Connexion</button>  
                <br>
				
                        <a href="pass_oublie.php" >mot de passe oublié ?</a>
                    </div>
            </form>

            
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>