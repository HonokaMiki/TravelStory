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

    
    <h2>新規会員登録確認</h2>

    <h3>入力情報を確認してください</h3>
    <p>ユーザ名：{{ $userData['username'] }}</p>
    <p>メールアドレス：{{ $userData['email'] }}</p>
    <p>電話番号：{{ $userData['phone'] }}</p>
    <p>支払い方法：{{ $userData['payment_method'] }}</p>

    @if ($userData['payment_method'] === 'credit_card')
        <h4>クレジットカード情報</h4>
        <p>クレジットカード番号：{{ $userData['credit_card_number'] }}</p>
        <p>氏名（ローマ字）：{{ $userData['cardholder_name'] }}</p>
        <p>有効期限：{{ $userData['expiry_month'] }}/{{ $userData['expiry_year'] }}</p>
        <p>セキュリティコード：{{ $userData['security_code'] }}</p>
    @else
        <h4>銀行振込情報</h4>
        <p>金融機関名：{{ $userData['bank_name'] }}</p>
        <p>支店名：{{ $userData['branch_name'] }}</p>
        <p>預金種目：{{ $userData['account_type'] }}</p>
        <p>口座番号：{{ $userData['account_number'] }}</p>
        <p>口座名義：{{ $userData['account_holder'] }}</p>
    @endif

    <form method="post" action="{{ route('done') }}">
        @csrf
        <input type="hidden" name="username" value="{{ $userData['username'] }}">
        <input type="hidden" name="email" value="{{ $userData['email'] }}">
        <input type="hidden" name="phone" value="{{ $userData['phone'] }}">
        <input type="hidden" name="password" value="{{ $userData['password'] }}">
        <input type="hidden" name="password_confirmation" value="{{ $userData['password_confirmation'] }}">
        <input type="hidden" name="payment_method" value="{{ $userData['payment_method'] }}">

        @if ($userData['payment_method'] === 'credit_card')
            <input type="hidden" name="credit_card_number" value="{{ $userData['credit_card_number'] }}">
            <input type="hidden" name="cardholder_name" value="{{ $userData['cardholder_name'] }}">
            <input type="hidden" name="expiry_month" value="{{ $userData['expiry_month'] }}">
            <input type="hidden" name="expiry_year" value="{{ $userData['expiry_year'] }}">
            <input type="hidden" name="security_code" value="{{ $userData['security_code'] }}">
        @else
            <input type="hidden" name="bank_name" value="{{ $userData['bank_name'] }}">
            <input type="hidden" name="branch_name" value="{{ $userData['branch_name'] }}">
            <input type="hidden" name="account_type" value="{{ $userData['account_type'] }}">
            <input type="hidden" name="account_number" value="{{ $userData['account_number'] }}">
            <input type="hidden" name="account_holder" value="{{ $userData['account_holder'] }}">
        @endif

        <button type="submit">登録する</button>
    </form>

    <p><a href="{{ route('sign-up') }}">入力画面に戻る</a></p>

    @include('book.footer') <!--FOOTER------------>

</body>
</html>
