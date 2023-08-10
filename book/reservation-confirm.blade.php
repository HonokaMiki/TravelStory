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

    <p>予約内容をご確認ください：</p>






    <!-- 予約画面のフォーム -->
    <form id="confirm-form" method="post" action="{{ route('reservation-complete') }}">
        @csrf

        <!-- 選択したホテルの内容を表示 -->
<div class="selected-hotel">
    @if (isset($selectedHotel))
        <h3>選択したホテル</h3>
        <div class="hotel-item">
            <img src="{{ $selectedHotel['hotelImageUrl'] }}" alt="{{ $selectedHotel['hotelName'] }}" class="hotel-image">
            <h2><a href="{{ $selectedHotel['hotelInformationUrl'] }}" target="_blank">{{ $selectedHotel['hotelName'] }}</a></h2>
            <p>住所：{{ $selectedHotel['address1'] }}</p>
            <p>電話番号：{{ $selectedHotel['telephoneNo'] }}</p>
            <p>料金：{{ number_format($selectedHotel['hotelMinCharge']) }}円〜</p>
            <p>詳細情報：{{ $selectedHotel['hotelInformationUrl'] }}</p>
        </div>
    @else
        <p></p>
    @endif
</div>


        @if(auth()->check())
        <label for="username">ユーザー名：</label>
        <input type="text" name="username" id="username" value="{{ auth()->user()->username }}" readonly disabled><br>
        <!-- 他のユーザー情報を表示・編集する -->
        <label for="tel">電話番号：</label>
        <input type="text" name="tel" id="tel" value="{{ auth()->user()->tel }}"    readonly disabled><br>

        <label for="address">住所：</label>
        <input type="text" name="address" id="address" value="{{ auth()->user()->address }}"    readonly disabled><br>

        <label for="email">メールアドレス：</label>
        <input type="text" name="email" id="email" value="{{ auth()->user()->email }}"  readonly disabled><br>

        <div class="sign-up-item">
            <label>支払い方法<span class="red-point">*</span></label>
            <select id="payment_method" name="payment_method" required>
                <option value="">選択してください</option>
                <option value="credit_card">クレジットカード</option>
                <option value="bank_transfer">銀行振込</option>
            </select>
            @if ($errors->has('payment_method'))
                <p class="error-msg">{{ $errors->first('payment_method') }}</p>
            @endif
        </div>
        
        <!-- クレジットカードの入力欄 -->
        <div class="credit_card_fields" style="display: none;">
            <label for="credit_card_number">クレジットカード番号<span class="red-point">*</span></label>
            <input type="text" id="credit_card_number" name="credit_card_number" value="{{ auth()->user()->credit_card_number ?? '' }}" readonly disabled>
        
            <label for="cardholder_name">氏名（ローマ字）<span class="red-point">*</span></label>
            <input type="text" id="cardholder_name" name="cardholder_name" value="{{ auth()->user()->cardholder_name ?? '' }}"  readonly disabled>
        
            <label for="expiry_date">有効期限<span class="red-point">*</span></label>
            <input type="text" id="expiry_date" name="expiry_date" value="{{ auth()->user()->expiry_date ?? '' }}"  readonly disabled>
        
            <label for="security_code">セキュリティコード<span class="red-point">*</span></label>
            <input type="text" id="security_code" name="security_code" value="{{ auth()->user()->security_code ?? '' }}"    readonly disabled>
        </div>
        
        <!-- 銀行振込の入力欄 -->
        <div class="bank_transfer_fields" style="display: none;">
            <label for="bank_name">金融機関名<span class="red-point">*</span></label>
            <input type="text" id="bank_name" name="bank_name" value="{{ auth()->user()->bank_name ?? '' }}"    readonly disabled>
        
            <label for="branch_name">支店名<span class="red-point">*</span></label>
            <input type="text" id="branch_name" name="branch_name" value="{{ auth()->user()->branch_name ?? '' }}"  readonly disabled>
        
            <label for="account_type">預金種目<span class="red-point">*</span></label>
            <input type="text" id="account_type" name="account_type" value="{{ auth()->user()->account_type ?? '' }}"   readonly disabled>
        
            <label for="account_number">口座番号<span class="red-point">*</span></label>
            <input type="text" id="account_number" name="account_number" value="{{ auth()->user()->account_number ?? '' }}" readonly disabled>
        
            <label for="account_holder">口座名義<span class="red-point">*</span></label>
            <input type="text" id="account_holder" name="account_holder" value="{{ auth()->user()->account_holder ?? '' }}" readonly disabled>
        </div>
    @endif


    <button type="button" onclick="history.back();">前のページに戻る</button>



    <!-- 予約完了ボタン -->
    <button type="submit">予約を確定する</button>


    <script>
        $(document).ready(function() {
            // 支払い方法の変更時に対応する入力欄を表示・非表示する処理
            $('#payment_method').change(function() {
                const selectedOption = $(this).val();
                $('.credit_card_fields').hide();
                $('.bank_transfer_fields').hide();
                $('.user_info_fields').hide();
    
                if (selectedOption === 'credit_card') {
                    $('.credit_card_fields').show();
                } else if (selectedOption === 'bank_transfer') {
                    $('.bank_transfer_fields').show();
                }
    
                // ログイン済みの場合、支払い方法が選択されたらユーザー情報の入力欄を表示
                if (selectedOption) {
                    $('.user_info_fields').show();
                }
            });
    
            // ページロード時に初期の表示を設定
            const selectedOption = $('#payment_method').val();
            if (selectedOption) {
                if (selectedOption === 'credit_card') {
                    $('.credit_card_fields').show();
                } else if (selectedOption === 'bank_transfer') {
                    $('.bank_transfer_fields').show();
                }
                if (selectedOption === 'credit_card' || selectedOption === 'bank_transfer') {
                    $('.user_info_fields').show();
                }
            }
        });
    </script>
</body>
</html>
