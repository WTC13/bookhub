<?php

require("../../../propriedades-bd.php");
require("../../../doclass/do_class.php"); 

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email = '$email'";

$verificacao_email = $do->select($sql, "SELECT");
$verificacao_email = $do->to_json($verificacao_email);


if(count($verificacao_email) > 0){
    $senha_verificar = $verificacao_email[0]{'senha'};
    
    if($senha == $senha_verificar){
        session_start();
        $_SESSION['BHSession']['user'] = $verificacao_email; 
        echo'{"success": true, "message":"Login efetuado com sucesso!"}';
        exit;
    }else{
        echo'{"success": false, "message":"E-mail ou senha incorreto!"}'; 
        exit;
    }

}else{
    echo'{"success": false, "message":"E-mail ou senha incorreto!"}'; 
    exit;
}


