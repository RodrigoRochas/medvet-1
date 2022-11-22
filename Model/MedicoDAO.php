<?php

    require_once("ConexaoBanco.php");
    require_once("Medico.php");

    class MedicoDAO{

        public function inserir(Medico $medico){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "INSERT INTO tbl_medico(nome, cpf, telefone, data_nascimento, email, logradouro, cep, bairro, numero, cidade, estado, data_criacao, senha) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $medico->getNome());
            $stm->bindValue(2, $medico->getCPF());
            $stm->bindValue(3, $medico->getCelular());
            $stm->bindValue(4, date("Y-m-d", strtotime($medico->getDtNascimento())));
            $stm->bindValue(5, $medico->getEmail());
            $stm->bindValue(6, $medico->getLogradouro());
            $stm->bindValue(7, $medico->getCep());
            $stm->bindValue(8, $medico->getBairro());
            $stm->bindValue(9, $medico->getNumero());
            $stm->bindValue(10, $medico->getCidade());
            $stm->bindValue(11, $medico->getEstado());
            $stm->bindValue(12, date("Y-m-d"));
            $stm->bindValue(13, $medico->getSenha());
            
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

            $listaMedicos = array();

            $SQL = "SELECT * FROM tbl_medico;";
            
            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $medico = new Medico();
                
                $medico->setId($resultSet["id"]);
                $medico->setNome($resultSet["nome"]);
                $medico->setCPF($resultSet["cpf"]);
                $medico->setCelular($resultSet["telefone"]);
                $medico->setEmail($resultSet["email"]);

                $listaMedicos[] = $medico;

            }

            $conexao = null;

            return $listaMedicos;

        }

        public function obterUm($idMedico){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_medico WHERE id = ?";
            
            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $idMedico);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            $resultSet = $stm->fetch();

            $conexao = null;

            return $resultSet;

        }

        public function atualizar(Medico $medico){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "UPDATE tbl_medico SET nome = ?, cpf = ?, telefone = ?, email = ?, cep = ?, logradouro = ? WHERE id = ?";
            echo $SQL;
            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $medico->getNome());
            $stm->bindValue(2, $medico->getCPF());
            $stm->bindValue(3, $medico->getCelular());
            $stm->bindValue(4, $medico->getEmail());
            $stm->bindValue(5, $medico->getCep());
            $stm->bindValue(6, $medico->getlogradouro());
            
            $stm->bindValue(7, $medico->getId());

            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }

        }

        public function remover($idMedico){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "DELETE FROM tbl_medico WHERE id = ?";
            
            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $idMedico);

            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }

        }

        public function autenticar($email, $senha){
//            session_start();
            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT nome, id FROM tbl_medico WHERE email = ? AND senha = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $email);
            $stm->bindParam(2, $senha);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            $nome = "";

            if($resultSet = $stm->fetch()){

                $nome = $resultSet["nome"];
                $_SESSION['idMedico'] = $resultSet["id"];
                $_SESSION['nome'] = $resultSet["nome"];

            }else{
                return 'nenhum registro encontrado';
            }

            return $nome;

        }       

    }

 ?>