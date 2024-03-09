<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .container{
            padding: 15px;
            width: 100vw;
            height: 100vh;
        }
        .title{
            font-size: 17px;
            margin-bottom: 10px;
        }
        .write{
            display: block;
            margin-bottom: 10px;
            width: 100%;
            border-radius: 5px;
        }
        .applyBtn{
            padding: 2px 10px;
            background: black;
            color: white;
            border-radius: 5px;
        }
    </style>
</head>
<body class="bg-pink-400">
    <div class="container">
        <h1 class="title">글쓰기</h1>

        <form action="/articles" method="POST">
{{--            csrf token--}}
{{--            <input type="hidden" name="_token" value="<?php echo csrf_token();?>" />--}}

{{--            blade는 위 코드를 사용 안하고 편하게 해주는 기능이 있다.--}}
            @csrf

            <input type="text" class="write">
            <button class="applyBtn">저장하기</button>
        </form>
    </div>
</body>
</html>
