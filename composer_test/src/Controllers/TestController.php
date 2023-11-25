<?php
    namespace src\Controllers; // 以下に作成されるコードはsrc\Controllers名前空間に属する。

    use src\Models\TestModel; // src/Models名前空間にある、TestModelクラスをインポートする。

    class TestController{
        public function run(){
            $model = new TestModel();
            echo $model->getHello();
        }
    }