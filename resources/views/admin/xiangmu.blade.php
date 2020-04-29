<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title></title>
        <link href = "{{asset('css/main.css')}}" rel = "stylesheet">
        <link rel="stylesheet" href="{{asset('fontawesome-free-5.11.2-web/css/all.css')}}">
    </head>

	<body>
            @if (count($errors) > 0)
                <div class = "alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="container" id="container">


                <!--注册表格 -->
                <div class="form-container sign-up-container">
                    <form action="#">
                        <h1>创建账号</h1>
                        <div class="social-container">
                            <a href="#" class="social"><i class="fab fa-qq"></i></a>
                            <a href="#" class="social"><i class="fab fa-weixin"></i></a>
                            <a href="#" class="social"><i class="fab fa-weibo"></i></a>
                        </div>
                        <span>或使用您的电子邮件进行注册</span>
                        <input type="text" name="UserName" id="UserName" placeholder="UserName" />
                        <input type="email" name="email" id="email" placeholder="Email" />
                        <input type="password" name="password" id="password" placeholder="Password" />
                        <button type="submit" name = "sign-up"class="signUp">注册</button>
                    </form>
                 </div>



                 <!--登录表单 -->
                 <div class="form-container sign-in-container">
                     <form action="{{url('admin/xm')}}" method="post">
                         {{csrf_field()}}
                         <h1>登录</h1>
                         <div class="social-container">
                             <a href="#" class="social"><i class="fab fa-qq"></i></a>
                             <a href="#" class="social"><i class="fab fa-weixin"></i></a>
                             <a href="#" class="social"><i class="fab fa-weibo"></i></a>
                         </div>
                         <span>或使用您的账户</span>
                         <input type="text" name="UserName" id="UserName" placeholder="UserName" />
                         <input type="password" name="password" id="password" placeholder="Password" />
                         <a href="#">忘记密码了吗？</a>
                         <button type="submit" name="sign-up" class="signUp">登录</button>
                     </form>
                 </div>


                 <div class="overlay-container">
                     <div class="overlay">
                         <!-- 左边覆盖 -->
                         <div class="overlay-panel overlay-left">
                             <h1>欢迎回来!</h1>
                             <p>
                                 为了与我们保持联系,请登录您的个人信息
                             </p>
                             <button class="ghost" id="signIn">登录</button>
                         </div>
                         <!-- 右边覆盖 -->
                         <div class="overlay-panel overlay-right">
                             <h1>你好,朋友!</h1>
                             <p>输入您的个人详细信息并与我们一起开始旅程</p>
                             <button class="ghost" id="signUp">注册</button>
                         </div>
                     </div>
                 </div>
            </div>
            <script type="text/javascript" src="{{asset('js')}}/main.js"></script>







    </body>
</html>
