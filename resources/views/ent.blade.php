@extends ('layouts.base')

@section ('title', 'Тесты ЕНТ')

@section ('styles')
    <link type='text/css' rel='stylesheet' href='/css/liquidcarousel.css' />
@endsection
 
@section('content')
	<div id="subject">
	    <h1>Подготовка к ЕНТ</h1>
	    	<hr size="1" color="#ff831f">
				<hr size="1" color="#ff5500">
				<hr size="1" color="#ffb47a">
				<p>Чтобы найти дополнительные материалы выбирите один из предметов внизу.</p>
	   <!--
	<p><b>Сдать онлайн тестирование</b></p>
				<hr size="1" color="#ff831f">
				<hr size="1" color="#ff5500">
				<hr size="1" color="#ffb47a">
		<p></p>		
		<div id="complex_test">
		<div class="ui fluid selection dropdown" id="ct">
		  <input type="hidden" name="user">
		  <i class="dropdown icon"></i>
		  <div class="default text">Выберите предметы</div>
		  <div class="menu">
			<div class="item" data-value="jenny">
			  Физика и Математика
			</div>
			<div class="item" data-value="elliot">
			  Elliot Fu
			</div>
			<div class="item" data-value="stevie">
			  Stevie Feliciano
			</div>
			<div class="item" data-value="christian">
			  Christian
			</div>
			<div class="item" data-value="matt">
			  Matt
			</div>
			<div class="item" data-value="justen">
			  Justen Kitsune
			</div>
		  </div>
		</div>
		<div id="ct_lang">
		  <p><b>Язык обучения</b>
		   <input type="radio" name="language" value="russian" checked> Русский язык
		   <input type="radio" name="language" value="kazakh"> Казахский язык
		  </p>
		  </div>
		  <button class="ui orange button">Сдать тест</button>
		</div>
		<div id="test_info">
				<hr size="1" color="#ff831f">
				<hr size="1" color="#ff5500">
				<hr size="1" color="#ffb47a">
				<p>Чтобы сдать тестировние или подготовиться по одному предмету, выберите его из списка внизу</p>
		</div>-->
	<div style="width:980px;height:153px;">
    	<div id="liquid1" class="liquid">
    		<span class="previous"><i class="chevron left icon"></i></span>
    		<div class="wrapper">
    			<ul>
    				<li><a href="{{ route('subject.show', 'chemistry') }}" title="Химия"><img src="subject/himi.png" width="88" height="126" alt="image 01" border="0" /></a></li>
    				<li><a href="{{ route('subject.show', 'person-society-right') }}" title="Человек. Общество. Право."><img src="subject/chop.png" width="88" height="126" alt="image 02" border="0" /></a></li>
    				<li><a href="{{ route('subject.show', 'biology') }}" title="Биология"><img src="subject/biol.png" width="88" height="126" alt="image 03" border="0" /></a></li>
    				<li><a href="{{ route('subject.show', 'physics') }}" title="Физика"><img src="subject/fizika.png" width="88" height="126" alt="image 04" border="0" /></a></li>
    				<li><a href="{{ route('subject.show', 'geography') }}" title="География"><img src="subject/geogr.png" width="88" height="126" alt="image 05" border="0" /></a></li>
    				<li><a href="{{ route('subject.show', 'history') }}" title="История Казахстана"><img src="subject/ist_kaz.png" width="88" height="126" alt="image 06" border="0" /></a></li>
    				<li><a href="{{ route('subject.show', 'world-history') }}" title="История Мира"><img src="subject/ist_mira.png" width="88" height="126" alt="image 07" border="0" /></a></li>
    				<li><a href="{{ route('subject.show', 'kazakh-language-and-literature') }}" title="Казахский язык и литература"><img src="subject/kazahyalit.png" width="88" height="126" alt="image 08" border="0" /></a></li>
    				<li><a href="{{ route('subject.show', 'mathematics') }}" title="Математика"><img src="subject/matem.png" width="88" height="126" alt="image 09" border="0" /></a></li>
    				<li><a href="{{ route('subject.show', 'russian-language-and-literature') }}" title="Русский язык и литература"><img src="subject/russkiylit.png" width="88" height="126" alt="image 10" border="0" /></a></li>
    				<li><a href="{{ route('subject.show', 'english') }}" title="Английский язык"><img src="subject/angl.png" width="88" height="126" alt="image 14" border="0" /></a></li>
    				<li><a href="{{ route('subject.show', 'grammar-reading') }}" title="Грамотность чтения"><img src="subject/gramch.png" width="88" height="126" alt="image 11" border="0" /></a></li>
    				<li><a href="{{ route('subject.show', 'mathematical-literacy') }}" title="Математическая грамотность"><img src="subject/matgram.png" width="88" height="126" alt="image 12" border="0" /></a></li>
    				<li><a href="{{ route('subject.show', 'german') }}" title="Немецкий язык"><img src="subject/nemec.png" width="88" height="126" alt="image 13" border="0" /></a></li>
    				<li><a href="{{ route('subject.show', 'french') }}" title="Французский язык"><img src="subject/franc.png" width="88" height="126" alt="image 15" border="0" /></a></li>
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
<a href="/testent" style="text-decoration:none;">	<button class="ui orange button">Сдать пробное онлайн тестирование.</button></a>
	<br><br><br>
	</div>
	<!--div id="voprosotvet">
		<p><b>ЕНТ Вопрос-Ответ</b></p>
		<hr size="1" color="#ff831f">
				<hr size="1" color="#ff5500">
				<hr size="1" color="#ffb47a">
		<div class="ui search">
			  <div class="ui icon input" style="width: 255px;height: 43px;margin: 12px;">
				<input class="prompt" type="text" placeholder="Тестовый вопрос">
				<i class="search icon"></i>
			  </div>
			  <p>Не знаете ответ на тестовый вопрос? Найди его здесь. Начните вводить вопрос в поле вверху</p>
			
	</div>
	
