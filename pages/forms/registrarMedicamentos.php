<?php
include '../examples/conexionbd.php';

$codigomedicamento=$_POST['codigo'];
$nombreMedicamento =$_POST['nombre'];
$precio=$_POST['precio'];
$numeroMedicamento =$_POST['numero'];


$insertar="INSERT INTO `Medicamentos`(`id`, `nombreMedicamento`, `precio`, `numeroRegistro`) VALUES
 ('$codigomedicamento','$nombreMedicamento','$precio','$numeroMedicamento')";

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