<?php

require("../../../propriedades-bd.php");
require("../../../doclass/do_class.php"); 

// Fazer uma consulta no banco
// SELECT nome, email FROM usuarios;

// INSERT INTO usuarios (nome, email) VALUES ($nome, $email)


// Fazer um update

// UPDATE usuarios SET nome = $nome WHERE codigo = $codigo;

// Fazer um delete
// DELETE FROM usuarios WHERE codigo = 1;

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$numero_doc = $_POST['numero_doc'];
$tipo_doc = $_POST['tipo_doc'];
$estado = $_POST['estado'];
$telefone = $_POST['telefone'];

$sql = "SELECT nome FROM usuarios WHERE email = '".$email."'";
    
$verificacao_email = $do->select($sql, "SELECT");
$verificacao_email = $do->to_json($verificacao_email);

if(count($verificacao_email) > 0) {
    echo '{"success":false, "message":"Já existe um usuário com esse email"}';
    exit;
} else {
    
    $sql = "INSERT INTO ";
    $sql .= "usuarios ";
    $sql .= "(";
    $sql .= "nome, "; 
    $sql .= "email, ";
    $sql .= "senha, "; 
    $sql .= "documento, ";
    $sql .= "tipo_documento, "; 
    $sql .= "estado, ";
    $sql .= "telefone ";
    $sql .= ") "; 
    $sql .= "VALUES ";
    $sql .= "('$nome', ";
    $sql .= "'$email', "; 
    $sql .= "'$senha', ";
    $sql .= "$numero_doc, ";
    $sql .= "'$tipo_doc', ";
    $sql .= "'$estado', ";
    $sql .= "'$telefone')";

    $do->begin();
    $enviar_dados = $do->insert($sql, "INSERT");
    $do->commit();
    
    if($enviar_dados){
        echo '{"success":true, "message":"Cadastro Realizado com Sucesso!"}';
        exit;
    } else {
        echo '{"success":false, "message":"Erro ao cadastrar o cliente!"}';
        exit;
    }
}

// Lógica de programação junto com analise de código
// SELECTS COM LEFT JOINS 
// Sessões no PHP