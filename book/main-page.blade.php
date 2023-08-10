<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Travelstory</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main-page.css')  }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
    <script src="{{ asset('js/animation.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">

</head>

<body>
    <button class="jump">Jump To Top </button>


    @include('book.header') <!--HEADER------------>

    <div class="main" >
        <div class="home-content">
            <img src="{{ asset('img/スクリーンショット 2023-07-20 13.13.35.png')}}">
            <h1>Travelstory</h1>
        </div>

        

        <div class="top-news-list-left">
            <div class="top-bnr-list-inner" style="height:370px;">
            <h2 class="top-sec-ttl-2 txt-c" style="border-bottom: solid 1px #aaa; padding-bottom: 15px; text-align:left;">News 最新ニュース</h2>
                <a href="#">
                    <div class="sub-feature-title-3" style="border-bottom: solid 1px #aaa;line-height: 1.5!important; padding:15px 5px;">
                        2023年2月22日<br>
                        【採用情報】私たちと一緒に働きませんか？											
                    </div>
                </a>
                <a href="#">
                    <div class="sub-feature-title-3" style="border-bottom: solid 1px #aaa;line-height: 1.5!important; padding:15px 5px;">
                        2023年4月28日<br>
                        2023年度　GW中の営業について											
                    </div>
                </a>
                    <a href="#">
                    <div class="sub-feature-title-3" style="border-bottom: solid 1px #aaa;line-height: 1.5!important; padding:15px 5px;">
                        2023年12月2日<br>
                        年末年始の営業について										
                    </div>
                </a>
                    <a href="#">
                    <div class="sub-feature-title-3" style="border-bottom: solid 1px #aaa;line-height: 1.5!important; padding:15px 5px;">
                        2024年6月10日<br>
                        台風の影響による、営業時間変更のお知らせ											
                    </div>
                </a>                         
            </div>
            <!--ここからボタンの記述-->
            <div class="newsbutton">
                <a href="#" class="ct-btn fw-b type-icon-anime" style="background-color:#214d80; color:#fff;">
                    <div class="icon"><span class="icon-arrow-r posi-center"></span></div>
                </a>
            </div>
            <!--ここまでボタンの記述-->

            <div class="top-news-list-right">
                <div class="top-bnr-list-inner-2">
                 <h2 class="top-sec-ttl-2 txt-c" style="border-bottom: solid 1px #aaa; padding-bottom: 15px; text-align:left;">Topics トピックス</h2>
                    <a href="#" target="_blank">
                        <div class="sub-feature-title-10" style=" padding:29px 5px;">
                           <div style="float: left; display: block;">
                            <img width="181" height="125" src="https://www.fivestar-club.jp/wordpress/wp-content/uploads/2023/05/JATA_Passport_02_580_400-e1684135406204.jpg" class="news-thumbnail-5 wp-post-image lazyloaded" alt="" data-src="https://www.fivestar-club.jp/wordpress/wp-content/uploads/2023/05/JATA_Passport_02_580_400-e1684135406204.jpg" decoding="async"><noscript><img width="181" height="125" src="https://www.fivestar-club.jp/wordpress/wp-content/uploads/2023/05/JATA_Passport_02_580_400-e1684135406204.jpg" class="news-thumbnail-5 wp-post-image" alt="" data-eio="l" /></noscript>															</div>
                               <div style="margin-left: 10px!important;">
                               2023年5月15日<br>
                                【今こそ海外へ！】パスポート取得費用サポートキャンペーン															</div>
                        </div>
                    </a>
                    <a href="#" target="_blank">
                        <div class="sub-feature-title-10" style=" padding:29px 5px;">
                                <div style="float: left; display: block;">
                                    <img width="188" height="125" src="https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396.jpg" class="news-thumbnail-5 wp-post-image lazyautosizes lazyloaded" alt="" data-src="https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396.jpg" decoding="async" data-srcset="https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396.jpg 800w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-300x200.jpg 300w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-768x512.jpg 768w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-182x121.jpg 182w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-480x320.jpg 480w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-640x426.jpg 640w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-600x400.jpg 600w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-750x500.jpg 750w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-450x300.jpg 450w" data-sizes="auto" sizes="150px" srcset="https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396.jpg 800w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-300x200.jpg 300w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-768x512.jpg 768w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-182x121.jpg 182w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-480x320.jpg 480w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-640x426.jpg 640w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-600x400.jpg 600w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-750x500.jpg 750w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-450x300.jpg 450w"><noscript><img width="188" height="125" src="https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396.jpg" class="news-thumbnail-5 wp-post-image" alt="" srcset="https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396.jpg 800w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-300x200.jpg 300w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-768x512.jpg 768w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-182x121.jpg 182w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-480x320.jpg 480w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-640x426.jpg 640w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-600x400.jpg 600w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-750x500.jpg 750w, https://www.fivestar-club.jp/wordpress/wp-content/uploads/2022/12/FSC160706_154396-450x300.jpg 450w" sizes="(max-width: 188px) 100vw, 188px" data-eio="l" /></noscript>															</div>
                                        <div style="margin-left: 10px!important;">
                                            2023年5月12日<br>
                                            【ついにきた！】4/29～海外旅行完全復活！															</div>
                        </div>
                    </a>
                            
                        
                                                            
                </div>
            </div>
        </div>
        


        <div class="experience">
            <h1>Reccomended Place</h1>
            <h2>スタッフのおすすめの場所を紹介</h2>
            <ul class="slider">
                <li>
                    <img src="{{ asset('img/publicdomainq-0067734znj.jpg')}}">
                    <h3>Spain</h3>
                    <p class="countryname">Barcelona</p>
                </li>
                <li>
                    <img src="{{ asset('img/florence-2147625_1280.jpg')}}">
                    <h3>Italy</h3>
                    <p class="countryname">Florence</p>
                </li>
                <li>
                    <img src="{{ asset('img/gahag-0007660474-1.jpg')}}">
                    <h3>France</h3>
                    <p class="countryname">Paris</p>
                </li>
                <li>
                    <img src="{{ asset('img/ofkph2024.jpg')}}">
                    <h3>Belgium</h3>
                    <p class="countryname">Brussels</p>
                </li>
                <li>
                    <img src="{{ asset('img/publicdomainq-0004525hgd.jpg')}}">
                    <h3>Finland</h3>
                    <p class="countryname">Rovaniemi</p>
                </li>
                <li>
                    <img src="{{ asset('img/publicdomainq-0067734znj.jpg')}}">
                    <h3>England</h3>
                    <p class="countryname">London</p>
                </li>
            </ul>
        </div><!--.experience------------>

        <div class="us">
            <div class="backus">
              <div class="image-container">
                <img src="{{ asset('img/publicdomainq-0000561maa.jpg') }}" alt="写真" class="image">
                <div class="text-overlay">
                  <h4>Who We Are</h4>
                  <p>当社トラベルストーリーは、世界中の旅行をより豊かで思い出に残るものにするために、高品質な旅行体験を提供しています。<br>

                    <br>当社は、旅行者が心から楽しめる旅行体験を提供することです。<br>私たちはお客様のニーズや予算に合わせた多様な旅行プランを提供し、<br>高い品質と信頼性を追求しています。<br><br>また、当社の専門的な旅行アドバイザーがお客様の旅行計画をサポートし、<br>最高の旅行体験を実現します。<br><br>
                    
                    <br>私たちはお客様の安全と満足を最優先に考えています。<br>旅行先での安全性や快適性に配慮します。<br>また、お客様の声に真摯に耳を傾けサービスの向上に努めています。<br><br>
                    
                    旅行は人生における貴重な体験です。<br>トラベルストーリはお客様にとって特別な旅行の物語を作り出し、<br>一生の思い出となるような旅行体験を提供します。<br>私たちと一緒に新たな旅のストーリーを紡いでみませんか？<br><br>
                    
                    トラベルストーリはあなたの旅行のパートナーとして、素晴らしい旅行体験をお届けいたします。どうぞお気軽にご相談ください。</p>
                </div>
              </div>
            </div>
          </div>
          
          



    </div> <!--.main------------>

    @include('book.footer') <!--FOOTER------------>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<!--自作のJS-->
<script src="public/js/animation.js"></script>


</body>
</html>