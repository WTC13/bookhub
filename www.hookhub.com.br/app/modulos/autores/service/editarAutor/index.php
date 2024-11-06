<?php
require("../../../../../propriedades-bd.php");
require("../../../../../doclass/do_class.php"); 

$usuario_sessao = $do->get_user_session();
$usuario_sessao = $usuario_sessao[0];

$codigo = $_POST['codigo'];
$nome_autor = $_POST['nomeAutor'];
$nacionalidade = $_POST['nacionalidade'];
$estilo_literario = $_POST['estiloLiterario'];

$sql = "UPDATE autores SET ";
$sql .= "nome = '$nome_autor', ";
$sql .= "nacionalidade = '$nacionalidade', ";
$sql .= "estilo_literario = '$estilo_literario' ";
$sql .= "WHERE codigo = $codigo";

$do->begin();
$atualizar_autor = $do->update($sql, "UPDATE");
$do->commit();

if($atualizar_autor) {
    echo '{"success":true, "message":"Autor atualizado com sucesso!"}';
    exit;
} else {
    echo '{"success":false, "message":"Não foi possível atualizar o autor."}';
    exit;
}