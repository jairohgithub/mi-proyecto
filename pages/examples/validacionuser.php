<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    
</body>
</html>
<?php
include 'conexionbd.php';

$usuario=$_POST['email'];
$clave=$_POST['pass'];

$query="SELECT * FROM `usuarios` WHERE user='$usuario' and contrasena='$clave' and tipoUser='administrador' and activado='1'";
$consulta2=mysqli_query($conexion,$query);

$query2="SELECT * FROM `usuarios` WHERE user='$usuario' and contrasena='$clave' and tipoUser='granjero' and activado='1'";
$consulta3=mysqli_query($conexion,$query2);


if(mysqli_num_rows($consulta2)>0){
    session_start();
    $ar=mysqli_fetch_array($consulta2);
    $_SESSION['id']=$ar['id'];
    $_SESSION['nombreUsuario']=$ar['nombreUsuario'];
    $_SESSION['apellidoUsuario']=$ar['telefonoUsuario'];
    $_SESSION['user']=$ar['user'];
    $_SESSION['contrasena']=$ar['contrasena'];
    $_SESSION['tipoUser']=$ar['tipoUser'];
    $_SESSION['administrador']=true;
     header("Location:../../inicioadmin.php");
}
else if(mysqli_num_rows($consulta3)>0){
    session_start();
    $arr=mysqli_fetch_array($consulta3);
    $_SESSION['id']=$arr['id'];
    $_SESSION['nombreUsuario']=$arr['nombreUsuario'];
    $_SESSION['apellidoUsuario']=$arr['telefonoUsuario'];
    $_SESSION['user']=$arr['user'];
    $_SESSION['contrasena']=$arr['contrasena'];
    $_SESSION['tipoUser']=$arr['tipoUser'];
  
    $_SESSION['granjero']=true;
    header("Location:../../inicio.php");



}

else{
    echo'<script type="text/javascript">
    alert("los datos pueden estar incorrectos o la cuenta no debe estar activada");
    window.location.href="login.php";
    </script>';
   
}