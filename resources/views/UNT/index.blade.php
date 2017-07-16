@extends ('layouts.base')

@section ('title', 'Тесты ЕНТ')

@section ('styles')
  <link type='text/css' rel='stylesheet' href='/css/liquidcarousel.css'>
@endsection

@section('content')
<div id="subject">
    <h1>Подготовка к ЕНТ</h1>
    <hr size="1" color="#ff831f">
    <hr size="1" color="#ff5500">
    <hr size="1" color="#ffb47a">
    <p>Чтобы найти дополнительные материалы выбирите один из предметов внизу.</p>
    <div style="width:980px;height:153px;">
        <div id="liquid1" class="liquid">
            <span class="previous"><i class="chevron left icon"></i></span>
            <div class="wrapper">
                <ul>
                    @foreach ($subjects as $subject)
                        @if (file_exists($path = "img/subjects/{$subject->slug}.png"))
                            <li>
                              <a href="{{ route('subjects.show', $subject) }}" title="{{ $subject->title }}">
                                <img src="{{ $path }}" width="88" height="126" alt="{{ $subject->slug }}" border="0">
                              </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <span class="next"><i class="chevron right icon"></i></span>
        </div>
    </div>
    <H2>
        Пробное ЕНТ online тестирование
    </H2>
    <P>
        Запущена процедура прохождения пробного online тестирования по предметам нового формата проведения единого национального тестирования (ЕНТ) 2017 года.<br>
        <B>Тестирование будет проводиться  в пределах следующих предметов:</B><br>
        1 блок:<br>
        &nbsp; &nbsp; 1.     Математическая грамотность – 20 заданий<br>
        &nbsp; &nbsp; 2.     Грамотность чтения – 20 заданий<br>
        &nbsp; &nbsp; 3.     История Казахстана – 20 заданий<br>
        2 блок:<br>
        &nbsp; &nbsp;4. Профильный предмет 1 – 30 заданий<br>
        &nbsp; &nbsp;5. Профильный предмет 2 – 30 заданий<br><br>
        При проведении пробного тестирования ученик имеет возможность ознакомиться с тестовыми заданиями, используемыми на ЕНТ и проверить уровень своих знаний по выбранным предметам.<br>
        В соответствие с утвержденным Прейскурантом цен на дополнительные услуги при проведении тестового контроля уровня знаний в организациях образования Республики Казахстан, стоимость пробного online тестирования составляет 260 тенге.<br>
        <br>Оплата за тестирование осуществляется через АО «Народный банк Казахстана» или отделения АО «Казпочта» по следующим реквизитам:<br>
        РГКП «Национальный центр тестирования» МОН РК<br>
        010011 г. Астана, пр. Победы, 60<br>
        РНН 600300086081<br>
        БИН 000140001853<br>
        ИИК KZ536010111000001515<br>
        БИК HSBKKZKX<br>
        КБЕ 16<br>
        АО «Народный банк Казахстана<br>
        В квитанциях необходимо указать – «Оплата за онлайн пробное тестирование».<br>
        После оплаты квитанции сдаются в филиалы НЦТ. Сотрудниками филиалов осуществляется регистрация желающих пройти пробное онлайн тестирование и выдача паролей.<br>
        Филиалы НЦТ располагаются во всех областных и в большинстве районных центрах республики. Список филиалов с указанием адресов представлен на сайте НЦТ. <br>
        Оплата за пробное онлайн-тестирование осуществляется также через терминалы «Касса 24».<br>
        <br>
        <b>Оплату можно произвести  по следующей инструкции:</b><br>
    <ul>
        <li>В терминале выберите пункт меню «Услуги образования»</li>
        <li>Выберите из списка «Национальный центр тестирования»</li>
        <li>Выберите вид тестирования</li>
        <li>Введите e-mail (на который придет логин и  пароль)</li>
        <li>Введите количество попыток</li>
        <li>Подтвердите правильность ввода</li>
        <li>Внесите оплату</li>
        <li>Получив пароль для доступа, ученик может проверить свои знания на любом компьютере имеющего выход в интернет.</li>
    </ul>
    </P><br><br>
    <a href="/testent" style="text-decoration:none;"><button class="ui orange button">Сдать пробное онлайн тестирование.</button></a>
    <br><br><br>
</div>
@endsection
@section('script')
<script type="text/javascript" src="js/jquery.liquidcarousel.pack.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#liquid1').liquidcarousel({height:129, duration:100, hidearrows:false});
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
<script>
    $('.selection.dropdown').dropdown();
</script>
@endsection
