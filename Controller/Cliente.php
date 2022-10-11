<?php

    require_once("Model/Cliente.php");
    require_once("Model/ClienteDAO.php");

    session_start();

    class ClienteControl{

        public function inserir(){

            $cliente = new Cliente();
            $clienteDAO = new ClienteDAO();

            $cliente->setNome($_POST["nome"]);
            $cliente->setCPF($_POST["cpf"]);
            $cliente->setDtNascimento($_POST["dtNascimento"]);
            // $cliente->setSexo($_POST["sexo"]);
            $cliente->setEmail($_POST["email"]);
            $cliente->setCelular($_POST["celular"]);
            $cliente->setSenha($_POST["senha"]);

            $cliente->setLogradouro($_POST["logradouro"]);
            $cliente->setNumero($_POST["numero"]);
            $cliente->setBairro($_POST["bairro"]);
            $cliente->setCEP($_POST["cep"]);
            $cliente->setEstado($_POST["estado"]);
            $cliente->setCidade($_POST["cidade"]);

             if($cliente->getSenha() != $_POST["confirmar"]){

                 echo("Senha diferente na confirmação.");

             } else {

                $clienteDAO->inserir($cliente);

             }

        }

        public function atualizar(){
            $cliente = new Cliente();
            $clienteDAO = new ClienteDAO();

            $cliente->setNome($_POST["nome"]);
            $cliente->setCPF($_POST["cpf"]);
            $cliente->setDtNascimento($_POST["dtNascimento"]);
            // $cliente->setSexo($_POST["sexo"]);
            $cliente->setEmail($_POST["email"]);
            $cliente->setCelular($_POST["celular"]);
            $cliente->setSenha($_POST["senha"]);

            $cliente->setLogradouro($_POST["logradouro"]);
            $cliente->setNumero($_POST["numero"]);
            $cliente->setBairro($_POST["bairro"]);
            $cliente->setCEP($_POST["cep"]);
            $cliente->setEstado($_POST["estado"]);
            $cliente->setCidade($_POST["cidade"]);
            $cliente->setId($_POST["idMedico"]);

            if($cliente->getSenha() != $_POST["confirmar"]){

                 echo("Senha diferente na confirmação.");

             } else {

                $clienteDAO->atualizar($cliente);

             }

        }
        public function obterTodos(){
            
            $clienteDAO = new ClienteDAO();

            $listaClientes = array();

            $listaClientes = $clienteDAO->obterTodos();

            echo('<tr id="table_title">');
            echo('<td>Nome</td>');
            echo('<td>E-mail</td>');
            echo('<td>Celular</td>');
            echo('<td>Opções</td>');
            echo('</tr>');

            foreach ($listaClientes as $cliente) {

                echo('<tr>');
                echo('<td class="column_content">'.$cliente->getNome().'</td>');
                echo('<td class="column_content">'.$cliente->getEmail().'</td>');
                echo('<td class="column_content">'.$cliente->getCelular().'</td>');
                echo('<td class="column_content">');
                echo('<img src="Imagens/excluir.png" alt="Excluir Funcionário" style="margin:0px;" onclick="remover('.$cliente->getId().')">');
                echo('<a href="cadastro_cliente.php?id='.$cliente->getId().'"><img src="Imagens/editar.png" alt="Editar Funcionário" style="width:40px;height:40px;margin-left:10px;"></a>');
//                echo('<img src="Imagens/check_true.png" alt="Ativar/Desativar Funcionário" onclick="atualizarSituacao('.$cliente->getId().')">');
                echo('</td>');
                echo('</tr>');

            }

        }

        public function listaClientes(){

            $clienteDAO = new ClienteDAO();

            $listaClientes = array();

            $listaClientes = $clienteDAO->obterTodos();
            
            foreach ($listaClientes as $cliente) {
                $lista[] = array('id' => $cliente->getId(), 
                                 'nome' => $cliente->getNome());
            }

            echo(json_encode($lista));

        }

        public function obterUm(){

//            echo("!!!!!!!!!!!");

            $clienteDAO = new ClienteDAO();

            echo(json_encode($clienteDAO->obterUm($_POST["id"])));

        }

        public function autenticar(){

            $funcionarioDAO = new FuncionarioDAO();

            $nome = $funcionarioDAO->autenticar($_POST["email"], $_POST["senha"]);

            $_SESSION["nome"] = $nome;

            echo($nome);

        }
        public function remover(){

            $clienteDAO = new ClienteDAO();
            
            $clienteDAO->remover($_POST["idCliente"]);

        }

        public function obterAutenticacao(){

            echo($_SESSION["nome"]);

        }

    }

?>