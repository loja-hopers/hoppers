<?php
    class Gestao{
        private $id;
        private $produtoId;
        private $funcionarioId;
        private $dataGestao;
        private $descricao;

        public function getId(){
            return $this->id;
        }

        public function getProdutoId(){
            return $this->produtoId;
        }

        public function getFuncionarioId(){
            return $this->funcionarioId;
        }

        public function getDataGestao(){
            return $this->dataGestao;
        }

        public function getDescricao(){
            return $this->descricao;
        }


        public function setId($id){
            $this->id=$id;
        }

        public function setProdutoId($proId){
            $this->produtoId=$proId;
        }

       public function setFuncionarioId($funId){
            $this->funcionarioId=$funId;
        }

        public function setDataGestao($dt){
            $this->dataGestao=$dt;
        }

        public function setDescricao($de){
            $this->descricao=$de;
        }
    }
?>