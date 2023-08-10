<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Travelstory</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main-page.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/animation.js') }}"></script>
</head>

<body>
    <button class="jump">Jump To Top</button>

    @include('book.header') <!--HEADER------------>

    <style>
        header {
            position: absolute;
            top: 0;
            background-color: black;
            z-index: 20;
        }
    </style>



    <h2>新規会員登録完了</h2>

    <p>新規会員登録が完了しました！</p>
    <p>ログインしてサービスをご利用ください。</p>

    <p><a href="{{ route('main-page') }}">ログインページへ</a></p>

    @include('book.footer') <!--FOOTER------------>

</body>
</html>
