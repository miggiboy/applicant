@extends ('layouts.base')

@section ('title', 'Выпускник')
@section ('styles')
    <link rel="stylesheet" href="/css/blueberry.css">
@endsection


@section('content')
		<div id="choose">
		<div class="korpus">
		<input type="radio" name="odin" checked="checked" id="vkl1"/><label for="vkl1">Выбрать ВУЗ</label><input type="radio" name="odin" id="vkl2"/><label for="vkl2">Выбрать колледж</label>
		<div>
			Высшее учебное заведение — учебное заведение, дающее высшее </br>профессиональное образование и осуществляющее научную деятельность.
		</div>
		<div>
			Колледж является образовательным учреждением среднего </br>профессионального образования.
		</div>
</div>
			
		</div>
		
		<div id="do_ent">
			<H2>До EНТ 138 дней</h2>
				<hr size="1" color="#ff831f">
				<hr size="1" color="#ff5500">
				<hr size="1" color="#ffb47a">
			<div id ="links">
			<a href="#">Подготовиться к экзаменам</a><br>
			<a href="#">Сдать пробное тестирование</a><br>
			<a href="#">Посмотреть доп. материалы</a>
			</div>
		</div>
		<div id="poisk">
			<div id="zagolovok">
				<p>
				 <b>
					Параметры поиска
				</b>
				</p>
			</div>
				<hr size="1" color="#ff831f">
				<hr size="1" color="#ff5500">
				<hr size="1" color="#ffb47a">
				<div class="poisk_item">
					<p>
						<span class="expand">
							Направления
							<img  src="/img/downar.jpg" alt="Выбрать ВУЗ">
						</span>
					</p>
					 <ul>
						@foreach($directionsU as $direction)
							<li>{{ $direction->title }}</li>
					 	@endforeach
					</ul>
				</div>
				<div class="poisk_item">
					<p>
						<span class="expand">
						Специальность
						<img  src="/img/downar.jpg" alt="Выбрать ВУЗ">
						</span>
					</p>
					 <ul>
						@foreach($specialities as $speciality)
							<li>{{ $speciality->title }}</li>
					 	@endforeach
					</ul>
				</div>
				<div class="poisk_item">
					<p>
						<span class="expand">
						Город
						<img  src="/img/downar.jpg" alt="Выбрать ВУЗ">
						</span>
					</p>
					 <ul>
					 	@foreach($cities as $city)
							<li>{{ $city->title }}</li>
					 	@endforeach
					</ul>
				</div>
				<div class="poisk_item">
					<p>
						Стоимость за год обучения
					</p>
					<div class="ui right labeled input pri">
					  <div class="ui label">от</div>
					  <input type="text" placeholder="115000">
					  <div class="ui basic label">тг</div>
					</div>
					<div class="ui right labeled input pri">
					  <div class="ui label">до</div>
					  <input type="text" placeholder="3055546">
					  <div class="ui basic label">тг</div>
					</div>
				</div>
				<div class="poisk_item">
					 <p>Общежитие
					  <input type="checkbox" name="example"></p>
					 
				</div>
				<div class="poisk_item">
					<p>
						Военная кафедра
					<input type="checkbox" name="example"></p>
				</div>
		</div>
		<div id="sort">
		 <form>
			<!--<div class="search">
				<input type="search" name="q" value="Начните вводить название ВУЗа или специальности">
				<input type="submit" value="">
		    </div>-->
			
			<div class="ui search">
			  <div class="ui icon input" style="width: 255px;height: 43px;margin: 12px;">
				<input class="prompt" type="text" placeholder="Название ВУЗа или специальности">
				<i class="search icon"></i>
			  </div>
			  <div class="results"></div>
			</div>
				<div id="sortpo">
				<select name="gender" class="ui dropdown" id="select">
				  <option value="az">от А до Я</option>
				  <option value="za">от Я до А</option>
				  <option value="ec">сначало дешевле</option>
				  <option value="ce">сначало дороже</option>
				</select>
				</div>
			<button type="submit" class="ui primary button bu">
			  Поиск
			</button>
		 </form>
		</div>
		<div id="results">
			<div class="result">
			<a href="#">
				<div class="vuz_logo">
					<img style="width: 100px;" src="/img/iitu_logo.jpg" alt="Выбрать ВУЗ">
					<p>	1 300 585 тг</p><p style="font-size:10px;"> за первый год обучения</p>
				</div>
				<div class="vuz_description">
					<p>
					Международный Университет<br> Информационных Технологии
					</p> 
					<hr size="1" color="#ff831f">
				<hr size="1" color="#ff5500">
				<hr size="1" color="#ffb47a">
				<div class="vuz_info">
				<p>
					Город: Алматы
				</p>
				<p>
					Минимальный балл EНТ для 2016 года(грант): 81-95
				</p>
				<p>
					Колличество грантов: 800
				</p>
				</div>
				</div>
				</a>
			</div>
			<div class="result">
				
			</div>
		</div>
		<div id ="top5">
			<H2>Топ ВУЗы 2017</h2>
				<hr size="1" color="#ff831f">
				<hr size="1" color="#ff5500">
				<hr size="1" color="#ffb47a">
				<div id="top_slider">
				 <div class="blueberry">
				      <ul class="slides">
						<li><img style="width: 150px;margin:auto;margin-bottom: -30px;" src="/img/iitu_logo.jpg" alt="Выбрать ВУЗ"><br>Международный Университет Информационных Технологий</li>
						<li><img style="width: 150px;margin:auto;margin-bottom: -30px;" src="/img/iitu_logo.jpg" alt="Выбрать ВУЗ"><br>Международный Университет Информационных Технологий</li>
						<li><img style="width: 150px;margin:auto;margin-bottom: -30px;" src="/img/iitu_logo.jpg" alt="Выбрать ВУЗ"><br>Международный Университет Информационных Технологий</li>
						<li><img style="width: 150px;margin:auto;margin-bottom: -30px;" src="/img/iitu_logo.jpg" alt="Выбрать ВУЗ"><br>Международный Университет Информационных Технологий</li>
					  </ul>
				</div>
				</div>
		</div>
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

	<script src="./jquery.blueberry.js"></script>

	<script>
		$(window).load(function() {
			$('.blueberry').blueberry();
		});
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
		$('#select').dropdown();
	</script>
@endsection
