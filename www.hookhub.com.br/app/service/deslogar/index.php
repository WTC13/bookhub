<?php
function deslogar() {
    $destruirSessao = session_destroy();

    if($destruirSessao) {
        echo '{"success":true, "message":"Usuario deslogado com sucesso!"}';
        exit;
    } else {
        echo '{"success":false, "message":"Não foi possível deslogar o usuário."}';
        exit;
    }
}

deslogar();