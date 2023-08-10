<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Travelstory</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main-page.css') }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/animation.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>
<body>
    <button class="jump">Jump To Top </button>

    @include('book.header') <!--HEADER------------>

    <style>
        header {
            position: absolute;
            top: 0;
            background-color: black;
            z-index: 20;
        }
    </style>

    <p class="title">予約完了</p>

    <p><a href="{{ route('main-page') }}">トップ画面に戻る</a></p>

    <p><a href="{{ route('reservation-status') }}">予約状況を確認する</a></p>
</body>
</html>
