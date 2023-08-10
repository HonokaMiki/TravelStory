<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Travelstory</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main-page.css')  }}">
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


    <form method="post" action="{{ route('confirm') }}" novalidate>
        @csrf
        <h1>お問い合わせ</h1>
        <div class="form-content">
            <h2 class="form-question">下記の項目をご記入の上送信ボタンを押してください</h2>
            <p class="form-text">送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。<br>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。<br><span class="red-point">*</span>は必須項目となります。</p>

            <p class="form-item">氏名<span class="red-point">*</span></p>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="山田太郎" required>
            @if ($errors->has('name'))
                <p class="error-msg">{{ $errors->first('name') }}</p>
            @endif

            <p class="form-item">フリガナ<span class="red-point">*</span></p>
            <input type="text" name="furigana" value="{{ old('furigana') }}" placeholder="ヤマダタロウ" required>
            @if ($errors->has('furigana'))
                <p class="error-msg">{{ $errors->first('furigana') }}</p>
            @endif

            <p class="form-item">電話番号</p>
            <input type="tell" name="tell" value="{{ old('tell') }}" placeholder="09012345678">
            @if ($errors->has('tell'))
                <p class="error-msg">{{ $errors->first('tell') }}</p>
            @endif

            <p class="form-item">メールアドレス<span class="red-point">*</span></p>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="test@test.co.jp" required>
            @if ($errors->has('email'))
                <p class="error-msg">{{ $errors->first('email') }}</p>
            @endif

            <p class="form-question question2">お問い合わせ内容をご記入ください<span class="red-point">*</span></p>
            <textarea type="text" name="body" required>{{ old('body') }}</textarea>
            @if ($errors->has('body'))
            <p class="error-msg">{{ $errors->first('body') }}</p>
            @endif

            <button class="button-contact"  type="submit" name="submit" value="確認">送 &nbsp; 信</button>
        </div>
    </form>



@include('book.footer') <!--FOOTER------------>
</body>
