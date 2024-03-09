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
            padding: 0 10px;
            background: black;
            color: white;
        }
    </style>
</head>
<body class="bg-pink-400">
    <div class="container">
        <h1 class="title">글쓰기</h1>

        <form action="articles" method="POST">
            <input type="text" class="write">
            <input type="button" value="저장하기" class="applyBtn">
        </form>
    </div>
</body>
</html>
