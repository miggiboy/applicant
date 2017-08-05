@extends ('layouts.base')

@section ('title', 'Портал для абитуриентов')

@section ('styles')
    <link rel="stylesheet" href="/css/blueberry.css">
    <script src="sweetalert-master/dist/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css">
@endsection

@section ('content')
<div id="vyberi_v">
    <!--<img src="girl.jpg" alt="Выбрать ВУЗ">-->
    <a href="{{ route('institutions.index', 'universities') }}" style="text-decoration:none;">
        <div class="button" style="width: 171px;left:272px;">
            <p>Выбрать ВУЗ</p>
        </div>
    </a>
    <a href="{{ route('institutions.index', 'colleges') }}">
        <div class="button" style="width: 171px;left:272px;">
            <p>Выбрать колледж</p>
        </div>
    </a>
</div>
<div id="do_ent">
    <H2>ЕНТ началось!</h2>
    <hr size="1" color="#ff831f">
    <hr size="1" color="#ff5500">
    <hr size="1" color="#ffb47a">
    <div id ="links">
        <a href="/articles/kak-podgotovitsya-k-ekzamenam">Подготовиться к экзаменам</a><br>
        <a href="/testent">Сдать пробное тестирование</a><br>
        <a href="/ent">Посмотреть доп. материалы</a>
    </div>
</div>
<div id="Micons">
    <a href="{{ route('institutions.index', 'universities') }}">
        <div class="Micon_block">
            <div class="Micon">
                <div class="Micon_img">
                    <i class="university icon" style="color: #194f67;"></i>
                </div>
            </div>
            <H3>Учебные заведения</H3>
        </div>
    </a>
    <a href="{{ url('/specialty-directions') }}">
        <div class="Micon_block">
            <div class="Micon">
                <div class="Micon_img">
                    <i class="student icon" style="color: #194f67;"></i>
                </div>
            </div>
            <H3>Специальности</H3>
        </div>
    </a>
    <a href="{{ url('/professions/categories') }}">
        <div class="Micon_block">
            <div class="Micon">
                <div class="Micon_img">
                    <i class="travel brush icon" style="color: #194f67;"></i>
                </div>
            </div>
            <H3>Профессии</H3>
        </div>
    </a>
</div>
<div id="advert">
    <div class="blueberry">
        <ul class="slides">
            <li><a href ="http://iitu.kz" target="_blank"><img src="/img/r1.png" alt="МУИТ"></a></li>
            <li><a href ="http://kuwc.kz/" target="_blank"><img src="/img/r2.png" alt="Вузы"></a></li>
            <li><a href ="http://iitu.kz" target="_blank"><img src="/img/r1.png" alt="Международный IT университет"></a></li>
            <li><a href ="http://kuwc.kz/" target="_blank"><img src="/img/r2.png" alt="Университет"></a></li>
        </ul>
    </div>
