<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../lib/bootstrap-4.3.1/css/bootstrap.min.css">
        <title>Login</title>
    </head>
    <body>
        
        <div class="container d-flex justify-content-center h-100 align-items-center">
            <div class="content">
                <div class="card p-4">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <h1>Login </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="#">Email:</label>
                            <input type="email" id="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="#">Senha:</label>
                            <input type="password" id="senha">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button id="login" class="btn-azul w-100 mt-4 Montserrat-SemiBold">Login</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-4 font-size-14">
                            <p>Não tem conta? <a href="../cadastro/index.php" class="">Cadastre -se</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        <script src="../../lib/jquery/jquery-3.4.1.min.js"></script>
        <script src="../../lib/bootstrap-4.3.1/js/bootstrap.min.js.map"></script>
        <script src="../../app/login/js/script.js"></script>
    </body>
</html>