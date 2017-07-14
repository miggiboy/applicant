@extends ('layouts.base')

@section ('title', 'Профиль Университета')
@section ('styles')
    <link rel="stylesheet" href="/css/blueberry.css">
    <link rel='stylesheet' href='/vendor/unitegallery/package/unitegallery/css/unite-gallery.css'>
@endsection


@section('content')
	<div id="profile">
	<div id="vusik">
	        <div  style="width:700px;height:50px;float:left;position:relative;padding-left:25px;">
    			@if (file_exists(public_path('/img/logo/u' . $university->id . '.png')))
    			    <img src="/img/logo/u{{$university->id}}.png" style="width:30px;height:30px;float:left;position:relative;margin:7px;margin-top:9px;">
    			@endif
    			<H4 style="color:#194f67;">{{ $university->title }}
    			 @if ($university->acronym) ({{ $university->acronym }})@endif</h4>
			 </div><br><br><br>
				<hr size="1" color="#ff831f">
				<hr size="1" color="#ff5500">
				<hr size="1" color="#ffb47a">
				<div id="vuz_info">
				<p>
					{!! $university->description !!}
				</p>
				@if ($university->foundation_year)
				<p>Основан в {{ $university->foundation_year }} г.</p>
				@endif
				</div>
				
				
				
				
					@if (isset($university->has_military_dep) || isset($university->has_dormitory))
    				<div id="vuz_info_2">
    				    @if (isset($university->has_military_dep))
        					@if ($university->has_military_dep == true)
                                <i class="add circle icon" style="color: #ff831f;" title="Есть военная кафедра"></i>
                            @else
                                <i class="minus circle icon" style="color: #194f67;" title="Нет военной кафедры"></i>
                            @endif
        					<b style="color:#565554;">Военная кафедрра</b>
        					
        				@endif
        				
        				@if (isset($university->has_dormitory))
        					@if ($university->has_dormitory == true)
                                <i class="add circle icon" style="color: #ff831f;" title="Есть общежитие"></i>
                            @else
                                <i class="minus circle icon" style="color: #194f67;" title="Нет общежития"></i>
                            @endif
        					<b style="color:#565554;">Общежитие</b>
        				@endif
    				</div>
    			@endif
    			
				
                @if(isset($university->is_paid))		
                            
                				 @if (count($university->getMedia('images')) || count($university->getMedia('logo')))
                				 <div style="width:690px;float:left;position:relative;">
                                  <div id="gallery" style="display:none;">
                                    @if ($logo = $university->getMedia('logo'))
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
                                
                                    @if ($media = $university->getMedia('images'))
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
                    					    {!! $university->extra_description !!}
                    				    </p>
                    				    </article>
                                    </div>
                                
                @endif
                <br>
				<div id="vuz_info1">
				    	@if(isset($university->reception->info))
    				    <b>
    				        Приемная комиссия
    				    </b>
						<p>
							{!! $university->reception->info !!}
						</p>
						<div id="pr-com">
						<p style="color:#565554;margin:0px;">
						@if (isset($university->reception->phone) || isset($university->reception->phone_2))<i class="call icon"></i>
                    		
		                    @if (isset($university->reception->phone))
		                        {{ $university->reception->phone }}
		                    @endif
		                    @if (isset($university->reception->phone_2))
		                        , {{ $university->reception->phone_2 }}
		                    @endif
              
            			@endif
            			@if ($university->reception->email)
							<i class="at icon" ></i>{{ $university->reception->email }}
						@endif
						@if ($university->reception->address)
							<i class="marker icon" ></i>{{ $university->reception->address }}
						@endif	
							</p>
						</div>
						@endif
				</div>
			
				
		</div>
		
				<div id="vuzik_2">
					<div class="ui pointing secondary menu">
					  <a class="item active" data-tab="first">Специальности</a>
					  <a class="item" data-tab="third">Приемная комиссия</a>
					  <!-- <a class="item" data-tab="fourth">Дни открытых дверей</a> -->
					</div>
					<div class="ui tab segment t active" data-tab="first">
						<table class="ui celled padded table">
						  <thead>
							<tr>
								<th class="single line">Специальности Бакалавриата</th>
								<th>Код</th>
								<th>Коммерческое отделение</th>
								<th>Срок обучения</th>
								<th>Форма обучения</th>
							 </tr>
						  </thead>
						  <tbody>
						   @foreach ($university->specialities as $speciality)
							<tr>
							  <td>
								<a href="{{ route('specialities.show', $speciality) }}">{{ $speciality->title }}</a>
							  </td>
							  <td class="single line">
								{{ $speciality->code }}
							  </td>
							  <td>
								@if (isset($speciality->pivot->study_price))
            					  {{ $speciality->pivot->study_price }} тг
            					@endif
							  </td>
							  <td>
								@if (isset($speciality->pivot->study_period))
					              {{ $speciality->pivot->study_period }}
					             года
					            @endif
							  </td>
							  <td>
								@if (isset($speciality->pivot->form))
					            	@if($speciality->pivot->form==1)
					            		Очная
					            	@endif
					            	@if($speciality->pivot->form==0)
										Заочная
					            	@endif
					            @endif
							  </td>
							</tr>
							@endforeach 
						  </tbody>
						</table>
					</div>
					
					<!-- <div class="ui tab segment t" data-tab="fourth">
					  Third
					</div> -->
				</div>
		</div>
		<div id="do_ent" style="padding-top:15px;">
		    @if($university->map)
		        <div>{!! $university->getResizedMap(320, 320) !!}</div>
		    @else
		    <iframe
		        id="map"
                width="315"
                height="201"
                frameborder="0" style="border:0"
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAuimn2D7g29WfQTKxfhCYmCuPomoZTNRk&q={{ 'Казахстан, ' . $university->city->title . ', ' . ($university->address ?: $university->title) }}" 
                style="margin:10px; height: 201px" allowfullscreen>
              </iframe>
            @endif
			<!-- <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2906.7764523464098!2d76.9075561!3d43.2351464!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3883692f027581ad%3A0x2426740f56437e63!2z0JzQtdC20LTRg9C90LDRgNC-0LTQvdGL0Lkg0YPQvdC40LLQtdGA0YHQuNGC0LXRgiDQuNC90YTQvtGA0LzQsNGG0LjQvtC90L3Ri9GFINGC0LXRhdC90L7Qu9C-0LPQuNC5!5e0!3m2!1sru!2sru!4v1488441534005" width="315"  frameborder="0" style="border:0;margin:10px;height:201px;" allowfullscreen></iframe> -->
		</div>
		
				
				
				    <div id="do_ent" style="margin-top: 20px;padding-top: 11px;padding-left: 28px;padding-right: 28px;">
				        <p><b style="color:#194f67;">Контакты ВУЗа</b><br></p>
				        <hr size="1" color="#ff831f">
				<hr size="1" color="#ff5500">
				<hr size="1" color="#ffb47a">
				        <br>
				        	@if ($university->call_center)
            					<p style="color:#565554;margin:0px;"><i class="call icon" style="color: #565554;"></i>{{ $university->call_center }}</p>
            				@endif
            				@if (isset($university->reception->email))
            					<p style="color:#565554;margin:0px;"><i class="at icon" style="color: #565554;"></i>{{ $university->reception->email }}</p>
            				@endif
            				@if ($university->web_site)
            					<p style="color:#565554;margin:0px;"><i class="world icon" style="color: #565554;"></i><a href="{{ $university->web_site }}" target="_blank">{{ $university->getBaseUrl() }}</a></p>
            				@endif
            				<p>г. {{ $university->city->title }}@if ($university->address), {{ $university->address }} @endif</p>
				    </div>
				    @if(isset($university->reception))
					<div id="do_ent" style="margin-top: 20px;padding-top: 11px;padding-left: 28px;padding-right: 28px;">
						
						<p><b style="color:#194f67;">Контакты приемной комиссии</b><br></p>
						<hr size="1" color="#ff831f">
				<hr size="1" color="#ff5500">
				<hr size="1" color="#ffb47a"><br>
						@if (isset($university->reception->phone) || isset($university->reception->phone_2))
              				
		                    @if (isset($university->reception->phone))
		                    <p style="color:#565554;margin:0px;">
		                        <i class="call icon"></i>{{ $university->reception->phone }}
		                        </p>
		                    @endif
		                    @if (isset($university->reception->phone_2))
		                    <p style="color:#565554;margin:0px;">
		                       <i class="call icon"></i>{{ $university->reception->phone_2 }}
		                    </p>
		                    @endif
              				<br>
            			@endif

            			@if ($university->reception->email)
							<p style="color:#565554;margin:0px;"><i class="at icon" ></i>{{ $university->reception->email }}</p><br>
						@endif
						@if ($university->reception->address)
						<p style="color:#565554;margin:0px;">
							<i class="marker icon" ></i>{{ $university->reception->address }}
							</p>
						@endif	

					
					</div>@endif
			
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