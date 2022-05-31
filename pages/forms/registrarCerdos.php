<?php

include '../examples/conexionbd.php';

$cod=$_POST['cod'];
$select =$_POST['select'];
$raza =$_POST['raza'];
$peso =$_POST['peso'];


$insertar="INSERT INTO `cerdo`(`id`, `idlote`, `razaCerdo`, `peso`) 
VALUES ('$cod','$select','$raza','$peso')";

$resultado = mysqli_query($conexion,$insertar) ;

if(!$resultado){
    
    echo'<script type="text/javascript">
    alert("Se Presento Algun Error En Los Datos");
    window.location.href="general.php";
    </script>';
    
}else{
    
    
    echo'<script type="text/javascript">
    alert("cerdo Guardado Correctamente y asignado al lote escogido");
    window.location.href="general.php";
    </script>';
    
}