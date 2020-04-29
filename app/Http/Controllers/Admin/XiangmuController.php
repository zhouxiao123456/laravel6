<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class XiangmuController extends Controller
{
    //后台登录页面
    public function xiangmu(){
        return view('admin.xiangmu');
    }


    //处理用户登录到方法
    public function xm(Request $request){
        // 1.接受表单提交的数据
        $input = $request->except('_token');
        // 2.进行表单验证

        // $validater = Validater::make('需要验证的表单数据','验证规则','错误信息')
        $rule = [
            'UserName'=>'required|between:4,18',
            'password'=>'required|between:4,18|alpha_dash',
        ];
        //错误报错信息
        $msg = [
            'UserName.required'=>'用户名必须输入',
            'UserName.between'=>'用户名长度必须在4-18位之间',
            'password.between'=>'用户名长度必须在4-18位之间',
            'password.alpha_dash'=>'密码必须是数字字母下划线',
        ];
       $validator = Validator::make($input,$rule,$msg);

       if($validator->fails()){ //如果验证失败
           return redirect('admin/xiangmu')
               ->withErrors($validator)
               ->withInput();
        }
    }
}
