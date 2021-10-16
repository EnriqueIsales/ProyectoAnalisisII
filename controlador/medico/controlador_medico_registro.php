<?php 

    require '../../modelo/modelo_medico.php';

    $MM = new Modelo_Medico();

    $nombre = htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
    $apepat = htmlspecialchars($_POST['apepat'],ENT_QUOTES,'UTF-8');
    $apemat= htmlspecialchars($_POST['apemat'],ENT_QUOTES,'UTF-8');
    $direccion = htmlspecialchars($_POST['direccion'],ENT_QUOTES,'UTF-8');
    $movil = htmlspecialchars($_POST['movil'],ENT_QUOTES,'UTF-8');
    $sexo = htmlspecialchars($_POST['sexo'],ENT_QUOTES,'UTF-8');
    $fenac = htmlspecialchars($_POST['fenac'],ENT_QUOTES,'UTF-8');
    $nrodocumento = htmlspecialchars($_POST['nrodocumento'],ENT_QUOTES,'UTF-8');
    $colegiatura = htmlspecialchars($_POST['colegiatura'],ENT_QUOTES,'UTF-8');
    $especialidad = htmlspecialchars($_POST['especialidad'],ENT_QUOTES,'UTF-8');
    $usu = htmlspecialchars($_POST['usu'],ENT_QUOTES,'UTF-8');
    $contra = password_hash($_POST['contra'],PASSWORD_DEFAULT,['cost'=>10]);
    $rol =htmlspecialchars($_POST['rol'],ENT_QUOTES,'UTF-8');
    $email =htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
    

    $consulta =$MM->Registrar_Medico($nombre,$apepat,$apemat,$direccion,$movil,$sexo,$fenac,
    $nrodocumento,$colegiatura,$especialidad,$usu,$contra,$rol,$email);
    
    echo $consulta;
 



?>