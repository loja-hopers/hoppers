<?php
    class Produto{
        private $id;
        private $descricao;
        private $preco;
        private $imagem;

        public function getId(){
            return $this->id;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function getPreco(){
            return $this->preco;
        }

        public function getImagem(){
            return $this->imagem;
        }


        public function setId($id){
            $this->id=$id;
        }

        public function setDescricao($de){
            $this->descricao=$de;
        }

       public function setPreco($pr){
            $this->preco=$pr;
        }

        public function setImagem($im){
            $this->imagem=$im;
        }
    }
?>