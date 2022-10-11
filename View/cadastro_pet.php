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
                            <input type="text" name="txt_nome" id="txt_nome" placeholder="Digite o nome do médico." class="input_text">
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
                                Cliente Responsavel:
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
                            <input type="file" name="txt_imagem" id="txt_imagem" class="input_text">
                        </div>
                    </div>
                    <div class="line_input">
                        <button name="btn_salvar" id="btn_salvar" class="buttons" style="margin-left:830px;">Salvar</button>
                        <a href="adm_medico.php">
                            <button name="btn_cancelar" class="buttons">Cancelar</button>
                        </a>
                    </div>
<!--
                    <table id="table_content">
                    </table>
-->
                </div>
            </div>
            </form>
        </div>
        <?php require_once("rodape.php") ?>
    </body>
</html>