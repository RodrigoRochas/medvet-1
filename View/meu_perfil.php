<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link type="text/css" rel="stylesheet" href="CSS/meu_perfil.css">
    <link type="text/css" rel="stylesheet" href="CSS/style.css">
    <link type="text/css" rel="stylesheet" href="CSS/adm_pet_style.css">
    <script src="JavaScript/jquery-3.3.1.js" charset="utf-8"></script>
    <script src="JavaScript/ajax_pet_crud.js" charset="utf-8"></script>
    <title>Document</title>
</head>
<body>

    <?php require_once("cabecalho.php")?> 
    <div id="main">
        <div id="main_content">
            <?php require_once("menu.php") ?>
        </div>
    </div>

                                        <!-- INFOS BASICAS  -->
 
    <div id="cont">
        <h2>Informações básicas</h2>
        <p style="margin-left: 30px">Algumas informações sobre sua conta, na qual pode editar.</p>

        <div id="infos">
            <div class="tituloFoto">
                <h4>Foto</h4>
            </div>
            <div class="fotoCompleto">
                <p>Foto para personalizar</p>
            </div>
            <div class="foto">
                <img src="./Imagens/camera.png" style="margin-left:auto; margin-right:auto;">
                
            </div>
        </div>


        <div id="infos">
            <div class="tituloNome">
                <h4>Nome</h4>
            </div>
            <div class="nomeCompleto">
                <p>Rodrigo Rocha Santos</p>
            </div>
            <div class="imagem">
                <!-- <img src="./Imagens/seta-direita (2).png"> -->
                <form method="POST" action="editar_informacoes.php">
                    <input type="text" name="nome" value="Rodrigo Rocha Santos" />
                    <input type="submit" name="editar" value="Salvar" />
            </form>
            </div>
        </div>

        <div id="infos">
            <div class="tituloNome">
                <h4>Data Nascimento</h4>
            </div>
            <div class="nomeCompleto">
                <p>30/06/2001</p>
            </div>
            <div class="imagem">
                <!-- <img src="./Imagens/seta-direita (2).png"> -->
                <form method="POST" action="editar_informacoes.php">
                    <input type="text" name="data_nascimento" value="30/06/2001" />
                    <input type="submit" name="editar" value="Salvar" />
                </form>
            </div>
        </div>

        <div id="infos">
            <div class="tituloNome">
                <h4>Gênenro</h4>
            </div>
            <div class="nomeCompleto">
                <p>Masculino</p>
            </div>
            <div class="imagem">
                <!-- <img src="./Imagens/seta-direita (2).png"> -->
                <form method="POST" action="editar_informacoes.php">
                    <input type="text" name="genero" value="Masculino" />
                    <input type="submit" name="editar" value="Salvar" />
                </form>
            </div>
        </div>
    </div>

                            <!-- INFOS DE CONTATO -->

    <div id="cont">
        <h2>Informações  de contato</h2>
        <p style="margin-left: 30px">Algumas informações sobre sua conta, na qual pode editar.</p>

        <div id="infos">
            <div class="tituloFoto">
                <h4>Email</h4>
            </div>
            <div class="fotoCompleto">
                <p>rodrigo@cliente.com.br</p>
            </div>
            <div class="foto">
                <!-- <img src="./Imagens/seta-direita (2).png"> -->
                <form method="POST" action="editar_informacoes.php">
                    <input type="text" name="email" value="rodrigo@cliente.com.br" />
                    <input type="submit" name="editar" value="Salvar" />
                </form>
            </div>
        </div>


        <div id="infos">
            <div class="tituloNome">
                <h4>Telefone</h4>
            </div>
            <div class="nomeCompleto">
                <p>(11) 974688166</p>
            </div>
            <div class="imagem">
                <!-- <img src="./Imagens/seta-direita (2).png"> -->
                <form method="POST" action="editar_informacoes.php">
                    <input type="text" name="telefone" value="(11)974688166" />
                    <input type="submit" name="editar" value="Salvar" />
                </form>
            </div>
        </div>

        <div id="infos">
            <div class="tituloNome">
                <h4>CEP</h4>
            </div>
            <div class="nomeCompleto">
                <p>06160-180</p>
            </div>
            <div class="imagem">
                <!-- <img src="./Imagens/seta-direita (2).png"> -->
                <form method="POST" action="editar_informacoes.php">
                    <input type="text" name="cep" value="06160180" />
                    <input type="submit" name="editar" value="Salvar" />
                </form>
            </div>
        </div>

        <div id="infos">
            <div class="tituloNome">
                <h4>Complemento</h4>
            </div>
            <div class="nomeCompleto">
                <p>Proximo ao centro</p>
            </div>
            <div class="imagem">
                <!-- <img src="./Imagens/seta-direita (2).png"> -->
                <form method="POST" action="editar_informacoes.php">
                    <input type="text" name="complemento" value="Proximo ao centro" />
                    <input type="submit" name="editar" value="Salvar" />
                </form>
            </div>
        </div>
    </div>

    <?php require_once("rodape.php") ?>
    
</body>
</html>