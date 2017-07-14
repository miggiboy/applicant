@extends ('layouts.base')

@section ('title')
    {{ translate($institutionType, 'i', 'p', true) }}
@endsection

@section ('styles')
  <link rel="stylesheet" href="/css/blueberry.css">
  <style>
      .lul {
        width:290px;
      }
      .lol {
        margin: 0px 8px;
      }
      .ui .selection .dropdown > .dropdown .icon {
        margin-top: -5px;
      }
      .ui.compact .selection .dropdown .lol {
        padding-top: 14px !important;
      }
      .ui .multiple .search .dropdown > .text {
        margin: 0px !important;
      }
  </style>
@endsection
@section('content')
<div id="choose">
    <div class="korpus">
        @if (Request::path() == 'vuz'|| Request::path() == 'vuzy_search')
            <input type="radio" name="odin" checked="checked" id="vkl1">
            <label for="vkl1">
                <a href="{{ url('/vuz') }}" style="text-decoration: none; color: inherit;">Выбрать ВУЗ</a>
            </label>

            <input type="radio" name="odin" id="vkl2">
            <label for="vkl2">
                <a href="{{ url('/college') }}" style="text-decoration: none; color: inherit;">Выбрать колледж</a>
            </label>

        @elseif (Request::path() == 'college'|| Request::path() == 'colleges/search')
            <input type="radio" name="odin"  id="vkl1">
            <label for="vkl1">
                <a href="{{ url('/vuz') }}" style="text-decoration: none; color: inherit;">Выбрать ВУЗ</a>
            </label>
            <input type="radio" checked="checked" name="odin" id="vkl2">
            <label for="vkl2">
                <a href="{{ url('/college') }}" style="text-decoration: none; color: inherit;">Выбрать колледж</a>
            </label>
        @endif
        <div>
            Высшее учебное заведение — учебное заведение, дающее высшее </br>профессиональное образование и осуществляющее научную деятельность.
        </div>
        <div>
            Колледж является образовательным учреждением среднего </br>профессионального образования.
        </div>
    </div>
</div>
<!--         <div id="do_ent">
    <H2>ЕНТ началось!</h2>
        <hr size="1" color="#ff831f">
        <hr size="1" color="#ff5500">
        <hr size="1" color="#ffb47a">
    <div id ="links">
     <a href="/articles/kak-podgotovitsya-k-ekzamenam">Подготовиться к экзаменам</a><br>
            <a href="/testent">Сдать пробное тестирование</a><br>
            <a href="/ent">Посмотреть доп. материалы</a>
    </div>
    </div> -->
<br>
<div class="ui very padded teal segment custom" style="width: 721px;margin-top: 80px;">
    @if (Request::path() == 'vuz'|| Request::path() == 'vuzy_search')
    <form id="poi" class="ui small form" action="{{ route('vuzy_search') }}" method="GET">
    @elseif (Request::path() == 'college'|| Request::path() == 'colleges/search')
    <form id="poi" class="ui small form" action="{{ route('colleges.search') }}" method="GET">
        @endif
        <div style="height: 61px;">
            <div class="ui search {{ Request::path() }}">
                <div class="ui input">
                    <input type="text" name = "query" class="prompt" placeholder="Название учебного заведения..." style="margin-bottom: 10px; width: 635px;height: 43px;">
                </div>
            </div>
            <select class="ui search dropdown lul" id="select" name="specialty"  style="width: 306px;">
                <option value=" " selected="selected">Все специальности</option>
                @foreach ($specialties as $specialty)
                <option value="{{ $specialty->id }}">
                    {{ $specialty->title }}
                    <p style="color:#888;">({{ $specialty->code }})</p>
                </option>
                @endforeach
            </select>
            <select class="ui search dropdown lol" id="select" name="city" style="width: 160px;">
                <option value=" " selected="selected">Все города</option>
                @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->title }}</option>
                @endforeach
            </select>
            <input type="submit" form="poi" class="ui button" style="left: 0px;height: 43px;background: #ff8a21;color: white;width:165px;" value="Поиск">
        </div>
    </form>
    <br>
    <!--a href="javascript:PopUpShow()">Найти учебное заведение по специальности</a-->
    <br>
    @if (count($institutions))
    <div class="ui large celled very relaxed selection list" >
        @foreach ($institutions as $institution)
            @if (Request::path() == 'vuz' || Request::path() == 'vuzy_search')
                @if (!file_exists(public_path('/img/logo/u' . $institution->id . '.png')))
                    <div class="university item" style="cursor: default;">
                        <div class="content">
                            <a  href="{{ route('vuz_profile', $institution) }}">
                                <i class="teal university icon"></i> {{ $institution->title }}
                            </a>
                            <br>
                            <br>
                            Город: {{ $institution->city->title }}
                        </div>
                    </div>
                @else
                    <div class="university item" style="cursor: default;">
                        <div class="content">
                            <img src="/img/logo/u{{$institution->id}}.png" style="width:50px;height:50px;float:left;position:relative;">
                            <div style="margin-top:9px; width:635px;"><a  href="{{ route('vuz_profile', $institution) }}">
                                {{ $institution->title }}
                                </a><br>
                                Город: {{ $institution->city->title }}
                            </div>
                        </div>
                    </div>
                @endif
                    @elseif (Request::path() == 'college' || Request::path() == 'colleges/search')
                    @if (!file_exists(public_path('/img/logo/c' . $institution->id . '.png')))
                    <div class="university item" style="cursor: default;">
                        <div class="content">
                            <a  href="{{ route('college_profile', $institution) }}">
                            <i class="teal university icon"></i>{{ $institution->title }}
                            </a><br><br>
                            Город: {{ $institution->city->title }}
                        </div>
                    </div>
                    @else
                    <div class="university item" style="cursor: default;">
                        <div class="content">
                            <img src="/img/logo/c{{$institution->id}}.png" style="width:50px;height:50px;float:left;position:relative;">
                            <div style="margin-top:9px; width:635px;"><a  href="{{ route('college_profile', $institution) }}">
                                {{ $institution->title }}
                                </a><br>
                                Город: {{ $institution->city->title }}
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        @endforeach
    </div>
    @endif
    <br>
