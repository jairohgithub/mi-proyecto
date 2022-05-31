<?php

include '../examples/conexionbd.php';
$lote =$_POST['select'];
$comida=$_POST['comida'];

$agua =$_POST['agua'];
$precio =$_POST['insumos'];


$insertar="INSERT INTO `insumoslote`(`loteCerdo`, `comida`, `agua`, `precio`)
 VALUES ('$lote','$comida','$agua','$precio')";

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