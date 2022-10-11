<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>MedVet | Cadastro de Cliente</title>
<!--        <link type="text/css" rel="stylesheet" href="CSS/style.css">-->
        <link type="text/css" rel="stylesheet" href="CSS/cadastro_medico_style.css">
        <script src="JavaScript/jquery-3.3.1.js" charset="utf-8"></script>
        <script src="JavaScript/ajax_cliente_crud.js" charset="utf-8"></script>
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
            <div id="main_content">
                <?php require_once("menu.php") ?>
                <div id="content">
                    <div class="title_content" style="float:none;">
                        Cadastro de Cliente
                    </div>
                    <input id="id_cliente" type="hidden" value="<?php echo @$_GET['id'];?>">
                    <div class="line_input">
                        <div class="content_input">
                            <div class="title_input">
                                Nome
                            </div>
                            <input type="text" name="txt_nome" id="txt_nome" placeholder="Digite o nome do médico." class="input_text">
                        </div>
                        <div class="content_input" style="width:320px;">
                            <div class="title_input">
                                CPF
                            </div>
                            <input type="text" name="txt_cpf" id="txt_cpf" placeholder="Digite o CPF do médico." class="input_text" style="width:300px;" maxlength="14" >
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
                            <div class="title_input">
                                Sexo
                            </div>
                            <input type="radio" name="rdo_sexo" id="rdo_sexo" value="F" class="input_radio" style="margin-left:10px;">
                            <div class="radio_title">
                                Feminino
                            </div>
                            <input type="radio" name="rdo_sexo" id="rdo_sexo" value="M" class="input_radio">
                            <div class="radio_title">
                                Masculino
                            </div>
                        </div>
                    </div>
                    <div class="line_input">
                        <div class="content_input">
                            <div class="title_input">
                                E-mail
                            </div>
                            <input type="email" name="txt_email" id="txt_email" placeholder="Digite o e-mail do médico." class="input_text">
                        </div>
                        <div class="content_input" style="width:320px;">
                            <div class="title_input">
                                Celular
                            </div>
                            <input type="text" name="txt_celular" id="txt_celular" placeholder="Ex: 94356-7654" class="input_text" style="width:300px;" maxlength="15" onkeypress="mask(this, mphone);">
                        </div>
                    </div>
                    <div class="line_input">
                        <div class="content_input" style="width:320px;">
                            <div class="title_input">
                                CEP
                            </div>
                            <input type="text" name="txt_cep" id="txt_cep" placeholder="CEP da residência." class="input_text" style="width:300px;" maxlength="8" onkeyup="consultaCep()">
                        </div>
                        <div class="content_input">
                            <div class="title_input">
                                Logradouro
                            </div>
                            <input type="text" name="txt_logradouro" id="txt_logradouro" placeholder="Digite o logradouro do médico." class="input_text">
                        </div>
                    </div>
                    <div class="line_input">
                        <div class="content_input" style="width:320px;">
                            <div class="title_input">
                                Número
                            </div>
                            <input type="text" name="txt_numero" id="txt_numero" placeholder="Número da residência." class="input_text" style="width:300px;" maxlength="8" >
                        </div>
                        <div class="content_input">
                            <div class="title_input">
                                Bairro
                            </div>
                            <input type="text" name="txt_bairro" id="txt_bairro" placeholder="Digite o bairro." class="input_text" >
                        </div>
                    </div>
                    <div class="line_input">
                        <div class="content_input" style="width:500px;">
                            <div class="title_input">
                                Estado
                            </div>
                            <input readonly="readonly" type="text" name="txt_uf" id="txt_uf" placeholder="Preenchimento automatico" class="input_text" style="width: 435px;">
                        </div>
                        <div class="content_input" style="width:500px;margin-left:0px;">
                            <div class="title_input">
                                Município
                            </div>
                            <input readonly="readonly" type="text" name="txt_municipio" id="txt_municipio" placeholder="Preenchimento automatico" class="input_text" style="width: 435px;">
                        </div>
                    </div>
                    <div class="line_input">
                        <div class="content_input" style="width:450px;">
                            <div class="title_input">
                                Senha
                            </div>
                            <input type="password" name="txt_senha" id="txt_senha" placeholder="Digite a senha do médico." class="input_text" style="width:440px;">
                        </div>
                        <div class="content_input" style="width:450px;margin-left:50px;">
                            <div class="title_input">
                                Confirmar Senha
                            </div>
                            <input type="password" name="txt_confirmar" id="txt_confirmar" placeholder="Digite a senha do médico." class="input_text" style="width:440px;">
                        </div>
                    </div>
                    <div class="line_input">
                        <button name="btn_salvar" id="btn_salvar" class="buttons" style="margin-left:830px;">Salvar</button>
                        <a href="adm_medico.php">
                            <button name="btn_cancelar" class="buttons">Cancelar</button>
                        </a>
                    </div>
                    <table id="table_content">
                    </table>
                </div>
            </div>
        </div>
        <?php require_once("rodape.php") ?>
    </body>
</html>