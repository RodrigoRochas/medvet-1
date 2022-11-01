<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>MedVet | Lista de Pets</title>
        <link type="text/css" rel="stylesheet" href="CSS/style.css">
        <link type="text/css" rel="stylesheet" href="CSS/adm_pet_style.css">
        <script src="JavaScript/jquery-3.3.1.js" charset="utf-8"></script>
        <script src="JavaScript/ajax_pet_crud.js" charset="utf-8"></script>
        <script>
            
            $(document).ready(function(){

                obterTodos();

            });
        </script>
    </head>
    <body>
        <!-- <?php require_once("cabecalho.php")?> -->
        <div id="main">
            <div id="main_content">
                <?php require_once("menu.php") ?>
                <div id="content">
                    <div class="title_content" style="float:none;">
                        Lista de Pets
                    </div>                    
                    <a href="cadastro_pet.php">
                        <button style="background-color: #28a745 border-color: #28a745;padding: 20px 60px;margin-left: 10px;margin-bottom: 10px;font-size: 20pt;border-radius: 10px; cursor: pointer;" >Cadastrar</button>
                    </a>
                    <table id="table_content" style="background-color: #a0dbd3;">
                    </table>
                </div>
            </div>
        </div>
        <?php require_once("rodape.php") ?>
    </body>
</html>