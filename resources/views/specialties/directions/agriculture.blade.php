@extends ('layouts.base')

@section ('title', 'Специальности сельского хозяйства')

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
        <a href="{{ route('specialties.index', 'selskokhozyaystvennye-nauki') }}"><H3><i class="student icon"></i>Сельское хозяйство</H3></a>
        <p>Сельское хозяйство занимает важное место в Казахстане, однако ощущется нехватка дипломированных специалистов.</p>
      </div>
      <div class="two wide column"></div>
      <div class="six wide column">
        <a href="{{ route('specialties.index', 'veterinariya') }}"><H3><i class="users icon"></i> Ветеринария</H3></a>
        <p>Любите животных? Став ветеринаром вы сможете помочь им и проводить с ними больше времени.
        </p>
      </div>
      <div class="one wide column"></div>
    </div>
  </div>
@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
@endsection
