<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
class XiangmuController extends Controller
{
    //注册++++++++++++++++++++++++++++++++++++++++++++++
    public function signup()
    {
        $input = Input::all();   //获取所有的输入值
        $email = trim($input['email']); //给输入的邮箱赋值变量 trim自动清除字符串两侧的空字符和特殊字符
        if(Input::has('sign-up')){//判断是否从注册按钮传过来的值
            if(!($input['UserName'] and $input['email'] and $input['password'])){ //判断输的如果值为空
                echo "<script>alert('输入不能为空！'); window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
            }elseif((strlen($input['password']) < 6){ //判断密码是否大于6，限制密码大于6
                echo "<script>alert('密码不允许少于六位'); window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
            }else{
                  echo "hhh";
                    //查询数据库
                    // $user = $input['UserName'];
                    // $db = DB::select(query:"selcect * from table where database('$user',UserName)");
                    // //判断数据库中是否有这个用户
                    // if(!$db){//如果数据库没有这个用户
                    //     //添加一个新用户去数据库
                    //     $db = DB::table(table:'table');
                    //     $result = $db->insertGetid([
                    //         'username' => $input['UserName'];
                    //         'password' => $input['password'];
                    //     ]);
                    //     dd($result);
                    //     echo "<script>alert('注册成功,快去登录吧.'); window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
                    //     return view(view:'xiangmu',compact(varname: 'user'));
                    // }else{
                    //    echo "<script>alert('此用户已存在,请换一个试试吧!'); window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";
                    // }
                }
        }else{
              return view('xiangmu');
        }
    }




    //登录++++++++++++++++++++++++++++++++++++++++
        // public function signin(){
        //    $input = Input::all(); //获取所有输入

        //     if(Input::has('sign-in')){//判断是否登录按钮传来
        //         if(!($input['UserName']and $input['password'])){
        //            echo "<script>alert('输入不能为空!'); window.location.href='{$_SERVER['HTTP_REFERER']}'</script>";

        //         }else{
        //             //数据库中查询用户及取出
        //             $db = DB::table(table:'table');
        //             $username = $db->where(column:'username', operator:'=',$input['UserName'])->value(column:'username');
        //             $username = $db->where(column:'password', operator:'=',$input['password'])->value(column:'password');


        //             //判断提交的用户名和密码是否正确
        //             if($input['UserName'] == $username && $input['password'] == $password){
        //                 session_start(); //初始化session变量
        //                 $_SESSION['username'] = $input['UserName'];
        //                 $_SESSION['password'] = $input['password'];         //如果正确将其赋值给session值

        //                 //直接跳转到用户页面
        //                 return view(view:'xiangmu',compact(varname:'username'));
        //             }
        //         }
        //     }else{
        //         return view(view:'xiangmu');
        //     }
        // }


      /*
      * 获取一个添加页码
      *@param null
      *@return 返回添加页面
      */

    public function add(){
        return view(view:'');
    }


    /*
      * 执行用户添加操作
      *@param 提交的表单数据
      *@return 返回添加是否成功
      */

    public function store(Request $request){
        //1.获取表单提交的数据
        $input => $request->except(key:'_token');//获取除了token以外的所以值
        dd($input);
        $input['password'] = md5($input['password']);//密码加密md5
        //2.表单验证
        //3.添加操作
        User::create($inpur)
    }
}
