@extends ('layouts.base')

@section ('title', 'Специальности')

@section('content')
  <div id="subpage">
      <h1>Спецальности высшего и средне-специального образования</h1>
      <p>В данном разделе Вы найдете список и информацию по специальстям для колледжей и ВУЗов. Так же Вы сможете найти учебные заведения, в которых присутствует выбранная Вами специальность. Если Вы ищете конкретную специальность - введите ее название в поле внизу и нажмите кнопку "найти". Или Вы можете найти интересующую Вас специальность в одной из категорий.</p>
      <hr size="1" color="#ff831f">
      <hr size="1" color="#ff5500">
      <hr size="1" color="#ffb47a">
      <form action="{{ route('specialties.search') }}" method="get">
          <p>
          <div class="ui icon input" style="height: 43px;">
              <input type="text" name = "query" value="{{ old('query') }}" class="prompt" placeholder="Введите название или код специальности ..."  style="width: 864px;margin-right: 12px;">
              <i class="search icon"></i>
              <input type="submit" value="Найти">
          </div>
          </p>
      </form>
      <hr size="1" color="#ff831f">
      <hr size="1" color="#ff5500">
      <hr size="1" color="#ffb47a">
      <div class="ui pointing secondary menu">
          <a class="item g active" data-tab="first">ВУЗ (бакалавриат)</a>
          <a class="item g" data-tab="second">Колледж</a>
      </div>
      <div class="ui tab segment t active" data-tab="first">
          <div class="ui grid" style="margin-top: 15px;">
              <div class="one wide column"></div>
              <div class="six wide column">
                  <a href="{{ url('/specialty-directions/educationandgum') }}">
                      <h3><i class="student icon"></i>Образование и Гуманитарные науки</h3>
                  </a>
                  <p>Если Вы хотите стать учителем и педагогом, или же Вас привлекают гуманитарные науки, то Вам сюда</p>
              </div>
              <div class="two wide column"></div>
              <div class="six wide column">
                  <a href="{{ url('/specialty-directions/serviceandsociety')}}">
                      <h3><i class="users icon"></i> Услуги и науки об Обществе</h3>
                  </a>
                  <p>Хотите стать специалистом в сфере услуг? Или Вас привлекает юриспруденция, бизнес и менеджмент?
                      Если ответ да, то этот раздел специально для Вас.
                  </p>
              </div>
              <div class="one wide column"></div>
              <div class="one wide column"></div>
              <div class="six wide column">
                  <a href="{{ route('specialties.index', 'tekhnicheskie-nauki-i-tekhnologii') }}">
                      <h3><i class="settings icon"></i>Технические науки и технологии</h3>
                  </a>
                  <p>Для тех, кто мечтает стать инжинером, программистом или хочет найти себя в энергетике, строительстве, машиностроении и во многих других технических отраслях. </p>
              </div>
              <div class="two wide column"></div>
              <div class="six wide column">
                  <a href="{{ route('specialties.index', 'iskusstvo') }}">
                      <h3><i class="paint brush icon"></i> Искусство</h3>
                  </a>
                  <p>Данный раздел содержит специальности для людей, желающих реализовать свой творческий потенциал.
                  </p>
              </div>
              <div class="one wide column"></div>
              <div class="one wide column"></div>
              <div class="six wide column">
                  <a href="{{ url('/specialty-directions/agriculture')}}">
                      <h3><i class="paw icon"></i>Сельскохозяйственные науки и Ветеринария</h3>
                  </a>
                  <p>Любите работать с землей или животными? Тогда Вам должны понравится специальности приведенные в этом разделе.</p>
              </div>
              <div class="two wide column"></div>
              <div class="six wide column">
                  <a href="{{ route('specialties.index', 'meditsina-farmatsevtika') }}">
                      <h3><i class="first aid icon"></i> Медицина и Фармацевтика</h3>
                  </a>
                  <p>Ваша цель помогать людям? Профессия врача или сотрудника фармакологии идеальный вариант.
                  </p>
              </div>
              <div class="one wide column"></div>
              <div class="one wide column"></div>
              <div class="six wide column">
                  <a href="{{ route('specialties.index', 'estestvennye-nauki') }}">
                      <h3><i class="world icon"></i>Естественные науки</h3>
                  </a>
                  <p>Вам нравится физика или химия, хотите изучать науки связанные с природой? Тогда пополните число специалистов по естественным наукам </p>
              </div>
              <div class="two wide column"></div>
              <div class="six wide column">
                  <a href="{{ route('specialties.index', 'voennoe-delo-i-bezopasnost') }}">
                      <h3><i class="spy icon"></i> Военное дело и Безопасность</h3>
                  </a>
                  <p>
                      Дисциплина, выносливость, исполнительность. Если эти слова Вас не пугают, смело заходите в этот раздел, возможно вы найдете здесь свое призвание.
                  </p>
              </div>
              <div class="one wide column"></div>
          </div>
      </div>

      {{-- College directions --}}
      <div class="ui tab segment t" data-tab="second">
          <div class="ui grid" style="margin-top: 15px;">
              <div class="one wide column"></div>
              <div class="six wide column">
                  <a href="{{ route('specialties.index', 'obrazovanie-college') }}">
                      <h3><i class="student icon"></i>Образование</h3>
                  </a>
                  <p>Если Вы хотите стать учителем и педагогом, или же Вас привлекают гуманитарные науки, то Вам сюда</p>
              </div>
              <div class="two wide column"></div>
              <div class="six wide column">
                  <a href="{{ url('/specialty-directions/serviceandsocietyc')}}">
                      <h3><i class="users icon"></i> Услуги и науки об Обществе</h3>
                  </a>
                  <p>Хотите стать специалистом в сфере услуг? Или Вас привлекает юриспруденция, бизнес и менеджмент?
                      Если ответ да, то этот раздел специально для Вас.
                  </p>
              </div>
              <div class="one wide column"></div>
              <div class="one wide column"></div>
              <div class="six wide column">
                  <a href="{{ url('/specialty-directions/technique')}}">
                      <h3><i class="settings icon"></i>Технические науки и технологии</h3>
                  </a>
                  <p>Для тех, кто мечтает стать инжинером, программистом или хочет найти себя в энергетике, строительстве, машиностроении и во многих других технических отраслях. </p>
              </div>
              <div class="two wide column"></div>
              <div class="six wide column">
                  <a href="{{ route('specialties.index', 'iskusstvo-i-kultura') }}">
                      <h3><i class="paint brush icon"></i> Искусство</h3>
                  </a>
                  <p>Данный раздел содержит специальности для людей, желающих реализовать свой творческий потенциал.
                  </p>
              </div>
              <div class="one wide column"></div>
              <div class="one wide column"></div>
              <div class="six wide column">
                  <a href="{{ route('specialties.index', 'selskoe-khozyaystvo-veterinariya-i-ekologiya') }}">
                      <h3><i class="paw icon"></i>Сельскохозяйственные науки, Ветеринария и Экология</h3>
                  </a>
                  <p>Любите работать с землей или животными? Тогда Вам должны понравится специальности приведенные в этом разделе.</p>
              </div>
              <div class="two wide column"></div>
              <div class="six wide column">
                  <a href="{{ route('specialties.index', 'meditsina-farmatsevtika') }}">
                      <h3><i class="first aid icon"></i> Медецина и Фармацевтика</h3>
                  </a>
                  <p>Ваша цель помогать людям? Профессия медработника или сотрудника фармакологии идеальный вариант.
                  </p>
              </div>
              <div class="one wide column"></div>
              <div class="one wide column"></div>
              <div class="six wide column">
                  <a href="{{ url('/specialty-directions/natural')}}">
                      <h3><i class="world icon"></i>Естественные науки</h3>
                  </a>
                  <p>Вам нравится физика или химия, хотите изучать науки связанные с природой? Тогда пополните число специалистов по естественным наукам </p>
              </div>
              <div class="two wide column"></div>
              <div class="six wide column">
                  <a href="{{ route('specialties.index', 'metrologiya-standartizatsiya-i-sertifikatsiya') }}">
                      <h3><i class="certificate icon"></i> Метрология, стандартизация и сертефикация</h3>
                  </a>
                  <p>
                      В мире господствует бюрократия, именно поэтому пользуются большим спросом люди, которые знают все тонкости данного дела.
                  </p>
              </div>
              <div class="one wide column"></div>
          </div>
      </div>
  </div>
  </div>
@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
  <script>
      $('.menu .item').tab();
  </script>
@endsection