</div>
<div id = "content_menu">
    <div class="content"  style="width:130px;">
        <h4>
            СПЕЦИАЛЬНОСТИ
        </h4>
        <hr size="1" color="#ff831f">
        <hr size="1" color="#ff5500">
        <hr size="1" color="#ffb47a">
        <div class="content_item">
            <a href="{{ route('specialties.index', 'obrazovanie') }}">
                <p style="margin:0px;"><i class="student icon" style="color: #565554;"></i>Педагогические</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('specialties.index', 'meditsina') }}">
                <p style="margin:0px;"><i class="first aid icon" style="color: #565554;"></i>Медицинские</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('specialties.index', 'tekhnicheskie-nauki-i-tekhnologii') }}">
                <p style="margin:0px;"><i class="settings icon" style="color: #565554;"></i>Технические</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('specialties.index', 'pravo') }}">
                <p style="margin:0px;"><i class="legal icon" style="color: #565554;"></i>Юридические</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('specialties.index', 'iskusstvo') }}">
                <p style="margin:0px;"><i class="paint brush icon" style="color: #565554;"></i>Творческие</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('specialties.index', 'estestvennye-nauki') }}">
                <p style="margin:0px;"><i class="world icon" style="color: #565554;"></i>Естественные</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('specialties.index', 'gumanitarnye-nauki') }}">
                <p style="margin:0px;"><i class="book icon" style="color: #565554;"></i>Гуманитарные</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('specialties.index', 'voennoe-delo-i-bezopasnost') }}">
                <p style="margin:0px;"><i class="military icon" style="color: #565554;"></i>Военные</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('specialties.index', 'selskokhozyaystvennye-nauki') }}">
                <p style="margin:0px;"><i class="tree icon" style="color: #565554;"></i>Аграрные</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('specialties.index', 'sotsialnye-nauki-ekonomika-i-biznes') }}">
                <p style="margin:0px;"><i class="bar chart icon" style="color: #565554;"></i>Экономические</p>
            </a>
        </div>
    </div>
    <div class="content"  style="width:270px;">
        <h4>
            ВЫБОР ПРОФЕССИИ
        </h4>
        <hr size="1" color="#ff831f">
        <hr size="1" color="#ff5500">
        <hr size="1" color="#ffb47a">
        <div class="content_item">
            <a href="{{ route('professions.lists.show', 'wellpaidkz') }}">
                <p style="margin:0px;"><i class="money icon" style="color: #565554;"></i>Высокооплачиваемые в KZ</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('professions.lists.show', 'mostwantedkz') }}">
                <p style="margin:0px;"><i class="line chart icon" style="color: #565554;"></i>Востребованные в KZ</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('professions.lists.show', 'wellpaidworld') }}">
                <p style="margin:0px;"><i class="dollar icon" style="color: #565554;"></i>Высокооплачиваемые в мире</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('professions.lists.show', 'mostwantedworld') }}">
                <p style="margin:0px;"><i class="world icon" style="color: #565554;"></i>Востребованные в мире</p>
            </a>
        </div>
        <h4>
            ДЛЯ ПОСТУПАЮЩИХ
        </h4>
        <hr size="1" color="#ff831f">
        <hr size="1" color="#ff5500">
        <hr size="1" color="#ffb47a">
        <div class="content_item">
            <a href="/articles/kak-postupit-v-vuz-v-kazakhstane">
                <p style="margin:0px;"><i class="ellipsis vertical icon" style="color: #565554;"></i>Правила поступления</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('articles.custom.show', 'kak-poluchit-grant') }}">
                <p style="margin:0px;"><i class="trophy icon" style="color: #565554;"></i>Как получить грант?</p>
            </a>
        </div>
        <div class="content_item">
            <a href="/articles/kto-takie-magistr-i-bakalavr">
                <p style="margin:0px;"><i class="help icon" style="color: #565554;"></i>Кто такие магистр и бакалавр?</p>
            </a>
        </div>
        <div class="content_item">
            <a href="">
                <p style="margin:0px;"><i class="cubes icon" style="color: #565554;"></i>Что сдать для моей специальности?</p>
            </a>
        </div>
    </div>
    <div class="content"  style="width:230px;">
        <h4>
            ПРЕДМЕТЫ ЕНТ
        </h4>
        <hr size="1" color="#ff831f">
        <hr size="1" color="#ff5500">
        <hr size="1" color="#ffb47a">
        <div class="content_item">
            <a class="popup">
                <p style="margin:0px;"><i class="student icon" style="color: #565554;"></i>Обязательные предметы</p>
            </a>
        </div>
        <div class="content_item">
            <a class="popup1">
                <p style="margin:0px;"><i class="book icon" style="color: #565554;"></i>Язык обучения и литература</p>
            </a>
        </div>
        <div class="content_item">
            <a class="popup2">
                <p style="margin:0px;"><i class="talk outline icon" style="color: #565554;"></i>Иностранные языки</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('subjects.show', 'mathematics') }}">
                <p style="margin:0px;"><i class="superscript icon" style="color: #565554;"></i>Математика</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('subjects.show', 'geography') }}">
                <p style="margin:0px;"><i class="world icon" style="color: #565554;"></i>География</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('subjects.show', 'world-history') }}">
                <p style="margin:0px;"><i class="university icon" style="color: #565554;"></i>Всемирная История</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('subjects.show', 'person-society-right') }}">
                <p style="margin:0px;"><i class="law icon" style="color: #565554;"></i>Человек. Общество. Право</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('subjects.show', 'chemistry') }}">
                <p style="margin:0px;"><i class="lab icon" style="color: #565554;"></i>Химия</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('subjects.show', 'biology') }}">
                <p style="margin:0px;"><i class="leaf icon" style="color: #565554;"></i>Биология</p>
            </a>
        </div>
        <div class="content_item">
            <a href="{{ route('subjects.show', 'physics') }}">
                <p style="margin:0px;"><i class="setting icon" style="color: #565554;"></i>Физика</p>
            </a>
        </div>
    </div>
</div>

