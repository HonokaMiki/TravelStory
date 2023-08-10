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

    <p class="title">Userinfo</p>

    <form action="{{ route('user-update') }}" method="POST">
        @csrf
        @method('put')

        <!-- Add the user edit form fields here -->
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="{{ $user->username }}" readonly><br>

        <label for="tel">電話番号：</label>
        <input type="text" name="tel" id="tel" value="{{ $user->tel }}"><br>

        <label for="address">住所：</label>
        <input type="text" name="address" id="address" value="{{ $user->address }}"><br>

        <label for="email">メールアドレス：</label>
        <input type="text" name="email" id="email" value="{{ $user->email }}"><br>


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
            <input type="text" id="credit_card_number" name="credit_card_number" value="{{ auth()->user()->credit_card_number ?? '' }}" >
        
            <label for="cardholder_name">氏名（ローマ字）<span class="red-point">*</span></label>
            <input type="text" id="cardholder_name" name="cardholder_name" value="{{ auth()->user()->cardholder_name ?? '' }}" >
        
            <label for="expiry_date">有効期限<span class="red-point">*</span></label>
            <input type="text" id="expiry_date" name="expiry_date" value="{{ auth()->user()->expiry_date ?? '' }}" >
        
            <label for="security_code">セキュリティコード<span class="red-point">*</span></label>
            <input type="text" id="security_code" name="security_code" value="{{ auth()->user()->security_code ?? '' }}" >
        </div>
        
        <!-- 銀行振込の入力欄 -->
        <div class="bank_transfer_fields" style="display: none;">
            <label for="bank_name">金融機関名<span class="red-point">*</span></label>
            <input type="text" id="bank_name" name="bank_name" value="{{ auth()->user()->bank_name ?? '' }}" >
        
            <label for="branch_name">支店名<span class="red-point">*</span></label>
            <input type="text" id="branch_name" name="branch_name" value="{{ auth()->user()->branch_name ?? '' }}" >
        
            <label for="account_type">預金種目<span class="red-point">*</span></label>
            <input type="text" id="account_type" name="account_type" value="{{ auth()->user()->account_type ?? '' }}" >
        
            <label for="account_number">口座番号<span class="red-point">*</span></label>
            <input type="text" id="account_number" name="account_number" value="{{ auth()->user()->account_number ?? '' }}" >
        
            <label for="account_holder">口座名義<span class="red-point">*</span></label>
            <input type="text" id="account_holder" name="account_holder" value="{{ auth()->user()->account_holder ?? '' }}" >
        </div>

        <button type="submit">Update Profile</button>
    </form>

    @include('book.footer') <!--FOOTER------------>

    <script>
        // 支払い方法の選択に応じて入力欄を表示/非表示する
        $(document).ready(function() {
            $('#payment_method').on('change', function() {
                var selectedPaymentMethod = $(this).val();
                $('.credit_card_fields').toggle(selectedPaymentMethod === 'credit_card');
                $('.bank_transfer_fields').toggle(selectedPaymentMethod === 'bank_transfer');
            });
        });
    </script>
</body>
</html>
