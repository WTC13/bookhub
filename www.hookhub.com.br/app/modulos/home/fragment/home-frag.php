<?php
    require('../../../../propriedades-bd.php');
    require('../../../../doclass/do_class.php');

    $do->check_session();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../../css/style.css">
        <link rel="stylesheet" href="../../../../lib/bootstrap-4.3.1/css/bootstrap.min.css">
        <title>Home</title>
    </head>
    <body>
        <div class="container w-100 h-100 d-flex justify-content-center align-items-center">
            <div class="row">
                <div class="col">
                    <button class="btn-verde" id="autor">Autores</button>
                    <button class="btn-azul" id="livro">Livros</button>
                </div>
            </div>
        </div>

        <script src="../../../../lib/jquery/jquery-3.4.1.min.js"></script>
        <script src="../../../../lib/bootstrap-4.3.1/js/bootstrap.min.js.map"></script>
        <script src="../js/script.js"></script>
    </body>
</html> 