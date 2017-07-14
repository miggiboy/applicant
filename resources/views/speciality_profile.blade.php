@extends ('layouts.base')

@section ('title', 'Профессии | Выпускник')


@section ('styles')
    <style>
      
        #subpage img {
          margin: 15px;
        }
    </style>
@endsection

@section ('content')
<div id='subpage'>
    <div class="ui container custom">
<H1>{{ $profession->title }}</H1>
      <span>Категория: <a href="{{ route('professionslist', ['direction' => $profession->profDirection->id]) }}">{{ $profession->profDirection->title }}</a></span>
      <br><br>

      <p>{{ $profession->short_description }}</p>
      <p>{!! $profession->full_description !!}</p>

    </div>
 @if ($profession->specialities()->count())
    <div style="width: 320px;position: fixed;right: 55px;top: 55px;">
      <div class="ui piled segment" style="min-height: 200px;"> {{-- 'Related' segment --}}
        <h3 class="ui header" style="margin-bottom: 30px;">Связанные специальности</h3>

        

        <div class="ui very relaxed divided list"> {{-- List --}}
         
            @foreach ($profession->specialities as $specialty)
              <div class="item"> {{-- Professions item --}}

                <div class="ui right pointing right floated icon dropdown small basic button content">
                  <i class="ellipsis vertical icon"></i>
                
                </div>

                <i class="small teal travel middle aligned icon"></i>
                <div class="content">
                  <a href="{{ route('specialities.show', $specialty->id) }}" class="header" title="{{ $specialty->title }}">
                    {{ str_limit($specialty->title, 25) }}
                  </a>
                </div>


              </div> {{-- End of professions item --}}
            @endforeach
        
        </div> {{-- End of list --}}
      </div> {{-- End of 'related' segment --}}
    </div>
@endif
    </div>
@endsection
