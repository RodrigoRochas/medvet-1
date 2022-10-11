<?php

    require_once("Model/Porte.php");
    require_once("Model/PorteDAO.php");

    session_start();

    class PorteControl{

        public function obterTodos(){
            
            $porteDAO = new PorteDAO();

            $listaPortes = array();

            $listaPortes = $porteDAO->obterTodos();

            echo("<option value='0'>Selecione o Porte</option>");

            foreach($listaPortes as $porte){

                echo("<option value='".$porte->getId()."'>".$porte->getNome()."</option>");

            }
        }


    }

?>