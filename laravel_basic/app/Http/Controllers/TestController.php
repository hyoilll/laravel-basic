<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(){
        // Eloquent(エロくアント)方式
        // Testモーデルを介してtestsテーブルからデータを全て取ってくる。
        $values = Test::all();

        // collection型の取説
        // https://readouble.com/laravel/9.x/ja/collections.html#method-count

        $count = Test::count();
        $first_value = Test::findOrFail(1);
        $where = Test::where("text", "hello")->get();

        // ここでコードの実行を一時止めて、$valuesを出力する。die + var_dump
        dd($values, $count, $first_value, $where);

        // compactを利用して、view側に$valuesを渡す。
        // compact：指定された変数名に対応する変数とその値から配列を作成する関数。
        return view("tests.test", compact("values"));
    }

    public function queryBuilder(){
        // query builder形式
        // https://readouble.com/laravel/9.x/ja/queries.html
        $values = DB::table("tests")->where("text", "hello")->select()->get();

        dd($values);

        return view("tests.test", compact("values"));
    }
}
