<!-- 通过路径来引入 -->
<link rel="stylesheet" type="css" href="laravel6/resources/scss/app.scss">
<!-- 通过asset方法引入 -->
<link rel="stylesheet" type="css" href="{{asset('sass')}}/app.sass">
@extends('parent')
<!-- 指定yield标签的名字，绑定区块-->
@section('mainbody')
<div>
    阿萨斯发啊发发昂昂阿莎
</div>
@endsection
<!--文件的包含--!>
