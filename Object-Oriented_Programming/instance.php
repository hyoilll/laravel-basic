<?php
    class Product{
        // defaultはpubilc
        
        private $product = [];

        function __construct($product){
            $this->product = $product;
        }

        public function getProduct(){
            echo $this->product;
        }

        public function addProduct($item){
            $this->product .= $item;
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

    Product::getStaticProduct("static product");
    echo "<br />";