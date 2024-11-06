<?php

require("../../../../../propriedades-bd.php");
require("../../../../../doclass/do_class.php"); 

$usuario_sessao = $do->get_user_session();
$usuario_sessao = $usuario_sessao[0];

$sql = "SELECT ";
$sql .= "* ";
$sql .= "FROM ";
$sql .= "livros ";
$sql .= "WHERE codigo = $usuario_sessao[codigo]";

$consulta_livro = $do->select($sql, "SELECT");
$consulta_livro = $do->to_json($consulta_livro);

if(count($consulta_livro) > 0) {
    echo '{"success": true, "message":"Consulta realizada com sucesso!", "livros": ' . json_encode($consulta_livro) . '}';
    exit;
} else {
    echo '{"success": false, "message":"Não foi possível realizar a consulta."}';
    exit;
}