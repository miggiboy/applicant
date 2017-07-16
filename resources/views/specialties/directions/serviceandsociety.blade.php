@extends ('layouts.base')

@section ('title', 'Специальности')


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
          <a href="{{ route('specialitieslist', 10) }}"><H3><i class="student icon"></i>Услуги</H3></a>
          <p> Сфера услуг давно захватила современный мир, и чтобы занять свое место под солнцем нужно стать настоящим специалистом.</p>
        </div>
        <div class="two wide column"></div>
        <div class="six wide column">
          <a href="{{ route('specialitieslist', 6) }}"><H3><i class="users icon"></i> Социальные науки, экономика, бизнес</H3></a>
          <p>Чувствуете в себе коммерческую жилку? Или хотите быть ближе к народу? Реализуйте мечты, отучившись по данным специальностям.
          </p>
        </div>
        <div class="one wide column"></div>
        
      </div>
      <div class="ui grid" style="margin-top: 15px;">
        <div class="one wide column"></div>
        <div class="six wide column">
          <a href="{{ route('specialitieslist', 4) }}"><H3><i class="student icon"></i>Право</H3></a>
          <p>Правовая граммотность очень ценится в бизнесе, практически ни одна фирма не обходится без услуг юристов.</p>
        </div>
        <div class="two wide column"></div>
        <div class="six wide column"></div>
        <div class="one wide column"></div>
        
      </div>
    </div>
	

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>

@endsection