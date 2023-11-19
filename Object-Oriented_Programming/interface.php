<?php
    // interface
    interface InterfaceProduct{
        public function echoProduct();

        // abstractをつけると中身はカラにしなければならない。
        public function getProduct();
    }
    // interface
    interface SecondInterfaceProduct{
        public function echoProduct();

        // abstractをつけると中身はカラにしなければならない。
        public function getProduct();
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
    final class Product implements InterfaceProduct, SecondInterfaceProduct {
        // defaultはpubilc
        
        private $product = [];

        function __construct($product){
            $this->product = $product;
        }

        // 親クラスをoverwirteする。
        public function getProduct(){
            echo $this->product;
        }

        public function addProduct($item){
            $this->product .= $item;
        }

        public function echoProduct(){
            echo "echoProduct";
        }

        // public function parentProduct(){
        //     $this->echoProduct();
        // }

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

    $p->echoProduct();
    echo "<br />";

    // $p->parentProduct();
    // echo "<br />";

    Product::getStaticProduct("static product");
    echo "<br />";