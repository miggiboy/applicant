@extends ('layouts.base')

@section ('title')
  {{ $specialty->title }} - связанное
@endsection

@section ('styles')
  <style>
    .custom.container {
      width:1000px;
      margin: 0 auto;
      margin-top: 40px;
      margin-top: 60px;
    }

  </style>
@endsection

@section ('content')
  <div class="ui custom container">
    <h2  style="text-align:center; margin-bottom: 40px;">

      <a href="{{ route('specialities.show', [$specialty, 'inst' => request('inst')]) }}">
        {{ str_limit($specialty->title, 50) }}
      </a><br>
      Связанные 
      @if($specialty->getTranslatedInsitutionType()=='Университеты')
          ВУЗы
      @else
          {{ $specialty->getTranslatedInsitutionType() }}
      @endif
    </h2>
     <form id="poi" class="ui small form" action="{{ route('linked_specialities', [$specialty, 'inst' => request('inst')]) }}" method="GET">
       
                <div class="ui action input">
                    
                    @if($qualifications!='')
                    <select class="ui compact selection dropdown" id="select" name="qualification" style="width: 200px;">
                    		<option value=" " selected="selected">Все Квалификации</option>
                              @foreach ($qualifications as $qualification)
                                <option value="{{ $qualification->id }}">{{ $qualification->title }}</option>
                              @endforeach
                    </select>
                    @endif
                    <select class="ui compact selection dropdown" id="select" name="city" style="width: 200px;">
                    		<option value=" " selected="selected">Все города</option>
                              @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->title }}</option>
                              @endforeach
                    </select>
                    <select class="ui compact selection dropdown" id="select" name="form" style="width: 162px;">
                    		<option value=" " selected="selected">Форма обучения</option>
                    		<option value="1">Очная</option>
                    		<option value="0">Заочная</option>
                    </select>
                    <input type="submit" form="poi" class="ui button" style="left: 0px;height: 43px;background: #ff8a21;color: white;width:165px;" value="Поиск">
                </div>
                
            </form>
    @if ($institutions)
      <table class="ui celled striped table">
        <thead>
          <th style="width: 400px;">Учебное заведение</th>
          <th style="width: 120px;">Форма обучения</th>
           <th style="width: 120px;">Цена за год</th>
            <th style="width: 120px;">Срок обучения</th>
          </tr>
        </thead>
        
       
            <tbody>
          @foreach ($institutions as $institution)
            <tr>
              <td>
                <h4 class="ui header">
                  <div class="content">
                      <a href="
                                        @if($specialty->getTranslatedInsitutionType()=='Университеты')
                                           {{ route('vuz_profile', $institution)}}
                                        @else
                                            {{route('college_profile', $institution)}}
                                        @endif 
                                    ">
                                        
                                       
                        {{ $institution->title }}
                      </a>
                      <div class="sub header"> {{ $institution->city->title }}
                    </div>
                  </div>
                </h4>
              </td>
              <td>
                {{ ($institution->pivot->form == '1') ? 'очная' : 'заочная' }}
              </td>
              <td>
                  @if(isset($institution->pivot->study_price))
                      @if($institution->pivot->study_price==0)
                          Бюджет
                      @elseif($institution->pivot->study_price>1)
                          {{ $institution->pivot->study_price }} тг
                      @endif
                  @endif
            </td>
              <td class="right aligned collapsing">{{ $institution->pivot->study_period }} </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
  <br>
  <br>
  <br>
@endsection
