@extends ('layouts.base')

@section ('title', 'Специальности естественных наук')


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
        <a href="{{ route('specialties.index', 'geologiya-gornodobyvayushchaya-promyshlennost-i-dobycha-poleznykh-iskopaemykh') }}"><H3><i class="student icon"></i>Геология, горнодобывающая промышленность и добыча полезных ископаемых</H3></a>
        <p> Одна из самых высокооплачиваемых и востребованных специальностей в Кахахстане.</p>
      </div>
      <div class="two wide column"></div>
      <div class="six wide column">
        <a href="{{ route('specialties.index', 'neftegazovoe-i-khimicheskoe-proizvodstvo') }}"><H3><i class="users icon"></i>Нефтегазовое и химическое производство</H3></a>
        <p>Для тех, кому интересна наука химия могут понравится специальности из данного раздела.
        </p>
      </div>
      <div class="one wide column"></div>
    </div>
  </div>
@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
@endsection
