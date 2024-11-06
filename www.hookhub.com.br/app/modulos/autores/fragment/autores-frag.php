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
        <script src="sweetalert2/dist/sweetalert2.min.js"></script>
        <!-- <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css"> -->
        <title>Home</title>
    </head>
    <body>
        
        <div class="w-100 d-flex">
            <div id="lista-autores" class="row w-100 p-4"></div>
        </div>
        
        <button type="button" id="btn-novo-autor" class="btn btn-primary" data-toggle="modal" data-target="#janelaModal">
            Novo Autor
        </button>
        <a href="../../home/fragment/home-frag.php" class="bg-branco-font">
            <button class="btn btn-primary">
                Voltar
            </button>
        </a>
        <div class="modal fade" id="janelaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastrar Novo Autor</h5>
                        <button type="button" class="btn btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label for="#">Nome do Autor</label>
                                <input type="text" id="nome_autor">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="#">Nacionalidade</label>
                                <input type="text" id="nacionalidade">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="#">Estilo Literário</label>
                                <select name="estilo_literario" id="estilo_literario">
                                    <option value="">Estilo Literário</option>
                                    <option value="Romance">Romance</option>
                                    <option value="Comedia">Comédia</option>
                                    <option value="Ficcao">Ficção</option>
                                    <option value="Suspense">Suspense</option>
                                    <option value="Terror">Terror</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Voltar</button>
                        <button type="button" id="salvar-autor" class="btn btn-primary">Salvar Autor</button>
                        <button type="button" id="alterar-autor" class="btn btn-primary d-none">Alterar</button>
                    </div>
                </div>
            </div>
        </div>


        <script src="../../../../lib/jquery/jquery-3.4.1.min.js"></script>
        <script src="../../../../lib/handlebars-v4.0.5/handlebars-v4.0.5.min.js"></script>
        <script src="../../../../lib/bootstrap-4.3.1/js/popper.min.js"></script>
        <script src="../../../../lib/bootstrap-4.3.1/js/bootstrap.min.js"></script>
        <script id="template-autor" type="text/x-handlebars-template">
            {{#each autores}}
            <div class="col-12 col-md-6 col-lg-4 p-0 m-0">
                <div class="card">
                    <div class="col-12 d-flex justify-content-end">
                        <button class="btn btn-primary btn-excluir" id="btn-excluir" data-codigo={{codigo}}>
                            Excluir
                        </button>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="ml-3">
                                <p class="font-size-12 m-0" style="color: #000 !important">{{nome}}</p>
                                <p class="font-size-12 m-0" style="color: #000 !important">{{nacionalidade}}</p>
                                <p class="font-size-12 m-0" style="color: #000 !important">{{estilo_literario}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row d-flex justify-content-center mb-2">
                        <div class="col-11 d-flex justify-content-center">
                            <button class="w-100 btn-azul editar-autor" id="editar-autor" data-codigo={{codigo}}>
                                Editar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            {{/each}}
        </script>
        <script src="../js/script.js"></script>
    </body>
</html> 