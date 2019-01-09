<style>
body h1{
        font-size:75px;
	width:100%;
	text-align:center;
        font-family: 'fantasy', cursive;
	color:red;
	
    }
    #medio{
        width:100%;
	text-align:center;	
	display:flex;
	justify-content:space-around;
    }
    body p{
         text-decoration:none;
	color:darkred;
	font-family: 'fantasy', cursive;
	font-size:35px;
        width:100%;
	text-align:center;	
    }
    input[type=text]{

	font-size:20px;
		font-family: 'fantasy', cursive;
	padding:5px;

	
}
    #boton{
        margin-top: 30px;
          text-decoration:none;
	color:darkred;
	font-family: 'fantasy', cursive;
	font-size:35px;
        width:100%;
	text-align:center;	
    }
    #boton input[type=submit]{
        padding: 10px;
        font-size:35px;
        font-family: 'fantasy', cursive;
        background-color:white;
        color:black;
        border: none;
    }
    #Exit{
        position: absolute;
        color: yellow;
        font-size: 20px;
        text-decoration: none;
       font-family: 'fantasy', cursive;
        top: 90%;
        left: 90%;
        background-color: black;
        border-radius: 90px;
        padding: 10px;
    }
     #sele{
        font-size:20px;
		font-family: 'fantasy', cursive;
	padding:5px;
        text-align: center;
    }
</style>

<?php 
session_start();
  $conn = new mysqli($_SESSION['host'], $_SESSION['userdb'], $_SESSION['passdb'],$_SESSION['db']);
try {
  if(isset($_POST)&&
  !empty($_POST['nom']) &&
  !empty($_POST['desc'])&&
  !empty($_POST['list']))
  {
	  $nom=$_POST['nom'];
       $list=$_POST['list'];
	    $desc=$_POST['desc'];
		
		$sql="INSERT INTO `task` (`idtask`, `nombreTask`, `Estado`, `Texto`, `user_iduser`)VALUES(NULL, '".$nom."','".$list."','".$desc."','".$_SESSION['id']."')";
  
    $res=$conn->query($sql);
	header("Location:Panel.php");
  }
}catch(Exception $e){
  echo 'Error:';
}


?>


<html >
<head>
  <link rel="stylesheet" type="text/css" href="css/css.css"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Añadir Tarea</title>
   
</head>

<body>
    <h1>Crear Tarea</h1>
    
<form action="<?= $SERVER['PHP_SELF'];?>" method="post">
    <div id="medio">
    <div><p>Nombre Tarea:</p> <input type="text" name="nom"></div>
    <div> <p>Descripcion:</p> <input type="text" name="desc"></div>
    <div><p>Estado:</p><SELECT id="sele" NAME="list"> 
<OPTION > A La mitad </OPTION>
<OPTION > Recien Comenzada </OPTION>
    <OPTION > Finalizada </OPTION>
        </SELECT></div>
    </div>
    <div id="boton">
  <input type="submit" name="enviar" value="Crear Tarea">
    </div>
</form>
    <a id="Exit" href="Panel.php">Exit</a>
</body>
</html>