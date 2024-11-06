<?php
require("../../../../../propriedades-bd.php");
require("../../../../../doclass/do_class.php"); 

$usuario_sessao = $do->get_user_session();
$usuario_sessao = $usuario_sessao[0];

$codigo = $_POST['codigo'];

$sql = "DELETE ";
$sql .= "FROM ";
$sql .= "autores ";
$sql .= "WHERE ";
$sql .= "codigo ";
$sql .= "= ";
$sql .= "'$codigo' ";

$do->begin();
$excluir_autor = $do->delete($sql, "DELETE");
$do->commit();

if($excluir_autor){
    echo '{"success":true, "message":"Autor Excluído!"}';
    exit;
}else{
    echo '{"success":false, "message": ""Não foi possível excluir o autor}';
    exit;
}
