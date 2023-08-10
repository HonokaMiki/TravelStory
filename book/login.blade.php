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

    <p class="title">Login</p>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    

    <div class="sign-page">
        <div class="sign-content">
            <form method="post" action="{{ route('login') }}" class="formlogin">
                @csrf

                <div class="sign-item">
                    <input class="sign-input" type="email" name="email" placeholder="メールアドレス" required autofocus>
                    <input class="sign-input" type="password" name="password" placeholder="パスワード" required>
                    <button class="sign-button" type="submit">送 &nbsp; 信</button>
                </div>


                <div class="sign-app">
                    <div class="twitter sign-icon">
                        <img src="{{ asset('img/twitter.png')}}">
                    </div>
                    <div class="facebook sign-icon">
                        <img src="{{ asset('img/fb.png')}}">
                    </div>
                    <div class="google sign-icon">
                        <img src="{{ asset('img/google.png')}}">
                    </div>
                    <div class="apple sign-icon">
                        <img src="{{ asset('img/apple.png')}}">
                    </div>
                </div>
                


                

                <div class="sign-up-button">
                    <a href="{{ route('sign-up') }}" class="sign-up-button">新規会員登録</a>
                </div>

                <div class="logout-button">
                    <a href="{{ route('logout') }}" class="logout-button">ログアウト</a>
                </div>
            </form>
        </div>
    </div>
    



    <script>

        // フォームの送信を処理する関数
        function handleLogin(event) {
            event.preventDefault(); // デフォルトのフォーム送信を防止

            // フォームのデータをFormDataオブジェクトで取得
            const form = event.target;
            const formData = new FormData(form);

            // jQueryを使ってログインエンドポイントにAJAXリクエストを送信
            $.ajax({
                type: "POST",
                url: form.action,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        // ログインが成功した場合、指定されたURLにリダイレクト
                        window.location.href = response.redirect;
                    } else {
                        // ログインが失敗した場合、エラーメッセージを表示
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('ログイン時にエラーが発生しました。もう一度試してください。');
                }
            });

        }


        // フォームの送信イベントにリスナーを追加
        document.querySelector('.formlogin').addEventListener('submit', handleLogin);
    </script>

@include('book.footer') <!--FOOTER------------>
</body>
</html>
