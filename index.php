<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="View/CSS/style_index.css">
        <script src="View/JavaScript/jquery-3.3.1.js" charset="utf-8"></script>
        <script>
            $(document).ready(function() {
                $('#btn_login').on('click', function(){
                        $('#novo_usuario').css("display", "none");
                        $('#login').css("display", "block");

                });
                 $('#btn_n_usuario').on('click', function(){
                        $('#novo_usuario').css("display", "block");
                        $('#login').css("display", "none");

                });
            });

            function autenticar(){
                $.post("router.php", {
                    email: $("#txt_email").val(),
                    senha: $("#txt_senha").val(),
                    classe: "funcionario",
                    acao: "autenticar"
                }).done(function(dados){
                    // alert(dados)
                    if(dados != ""){
                        document.location.href = "http://localhost/medvet/View/adm_medico.php";
                    } else {
                        alert("Erro na Autenticação.");
                    }
                });
            }
            $(document).ready(function(){
                $.post("router.php", {
                    classe: "medico",
                    acao: "matarSessao"
                });
            });
        </script>
        <title>Medvet | Autenticação</title>
    </head>
    <body>
        <main>
            <div id='esquerda'></div>
            <div id='direita'>
                <div id="boas_vindas">
                    <h1> MedVet</h1>
                    <p>Bem vindo ao MedVet</p>
                </div>
                <div id='form'>
                    <div id="novo_usuario">
                        <p>NOVO USUARIO</p>
                        <input type="email" placeholder="EMAIL">
                        <input type="password" placeholder="SENHA">
                        <input type="password" placeholder="CONFIRMA SENHA">
                    </div>
                    <div id="login">
                        <p>LOGIN</p>
                        <input type="email" id="txt_email" placeholder="USUARIO">
                        <input type="password"  id="txt_senha" placeholder="SENHA">
                    </div>
                </div>
                <div id='butons'>
                    <button id="btn_login" type="submit">
                        LOGIN
                    </button>
                    <input id="btn_n_usuario" type="submit" value="Novo Usuário">
                </div>
                <footer>
                    Autores:<br>
                    Todos os Direitos reservados
                </footer>
            </div>
        </main>
    </body>
</html>