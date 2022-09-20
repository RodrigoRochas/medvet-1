<?php

    define("dominio", "127.0.0.1");
    define("usuario", "root");
    define("senha", "");
    define("banco", "medvet");

    class ConexaoBanco {

        public static function obterConexao(){

            try{

                $conexao = new PDO("mysql:host=".dominio.";dbname=".banco, usuario, senha);

                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch(PDOException $e){

                echo("<font color = 'red'>Erro ao conectar com banco. Contate o administrador.</font>".$e->getMessage());

            }

            return $conexao;

        }

    }

 ?>