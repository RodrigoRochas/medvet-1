<?php

    require_once("Model/Pet.php");
    require_once("Model/PetDAO.php");

    session_start();

    class PetControl{

        public function inserir(){

            $pet = new Pet();
            $petDAO = new PetDAO();

            $pet->setNome($_POST["nome"]);
            $pet->setDtNascimento($_POST["dtNascimento"]);
            // $pet->setSexo($_POST["sexo"]);
            $pet->setIdPorte($_POST["idPorte"]);
            $pet->setIdCliente($_POST["idCliente"]);
            $pet->setCaminhoImagem($_POST["caminho_imagem"]);
            
            $petDAO->inserir($pet);

        }

        public function atualizar(){
            $pet = new Pet();
            $petDAO = new PetDAO();

            $pet->setNome($_POST["nome"]);
            $pet->setCPF($_POST["cpf"]);
            $pet->setDtNascimento($_POST["dtNascimento"]);
            // $pet->setSexo($_POST["sexo"]);
            $pet->setEmail($_POST["email"]);
            $pet->setCelular($_POST["celular"]);
            $pet->setSenha($_POST["senha"]);

            $pet->setLogradouro($_POST["logradouro"]);
            $pet->setNumero($_POST["numero"]);
            $pet->setBairro($_POST["bairro"]);
            $pet->setCEP($_POST["cep"]);
            $pet->setEstado($_POST["estado"]);
            $pet->setCidade($_POST["cidade"]);
            $pet->setId($_POST["idPet"]);

            if($pet->getSenha() != $_POST["confirmar"]){

                 echo("Senha diferente na confirmação.");

             } else {

                $petDAO->atualizar($pet);

             }

        }
        public function obterTodos(){
            
            $petDAO = new PetDAO();

            $listaPets = array();

            $listaPets = $petDAO->obterTodos();

//            echo('<tr id="table_title">');
//            echo('<td>Nome</td>');
//            echo('<td>Nome</td>');
//            echo('<td>Data Nascimento</td>');
//            echo('<td>Opções</td>');
//            echo('</tr>');

            foreach ($listaPets as $pet) {
                echo('<div class="registro">
                        <div class="imagem_animal" >
                            <img src="uploads/'.$pet->getCaminhoImagem().'" alt="">
                        </div>
                        <div class="nome_animal">
                            <a href="cadastro_pet.php?id='.$pet->getId().'">
                                <img src="Imagens/editar.png" alt="Editar Pet" style="width:40px;height:40px;margin-left:10px;">
                            </a>
                            
                            <img src="Imagens/excluir.png" alt="Excluir Pet" style="width:40px;height:40px;margin-left:10px;margin:0px;" onclick="remover('.$pet->getId().')">
                        </div>
                    </div>');
                
//                echo('<tr>');
//                echo('<td class="column_content">'.$pet->getNome().'</td>');
//                echo('<td class="column_content">'.$pet->getCaminhoImagem().'</td>');
//                echo('<td class="column_content">'.$pet->getDtNascimento().'</td>');
//                echo('<td class="column_content">');
//                echo('<img src="Imagens/excluir.png" alt="Excluir Funcionário" style="margin:0px;" onclick="remover('.$pet->getId().')">');
//                echo('<a href="cadastro_pet.php?id='.$pet->getId().'"><img src="Imagens/editar.png" alt="Editar Funcionário" style="width:40px;height:40px;margin-left:10px;"></a>');
////                echo('<img src="Imagens/check_true.png" alt="Ativar/Desativar Funcionário" onclick="atualizarSituacao('.$pet->getId().')">');
//                echo('</td>');
//                echo('</tr>');

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

            $petDAO = new PetDAO();

            echo(json_encode($petDAO->obterUm($_POST["id"])));

        }

        public function autenticar(){

            $funcionarioDAO = new FuncionarioDAO();

            $nome = $funcionarioDAO->autenticar($_POST["email"], $_POST["senha"]);

            $_SESSION["nome"] = $nome;

            echo($nome);

        }
        public function remover(){

            $petDAO = new PetDAO();
            
            $petDAO->remover($_POST["idPet"]);

        }

        public function obterAutenticacao(){

            echo($_SESSION["nome"]);

        }

    }

?>