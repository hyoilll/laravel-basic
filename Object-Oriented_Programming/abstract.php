<?php
    // abstact class : 設定するメソッドを強制する。
    abstract class AbstractProduct{
        protected function echoProduct() {
            echo "parent Product";
        }

        // abstractをつけると中身はカラにしなければならない。
        abstract public function getProduct();
    }

    class BaseProduct{
        protected function echoProduct() {
            echo "parent Product";
        }

        public function getProduct(){
            echo "parent Product function";
        }
    }

    // finalをつけるとことクラスを継承することは禁じられる。
    final class Product extends AbstractProduct {
        // defaultはpubilc
        
        private $product = [];

        function __construct($product){
            $this->product = $product;
        }

        // 親クラスをoverwirteする。
        public function getProduct(){
            parent::getProduct();
            echo $this->product;
        }

        public function addProduct($item){
            $this->product .= $item;
        }

        public function parentProduct(){
            $this->echoProduct();
        }

        // staticをつけることで、instanceを作らずに実行できる。
        public static function getStaticProduct($str){
            echo $str;
        }
    }

    $p = new Product("test");
    
    $p->getProduct();
    echo "<br />";

    $p->addProduct("add product");
    $p->getProduct();
    echo "<br />";

    $p->parentProduct();
    echo "<br />";

    Product::getStaticProduct("static product");
    echo "<br />";