@extends ('layouts.base')

@section ('title', 'Специальности')


@section('content')
		<div id="subpage">
      <h1>Обязательные предметы ЕНТ</h1>  
      <p>Выберите предмет, с которого хотите начать</p>
      <hr size="1" color="#ff831f">
        <hr size="1" color="#ff5500">
        <hr size="1" color="#ffb47a">
     
      <div class="ui grid" style="margin-top: 15px;text-align: center;">
        <div class="one wide column"></div>
         <div class="four wide column">
             <a href="{{ route('subject.show', 24) }}" title="image 06"><img src="subject/ist_kaz.png" width="88" height="126" alt="image 06" border="0" /></a>
         </div>
         <div class="one wide column"></div>
         <div class="four wide column">
             <a href="{{ route('subject.show', 27) }}" title="image 06"><img src="subject/gramch.png" width="88" height="126" alt="image 06" border="0" /></a>
         </div>
         <div class="one wide column">
              </div>
         <div class="four wide column"><a href="{{ route('subject.show', 28) }}" title="image 06"><img src="subject/matgram.png" width="88" height="126" alt="image 06" border="0" /></a>
         </div>
         <div class="one wide column"></div>
        
    </div>
	

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>

@endsection