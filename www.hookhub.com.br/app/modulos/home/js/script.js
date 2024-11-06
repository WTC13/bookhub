function Home(){
    this.init = function(){
        $("#autor").on("click", function(){
            window.location.href = '../../autores/fragment/autores-frag.php';
        });
        $("#livro").on("click", function(){
            window.location.href = '../../livros/fragment/livros-frag.php';
        });
    }
}

let home = new Home();
home.init();