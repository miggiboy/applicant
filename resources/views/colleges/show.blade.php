@extends ('layouts.base')

@section ('title', 'Профиль Колледжа')
@section ('styles')
    <link rel="stylesheet" href="/css/blueberry.css">
    <link rel='stylesheet' href='/vendor/unitegallery/package/unitegallery/css/unite-gallery.css'>
@endsection


@section('content')
		<div id="profile">
	        <div id="vusik">
    			<div  style="width:650px;height:50px;float:left;position:relative;">
    			    
        			@if (file_exists(public_path('/img/logo/c' . $college->id . '.png')))<!--Проверка: Есть ли у колледжа логотип-->
        			    <img src="/img/logo/c{{$college->id}}.png" 
        			         style=" width:30px;
        			                 height:30px;
        			                 float:left;
        			                 position:relative;
        			                 margin:7px;
        			                 margin-top:9px;"
        			     >
        			@endif<!--Окончание проверки: Есть ли у колледжа логотип-->
        			
        			<H4 style="color:#194f67;">
        			    {{ $college->title }} <!--Название колледжа-->
        			        
                        @if ($college->acronym) <!--Проверка: Есть ли у колледжа аббревиатура-->
        			        ({{ $college->acronym }})<!--Аббревиатура колледжа-->
        		        @endif<!--Окончание проверки: Есть ли у колледжа аббревиатура-->
        			        
                    </h4>
    			</div>
    			
    			<br><br><br>
    			
    			<hr size="1" color="#ff831f">
    			<hr size="1" color="#ff5500">
    			<hr size="1" color="#ffb47a">
    			
    		    <div id="vuz_info">
    		        <p>
    					{!! $college->description !!} <!--Краткое описание колледжа-->
    				</p>
        			
        			@if ($college->foundation_year)<!--Проверка: Есть ли у колледжа год основания-->
        			    <p>
        			        Основан в {{ $college->foundation_year }}<!--Год основания колледжа--> г.
        			    </p>
        			@endif<!--Окончание проверки: Есть ли у колледжа год основания-->
        			
    		    </div>
    			
    			@if (isset($college->has_dormitory))<!--Проверка: Есть ли у колледжа информация об общежитии-->
    			
        		    <div id="vuz_info_2">
        		        
        				@if ($college->has_dormitory == true)<!--Проверка: Есть ли у колледжа общежитие-->
                            <i class="add circle icon" style="color: #ff831f;"  title="Есть общежитие"></i><!--У колледжа есть общежитие-->
                        @else
                            <i class="minus circle icon" style="color: #194f67;"  title="Нет общежития"></i><!--У колледжа нет общежития-->
                        @endif<!--Окончание проверки: Есть ли у колледжа общежитие-->
                        
        				<b style="color:#565554;">
        				    Общежитие
        				</b>
        			</div>
        			
        		@endif<!--Окончание проверки: Есть ли у колледжа информация об общежитии-->
        		
        		
        		@if(isset($college->is_paid))	
        			@if (count($college->getMedia('images')) || count($college->getMedia('logo')))
        				<div style="width:690px;float:left;position:relative;">
                            <div id="gallery" style="display:none;">
                                @if ($logo = $college->getMedia('logo'))
                                    @foreach ($logo as $mediaItem)
                                      <a href="{{ route('home') }}/">
                                      <img alt="{{ $mediaItem->name }}"
                                           src="{{ $mediaItem->getUrl('thumb') }}"
                                           data-image="{{ $mediaItem->getUrl() }}"
                                           data-description="{{ $mediaItem->name }}"
                                           style="display:none">
                                      </a>
                                    @endforeach
                                @endif
                        
                                @if ($media = $college->getMedia('images'))
                                    @foreach ($media as $mediaItem)
                                      <a href="/">
                                      <img alt="{{ $mediaItem->name }}"
                                           src="{{ $mediaItem->getUrl('thumb') }}"
                                           data-image="{{ $mediaItem->getUrl() }}"
                                           data-description="{{ $mediaItem->name }}"
                                           style="display:none">
                                      </a>
                                    @endforeach
                                @endif
                          </div>
                        </div>
                    @endif
        				
                    <div style="width:666px;float:left;position:relative;margin-left:25px;">
                        <article>
                            <p>
                        		{!! $college->extra_description !!}
                        	</p>
                        </article>
                    </div>
                @endif
                <br>
    			<div id="vuz_info1">
    			    
    			    @if(isset($college->reception->info))<!--Проверка: Есть ли у колледжа информация о приемной комиссии-->
    			        <b>
    			            <br>
    				        Приемная комисссия
    				    </b>
    				    <br>
    					<p>
    						{!! $college->reception->info !!}<!--Информация о приемной комиссии-->
    					</p>
    				@endif<!--Окончание проверки: Есть ли у колледжа информация о приемной комиссии-->
    				
    			</div>
    				
    		
        		
    	    </div>
    	    
		    <div id="vuzik_2">
				<table class="ui celled padded table">
					<thead>
						<tr>
							<th class="single line">Специальность</th>
							<th>Код</th>
							<th>Стоимость за 1 год</th>
							<th>Срок обучения</th>
							<th>Форма обучения</th>
				    	</tr>
					</thead>
				    <tbody>
				        
				        
						@foreach ($college->specialities as $speciality)<!--Цикл для вывода специальностей колледжа-->
						    @if($speciality->pivot->study_price == 1)
    						    <tr>
        						    <td colspan="5" bgcolor="#fffbd1">
        						        <a href="{{ route('specialities.show', $speciality) }}">
    						                {{ $speciality->title }} ({{ $speciality->code }}) <!--Название специальности-->
    						            </a>
        						    </td>
    						    </tr>
    						    @foreach ($college->specialities as $qualification)
    						    @if($qualification->parent_id==$speciality->id)
    						    <tr>
    							    <td>
    							        <a href="{{ route('specialities.show', $speciality) }}">
    						                {{ $qualification->title }} <!--Название специальности-->
    						            </a>
    							    </td>
    							     <td class="single line">
    							        {{ $qualification->code }}
    							    </td>
    							    <td>
    							        
    								    @if (isset($qualification->pivot->study_price))
                					        @if($qualification->pivot->study_price==0)
                					            <b style="color:#ff831f">Бюджет</b>
                					        @else
                					            {{ $qualification->pivot->study_price }}<!--Стоимость обучения на данной специальности за первый год обучения-->
                					        @endif
                					    @endif
                					
    							    </td>
    							    <td>
    							        
    							        @if (isset($qualification->pivot->study_period))
    					                    {{ $qualification->pivot->study_period }}<!--Срок обучения на данной специальности-->
    					                @endif
    					                
    							    </td>
    							    <td>
    							        
        								@if (isset($qualification->pivot->form))<!--Проверка: форма обучения для данной специальности-->
        					            	
        					            	@if($qualification->pivot->form==1)<!--Очная форма обучения-->
        					            		Очная
        					            	@endif
        					            	
        					            	@if($qualification->pivot->form==0)<!--Заочная форма обучения-->
        										Заочная
        					            	@endif
        					            	
        					            @endif<!--Окончание проверки: форма обучения для данной специальности-->
    					            
    							    </td>
    							</tr>
    							@endif
    							@endforeach
						    @elseif($speciality->type=='specialty')
    							<tr>
    							    <td bgcolor="#fffbd1">
    							        <a href="{{ route('specialities.show', $speciality) }}">
    						                {{ $speciality->title }} <!--Название специальности-->
    						            </a>
    							    </td bgcolor="#fffbd1">
    							     <td class="single line" bgcolor="#fffbd1">
    							        {{ $speciality->code }}
    							    </td>
    							    <td bgcolor="#fffbd1">
    							        
    								    @if (isset($speciality->pivot->study_price))
                					        {{ $speciality->pivot->study_price }}<!--Стоимость обучения на данной специальности за первый год обучения-->
                					    @endif
                					
    							    </td>
    							    <td bgcolor="#fffbd1">
    							        
    							        @if (isset($speciality->pivot->study_period))
    					                    {{ $speciality->pivot->study_period }}<!--Срок обучения на данной специальности-->
    					                @endif
    					                
    							    </td>
    							    <td bgcolor="#fffbd1">
    							        
        								@if (isset($speciality->pivot->form))<!--Проверка: форма обучения для данной специальности-->
        					            	
        					            	@if($speciality->pivot->form==1)<!--Очная форма обучения-->
        					            		Очная
        					            	@endif
        					            	
        					            	@if($speciality->pivot->form==0)<!--Заочная форма обучения-->
        										Заочная
        					            	@endif
        					            	
        					            @endif<!--Окончание проверки: форма обучения для данной специальности-->
    					            
    							    </td>
    							</tr>
							@endif
						@endforeach <!--Конец цикла для вывода специальностей колледжа-->
					</tbody>
				</table>
            </div>
		</div>
		
		<div id="do_ent" style="padding-top:15px;">
		    
	        @if($college->map)<!--Проверка: Есть ли у колледжа карта-->
		        {!! $college->getResizedMap(320, 320) !!}<!--Карта колледжа-->
		    @else<!--Если у колледжанет карты определить местополоение по адресу или названию-->
		        <iframe
    		        id="map"
                    width="315"
                    height="201"
                    frameborder="0" style="border:0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAuimn2D7g29WfQTKxfhCYmCuPomoZTNRk&q={{ 'Казахстан, ' . $college->city->title . ', ' . ($college->address ?: $college->title) }}" 
                    style="margin:10px; height: 201px" allowfullscreen>
                </iframe>
            @endif<!--Окончание проверки: Есть ли у колледжа карта-->
            
		</div>
		
		<div id="do_ent" style="margin-top: 20px;padding-top: 11px;padding-left: 28px;padding-right: 28px;">
			<p>
			    <b style="color:#194f67;">
			        Контакты колледжа
			    </b>
			    <br>
			    
			</p>
			
			<hr size="1" color="#ff831f">
			<hr size="1" color="#ff5500">
			<hr size="1" color="#ffb47a">
			
			<br>
			
		    @if ($college->call_center)<!--Проверка: Есть ли у колледжа основной телефон-->
                <p style="color:#565554;margin:0px;">
                    <i class="call icon" style="color: #565554;"></i>{{ $college->call_center }}<!--Основной телефон колледжа-->
            	</p>
            @endif<!--Окончание проверки: Есть ли у колледжа основной телефон-->
            	
            @if (isset($college->reception->email))<!--Проверка: Есть ли у колледжа email-->
                <p style="color:#565554;margin:0px;">
                    <i class="at icon" style="color: #565554;"></i>{{ $college->reception->email }}<!--email колледжа-->
                </p>
            @endif<!--Окончание проверки: Есть ли у колледжа email-->
            	
            @if ($college->web_site)<!--Проверка: Есть ли у колледжа сайт-->
                <p style="color:#565554;margin:0px;">
            	    <i class="world icon" style="color: #565554;"></i>
            	    <a href="{{ $college->web_site }}" target="_blank">
                        {{ $college->getBaseUrl() }}<!--Сайт колледжа-->
                    </a>
                </p>
            @endif<!--Окончание проверки: Есть ли у колледжа сайт-->
            
            <p>
                г. {{ $college->city->title }}
                    
                    @if ($college->address)<!--Проверка: Есть ли у колледжа адрес-->
                        , {{ $college->address }}<!--Адрес колледжа-->
                    @endif<!--Окончание проверки: Есть ли у колледжа адрес-->
                    
            </p>
		</div>
		    @if(isset($college->reception))<!--Проверка: Есть ли у колледжа приемная комиссия-->
			    <div id="do_ent" style="margin-top: 20px;padding-top: 11px;padding-left: 28px;padding-right: 28px;">
    			    <p>
    			        <b style="color:#194f67;">
    			            Контакты приемной комиссии
    			        </b>
    			        <br>
    			    </p>
    			    
					<hr size="1" color="#ff831f">
				    <hr size="1" color="#ff5500">
			    	<hr size="1" color="#ffb47a"><br>
			    	
			    	@if (isset($college->reception->phone))<!--Проверка: Есть ли у колледжа телефон1 приемной комиссии-->
		                <p style="color:#565554;margin:0px;">
		                    <i class="call icon"></i>{{ $college->reception->phone }}<!--Телефон1 приемной комиссии колледжа-->
	                    </p>
                    @endif<!--Окончание проверки: Есть ли у колледжа телефон1 приемной комиссии-->
	                    
		            @if (isset($college->reception->phone_2))<!--Проверка: Есть ли у колледжа телефон2 приемной комиссии-->
		                <p style="color:#565554;margin:0px;">
		                    <i class="call icon"></i>{{ $college->reception->phone_2 }}<!--Телефон2 приемной комиссии колледжа-->
		                </p>
	                @endif<!--Окончание проверки: Есть ли у колледжа телефон2 приемной комиссии-->
		                
              		<br>
              		
            	    @if ($college->reception->email)<!--Проверка: Есть ли у колледжа email приемной комиссии-->
					    <p style="color:#565554;margin:0px;">
					        <i class="at icon" ></i>{{ $college->reception->email }}<!--email приемной комиссии колледжа-->
					    </p>
					    <br>
				    @endif<!--Окончание проверки: Есть ли у колледжа email приемной комиссии-->
				    
					@if ($college->reception->address)<!--Проверка: Есть ли у колледжа адрес приемной комиссии-->
						<p style="color:#565554;margin:0px;">
						    <i class="marker icon" ></i>{{ $college->reception->address }}<!--Адрес приемной комиссии колледжа-->
						</p>
					@endif	<!--Окончание проверки: Есть ли у колледжа адрес приемной комиссии-->

				</div>
			@endif<!--Окончание проверки: Есть ли у колледжа приемная комиссия-->
			
@endsection

@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
    
    <script src='/vendor/unitegallery/package/unitegallery/js/unitegallery.min.js'></script>
    <script src='/vendor/unitegallery/package/unitegallery/themes/tilesgrid/ug-theme-tilesgrid.js'></script>
    
<script>
    $('#gallery').unitegallery({
      tile_width:200,
      tile_height:200,
      grid_num_rows:1,
      lightbox_type: "compact"
    });
</script>
<script src="/js/vendor/readmore/readmore.min.js"></script>

<script>
    $('article').readmore({
  collapsedHeight: 175,
  speed: 500,
  moreLink: '<a href="#">Показать полностью</a>',
  lessLink: '<a href="#">Свернуть текст</a>'
});
</script>

    <script>
        $('.menu .item').tab();
    </script>
@endsection