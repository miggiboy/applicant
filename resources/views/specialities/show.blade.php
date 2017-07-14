@extends ('layouts.base')

@section ('title')
  Специальность {{ "{$speciality->title}" }} | Edukey
@endsection



@section ('content')
<div id="subpage">
    <div style="width:655px;"><h1> Специальность "{{ "{$speciality->title}" }}" </h1></div>
  <div class="ui very relaxed grid">
    <div class="ten wide column">
      <div class="ui grid">
        
        @if ($speciality->code)
          <div class="three wide column">
            <h5 class="ui header">Код:</h5><div class="content">{{ $speciality->code }}</div>
          </div>
        @endif

        @if ($speciality->subjects->count() == 2)
          <div class="six wide column">
            <h5 class="ui header">Профильные предметы:</h5>
            <div class="content">
              {{ $speciality->subjects[0]->title }}, {{ $speciality->subjects[1]->title }}
            </div>
          </div>
        @endif

        @if (isset($speciality->direction->title))
          <div class="seven wide column">
              <h5 class="ui header">Наравление:</h5>
              <div class="content">
                <a 
                  href="{{ route('specialitieslist',$speciality->direction->id)}}">
                  {{ $speciality->direction->title }}
                </a>
              </div>
          </div>
        @endif

      </div>
      <br>
      <div class="ui divider"></div>
      @if ($speciality->description)
          {!! $speciality->description !!}
       
        <br>
      @endif
      <br>
    </div> {{-- End of column --}}
    
    <div class="one wide column"></div> {{-- Just extra space column --}}

    <div class="five wide column" style="position: absolute; right: 35px; top: 190px;"> {{-- Left menu with related categories --}}
    <div class="ui segment" style="margin-top:-175px;">
        <H3>Где учиться?</H3>
        <a href="{{ route('linked_specialities', [$speciality, 'inst' => request('inst')]) }}"
              class="header">
                Учебные заведения 
        </a>
    </div>
      <div class="ui segment"> {{-- 'Related' segment --}}
        <div class="eleven wide column">
            
            <h3 style="margin-bottom: 33px;">Связанные Профессии</h3></div>

        <div class="ui very relaxed divided list"> {{-- List --}}
          
         <div class="item"> 


            
            <div class="content">
                 @foreach ($professions as $profession)
                    <a href="{{ route('profession.show', $profession) }}" 
                      class="header">
                        <i class="small teal travel middle aligned icon"></i>
                      {{ $profession->title }}</a><br>
                      @endforeach
                    </div>
                
          </div>
           {{-- End of professions item --}}
        </div> {{-- End of list --}}
      </div> {{-- End of 'related' segment --}}
    </div> {{-- End of column --}}
    <br>
</div> {{-- End of grid --}}
</div>
@endsection