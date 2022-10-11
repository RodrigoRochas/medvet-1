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
            
         case "cliente":

            require_once("Controller/Cliente.php");

            $cliente = new ClienteControl();

            switch ($_POST["acao"]) {

                case "inserir":

                    $cliente->inserir();

                    break;

                case "autenticar":

                    $cliente->autenticar();

                    break;

                case "obterAutenticacao":

                    $cliente->obterAutenticacao();

                    break;

                case "obterTodos":

                    $cliente->obterTodos();

                    break;

                case "listaClientes":

                    $cliente->listaClientes();

                    break;

                case "obterUm":

                    $cliente->obterUm();

                    break;

                case "atualizar":

                    $cliente->atualizar();

                    break;

                case "remover":

                    $cliente->remover();

                    break;

                case "matarSessao":

                    session_destroy();

                    break;

            }

            break;
            
        case "pet":

            require_once("Controller/Pet.php");

            $pet = new PetControl();

            switch ($_POST["acao"]) {

                case "inserir":

                    $pet->inserir();

                    break;

                case "autenticar":

                    $pet->autenticar();

                    break;

                case "obterAutenticacao":

                    $pet->obterAutenticacao();

                    break;

                case "obterTodos":

                    $pet->obterTodos();

                    break;

                case "obterUm":

                    $pet->obterUm();

                    break;

                case "atualizar":

                    $pet->atualizar();

                    break;

                case "remover":

                    $pet->remover();

                    break;

                case "matarSessao":

                    session_destroy();

                    break;

            }

            break;

        case "porte":

            require_once("Controller/Porte.php");

            $porte = new PorteControl();

            switch ($_POST["acao"]) {

                case "obterTodos":

                    $porte->obterTodos();

                    break;
            }
            break;

    }

 ?>