<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="keywords" content="Выпускник, Vipusknik, абитуриент, колледж, вуз, университет, Казахстан">
        <meta name="description" content="Выпускник - информационно-обучающий портал для абитуриентов Казахстана.
            У нас Вы сможете посмотреть информацию о всех высших и средне-специальных учебных заведениях страны, узнать о
            специальностях и профессиях, подготовится к ЕНТ, быть в курсе новостей мира образования и много другое.">

        <title>
            @yield('title') | {{ Config::get('app.name') }}
        </title>

        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/remodal.css">
        <link rel="stylesheet" href="/css/remodal-default-theme.css">
        <link rel="stylesheet" href="/css/feedback.css">
        <link rel="shortcut icon" href="/img/vipusknik_32x32.ico">
        <link href="https://fonts.googleapis.com/css?family=Anonymous+Pro|Comfortaa|Gabriela" rel="stylesheet">
        <link rel="stylesheet" href="/css/semantic.css">

        @yield ('styles')

    </head>
    <body>
        <div id="header">
            <div id="wrapper">
                <div id="menu">
                    <a href="{{ url('/') }}">
                        <div class="menu_item" style="padding-bottom: 2px;">
                            <img src='/img/vipusknik_logo.png'
                                 alt = "Выпускник"
                                 style="width: 180px; margin-top: -12px;">
                        </div>
                    </a>
                    <a href="{{ route('institutions.index', 'universities') }}">
                        <div class="menu_item">Университеты</div>
                    </a>
                    <a href="{{ route('institutions.index', 'colleges') }}">
                        <div class="menu_item">Колледжи</div>
                    </a>
                    <a href="{{ url('/specialties') }}">
                        <div class="menu_item">Специальности</div>
                    </a>
                    <a href="{{ url('/ent') }}">
                        <div class="menu_item">ЕНТ</div>
                    </a>
                </div>
                <div id="register1">
                    <h1 style="margin: 5px; margin-left: 18px; color: white; font-weight: 200;">Выпускник 2017</h1>
                </div>
            </div>
        </div>
        <div id="main_body">
            <div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                <div class="remodalBorder">
                    <p><img src="/img/vipusknik_logo.png" height="30"></p>
                    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                    <form id="feedback-form">
                        <h2 id="modal1Title">Если вы хотите разместить рекламу или нашли ошибку на сайте заполните форму внизу</h2>
                        <input type="text"
                               class="putName form-field"
                               name="sender_name"
                               id="sender_name"
                               placeholder="Ваше имя"
                               required>

                        <input name="sender_mail_or_phone"
                               id="sender_mail_or_phone"
                               type="tel"
                               class="putPhone form-field"
                               placeholder="Email или номер телефона"
                               required>

                        <textarea rows="10"
                                  cols="46"
                                  name="body"
                                  id="body"
                                  class="form-field"
                                  placeholder="Опишите цель запроса"
                                  required></textarea>

                        <button name="submit" class="btn" onclick="event.preventDefault(); sendFeedback();">ОТПРАВИТЬ</button>
                    </form>
                </div>
            </div>
            @yield('content')
        </div>
        <div id="footer">
            <div id="wrapper2">
                <div id="feedback">
                    <p>Воспользуйтесь <a href="#modal">обратной связью</a> или напишите нам:</p>
                    <p>vipusknik.kz@gmail.com</p>
                    <hr size="1" color="#ff831f">
                    <hr size="1" color="#ff5500">
                    <hr size="1" color="#ffb47a">
                    <a href="/">На Главную</a>
                </div>
                <div id ="snet" style="background-color: #194f67;"></div>
                <div id="last" style="background-color: #194f67;">
                    <p>Все логотипы и торговые марки на сайте являются собственностью их владельцев.</p>
                    <p>Все права защищены © ИПФ "Артекс" 2017 г.</p>
                    <h4>Выпускник - информационно-обучающий портал для абитуриентов.</h4>
                    <a href="{{ route('home') }}">
                        <img src='/img/vipusknik_logo1.png' alt="Выпускник" style="width: 180px;">
                    </a>
                </div>
            </div>
        </div>
    </body>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter44736745 = new Ya.Metrika({
                        id:44736745,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/44736745" style="position:absolute; left:-9999px;" alt=""></div>
    </noscript>

    <!-- /Yandex.Metrika counter -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="/js/remodal.min.js"></script>
    <script src="/js/feedback.js"></script>
    @yield('script')
</html>
