<?php
  session_start();

  try{


  if(isset($_POST) &&
    !empty($_POST['nom']) &&
    !empty($_POST['pass1']) &&
    !empty($_POST['pass2'])&&
        $_POST['pass1']== $_POST['pass2'])

  {
    
      $nom=htmlspecialchars($_POST['nom']);
        $pass=md5(htmlspecialchars($_POST['pass1']));
   

     $conn = new mysqli($_SESSION['host'], $_SESSION['userdb'], $_SESSION['passdb'],$_SESSION['db']);
    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
   
    $sql="INSERT INTO `user` (`iduser`, `nombreUsuario`, `Pass`)VALUES(NULL, '".$nom."','".$pass."')";

    $res=$conn->query($sql);
  
      header("Location:index.php");
  }else{
   
  }
}catch(Exception $e){
  echo 'Error:'.$e;
}

 ?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/css.css"> 
  <title>Registrarse</title>
</head>
<body class="bregistrar">
<h1>Registrarse</h1>
     <form action="<?= $SERVER['PHP_SELF'];?>" method="post">
     
     <div id="div1">
     	<div>
       <p>Nombre: </p><input type="text" name="nom">
       </div>
       <div>
       <p>Password: </p><input type="password" name="pass1">
       </div>
       <div>
       <p>Repeat:</p> <input type="password" name="pass2">
       </div>
      </div>
       <div id="boton1">
       <input type="submit" name="enviar" value="Registrar" id="entrar">
       </div>
       
     </form>
     
   </body>
 </html>
