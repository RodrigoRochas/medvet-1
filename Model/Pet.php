<?php

    class Pet{

        private $id;
        private $nome;
        private $porte;
        private $dtNascimento;
        private $sexo;
        private $idPorte;
        private $idCliente;
        private $caminhoImagem;

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

        public function setPorte($porte){

            $this->porte = $porte;

        }

        public function getPorte(){

            return $this->porte;

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

        
        public function setIdPorte($idPorte){

            $this->idPorte = $idPorte;

        }

        public function getIdPorte(){

            return $this->idPorte;

        }
        
        public function setIdCliente($idCliente){

            $this->idCliente = $idCliente;

        }

        public function getIdCliente(){

            return $this->idCliente;

        }
        
        public function setCaminhoImagem($caminhoImagem){

            $this->caminhoImagem = $caminhoImagem;

        }

        public function getCaminhoImagem(){

            return $this->caminhoImagem;

        }


    }

 ?> 