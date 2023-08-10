<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Travelstory</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main-page.css') }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/animation.js') }}"></script>
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


    <p class="title">Hotel Room</h3>



    <div class="hotel-list">
        @if (count($hotels) > 0)
            @foreach ($hotels as $hotel)
                <div class="hotel-item">
                    <img src="{{ $hotel['hotelImageUrl'] }}" alt="{{ $hotel['hotelName'] }}" class="hotel-image">
                    <h2><a href="{{ $hotel['hotelInformationUrl'] }}" target="_blank">{{ $hotel['hotelName'] }}</a></h2>
                    <p>住所：{{ $hotel['address1'] }}</p>
                    <p>電話番号：{{ $hotel['telephoneNo'] }}</p>
                    <p>料金：{{ number_format($hotel['hotelMinCharge']) }}円〜</p>
                    <p>詳細情報：{{ $hotel['hotelInformationUrl'] }}</p>
                    <button class="select-button" data-hotel-id="{{ $hotel['hotelNo'] }}">選択</button>
                </div>
            @endforeach
        @else
            <p>該当するホテルが見つかりませんでした。</p>
        @endif
    </div>

    <script>
        $(document).ready(function() {
            // 選択ボタンがクリックされた時の処理
            $('.select-button').click(function() {
                // ログイン済みの場合は予約画面へ遷移
                if (isLoggedIn()) {
                    var hotelId = $(this).data('hotel-id');
                    var reservationUrl = '/reserve/' + hotelId;
                    window.location.href = reservationUrl;

                } else {
                    // 未ログインの場合はアラートメッセージを表示
                    alert('ログインが完了していません。右上のサインインからログインしてください。');
                }
            });
    
            // ダミーのログインチェック関数（実際のログイン判定はサーバー側で行うべきです）
            function isLoggedIn() {
                // ここにログインしているかどうかの判定ロジックを書く
                // ダミーの例として、セッションにユーザー情報があるかを判定する
                return {{ auth()->check() ? 'true' : 'false' }};
            }
        });
    </script>
    


    @include('book.footer') <!--FOOTER------------>
<!-- Rakuten Web Services Attribution Snippet FROM HERE -->
<a href="http://webservice.rakuten.co.jp/" target="_blank">
    Supported by 楽天ウェブサービス</a>
    <!-- Rakuten Web Services Attribution Snippet TO HERE -->
    </body>
    </html>
