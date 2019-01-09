<?php
session_start();
$_SESSION['host']="mlopez.cesnuria.com";
       $_SESSION['userdb']="mlopez_manu";
        $_SESSION['passdb']="123123";
          $_SESSION['db']="mlopez_AC3_2";

?>

<html>
    <head>
      <link rel="stylesheet" type="text/css" href="css/css.css"> 
        <title>TODOList</title>
    </head>
    <body class="bindex">
    <h1>Bienvenido a TODOList</h1>
 <!-- Dos enlaces que te llevaran a registrarte o logearte -->
     <div>
        <a href="entrar.php">Login</a>
   <a href="crear.php">Registrarse</a>
   </div>
    </body>
</html>
