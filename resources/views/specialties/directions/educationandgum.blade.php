@extends ('layouts.base')

@section ('title', 'Специальности образования и гуманитарных наук')


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
          <a href="{{ route('specialties.index', 'obrazovanie') }}"><H3><i class="student icon"></i>Образование</H3></a>
          <p>Для тех, кто хочет стать педагогом и не только.</p>
        </div>
        <div class="two wide column"></div>
        <div class="six wide column">
          <a href="{{ route('specialties.index', 'gumanitarnye-nauki') }}"><H3><i class="users icon"></i> Гуманитарные науки</H3></a>
          <p>Не любите сложные подсчеты и вычесления? Быть может тут Вы найдете, что то для себя.
          </p>
        </div>
        <div class="one wide column"></div>

      </div>
    </div>


@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>

@endsection
