<?php

    trait ProductTrait{
        public function getProduct(){
            echo "product <br />";
        }
    }

    trait NewsTrait{
        public function getNews(){
            echo "news <br />";
        }
    }

    class Product{
        use ProductTrait;
        use NewsTrait;

        public function getInfo() {
            echo "class <br />";
        }

        // overwrite 
        public function getNews(){
            echo "news of class <br />";
        }
    }

    $p = new Product();

    $p->getInfo();
    $p->getProduct();
    $p->getNews();