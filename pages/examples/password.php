<?php
include 'conexionbd.php';

$email=$_POST['email'];


$query="SELECT * FROM `usuarios` WHERE usuarios.correo='$email' and usuarios.activado=1";
$consulta2=mysqli_query($conexion,$query);

if(mysqli_num_rows($consulta2)>0){

    $contrasena= rand(5, 15);

    $to = $email;
    $subject = "Restablecer Contraseña";
    $message = "la contraseña es : ".$contrasena." por favor no comparta este mensaje";
    if(mail($to, $subject, $message)){

       

        $query2="UPDATE `usuarios` SET`contrasena`='$contrasena' WHERE correo='$email'";
        $resultado=mysqli_query($conexion,$query2);
        
        if($resultado){

            echo'<script type="text/javascript">
            alert("los datos se restablecieron y se enviaron al correo inscrito");
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
    alert("los datos pueden estar incorrectos o la cuenta no debe estar activada");
    window.location.href="forgot-password.php";
    </script>';

}