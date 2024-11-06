function Login(){
    this.inicio = function(){
        $("#login").on("click", function(){
            var email = $("#email").val()
            var senha = $("#senha").val()

            if(email == "" || senha == "") {
                alert('Preencha todos os campos!');
            } else {
                login.enviarDados(email, senha);
            }
        });     
    }

    this.enviarDados = function(emailUsuario, senhaUsuario){
        var obj = {
            email: emailUsuario,
            senha: senhaUsuario
        }

        var params = $.param(obj);

        $.post("./service/index.php", params).done(function (result) {
            if ((result.search("gerenciador MySQL") > 0) || (result.search("erro na execução do Comando SQL") > 0)) {
                alert("Houve um problema ao conectar ao Banco de Dados. Por favor, verifique sua conexão com a internet e tente novamente.");
            } else {
                var obj = JSON.parse(result);
                
                if(obj.success) {
                    window.location.href = '../modulos/home/fragment/home-frag.php';
                } else {
                    alert(obj.message);
                }
            }
        });
    }
}

let login = new Login();
login.inicio();
