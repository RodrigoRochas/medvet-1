<?php

    require_once("ConexaoBanco.php");
    require_once("Porte.php");

    class PorteDAO{

        public function obterTodos(){

            $conexao = ConexaoBanco::obterConexao();

            $listaPortes = array();

            $SQL = "SELECT * FROM tbl_porte;";
            
            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $porte = new Porte();
                
                $porte->setId($resultSet["id"]);
                $porte->setNome($resultSet["nome"]);

                $listaPortes[] = $porte;

            }

            $conexao = null;

            return $listaPortes;

        }

    }

 ?>