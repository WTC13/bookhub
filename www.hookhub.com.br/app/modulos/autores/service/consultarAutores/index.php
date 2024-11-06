<?php
require("../../../../../propriedades-bd.php");
require("../../../../../doclass/do_class.php"); 

$usuario_sessao = $do->get_user_session();
$usuario_sessao = $usuario_sessao[0];

$sql = "SELECT ";
$sql .= "aut.*, ";
$sql .= "(SELECT COUNT(codigo) FROM livros liv WHERE liv.cd_autor = aut.codigo) AS quantidade_livros ";
$sql .= "FROM autores aut ";
$sql .= "WHERE aut.cd_usuario = " . $usuario_sessao['codigo'];

$resultado_autores = $do->select($sql, "SELECT");
$resultado_autores = $do->to_json($resultado_autores);

if(count($resultado_autores) > 0) {
    echo '{"success":true, "message":"Autores cadastrados com sucesso!", "autores":' . json_encode($resultado_autores) . '}';
    exit;
} else {
    echo '{"success":false, "message":"Não existem autores cadaastrados."}';
    exit;
}
















// <?php
// require("../../../../../propriedades-bd.php");
// require("../../../../../doclass/do_class.php"); 

// $usuario_sessao = $do->get_user_session();
// $usuario_sessao = $usuario_sessao[0];

// $sql = "SELECT ";
// $sql .= "* ";
// $sql .= "FROM ";
// $sql .= "autores ";
// $sql .= "WHERE cd_usuario = " . $usuario_sessao['codigo'];

// $resultado_autores = $do->select($sql, "SELECT");
// $resultado_autores = $do->to_json($resultado_autores);

// if(count($resultado_autores) > 0) {
//     echo '{"success":true, "message":"Autores cadastrados com sucesso!", "autores":'.json_encode($resultado_autores).'}';
//     exit;
// } else {
//     echo '{"success":false, "message":"Não existem autores cadaastrados."}';
//     exit;
// }