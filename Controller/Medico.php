<?php

    require_once("Model/Medico.php");
    require_once("Model/MedicoDAO.php");

    session_start();

    class MedicoControl{

        public function inserir(){

            $medico = new Medico();
            $medicoDAO = new MedicoDAO();

            $medico->setNome($_POST["nome"]);
            $medico->setCPF($_POST["cpf"]);
            $medico->setDtNascimento($_POST["dtNascimento"]);
            // $medico->setSexo($_POST["sexo"]);
            $medico->setEmail($_POST["email"]);
            $medico->setCelular($_POST["celular"]);
             $medico->setSenha($_POST["senha"]);

            $medico->setLogradouro($_POST["logradouro"]);
            $medico->setNumero($_POST["numero"]);
            $medico->setBairro($_POST["bairro"]);
            $medico->setCEP($_POST["cep"]);
            $medico->setEstado($_POST["estado"]);
            $medico->setCidade($_POST["cidade"]);

             if($medico->getSenha() != $_POST["confirmar"]){

                 echo("Senha diferente na confirmação.");

             } else {

                $medicoDAO->inserir($medico);

             }

        }

        public function atualizar(){
            $medico = new Medico();
            $medicoDAO = new MedicoDAO();

            $medico->setNome($_POST["nome"]);
            $medico->setCPF($_POST["cpf"]);
            $medico->setDtNascimento($_POST["dtNascimento"]);
            // $medico->setSexo($_POST["sexo"]);
            $medico->setEmail($_POST["email"]);
            $medico->setCelular($_POST["celular"]);
            $medico->setSenha($_POST["senha"]);

            $medico->setLogradouro($_POST["logradouro"]);
            $medico->setNumero($_POST["numero"]);
            $medico->setBairro($_POST["bairro"]);
            $medico->setCEP($_POST["cep"]);
            $medico->setEstado($_POST["estado"]);
            $medico->setCidade($_POST["cidade"]);
            $medico->setId($_POST["idMedico"]);

            if($medico->getSenha() != $_POST["confirmar"]){

                 echo("Senha diferente na confirmação.");

             } else {

                $medicoDAO->atualizar($medico);

             }

        }
        public function obterTodos(){
            
            $medicoDAO = new MedicoDAO();

            $listaMedicos = array();

            $listaMedicos = $medicoDAO->obterTodos();

            echo('<tr id="table_title">');
            echo('<td>Nome</td>');
            echo('<td>E-mail</td>');
            echo('<td>Celular</td>');
            echo('<td>Opções</td>');
            echo('</tr>');

            foreach ($listaMedicos as $medico) {

                echo('<tr>');
                echo('<td class="column_content">'.$medico->getNome().'</td>');
                echo('<td class="column_content">'.$medico->getEmail().'</td>');
                echo('<td class="column_content">'.$medico->getCelular().'</td>');
                echo('<td class="column_content">');
                echo('<img src="Imagens/excluir.png" alt="Excluir Funcionário" style="margin:0px;" onclick="remover('.$medico->getId().')">');
                echo('<a href="cadastro_medico.php?id='.$medico->getId().'"><img src="Imagens/editar.png" alt="Editar Funcionário" style="width:40px;height:40px;margin-left:10px;"></a>');
//                echo('<img src="Imagens/check_true.png" alt="Ativar/Desativar Funcionário" onclick="atualizarSituacao('.$medico->getId().')">');
                echo('</td>');
                echo('</tr>');

            }

        }

        public function obterNiveis(){

            $nivel = new NivelDAO();

            $listaNiveis = array();

            $listaNiveis = $nivel->obterTodos();

            echo("<option value='0'>Selecione o Nível</option>");

            foreach($listaNiveis as $nivel){

                echo("<option value='".$nivel->getId()."'>".$nivel->getNome()."</option>");

            }

        }

        public function obterUm(){

//            echo("!!!!!!!!!!!");

            $medicoDAO = new MedicoDAO();

            echo(json_encode($medicoDAO->obterUm($_POST["id"])));

        }

        public function autenticar(){

            $medicoDAO = new MedicoDAO();

            $nome = $medicoDAO->autenticar($_POST["email"], $_POST["senha"]);
            
            $_SESSION["nome"] = $nome;

            echo($nome);

        }
        public function remover(){

            $medicoDAO = new MedicoDAO();
            
            $medicoDAO->remover($_POST["idMedico"]);

        }

        public function obterAutenticacao(){

            echo($_SESSION["nome"]);

        }

    }

?>