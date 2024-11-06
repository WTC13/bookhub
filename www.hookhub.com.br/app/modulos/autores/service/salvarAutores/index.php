<?php
require("../../../../../propriedades-bd.php");
require("../../../../../doclass/do_class.php"); 

$usuario_sessao = $do->get_user_session();
$usuario_sessao = $usuario_sessao[0];

$nome_autor = $_POST['nomeAutor'];
$nacionalidade = $_POST['nacionalidade'];
$estilo_literario = $_POST['estiloLiterario'];

$sql = "INSERT ";
$sql .= "INTO ";
$sql .= "autores ";
$sql .= "( ";
$sql .= "nome, ";
$sql .= "nacionalidade, ";
$sql .= "estilo_literario, ";
$sql .= "cd_usuario ";
$sql .= ") ";
$sql .= "VALUES ";
$sql .= "(";
$sql .= "'$nome_autor', ";
$sql .= "'$nacionalidade', ";
$sql .= "'$estilo_literario', ";
$sql .= $usuario_sessao['codigo'];
$sql .= ") ";

$do->begin();
$salvar_autor = $do->insert($sql, "INSERT");
$do->commit();

if($salvar_autor){
    echo '{"success": true, "message":"Autor salvo com sucesso!"}';
    exit;
}else{
    echo '{"success": false, "message":"Não foi possível cadastrar o autor"}';
    exit;
}