<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/get',function(){
    echo '这个使用的是get方法来请求';
});
Route::match(['get','post'],'match',function(){
    echo '这个使用的match方法来请求';
});
Route::any('/suoyou',function(){
    echo '这个使用的any方法来请求';
});
Route::get('zhouxiao/{age}',function($age){
    return 'zhouxiao'.$age;
});
Route::get('user/{name?}',function($name = 'zhouxiao'){
    return 'user'.$name;
});
Route::any('/text5',function(){
    echo "当前用户的id是".$_GET['id'];
});


Route::any('/text5/adsasfasf/asfvvv/ggsga/wwwwff',function(){
    echo "别名操作成功";
}) -> name('zhouxiao');
//调用别名
Route::get('/diaoyong',function(){
    return route('zhouxiao');
});
Route::get('/diaoyong1',function(){
    return redirect()->route('zhouxiao');
});


//路由群组
// Route::group(['prefix' => 'admin'],function(){
//    Route::get('text1',function(){
//        //匹配"/admin/text1"URL
//    });
//     Route::get('text',function(){
//        //匹配"/admin/text2"URL
//     });
//     Route::get('text2',function(){
//         //匹配"/admin/text3"URL
//     });
// });

//控制器路由写法
Route::get('/home/text1','GoodsController@text1');
Route::get('/admin/index','Admin\ZhouxiaoController@index');
Route::get('/home/index','Home\ZhouxiaoController@index');
Route::get('/home/text/text2','GoodsController@text2');

//DB门面增删改查
Route::group(['prefix' => '/数据库操作/'],function (){
    Route::get('/add','MemeberController@add');         //添加数据
    Route::get('/del','MemeberController@del');         // 删除数据
    Route::get('/update','MemeberController@update');   // 上传修改
    Route::get('/select','MemeberController@select');   // 查询数据
});
Route::get('/home/text5','MemeberController@text5');

//csrf验证
Route::get('/home/text6','MemeberController@text6');
Route::post('/home/text7','MemeberController@text7') -> name('text7');



Route::any('/home/text8','MemeberController@text8') -> name('text8');
Route::get('/home/text12','MemeberController@text12');

//自动验证
Route::any('/home/text13','MemeberController@text13') -> name('text13');


//项目
Route::any('/home/xiangmu','XiangmuControlle@xiangmu');
//用户添加路由
Route::get('user/add','XiangmuController@add');
//用户执行添加路由
Route::post('user/store','XiangmuController@store');



//后台登录页面
Route::get('admin/xiangmu','Admin\XiangmuController@xiangmu');
Route::post('admin/xm','Admin\XiangmuController@xm');