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
        <title>Document</title>
    </head>
    <body>
        
        <div class="container">
            <div class="content">
                
            </div>
        </div>


        <button class="btn btn-verde" id="novo-livro">Novo Livro</button>
        <button class="btn btn-azul" id="voltar-livro">Voltar</button>

        <script src="../../../../lib/jquery/jquery-3.4.1.min.js"></script>
        <script src="../../../../lib/handlebars-v4.0.5/handlebars-v4.0.5.min.js"></script>
        <script src="../../../../lib/bootstrap-4.3.1/js/popper.min.js"></script>
        <script src="../../../../lib/bootstrap-4.3.1/js/bootstrap.min.js"></script>
        <script src="../js/script.js"></script>
    </body>
</html>