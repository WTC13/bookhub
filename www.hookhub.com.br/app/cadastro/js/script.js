function Cadastrar() {
    this.inicio = function() {
       
        $("#cadastrar").on("click", function() {
            var nome = $("#nome").val();
            var email = $("#email").val();
            var senha = $("#senha").val();
            var numero_doc = $("#numero_doc").val();
            var tipo_doc = $("#tipo_doc").val();
            var estado = $("#estado").val();
            var telefone = $("#telefone").val();

            if(nome == "" || email == "" || senha == "" || numero_doc == "" || tipo_doc == "" || estado == "" || telefone == ""){
                alert("Preencha os campos vazios!");
            } else {
                cadastrar.cadastrarUsuario(nome, email, senha, numero_doc, tipo_doc, estado, telefone);
                 
            } 
        });
    };

    this.cadastrarUsuario = function(nomeUsuario, emailUsuario, senhaUsuario, numero_docUsuario, tipo_docUsuario, estadoUsuario, telefoneUsuario) {
        var obj = {
            nome: nomeUsuario,
            email: emailUsuario,
            senha: senhaUsuario,
            numero_doc: numero_docUsuario,
            tipo_doc: tipo_docUsuario,
            estado: estadoUsuario,
            telefone: telefoneUsuario
        }
        
        var params = $.param(obj);
        
        $.post("./service/index.php", params).done(function (result) {
            if ((result.search("gerenciador MySQL") > 0) || (result.search("erro na execução do Comando SQL") > 0)) {
                alert("Houve um problema ao conectar ao Banco de Dados. Por favor, verifique sua conexão com a internet e tente novamente.");
            } else {
                var obj = JSON.parse(result);
                if(obj.success){
                    alert(obj.message);
                }
            }
        });
    }


};


let cadastrar = new Cadastrar();
cadastrar.inicio();