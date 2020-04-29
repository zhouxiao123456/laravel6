<?php

namespace App\Http\Controllers;

use Request;
use Input;


class GoodsController extends Controller
{
    //phpinfo信息
    public function text2(){
        //获取一个值，如果没有则使用第二个参数当默认值
        echo Request::input('id','10086').'<br/>';
        //获取全部的值，以数组形式返回
        $all = Request::all();
        dd($all);
        //获取指定信息（字符串形式）
        dd(Request::input('name'));
        //获取指定值（数组形式）
        dd(Request::only(['id','name']));
        //获取除了指定值以外的值，
        dd(Request::except(['name']));
        //判断某个值是否存在（布尔值）
        dd(Request::has('gender'));
    }
}
