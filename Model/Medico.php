<?php

    class Medico{

        private $id;
        private $nome;
        private $cpf;
        private $dtNascimento;
        private $sexo;
        private $email;
        private $celular;
        private $logradouro;
        private $numero;
        private $bairro;
        private $cep;
        private $estado;
        private $cidade;
        private $senha;

        public function setId($id){

            $this->id = $id;

        }

        public function getId(){

            return $this->id;

        }

        public function setNome($nome){

            $this->nome = $nome;

        }

        public function getNome(){

            return $this->nome;

        }

        public function setCPF($cpf){

            $this->cpf = $cpf;

        }

        public function getCPF(){

            return $this->cpf;

        }

        public function setDtNascimento($dtNascimento){

            $this->dtNascimento = $dtNascimento;

        }

        public function getDtNascimento(){

            return $this->dtNascimento;

        }

        // public function setSexo($sexo){

        //     $this->sexo = $sexo;

        // }

        // public function getSexo(){

        //     return $this->sexo;

        // }

        public function setEmail($email){

            $this->email = $email;

        }

        public function getEmail(){

            return $this->email;

        }

        public function setCelular($celular){

            $this->celular = $celular;

        }

        public function getCelular(){

            return $this->celular;

        }

        
        public function setLogradouro($logradouro){

            $this->logradouro = $logradouro;

        }

        public function getLogradouro(){

            return $this->logradouro;

        }

        public function setNumero($numero){

            $this->numero = $numero;

        }

        public function getNumero(){

            return $this->numero;

        }

        public function setBairro($bairro){

            $this->bairro = $bairro;

        }

        public function getBairro(){

            return $this->bairro;

        }

        public function setCEP($cep){

            $this->cep = $cep;

        }

        public function getCEP(){

            return $this->cep;

        }

        public function setEstado($estado){

            $this->estado = $estado;

        }

        public function getEstado(){

            return $this->estado;

        }

        public function setCidade($cidade){

            $this->cidade = $cidade;

        }

        public function getCidade(){

            return $this->cidade;

        }

        
        public function setSenha($senha){

            $this->senha = $senha;

        }

        public function getSenha(){

            return $this->senha;

        }

    }

 ?> 