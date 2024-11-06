function Autores(){
    this.arrayAutores = [];
    this.codigoAutorSelecionado = 0;

    this.init = function() {
        autores.consultarAutores();
        
        $("#salvar-autor").on("click", function(){
            var nome_autor = $("#nome_autor").val();
            var nacionalidade = $("#nacionalidade").val();
            var estilo_literario = $("#estilo_literario").val();

            if(nome_autor == "" || nacionalidade == ""){    
                alert("Preencha todos os campos");
            }else{
                autores.enviarAutores(nome_autor,nacionalidade,estilo_literario);
                $("#nome_autor").val("");
                $("#nacionalidade").val("");
                $("#janelaModal").modal("hide");
            }
        });

        $("#btn-novo-autor").on("click", function() {
            $("#alterar-autor").addClass("d-none");
            $("#salvar-autor").removeClass("d-none");

            $("#nome_autor").val("");
            $("#nacionalidade").val("");
            $("#estilo_literario").val("");
        });

        $(document).ready(function() {
            $("body").on("click",".editar-autor", function(){
                var codigoAutor = $(this).data('codigo');

                var autorFiltrado = autores.arrayAutores.filter(autFilt => autFilt.codigo == codigoAutor);

                $("#nome_autor").val(autorFiltrado[0].nome);
                $("#nacionalidade").val(autorFiltrado[0].nacionalidade);
                $("#estilo_literario").val(autorFiltrado[0].estilo_literario);

                $("#salvar-autor").addClass("d-none");
                $("#alterar-autor").removeClass("d-none");

                $("#janelaModal").modal("show");

                autores.codigoAutorSelecionado = autorFiltrado[0].codigo;
            });
        });
        
        $(document).ready(function() {
            $("body").on("click",".btn-excluir", function(){
                var codigo = $(this).data("codigo");
                autores.excluirAutores(codigo);
            });
        });

        $("#alterar-autor").on("click", function() {
            var nome = $("#nome_autor").val();
            var nacionalidade = $("#nacionalidade").val();
            var estiloLiterario = $("#estilo_literario").val();

            autores.alterarAutor(autores.codigoAutorSelecionado, nome, nacionalidade, estiloLiterario);
        });

    }

    this.alterarAutor = function(codigo, nome, nacionalidade, estiloLiterario) {
        var obj = {
            codigo: codigo,
            nomeAutor: nome,
            nacionalidade: nacionalidade,
            estiloLiterario: estiloLiterario
        }

        var params = $.param(obj);

        $.post("../service/editarAutor/index.php", params).done(function (result) {
            if ((result.search("gerenciador MySQL") > 0) || (result.search("erro na execução do Comando SQL") > 0)) {
                alert("Houve um problema ao conectar ao Banco de Dados. Por favor, verifique sua conexão com a internet e tente novamente.");
            } else {
                var obj = JSON.parse(result);
                
                if(obj.success) {
                    autores.consultarAutores();
                    alert(obj.message);
                    $("#janelaModal").modal("hide");
                } else {
                    alert(obj.message);
                }
            }
        });
    }
    
    this.enviarAutores = function(nomeAutor, nacionalidade, estiloLiterario){
        var obj = {
            nomeAutor: nomeAutor,
            nacionalidade: nacionalidade,
            estiloLiterario: estiloLiterario
        }

        var params = $.param(obj);

        $.post("../service/salvarAutores/index.php", params).done(function (result) {
            if ((result.search("gerenciador MySQL") > 0) || (result.search("erro na execução do Comando SQL") > 0)) {
                alert("Houve um problema ao conectar ao Banco de Dados. Por favor, verifique sua conexão com a internet e tente novamente.");
            } else {
                var obj = JSON.parse(result);
                
                if(obj.success) {
                    autores.consultarAutores();
                } else {
                    alert(obj.message);
                }
            }
        });
    }


    this.consultarAutores = function() {
        $.post("../service/consultarAutores/index.php").done(function (result) {
            if ((result.search("gerenciador MySQL") > 0) || (result.search("erro na execução do Comando SQL") > 0)) {
                alert("Houve um problema ao conectar ao Banco de Dados. Por favor, verifique sua conexão com a internet e tente novamente.");
            } else {
                var obj = JSON.parse(result);
                if(obj.success){
                    autores.arrayAutores = obj.autores;
                    var source = $("#template-autor").html();
                    var template = Handlebars.compile(source);
                    var html = template(obj);
                    $("#lista-autores").html(html);
                }
            }
        });
    }

    this.excluirAutores = function(codigo) {
        var obj = {
            codigo: codigo
        }

        var params = $.param(obj);

        $.post("../service/excluirAutores/index.php", params).done(function (result) {
            if ((result.search("gerenciador MySQL") > 0) || (result.search("erro na execução do Comando SQL") > 0)) {
                alert("Houve um problema ao conectar ao Banco de Dados. Por favor, verifique sua conexão com a internet e tente novamente.");
            } else {
                var obj = JSON.parse(result);
                
                if(obj.success) {
                    autores.consultarAutores();
                    alert(obj.message);
                } else {
                    alert(obj.message);
                }
            }
        });
    }
}

let autores = new Autores();
autores.init();