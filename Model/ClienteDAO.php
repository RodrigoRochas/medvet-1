<?php

    require_once("ConexaoBanco.php");
    require_once("Cliente.php");

    class ClienteDAO{

        public function inserir(Cliente $cliente){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "INSERT INTO tbl_cliente(nome, cpf, telefone, data_nascimento, email, logradouro, cep, bairro, numero, cidade, estado, data_criacao, senha) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $cliente->getNome());
            $stm->bindValue(2, $cliente->getCPF());
            $stm->bindValue(3, $cliente->getCelular());
            $stm->bindValue(4, date("Y-m-d", strtotime($cliente->getDtNascimento())));
            $stm->bindValue(5, $cliente->getEmail());
            $stm->bindValue(6, $cliente->getLogradouro());
            $stm->bindValue(7, $cliente->getCep());
            $stm->bindValue(8, $cliente->getBairro());
            $stm->bindValue(9, $cliente->getNumero());
            $stm->bindValue(10, $cliente->getCidade());
            $stm->bindValue(11, $cliente->getEstado());
            $stm->bindValue(12, date("Y-m-d"));
            $stm->bindValue(13, $cliente->getSenha());
            
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

            $SQL = "SELECT * FROM tbl_cliente;";
            
            $stm = $conexao->prepare($SQL);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            while($resultSet = $stm->fetch()){

                $cliente = new Cliente();
                
                $cliente->setId($resultSet["id"]);
                $cliente->setNome($resultSet["nome"]);
                $cliente->setCPF($resultSet["cpf"]);
                $cliente->setCelular($resultSet["telefone"]);
                $cliente->setEmail($resultSet["email"]);

                $listaClientes[] = $cliente;

            }

            $conexao = null;

            return $listaClientes;

        }

        public function obterUm($idMedico){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "SELECT * FROM tbl_cliente WHERE id = ?";
            
            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $idMedico);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            $resultSet = $stm->fetch();

            $conexao = null;

            return $resultSet;

        }

        public function atualizar(Cliente $cliente){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "UPDATE tbl_cliente SET nome = ?, cpf = ?, telefone = ?, email = ?, cep = ?, logradouro = ? WHERE id = ?";
            echo $SQL;
            $stm = $conexao->prepare($SQL);

            $stm->bindValue(1, $cliente->getNome());
            $stm->bindValue(2, $cliente->getCPF());
            $stm->bindValue(3, $cliente->getCelular());
            $stm->bindValue(4, $cliente->getEmail());
            $stm->bindValue(5, $cliente->getCep());
            $stm->bindValue(6, $cliente->getlogradouro());
            
            $stm->bindValue(7, $cliente->getId());

            $envio = $stm->execute();

            $conexao = null;

            if($envio){

                return true;

            } else {

                return false;

            }

        }

        public function remover($idCliente){

            $conexao = ConexaoBanco::obterConexao();

            $SQL = "DELETE FROM tbl_cliente WHERE id = ?";
            
            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $idCliente);

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

            $SQL = "SELECT nome, id FROM tbl_medico WHERE email = ? AND senha = ?";

            $stm = $conexao->prepare($SQL);

            $stm->bindParam(1, $email);
            $stm->bindParam(2, $senha);

            $stm->execute();

            $stm->setFetchMode(PDO::FETCH_ASSOC);

            $nome = "";

            if($resultSet = $stm->fetch()){

                $nome = $resultSet["nome"];
                $_SESSION['idMedico'] = $resultSet["id_medico"];

            }

            return $nome;

        }       

    }

 ?>