<div id="article">
    <H2>Путеводитель в мир образования</H2>
    <p><img src="/img/01.jpg" style="margin: 10px 10px 10px 0;width: 100%; max-width: 330px;float: left;" alt = "Кем стать">Извечный вопрос: кем я хочу быть?! Как выбрать ту самую, именно Вам подходящую профессию (специальность)? Как выбрать именно Вам подходящий вуз или колледж? Каждый старшеклассник вместе со своими родителями задается этими  вопросами хотя бы раз в жизни.
        Сегодня на нас льются огромные потоки информации из всевозможных источников. Исключением не является и информация об учебных заведениях. Выбрать один достоверный и удобный специализированный источник порой очень сложно. Поэтому наша команда, которая на протяжении 18-ти лет выпускает бумажную версию справочника для выпускников «АБИТУРИЕНТ», создала данный проект в помощь школьникам и их родителям. Мы объединили на одном ресурсе ВСЕ образовательные организации Казахстана. За Вами только выбор!
    </p>
    <a href ="http://www.kkn.kz/"  target="_blank"><img src="/img/b2.gif" width='675'></a>
    <h2>Выбираю Казахстан!</h2>
    <p>Ни для кого не секрет, что в настоящее время существует большой отток казахстанских выпускников в российские и европейские вузы. Причины тому разные, но мы нацелены на аудиторию будущих казахстанских студентов. Мы выступаем в поддержку учебных заведений Казахстана.
        Сегодня рынок труда в республике испытывает существенный дефицит квалифицированных кадров. В наше динамичное время, когда экономика и промышленность оснащены новейшими технологиями почти во всех сферах, мы получили огромное количество новых современных профессий, но недостаточно дипломированных специалистов. Также по-прежнему существует острая нехватка в инженерно-техническом составе, в добывающей и нефтегазовой отрасли, нужны пилоты и бортинженеры, врачи, педагоги и др.
    </p>
    <h2>Зачем нужно образование?</h2>
    <p>
        Современная молодежь понимает: если хочешь получить хорошую работу, быть востребованным, иметь возможность строить карьеру на родине, открыть свое дело, то для этого необходимо учиться. Тем более что в Казахстане есть достаточно вузов и колледжей, вполне способных удовлетворить потребности рынка. Иногда жизнь диктует необходимость повышения квалификации или приобретения новых (смежных) специальностей. Здесь в помощь снова придет наш сайт.
        Не поддавайтесь веяниям «модных профессий» - мало востребованных из-за переизбытка готовых кадров. Прислушайтесь к тому, чего Вы по-настоящему хотите, и есть ли у Вас на это силы и возможности. Для выпускников вузов и колледжей наступило благодатное время. Многие отечественные компании стали всерьез задумываться о кадровом резерве, о молодом потенциале, в который они готовы вкладывать, инвестировать и дальше его развивать. За перспективных выпускников сейчас на рынке существует реальная борьба. От студентов лишь требуется учиться тому, к чему лежит сердце и душа, и учиться хорошо. А самое главное – работать над саморазвитием, то есть стремиться быть лучшим в своей области.
    </p>
    <b>Удачи Вам! У Вас все получится! </b>
</div>
<div id="news">
    <div class="title">
        <p>НОВОСТИ</p>
    </div>
    <hr size="1" color="#ff831f">
    <hr size="1" color="#ff5500">
    <hr size="1" color="#ffb47a">
    <br>
    @if (count($articles))
    <div class="ui large celled very relaxed list">
        @foreach ($articles as $article)
        <div class="university item" style="cursor: default;">
            <div class="content">
                <a class="header" href="{{route('articles.show', $article)}}">
                {{ $article->title }}
                </a><br>
                {{ $article->short_description }}
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
<div id = "fooban">
    <a href="http://www.sgrk.kz/" target="_blank">
    <img src="/img/b1.png">
    </a>
</div>
@endsection
@section('script')
<script src="jquery.blueberry.js"></script>
<script>
    $(window).load(function() {
        $('.blueberry').blueberry();
    });
    document.querySelector('.popup').onclick = function(){
    swal({
    title: "Выберите обязательный предмет",
    text: `
        <a href='/subjects/history'>
            <img src='/img/subjects/history.png' style='margin: 0px 10px;' alt ='ЕНТ обязательные предметы'>
        </a>
        <a href='/subjects/mathematical-literacy'>
            <img src='/img/subjects/mathematical-literacy.png'  style='margin: 0px 10px;' alt ='ЕНТ обязательные предметы'>
        </a>
        <a href='/subjects/grammar-reading'>
            <img src='/img/subjects/grammar-reading.png'  style='margin: 0px 10px;' alt ='ЕНТ обязательные предметы'>
        </a>
    `,
    html: true,
    confirmButtonText: "Назад"
    });
    };
    document.querySelector('.popup1').onclick = function(){
    swal({
    title: "Язык обучения и литература",
    text: `
        </a><a href='/subjects/kazakh-language-and-literature'>
            <img src='/img/subjects/kazakh-language-and-literature.png' alt ='ЕНТ язык обучения'  style='margin: 0px 10px;'>
        </a>
        <a href='/subjects/russian-language-and-literature'>
            <img src='/img/subjects/russian-language-and-literature.png'  style='margin: 0px 10px;' alt ='ЕНТ язык обучения'>
        </a>
    `,
    html: true,
    confirmButtonText: "Назад"
    });
    };
    document.querySelector('.popup2').onclick = function(){
    swal({
    title: "Иностранные языки",
    text: `
        <a href='/subjects/english'>
            <img src='/img/subjects/english.png' style='margin: 0px 10px;' alt ='ЕНТ Английский язык'>
        </a>
        <a href='/subjects/german'>
            <img src='/img/subjects/german.png'  style='margin: 0px 10px;' alt ='Единое национальное тестирование немецкий язык'>
        </a>
        <a href='/subjects/french'>
            <img src='/img/subjects/french.png'  style='margin: 0px 10px;' alt ='ЕНТ Французский язык'>
        </a>
    `,
    html: true,
    confirmButtonText: "Назад"
    });
    };
</script>
@endsection
