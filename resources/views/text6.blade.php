<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>表单提交</title>
        <meta name = "description" content="">
        <meta name = "keywords" content="">
        <link href = "" rel = "stylesheet">
	</head>
	<body>
            <form action="{{route('text7')}}"method="post">
                姓名:<input type="text" name="name" value="" placeholder="请输入姓名"/>
            <!--<input type="hidden" name="_token" value="{{csrf_token()}}">-->
             <!--{{csrf_field()}} -->
             <input type="submit" value="提交"/>
            </form>
	</body>
</html>
