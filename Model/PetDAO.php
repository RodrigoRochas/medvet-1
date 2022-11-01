<?php

    require_once("ConexaoBanco.php");
    require_once("Pet.php");

    class PetDAO{

        public function inserir(Pet $pet){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "INSERT INTO tbl_pet(nome, id_porte, data_nascimento, data_criacao, id_cliente ,caminho_imagem) VALUES(?, ?, ?, ?, ?, ?)";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $pet->getNome());
            $stm->bindValue(2, $pet->getIdPorte());
            $stm->bindValue(3, date("Y-m-d", strtotime($pet->getDtNascimento())));
            $stm->bindValue(4, date("Y-m-d"));
            $stm->bindValue(5, $pet->getIdCliente());
            $stm->bindValue(6, $pet->getCaminhoImagem());
            
            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return True;

            } else {

                return False;

            }


        }

        public function obterTodos(){

            $conexao = ConexaoBanco::obterConexao();

            $listaPets = array();

            $SQL = "SELECT * FROM tbl_pet;";
            
            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $pet = new Pet();
                
                $pet->setId($resultSet["id"]);
                $pet->setNome($resultSet["nome"]);
                $pet->setIdPorte($resultSet["id_porte"]);
                $pet->setIdCliente($resultSet["id_cliente"]);
                $pet->setDtNascimento($resultSet["data_nascimento"]);
                $pet->setCaminhoImagem($resultSet["caminho_imagem"]);

                $listaPets[] = $pet;

            }

            $conexao = null;

            return $listaPets;

        }

        public function obterUm($idPet){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_pet WHERE id = ?";
            
            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $idPet);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            $resultSet = $stm->fetch();

            $conexao = null;

            return $resultSet;

        }

        public function atualizar(Pet $pet){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "UPDATE tbl_pet SET nome = ?, id_porte = ?, id_cliente = ?, data_nascimento = ? WHERE id = ?";
            echo $SQL;
            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $pet->getNome());
            $stm->bindValue(2, $pet->getIdPorte());
            $stm->bindValue(3, $pet->getIdCliente());
            $stm->bindValue(4, $pet->getDtNascimento());
            
            $stm->bindValue(5, $pet->getId());

            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }

        }

        public function remover($idPet){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "DELETE FROM tbl_pet WHERE id = ?";
            
            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $idPet);

            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }

        }

        public function autenticar($email, $senha){
            session_start();
            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT nome, id FROM tbl_pet WHERE email = ? AND senha = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $email);
            $stm->bindParam(2, $senha);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            $nome = "";

            if($resultSet = $stm->fetch()){

                $nome = $resultSet["nome"];
                $_SESSION['idPet'] = $resultSet["id_pet"];

            }

            return $nome;

        }       

    }

 ?>