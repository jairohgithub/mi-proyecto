<?php
include '../examples/conexionbd.php';

$id=$_POST['codigo'];
$nombrelote =$_POST['nombre'];



$insertar="INSERT INTO `lote`(`id`, `nombre`) VALUES ('$id','$nombrelote')";

$resultado = mysqli_query($conexion,$insertar) ;

if(!$resultado){
    
    echo'<script type="text/javascript">
    alert("Se Presento Algun Error En Los Datos");
    window.location.href="general.php";
    </script>';
    
}else{
    
    
    echo'<script type="text/javascript">
    alert("lote Guardado Correctamente");
    window.location.href="general.php";
    </script>';
    
}