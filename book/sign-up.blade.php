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

    <div class="form-content">
        <p class="title">Sign Up</p>
        <div class="sign-up-content">
            <form method="POST" action="{{ route('confirm-registration') }}" novalidate>
                @csrf
                <div class="sign-up-item">
                    <label for="username">ユーザ名<span class="red-point">*</span></label>
                    <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="山田太郎" required>
                    @if ($errors->has('username'))
                        <p class="error-msg">{{ $errors->first('username') }}</p>
                    @endif

                    <label for="tel">電話番号<span class="red-point">*</span></label>
                    <input type="tel" id="tel" name="tel" value="{{ old('tel') }}" placeholder="0123456789" required>
                    @if ($errors->has('tel'))
                        <p class="error-msg">{{ $errors->first('tel') }}</p>
                    @endif

                    <label for="address">住所<span class="red-point">*</span></label>
                    <input type="address" id="address" name="address" value="{{ old('address') }}" placeholder="" required>
                    @if ($errors->has('address'))
                        <p class="error-msg">{{ $errors->first('address') }}</p>
                    @endif

                    <label for="email">メールアドレス<span class="red-point">*</span></label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="test@test.co.jp" required>
                    @if ($errors->has('email'))
                        <p class="error-msg">{{ $errors->first('email') }}</p>
                    @endif

                    <label for="password">パスワード<span class="red-point">*</span></label>
                    <input type="password" id="password" name="password" required>
                    @if ($errors->has('password'))
                        <p class="error-msg">{{ $errors->first('password') }}</p>
                    @endif

                    <label for="password_confirmation">パスワード（確認）<span class="red-point">*</span></label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required>
                </div>

                <div class="sign-up-item">
                    <label for="security_question">秘密の質問<span class="red-point">*</span></label>
                    <input type="text" id="security_question" name="security_question" value="{{ old('security_question') }}" placeholder="好きな動物は？" required>
                </div>
                
                <div class="sign-up-item">
                    <label for="security_answer">質問の答え<span class="red-point">*</span></label>
                    <input type="text" id="security_answer" name="security_answer" value="{{ old('security_answer') }}" placeholder="犬" required>
                </div>
                

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

                <div class="credit_card_fields" style="display: none;">
                    <!-- クレジットカードの入力欄 -->
                    <label for="credit_card_number">クレジットカード番号<span class="red-point">*</span></label>
                    <input type="text" id="credit_card_number" name="credit_card_number" required>
                
                    <label for="cardholder_name">氏名（ローマ字）<span class="red-point">*</span></label>
                    <input type="text" id="cardholder_name" name="cardholder_name" required>
                
                    <label for="expiry_date">有効期限<span class="red-point">*</span></label>
                    <input type="text" id="expiry_date" name="expiry_date" required>
                
                    <label for="security_code">セキュリティコード<span class="red-point">*</span></label>
                    <input type="text" id="security_code" name="security_code" required>
                </div>
                
                <div class="bank_transfer_fields" style="display: none;">
                    <!-- 銀行振込の入力欄 -->
                    <label for="bank_name">金融機関名<span class="red-point">*</span></label>
                    <input type="text" id="bank_name" name="bank_name" required>
                
                    <label for="branch_name">支店名<span class="red-point">*</span></label>
                    <input type="text" id="branch_name" name="branch_name" required>
                
                    <label for="account_type">預金種目<span class="red-point">*</span></label>
                    <input type="text" id="account_type" name="account_type" required>
                
                    <label for="account_number"><span class="red-point">*</span></label>
                    <input type="text" id="account_number" name="account_number" required>
                
                    <label for="account_holder">口座名義<span class="red-point">*</span></label>
                    <input type="text" id="account_holder" name="account_holder" required>
                </div>

                <div class="sign-up-item">
                    <label for="role">role<span class="red-point">*</span></label>
                    <select id="role" name="role" required>
                        <option value="admin">管理者</option>
                        <option value="user">ユーザー</option>
                    </select>
                </div>
                
                

                <button class="sign-up-button" type="submit">新規会員登録</button>
            </form>
        </div>
    </div>

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
