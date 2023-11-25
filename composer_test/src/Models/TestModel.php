<?php

    namespace src\Models; // 以下に作成されるコードは、src\Models名前空間に属する。

    class TestModel{
        private $text = "hello world";

        public function getHello(){
            return $this->text;
        }
    }