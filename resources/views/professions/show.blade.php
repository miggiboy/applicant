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
       @if ($profession->specialities()->count())
      <h2>Связанные специальности</h2>
         @foreach ($profession->specialities as $specialty)
              <div class="item"> {{-- Professions item --}}

                
                <div>
                  <a href="{{ route('specialities.show', $specialty) }}" class="header" title="{{ $specialty->title }}">
                    <i class="small teal travel middle aligned icon"></i>{{ str_limit($specialty->title, 100) }}
                  </a>
                </div>


              </div> {{-- End of professions item --}}
            @endforeach
        @endif
    </div>
    </div>
@endsection
