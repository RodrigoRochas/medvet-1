<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="CSS/blog.css">

    <script src="JavaScript/jquery-3.3.1.js" charset="utf-8"></script>
    <script src="JavaScript/ajax_pet_crud.js" charset="utf-8"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
    <div id="container">
        <h1>Emergência</h1>

        <div id="dados_cliente">
            <h2>Dados do paciente</h2>
            <table id="tabela">
                <tr>
                    <td>Nome : </td>
                    <td>Rodrigo Rocha Santos</td>
                </tr>

                <tr>
                    <td>Telefone : </td>
                    <td>(11)97468-8122</td>
                </tr>

                <tr>
                    <td>Nome do PET : </td>
                    <td>
                        <input type="text">
                    </td>
                </tr>

                <tr>
                    <td>Porte : </td>
                    <td>
                        <input type="radio" id="pequeno">
                        <label for="pequeno">Pequeno</label>

                        <input type="radio" id="medio">
                        <label for="medio">Médio</label>

                        <input type="radio" id="grande">
                        <label for="grande">Grande</label>

                    </td>
                </tr>
            </table>
        </div>

        <div id="dados_cliente">
            <h2>Dados do Médico</h2>
            <table id="tabela">
                <tr>
                    <td>Nome do Médico : </td>
                    <td>Dr. Carlos Eduardo Silva</td>
                </tr>

                <tr>
                    <td>Endereço : </td>
                    <td>Avenida Juan Vicente, 525</td>
                </tr>
<!-- 
                <tr>
                    <td>Telefone : </td>
                    <td>(11)92374-6951</td>
                </tr> -->

                <tr>
                    <td>Nome da Clinica : </td>
                    <td>Clinica Dog+</td>
                </tr>

                <tr>
                    <td>Ligue  </td>
                    <td>
                        <a href="#">Ligue</a>
                    </td>
                </tr>

            </table>

            <br>

            <table id="tabela">
                <tr>
                    <td>Nome do Médico : </td>
                    <td>Dr. Thiago Felix</td>
                </tr>

                <tr>
                    <td>Endereço : </td>
                    <td>Avenida Nações Unidas, 485</td>
                </tr>

                <tr>
                    <td>Nome da Clinica : </td>
                    <td>Petz</td>

                <tr>
                    <td>Ligue  </td>
                    <td>
                        <a href="#">Ligue</a>
                    </td>
                </tr>
                </tr>
            </table>

            <br>
            <!-- <br> -->
            <!-- <br> -->

            <table id="tabela">
                <tr>
                    <td>Nome do Médico : </td>
                    <td>Dr. Felipe Costa</td>
                </tr>

                <tr>
                    <td>Endereço : </td>
                    <td>Avenida Interlagos, 505</td>
                </tr>

                <!-- <tr>
                    <td>Telefone : </td>
                    <td>(11)92374-6951</td>
                </tr> -->

                <tr>
                    <td>Nome da Clinica : </td>
                    <td>Petz</td>
                </tr>

                <tr>
                    <td>Ligue  </td>
                    <td>
                        <a href="#">Ligue</a>
                    </td>
                </tr>
            </table>
        </div>

        <!-- <div id="emergencia">
            <a href="#">Ligue</a>
        </div> -->

        <button href="./menu.php" type="submit">
            <a href="./area_logada.php">Finalizar</a>
        </button>

        
    </div>
</body>
</html>