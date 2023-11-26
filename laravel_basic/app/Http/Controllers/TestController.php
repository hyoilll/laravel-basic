<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    public function index(){
        // Testモーデルを介してtestsテーブルからデータを全て取ってくる。
        $values = Test::all();

        // ここでコードの実行を一時止めて、$valuesを出力する。die + var_dump
        // dd($values);

        // compactを利用して、view側に$valuesを渡す。
        // compact：指定された変数名に対応する変数とその値から配列を作成する関数。
        return view("tests.test", compact("values"));
    }
}
