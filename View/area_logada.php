<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link type="text/css" rel="stylesheet" href="CSS/meu_perfil.css">
    <link type="text/css" rel="stylesheet" href="CSS/style.css">
    <link type="text/css" rel="stylesheet" href="CSS/feedback.css">

    <link type="text/css" rel="stylesheet" href="CSS/adm_pet_style.css">
    <script src="JavaScript/jquery-3.3.1.js" charset="utf-8"></script>
    <script src="JavaScript/ajax_pet_crud.js" charset="utf-8"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <title>Document</title>
</head>
<body>  
    <a href="./blog.php">
        <button href="./blog.php" type="button" id="id_float_btn" class="btn pmd-btn-fab btn-warning pmd-ripple-effect pmd-btn-raised">
            <i href="./blog.php" class="material-icons pmd-sm">Emergência</i>
        </button>
    </a>      
    <?php session_start()?>
    <div id="main">
        <div id="main_content">
            <?php require_once("menu.php") ?>
        </div>
    </div>  

    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width: 80%;">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Slides -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./Imagens/vet2.jpg" alt="Imagem 1">
            </div>

            <div class="carousel-item">
                <img src="./Imagens/vet3.jpg" alt="Imagem 2">
            </div>

            <div class="carousel-item">
                <img src="./Imagens/vet5.jpg" alt="Imagem 3">
            </div>
        </div>

        <!-- Controls -->
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div>

    <div id="container">
        <div id="parte_escrita">
            <p style="color: ; font-size: 30px;">Historico</p>
            <p style="color: ; font-size: 50px; font-weight: bold;">
            de seus atendimentos
            </p>
        </div>

        <div id="card_depoimento">
            <p>egdfkwbefkbwefbuiwerbidjfbhkwsefb<br>egdfkwbefkbwefbuiwerbidjfbhkwsefb<br>egdfkwbefkbwefbuiwerbidjfbhkwsefb</p>
            <div class="foto">
                <div class="nome">
                    <p>Ronaldo Prass</p>
                </div>
            </div>
        </div>


        <div id="card_depoimento">
            <p>egdfkwbefkbwefbuiwerbidjfbhkwsefb<br>egdfkwbefkbwefbuiwerbidjfbhkwsefb<br>egdfkwbefkbwefbuiwerbidjfbhkwsefb</p>
            <div class="foto">
                <div class="nome">
                    <p>Luiz Henrique</p>
                </div>
            </div>

        </div>

        <div id="card_depoimento">
            <p>egdfkwbefkbwefbuiwerbidjfbhkwsefb<br>egdfkwbefkbwefbuiwerbidjfbhkwsefb<br>egdfkwbefkbwefbuiwerbidjfbhkwsefb</p>
            <div class="foto">
                <div class="nome">
                    <p>Michael Antonio</p>
                </div>
            </div>

        </div>

        <div id="card_depoimento">
            <p>egdfkwbefkbwefbuiwerbidjfbhkwsefb<br>egdfkwbefkbwefbuiwerbidjfbhkwsefb<br>egdfkwbefkbwefbuiwerbidjfbhkwsefb</p>
            <div class="foto">
                <div class="nome">
                    <p>Augusto Cavalt</p>
                </div>
            </div>

        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <!-- Inclua o arquivo do Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
</body>
</html>