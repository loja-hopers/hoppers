<?php
    class Funcionario{
        private $id;
        private $nome;
        private $email;
        private $senha;
        private $cargo;
        private $foto;

        public function getId(){
            return $this->id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getSenha(){
            return $this->senha;
        }

        public function getCargo(){
            return $this->cargo;
        }

        public function getFoto(){
            return $this->id;
        }

        public function setId($id){
            $this->id=$id;
        }

        public function setNome($nm){
            $this->nome=$nm;
        }

       public function setEmail($em){
            $this->email=$em;
        }

        public function setSenha($se){
            $this->senha=$se;
        }

        public function setCargo($ca){
            $this->cargo=$ca;
        }

        public function setFoto($ft){
            $this->foto=$ft;
        }
    }
?>