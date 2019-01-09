<style>
    body h1{
        font-family: 'fantasy', cursive;
	color:red;
	font-size:75px;
	width:100%;
	text-align:center;
    }
   body h2{font-family: 'fantasy', cursive;
	color:black;
	font-size:40px;
	width:100%;
       text-align:center;}
    body div{
        
	width:100%;
	text-align:center;	
	display:flex;
	justify-content:space-around;


    }
    body div a{
        text-decoration:none;
	color:darkblue;
	font-family: 'fantasy', cursive;
	font-size:35px;
    }
    body div a:hover{
	text-decoration:none;
	color:#FF0;
	font-family: 'fantasy', cursive;
	font-size:35px;
		
}
    body p{
        width: 100%;
        text-align: 100%;
    }
    #a2{
          text-decoration:none;
	color:darkred;
	font-family: 'fantasy', cursive;
	font-size:35px;
        width:100%;
	text-align:center;	
    }
</style>

<?php 
session_start();
/* Errores ini_set("display_errors","on");*/

$usuario=htmlspecialchars($_SESSION['user']['user_name']);


$conn = new mysqli($_SESSION['host'], $_SESSION['userdb'], $_SESSION['passdb'],$_SESSION['db']);
$query =  "SELECT iduser FROM user WHERE nombreUsuario='".$usuario."'";
$result = $conn->query($query);
     
 $row = $result->fetch_row();
 
    echo"<h1>Bienvenido ".$usuario."</h1>";
    $_SESSION['id']=$row[0];

?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" type="text/css" href="css/css.css"> 
  
    <title>Panel de Tareas</title>
   
  </head>
  <body class="bpanel">

   <h2>Que accion deseas realizar?</h2>
      <div>
   <a href="Anadir.php">Añadir Tarea</a>
   <a href="Eliminar.php">Borrar Tarea</a>
   <a href="Modificar.php">Modificar Tarea</a>
      </div>
      <div>
   <p><a id="a2" href="index.php">Cerrar 
sesión</a></p>
      </div>
  </body>
</html>

