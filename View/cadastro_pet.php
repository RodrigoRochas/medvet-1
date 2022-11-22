<?php

    $target_dir = "uploads/";
    @$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "Arquivo não é uma imagem.";
        $uploadOk = 0;
      }
        
       if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Arquivo: ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " upload OK.";
      } else {
        echo "Erro ao fazer o Upload.";
      }
    }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>MedVet | Cadastro de Pet</title>
<!--        <link type="text/css" rel="stylesheet" href="CSS/style.css">-->
        <link type="text/css" rel="stylesheet" href="CSS/cadastro_medico_style.css">
        <script src="JavaScript/jquery-3.3.1.js" charset="utf-8"></script>
        <script src="JavaScript/ajax_pet_crud.js" charset="utf-8"></script>
        <script>
            $(document).ready(function(){
                obterUm();
            });
            function mask(o, f) {
                setTimeout(function() {
                    var v = mphone(o.value);
                    if (v != o.value) {
                    o.value = v;
                    }
                }, 1);
            }

            function mphone(v) {
                let r = v.replace(/\D/g, "");
                r = r.replace(/^0/, "");

                if (r.length > 11) {
                    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
                } else if (r.length > 7) {
                    r = r.replace(/^(\d\d)(\d{5})(\d{0,4}).*/, "($1) $2-$3");
                } else if (r.length > 2) {
                    r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
                } else if (v.trim() !== "") {
                    r = r.replace(/^(\d*)/, "($1");
                }
                return r;
            }
            
        </script>
    </head>
    <body>
        <?php require_once("cabecalho.php")?>
        <div id="main">
            <form method="POST" enctype="multipart/form-data">
            <div id="main_content">
                <?php require_once("menu.php") ?>
                <form action="cadastro_pet.php" method="post" enctype="multipart/form-data">
                    <div id="content">
                        <div class="title_content" style="float:none;">
                            Cadastro de Pet
                        </div>
                        <input id="id_pet" type="hidden" value="<?php echo @$_GET['id'];?>">
                        <div class="line_input">
                            <div class="content_input">
                                <div class="title_input">
                                    Nome:
                                </div>
                                <input type="text" name="txt_nome" id="txt_nome" placeholder="Digite o nome do pet." class="input_text">
                            </div>
                            <div class="content_input" style="width:320px;">
                                <div class="title_input">
                                    Porte:
                                </div>
                                <select name="slt_porte" id="slt_porte" class="input_select">
                                </select>
                            </div>
                        </div>
                        <div class="line_input">
                            <div class="content_input" style="width: 250px;">
                                <div class="title_input" style="width: 240px;">
                                    Data de Nascimento
                                </div>
                                <input type="date" name="txt_dt_nasc" id="txt_dt_nasc" placeholder="Ex: 22/09/18" class="input_text" style="width: 200px;">
                            </div>
                            <div class="content_input" style="width:320px;">
                                <div class="title_input" style="width: 240px;">
                                    Cliente Responsável:
                                </div>
                                <select name="slt_cliente" id="slt_cliente" class="input_select">
                                </select>
                            </div>
                        </div>
                        <div class="line_input">
                            <div class="content_input">
                                <div class="title_input">
                                    Imagem
                                </div>
                                <input type="file" name="fileToUpload" id="fileToUpload">
<!--                                <input type="submit" value="Upload Image" name="submit">-->
                            </div>
                        </div>
                        <div class="line_input">
                            <button type="submit" name="submit" id="btn_salvar" class="buttons" style="margin-left:830px;">Salvar</button>
                            <a href="adm_medico.php">
                                <button name="btn_cancelar" class="buttons">Cancelar</button>
                            </a>
                        </div>
                        <div >
                            <img style='height:500px;' src="" alt="">
                        </div>
    <!--    
                        <table id="table_content">
                        </table>
    -->
                    </div>                
                </form>
            </div>
            </form>
        </div>
        <?php require_once("rodape.php") ?>
    </body>
</html>