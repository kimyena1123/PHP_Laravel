<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>목록 보여주기</title>
    <style>
        .container{
            width: 100vw;
            height: 100vh;
        }
        .box{
            display: flex;
        }
        .time{
            display: flex;
            align-items: center;
            width: 100px;
            border: 1px solid red;
        }
        .list-item{
            border: 1px solid gray;
            margin: 20px;
            height: 60px;
            width: 700px;
            display: flex;
            align-items: center;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>글 목록</h1>
        <ol>
            <?php foreach ($articleList as $article): ?>
                <div class="box">
                    <p class="time"><?php echo $article->created_at; ?></p>
                    <li class="list-item"><?php echo $article->body; ?></li>
                </div>
            <?php endforeach;?>


        </ol>
    </div>

</body>
</html>
