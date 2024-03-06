<a href="login.php">로그인</a>

<!--보통 아래 방식으로 php를 처음 배운다.

    php artisan serve를 실행한 후에 터미널에 나오는 링크를 누른 후
    그 링크 뒤에 practice/home.php를 써주면 나온다.
        ex) http://127.0.0.1:8000/practice/home.php

    하지만 라라벨에서는 조금 다르게 동작한다.
    라라벨로 들어오는 모든 요청은 public 디렉토리의 index.php로 보내진다.

    그러면 이 index.php는 라라벨 application을 만들고 kernel로 request를 보내서 브라우저에 응답을 보낸다.
    그래서 모든 요청이 Index로 오고 이 index에서 요청을 애플리케이션 내부로 보냈다가 다시 브라우저로 반환을 해준다.

    그래서 어떤 요청을 어떻게 처리할 지는 route 디렉토리에서 찾는다.
    외부로 오는 요청 같은 경우에는 route 디렉토리의 web.php에서 찾아서 해결하면 된다.  -->
