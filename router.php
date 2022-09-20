<?php

    switch ($_POST["classe"]) {

        case "medico":

            require_once("Controller/Medico.php");

            $medico = new MedicoControl();

            switch ($_POST["acao"]) {

                case "inserir":

                    $medico->inserir();

                    break;

                case "autenticar":

                    $medico->autenticar();

                    break;

                case "obterAutenticacao":

                    $medico->obterAutenticacao();

                    break;

                case "obterTodos":

                    $medico->obterTodos();

                    break;

                case "obterUm":

                    $medico->obterUm();

                    break;

                case "atualizar":

                    $medico->atualizar();

                    break;

                case "remover":

                    $medico->remover();

                    break;

                case "matarSessao":

                    session_destroy();

                    break;

            }

            break;


    }

 ?>