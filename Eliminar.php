<style>
    h1{
         font-family: 'fantasy', cursive;
	color:red;
	font-size:75px;
	width:100%;
	text-align:center;
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
    #divbasico{
         width:100%;
	text-align:center;	
	display:flex;
	justify-content:center;
    }
    #divbasico  input[type=text]{
        font-size:20px;
		font-family: 'fantasy', cursive;
	padding:5px;
        text-align: center;
    }
     #divbasico  input[type=submit]{
         padding: 10px;
        font-size:35px;
        font-family: 'fantasy', cursive;
        background-color:white;
        color:black;
        border: none;
    }
    #tab1{
            width:100%;
	text-align:center;	
	display:flex;
	justify-content:space-around;
        padding: 20px;
    }
    
    .sup{
        text-decoration:none;
	color:darkred;
	font-family: 'fantasy', cursive;
	font-size:35px;
        width:100%;
	text-align:center;
    }
</style>

<html >
<head>
  <link rel="stylesheet" type="text/css" href="css/css.css"> 
<title>Borrar Tarea</title>

</head>

<body>
<h1>TUS TAREAS</h1>

 <form action="<?= $SERVER['PHP_SELF'];?>" method="post">
     <div id="divbasico">
     <input type="text" name="idborrar" placeholder="ID Tarea A Borrar" />
      <input type="submit" value="Borrar" />
     </div>
      
  </form>

</body>
</html>
<?php 
session_start();

  


  $mysqli = new mysqli($_SESSION['host'], $_SESSION['userdb'], $_SESSION['passdb'],$_SESSION['db']);
$query =  "SELECT * FROM task WHERE user_iduser='".$_SESSION['id']."'";


printf (' <table id="tab1"> ');


 


if ($result = $mysqli->query($query)) {

	 printf (' <tr ><td class="sup">ID </td><td class="sup">Nombre</td><td class="sup">Texto</td><td class="sup">Estado </td></tr>');
	 $row[0]=1;
for($cont=0;$row[0]!=NULL;$cont++){
  $result->data_seek($cont);
    $row = $result->fetch_row();

	
   
}
    $cont2=$cont-1;
    
    for($cont3=0;$cont3<$cont2;$cont3++){
  $result->data_seek($cont3);
    $row = $result->fetch_row();
       
	

     printf (' <tr ><td class="cont">%s</td><td class="cont">%s</td ><td class="cont">%s</td><td class="cont">%s</td>', $row[0],$row[2],$row[3],$row[4]);
	 

    }
	 
	

try {
  if(isset($_POST)&&
  !empty($_POST['idborrar']))
  {            
  
	  $id=$_POST['idborrar'];
       $sql="DELETE  FROM task WHERE idtask='".$id."'";
  
    $res=$mysqli->query($sql);
	header("Location:Panel.php");
  }
}catch(Exception $e){
  echo 'Error:';
}





printf (" </table>    <a id='Exit' href='Panel.php'>Exit</a>");

	
  }
 
?>