</div>
<div id ="top5">
    @if (Request::path() == 'vuz'|| Request::path() == 'vuzy_search')
    <H2>Топ ВУЗы 2017</h2>
    @elseif (Request::path() == 'college'|| Request::path() == 'colleges/search')
    <H2>Топ колледжи 2017</h2>
    @endif
    <hr size="1" color="#ff831f">
    <hr size="1" color="#ff5500">
    <hr size="1" color="#ffb47a">
    <div id="top_slider">
        <div class="blueberry">
            <ul class="slides">
                @if (Request::path() == 'vuz'|| Request::path() == 'vuzy_search')
                <li><img style="width: 150px;margin:auto;margin-bottom: -30px;" src="/img/iitu_logo.png" alt="Выбрать ВУЗ"><br>Международный Университет Информационных Технологий</li>
                <li><img style="width: 150px;margin:auto;margin-bottom: -30px;" src="/img/iitu_logo.png" alt="Университет"><br>Международный Университет Информационных Технологий</li>
                <li><img style="width: 150px;margin:auto;margin-bottom: -30px;" src="/img/iitu_logo.png" alt="Высшее учебное заведение"><br>Международный Университет Информационных Технологий</li>
                <li><img style="width: 150px;margin:auto;margin-bottom: -30px;" src="/img/iitu_logo.png" alt="ВУЗ"><br>Международный Университет Информационных Технологий</li>
                @elseif (Request::path() == 'college'|| Request::path() == 'colleges/search')
                <li><img style="width: 150px;margin:auto;margin-bottom: -30px;" src="/img/iitu_logo.png" alt="Выбрать колледж"><br>Колледж Информационных Технологий</li>
                <li><img style="width: 150px;margin:auto;margin-bottom: -30px;" src="/img/iitu_logo.png" alt="Колледж Казахстан"><br>Колледж Информационных Технологий</li>
                <li><img style="width: 150px;margin:auto;margin-bottom: -30px;" src="/img/iitu_logo.png" alt="Колледж Алматы"><br>Колледж Информационных Технологий</li>
                <li><img style="width: 150px;margin:auto;margin-bottom: -30px;" src="/img/iitu_logo.png" alt="Колледж"><br>Колледж Информационных Технологий</li>
                @endif
            </ul>
        </div>
    </div>
</div>
<div style="width:720px;">
    {{ $institutions->appends(request()
    ->except('page', '_token'))
    ->links('vendor.pagination.default')
    }}
</div>
<br><br>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $(".poisk_item ul").hide();
        $(".poisk_item ul li:odd").css("background-color", "#efefef");
        $(".poisk_item p span").click(function(){
            $(this).parent().next().slideToggle();
        });
    });
</script>
<script src="/jquery.blueberry.js"></script>
<script>
    $(window).load(function() {
        $('.blueberry').blueberry();
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
<script>
    <script src="/js/app.js">
</script>
</script>
<script>
    $('.ui.search.vuz').search({
        apiSettings: {
            url: "//vipusknik.kz/universities/autocomplete/search?query={query}"
        },
       fields: {
            results     : 'universities',
            title       : 'name',
            description : 'acronym',
            url         : 'url'
        },
        error : {
          noResults   : 'Поиск не дал результатов',
          serverError : 'Произошла ошибка при поиске...',
        },
        minCharacters : 2
    });

</script>
<script>
    $('.ui.search.college').search({
        apiSettings: {
            url: "//vipusknik.kz/colleges/autocomplete/search?query={query}"
        },
       fields: {
            results     : 'colleges',
            title       : 'name',
            description : 'acronym',
            url         : 'url'
        },
        error : {
          noResults   : 'Поиск не дал результатов',
          serverError : 'Произошла ошибка при поиске...',
        },
        minCharacters : 2
    });

</script>
<script>
    $(document).ready(function(){
        PopUpHide();
    });
    function PopUpShow(){
        $("#popup1").show();
    }
    function PopUpHide(){
        $("#popup1").hide();
    }
</script>
<script>
    $('.ui.dropdown').dropdown({
        fullTextSearch: true
    });
</script>
@endsection
