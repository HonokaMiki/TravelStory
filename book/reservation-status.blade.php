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

    <p class="title">Reservation Confirm</p>

    <p class="retitle">予約状況</p>



    @if ($reservations->isEmpty())
        <p>予約はありません。</p>
    @else
        <ul class="restatus">
            @foreach ($reservations as $reservation)
                <li class="reli">
                    名前: {{ $reservation->username }}<br>
                    Email: {{ $reservation->email }}<br>
                    電話番号: {{ $reservation->tel }}<br><br>
                    支払い方法: {{ $reservation->payment_method }}<br><br>
                    クレジットカード番号: {{ $reservation->credit_card_number }}<br>
                    氏名（ローマ字）: {{ $reservation->cardholder_name }}<br>
                    有効期限: {{ $reservation->expiry_date }}<br>
                    セキュリティコード: {{ $reservation->security_code }}<br><br>
                    金融機関名: {{ $reservation->bank_name }}<br>
                    支店名: {{ $reservation->branch_name }}<br>
                    預金種目: {{ $reservation->account_type }}<br>
                    口座番号: {{ $reservation->account_number }}<br>
                    口座名義: {{ $reservation->account_holder }}<br>
                </li>
            @endforeach
        </ul>
    @endif

    <p class="rea"><a href="{{ route('main-page') }}">トップ画面に戻る</a></p>
</body>
</html>
