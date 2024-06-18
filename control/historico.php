<?php
    class Historico{
        private $id;
        private $data;
        private $descricao;
        private $produtoId;
        private $funcionarioId;
        
        public function getId(){
            return $this->id;
        }

        public function getData(){
            return $this->dataGestao;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function getProdutoId(){
            return $this->produtoId;
        }

        public function getFuncionarioId(){
            return $this->funcionarioId;
        }

        public function setId($id){
            $this->id=$id;
        }

        public function setDataGestao($dt){
            $this->dataGestao=$dt;
        }

        public function setDescricao($de){
            $this->descricao=$de;
        }

        public function setProdutoId($proId){
            $this->produtoId=$proId;
        }

       public function setFuncionarioId($funId){
            $this->funcionarioId=$funId;
        }
    }
?>