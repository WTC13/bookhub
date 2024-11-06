function Livro(){
    this.init = function(){
        // $("#novo-livro").on("click", function(){
        // });
        $("#voltar-livro").on("click", function(){
            window.location.href = '../../home/fragment/home-frag.php'
        });

        livro.consultarLivros();
    }

    this.consultarLivros = function() {
        $.post("../service/consultarLivro/index.php").done(function (result) {
            if ((result.search("gerenciador MySQL") > 0) || (result.search("erro na execução do Comando SQL") > 0)) {
                alert("Houve um problema ao conectar ao Banco de Dados. Por favor, verifique sua conexão com a internet e tente novamente.");
            } else {
                var obj = JSON.parse(result);
                
                if(obj.success) {
                    
                } else {
                    alert(obj.message);
                }
            }
        });
    }
}

let livro = new Livro();
livro.init();