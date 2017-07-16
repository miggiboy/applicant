@extends ('layouts.base')

@section ('title', 'Специальности технические')

@section('content')
	<div id="subpage">
    <h1>Спецальности Высшего и Средне-специального Образования</h1>
    <p>Выберите интересующее вас направление</p>
    <hr size="1" color="#ff831f">
      <hr size="1" color="#ff5500">
      <hr size="1" color="#ffb47a">

    <div class="ui grid" style="margin-top: 15px;">
      <div class="one wide column"></div>
      <div class="six wide column">
        <a href="{{ route('specialties.index', 'energetika') }}"><H3><i class="student icon"></i>Энергетика</H3></a>
        <p> Весь развивающийся мир и технологии зависят от энергии. Важно уметь обращаться с энергией и првильно вырабатывть самые разные ее виды.</p>
      </div>
      <div class="two wide column"></div>
      <div class="six wide column">
        <a href="{{ route('specialties.index', 'metallurgiya-i-mashinostroenie') }}"><H3><i class="users icon"></i> Металлургия и машностроение</H3></a>
        <p>Недра нашей планеты богаты металлом, но как правильно его добывать, обрабатывать и использовать? Ответьте на эти и другие вопросы выбрав одну из специальностей в данном разделе</p>
      </div>
      <div class="one wide column"></div>

    </div>
    <div class="ui grid" style="margin-top: 15px;">
      <div class="one wide column"></div>
      <div class="six wide column">
        <a href="{{ route('specialties.index', 'transport') }}"><H3><i class="student icon"></i>Транспорт</H3></a>
        <p>Хотите научиться делать машины и самолеты? Тогда смело заходите в данный раздел</p>
      </div>
      <div class="two wide column"></div>
      <div class="six wide column">
        <a href="{{ route('specialties.index', 'proizvodstvo-montazh-ekspluatatsiya-i-remont-transporta') }}"><H3><i class="users icon"></i> Производство, монтаж, эксплуатация и ремонт транспорта</H3></a>
        <p>Любите работать руками? Станьте ведущим работником производства или монтажником, получив навыки одной из этих специальностей.
        </p>
      </div>
      <div class="one wide column"></div>

    </div>
     <div class="ui grid" style="margin-top: 15px;">
      <div class="one wide column"></div>
      <div class="six wide column">
        <a href="{{ route('specialties.index', 'svyaz-telekommunikatsii-i-informatsionnye-tekhnologii-elektronnaya-tekhnika') }}"><H3><i class="student icon"></i>Связь, Телекоммуникации и Информационные Технологии</H3></a>
        <p> Совремнный мир диктует свои правила. Нужно всгда быть онлайн и в курсе событий. Вы можете помочь людям в этом, отучившись на одной из этих специальностей и став профи в своем деле.</p>
      </div>
      <div class="two wide column"></div>
      <div class="six wide column">
        <a href="{{ route('specialties.index', 'stroitelstvo-i-kommunalnoe-khozyaystvo-college') }}"><H3><i class="users icon"></i> Строительство и коммунальное хозяйство</H3></a>
        <p>Строители делают все, чтобы нам было тепло, сухо и уютно в наших домах. Хотите пополнить их ряды?
        </p>
      </div>
      <div class="one wide column"></div>

    </div>

  </div>
@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
@endsection
