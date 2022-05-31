<?php
include 'conexionbd.php';
$email=$_POST['email'];

$query="SELECT * FROM `usuarios` WHERE usuarios.correo='$email'";
$consulta2=mysqli_query($conexion,$query);



 $contrasena= rand(1000, 999999);



if(mysqli_num_rows($consulta2)>0){

    
    $remitente = 'prueba@gmail.com';
    $destinatario = $email;
    $asunto = 'Restablecer Contrasena';
    $mensaje = 'la contrasena es : '.$contrasena.' por favor no comparta este mensaje';
    $headers = 'From: '.$remitente;

  if (mail($destinatario, $asunto, $mensaje, $headers)){

    $query2="UPDATE `usuarios` SET`contrasena`='$contrasena' WHERE correo='$email'";
    $resultado=mysqli_query($conexion,$query2);
    
    if($resultado){

        echo'<script type="text/javascript">
        alert("los datos se restablecieron y la contrasena es:'.$contrasena.' ");
        window.location.href="login.php";
        </script>';

      }   else{
        echo'<script type="text/javascript">
        alert("se encontro un error en los datos");
        window.location.href="forgot-password.php";
        </script>';
    }

}
        
 
}else{

    echo'<script type="text/javascript">
    alert("este correo no se encuentra registrado en el sistema");
    window.location.href="forgot-password.php";
    </script>';

}