$(function () {
    // ヘッダーからサイト内へアニメーション移動
    $('.click1').on('click', function () {
        const greenTop = $('#click-point1').offset().top;
        $("html").animate({ scrollTop: greenTop }, 500);
    });
    $('.click2').on('click', function () {
        const greenTop = $('#click-point2').offset().top;
        $("html").animate({ scrollTop: greenTop }, 900);
    });

    // ヘッダーのスクロールによる色変更
    $(window).on("scroll", function () {
        // ファーストビューの高さを取得
        mvHeight = $(".notice").height();
        if ($(window).scrollTop() > mvHeight) {
            // スクロールの位置がファーストビューより下の場合にclassを付与
            $("header").addClass("transform");
        } else {
            // スクロールの位置がファーストビューより上の場合にclassを外す
            $("header").removeClass("transform");
        }
    });

    // サインインのアニメーション
    $('.header-button').click(function () {
        $('.background').css('display', 'block');
        $('.sign-page').addClass('active');
    });
    $('.background').on('click', function () {
        if ($('.sign-page').hasClass('active')) {
            $('.sign-page').removeClass('active');
            $('.background').css('display', 'none');
        }
    });

    // レスポンシブナビゲーションメニューの表示
    $('.res-menu').on('click', function () {
        $('.res-nav').toggleClass('show');
    });

    // トップへジャンプボタン
    function PageTopAnime() {
        var scroll = $(window).scrollTop();
        // 300pxスクロールしたらpage_topが出てくる
        if (scroll >= 300) {
            $(".jump").removeClass("down-move"); // 初期クラス名
            $(".jump").addClass("up-move"); // クラス名追加
        } else {
            if ($(".jump").hasClass("up-move")) { // classが存在するかを確認
                $(".jump").removeClass("up-move"); // pagetopの場合はクラス名削除
                $(".jump").addClass("down-move"); // pagetopの場合はクラス名追加
            }
        }
    }

    // 画面をスクロールをしたら動かしたい場合の記述
    $(window).scroll(function () {
        PageTopAnime(); /* スクロールした際の動きの関数を呼ぶ*/
    });

    // ページが読み込まれたらすぐに動かしたい場合の記述
    $(window).on('load', function () {
        PageTopAnime(); /* スクロールした際の動きの関数を呼ぶ*/
    });
    $(".jump").click(function () {
        $('html,body').animate({ 'scrollTop': 0 }, 500);
    });

    // お問い合わせフォーム　情報削除のポップ表示非表示
    $('.delete-show').click(function () {
        $('.delete-pop').toggleClass('active3');
        $('.background').css('display', 'block');
    });
    $('.background').on('click', function () {
        if ($('.delete-pop').hasClass('active3')) {
            $('.delete-pop').removeClass('active3');
            $('.background').css('display', 'none');
        }
    });
    $('.submit5').on('click', function () {
        if ($('.delete-pop').hasClass('active3')) {
            $('.delete-pop').removeClass('active3');
            $('.background').css('display', 'none');
        }
    });

    // 横にスクロールできるようにする部分を追加
    var isScrolling = false;
    var startX;
    var scrollLeft;

    $(".experience-content").on("mousedown touchstart", function (event) {
        isScrolling = true;
        startX = event.pageX || event.touches[0].pageX;
        scrollLeft = $(".experience-content").scrollLeft();
    });

    $(".experience-content").on("mouseup touchend", function () {
        isScrolling = false;
    });

    $(".experience-content").on("mousemove touchmove", function (event) {
        if (!isScrolling) return;
        event.preventDefault();
        var x = event.pageX || event.touches[0].pageX;
        var walk = (x - startX) * 3; // スクロールの速度を調整
        $(".experience-content").scrollLeft(scrollLeft - walk);
    });

    $('.slider').slick({
		autoplay: true,//自動的に動き出すか。初期値はfalse。
		infinite: true,//スライドをループさせるかどうか。初期値はtrue。
		speed: 500,//スライドのスピード。初期値は300。
		slidesToShow: 3,//スライドを画面に3枚見せる
		slidesToScroll: 1,//1回のスクロールで1枚の写真を移動して見せる
		prevArrow: '<div class="slick-prev"></div>',//矢印部分PreviewのHTMLを変更
		nextArrow: '<div class="slick-next"></div>',//矢印部分NextのHTMLを変更
		centerMode: true,//要素を中央ぞろえにする
		variableWidth: true,//幅の違う画像の高さを揃えて表示
		dots: true,//下部ドットナビゲーションの表示
	});


    


	$('.popcity').slick({
		arrows: false,//左右の矢印はなし
		autoplay: true,//自動的に動き出すか。初期値はfalse。
		autoplaySpeed: 0,//自動的に動き出す待ち時間。初期値は3000ですが今回の見せ方では0
		speed: 6900,//スライドのスピード。初期値は300。
		infinite: true,//スライドをループさせるかどうか。初期値はtrue。
		pauseOnHover: false,//オンマウスでスライドを一時停止させるかどうか。初期値はtrue。
		pauseOnFocus: false,//フォーカスした際にスライドを一時停止させるかどうか。初期値はtrue。
		cssEase: 'linear',//動き方。初期値はeaseですが、スムースな動きで見せたいのでlinear
		slidesToShow: 4,//スライドを画面に4枚見せる
		slidesToScroll: 1,//1回のスライドで動かす要素数
		responsive: [
			{
			breakpoint: 769,//モニターの横幅が769px以下の見せ方
			settings: {
				slidesToShow: 2,//スライドを画面に2枚見せる
			}
		},
		{
			breakpoint: 426,//モニターの横幅が426px以下の見せ方
			settings: {
				slidesToShow: 1.5,//スライドを画面に1.5枚見せる
			}
		}
	]
	});

    $('.slider2').slick({
		autoplay: true,//自動的に動き出すか。初期値はfalse。
		infinite: true,//スライドをループさせるかどうか。初期値はtrue。
		slidesToShow: 3,//スライドを画面に3枚見せる
		slidesToScroll: 3,//1回のスクロールで3枚の写真を移動して見せる
		prevArrow: '<div class="slick-prev"></div>',//矢印部分PreviewのHTMLを変更
		nextArrow: '<div class="slick-next"></div>',//矢印部分NextのHTMLを変更
		dots: true,//下部ドットナビゲーションの表示
		responsive: [
			{
			breakpoint: 769,//モニターの横幅が769px以下の見せ方
			settings: {
				slidesToShow: 2,//スライドを画面に2枚見せる
				slidesToScroll: 2,//1回のスクロールで2枚の写真を移動して見せる
			}
		},
		{
			breakpoint: 426,//モニターの横幅が426px以下の見せ方
			settings: {
				slidesToShow: 1,//スライドを画面に1枚見せる
				slidesToScroll: 1,//1回のスクロールで1枚の写真を移動して見せる
			}
		}
	]
	});


    
});