</div>
		<div class = "mini_test" id="mt">
				<p>
					<b>Проверь себя</b>
				</p>
				
				
				<hr size="1" color="#ff831f">
				<hr size="1" color="#ff5500">
				<hr size="1" color="#ffb47a">
				<div id="mini_test_topic">
					<a href=""><img src="/img/leftar.jpg" alt="Выбрать ВУЗ">История Казахстана<img src="/img/rightar.jpg" alt="Выбрать ВУЗ"></a>	
				</div>
				<form name="test" method="post" action="input1.php">
						      <div class="block"><p><b>Как звали коня Чингизхана?</b><Br></div>
							 <div class="block">
						  <input type="radio" name="browser" value="opera"> Муцефал</input><Br>
						  <input type="radio" name="browser" value="opera"> Мат</input><Br>
						   <input type="radio" name="browser" value="firefox"> Чингизат<Br>
						   </div>
								 <div class="block">
						  <input type="radio" name="browser" value="opera"> Буцефал</input><Br>
						  <input type="radio" name="browser" value="opera"> Ат</input><Br>
						   <input type="submit" value="Проверить"><br></p></div>
						   
						   <div class="block" ><a href="#">Сдать полный тест по предмету</a><Br></div>
					 </form>
		</div>
		<div id="repetitory">
			
		</div-->
@endsection
@section('script')

	<script type="text/javascript" src="js/jquery.liquidcarousel.pack.js"></script>

	<script type="text/javascript">
		<!--
			$(document).ready(function() {
				$('#liquid1').liquidcarousel({height:129, duration:100, hidearrows:false});
			});
		-->
	</script>
 <script>
	$(function(){
		$('.ui.search')
		.search({source: content  });
	});
	var content = [
  { title: 'Andorra' },
  { title: 'United Arab Emirates' },
  { title: 'Afghanistan' },
  { title: 'Antigua' },
  { title: 'Anguilla' },
  { title: 'Albania' },
  { title: 'Armenia' },
  { title: 'Netherlands Antilles' },
  { title: 'Angola' },
  { title: 'Argentina' },
  { title: 'American Samoa' },
  { title: 'Austria' },
  { title: 'Australia' },
  { title: 'Aruba' },
  { title: 'Aland Islands' },
  { title: 'Azerbaijan' },
  { title: 'Bosnia' },
  { title: 'Barbados' },
  { title: 'Bangladesh' },
  { title: 'Belgium' },
  { title: 'Burkina Faso' },
  { title: 'Bulgaria' },
  { title: 'Bahrain' },
  { title: 'Burundi' }
  // etc
];
 </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
 <script>
$('.selection.dropdown').dropdown();
</script>
@endsection
