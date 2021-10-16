<?php 

    require '../../modelo/modelo_medicamento.php';

    $MM = new Modelo_Medicamento();//instanciamos
    $medicamento = htmlspecialchars($_POST['me'],ENT_QUOTES,'UTF-8');
    $alias = htmlspecialchars($_POST['ali'],ENT_QUOTES,'UTF-8');
    $stock = htmlspecialchars($_POST['st'],ENT_QUOTES,'UTF-8');
    $estatus = htmlspecialchars($_POST['es'],ENT_QUOTES,'UTF-8');
    $consulta =$MM->Registrar_Medicamento($medicamento,$alias,$stock,$estatus);
    echo $consulta;

?>