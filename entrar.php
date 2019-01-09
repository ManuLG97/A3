<?php
session_start();

  try{     
      
  if(isset($_POST) &&
    !empty($_POST['nom'])&&
    !empty($_POST['pass1']))

  {
    
      $nom=htmlspecialchars($_POST['nom']);
    
      $pass=md5(htmlspecialchars($_POST['pass1']));
   

    $conn = new mysqli($_SESSION['host'], $_SESSION['userdb'], $_SESSION['passdb'],$_SESSION['db']);
    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    
    $sql="SELECT * FROM user WHERE nombreUsuario='".$nom."' && Pass='".$pass."';";
    
     $res=$conn->query($sql);
     var_dump($res->num_rows);
    if($res->num_rows>=1)
    {
        $_SESSION['user']['passwd']=$pass;
        $_SESSION['user']['user_name']=$nom;
        header("Location:Panel.php");
      }else {
        echo "no existe el usuario";
      }
    
  }else{
   
  }
}catch(Exception $e){
  echo 'Error:'.$e;
}

 ?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/css.css"> 
  <title>Login</title>
</head>
<body class="bentrar">
<h1>Login</h1>
     <form action="<?= $SERVER['PHP_SELF'];?>" method="post">
     <div id="for">
     <div>
       <p>Nombre:</p>
        <input type="text" name="nom">
       </div>
       
       <div>
       <p>Password:</p> 
       <input type="password" name="pass1">
       </div>
       </div>
       <div id="boton1">
       <input type="submit" name="enviar" value="Entrar" id="entrar">
       </div>
     </form>
   </body>
 </html>
