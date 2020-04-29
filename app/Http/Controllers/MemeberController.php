<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;//命名空间的三元素，常量，方法，类
use DB;
use App\Home\Member;
use Input;

class MemeberController extends Controller
{
     // 增加
    public function add(){

        //定义关联操作的表
        $db = DB::table('member');
        //使用insert增加多条记录
        $result1 = $db -> insert([
            [
                'name' => '周潇',
                'age' => '20',
                'email' => '66666@qq.com'
            ],
            [
                'name' => '周潇3',
                'age' => '18',
                'email' => '666666@qq.com'
            ],
        ]);
        // 使用insertGetid增加一条记录
        $result2 = $db -> insertGetid([
            'name' => 'hahaha',
            'age' => '23',
            'email' => '888888@qq.com'
        ]);
        //执行两个sql操作
        dd($result1, $result2);
    }

     // 删除
    public function del(){
        $db = DB::table('member');
        $result = $db -> where('id','>','3') -> delete();
        //执行sql
        dd($result);
    }

    // 上传
    public function update(){
        $db = DB::table('member');
        $result = $db -> where('id','=','3') -> update(
            // 要修改的数据
            ['name' => 'ZHOUxiao111','age' => '20']
        );
        $result1 = $db -> where('id','=','3') -> increment('age',2);    // age增加2，原本20现在为22
        //DB::table('member') -> increment('votes');            每次 +1
        //DB::table('member') -> increment('votes'，5);          每次 +5
        //DB::table('member') -> decrement('votes');            每次 -1
        //DB::table('member') -> decrement('votes'5);            每次 -5

        //执行sql
        dd($result, $result1);
    }

    // 查询
    public function select(){
        $db = DB::table('member');
        //查询全部数据
        $date = $db -> get();

        //取出单行数据
        $date3 = $db -> first();

        //获取某个具体的值（字段）
        $date4 = $db -> where('id','=','1') -> value('name');

        //获取多个字段
        $users = $db -> select('name', 'email') -> get();
        $users2 = $db -> select('name as user_name') -> get();

        //排序操作
        $date5 = $db -> orderBy('age','desc') -> get();

//        // 执行
//        dd(
//            $date,       //查询全部数据
//            $date3,      //取出单行数据
//            $date4,      //获取某个具体的值（字段）
//            $users,      //获取多个字段
//            $users2     //获取多个字段
////            $date5       //排序操作
//        );

        //查询id大于1并且年龄小于3的数据
        $date2 = $db -> where('id','>','1') -> where('id','<','3') -> get();
//        dd($date2);

        //遍历取出的数据
        $a = 1;
        foreach ($date as $key => $value){
            echo "<li>用户$a</li>";
            $a+=1;
            echo "id是：{$value -> id}</br>
                  名字是：{$value -> name}</br>
                  年龄是：{$value -> age}</br>
                  邮箱是：{$value -> email}</br></br>
                  ";
        }
    }

    public function text5(){
        return view('text5');
    }

    //展示基础表单
    public function text6(){
        return view('text6');
    }
    //处理请求
    public function text7(){
        return "请求成功";
    }


    public function text8(Request $request){
        //实例化模型，讲表和类映射起来
        $model = new Member();
        // 给属性赋值，讲字段与类的属性映射起来
        // $model -> name = '周杰伦';
        // $model -> age = '40';
        // $model -> email = 'zhoujielun@qq.com';
        // //做具体的操作，讲记录映射到实例
        // $result = $model -> save();

        //方法2的添加操作
        $result = $model -> create($request -> all());
        dd($result);
    }

    public function text12(){
        return view('text12');
    }

    public function text13(Request $request){
        //查看是什么请求方式
        // echo Input::method();
        // echo "hello";
        if(Input::method() == 'POST'){
            //自动验证
            $this -> validate($request,[
                //具体规则
                //字段 => 验证规则1|验证规则2|...
                'name' => 'required|min:2|max:20',
                'age' => 'required|integer|min:1|max:100',
                'email' => 'required|email'
            ]);
            echo '验证成功';
        }else{
            //展示视图
            return view('text13');
        }
    }
}
