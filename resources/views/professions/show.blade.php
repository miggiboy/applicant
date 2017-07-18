@extends ('layouts.base')

@section ('title')
  Профессия - {{ $profession->title }}
@endsection

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
          <span>Категория:
            <a href="{{ route('professions.index', $profession->category) }}">
              {{ $profession->category->title }}
            </a>
          </span>
          <br><br>
          <p>{{ $profession->short_description }}</p>
          <p>{!! $profession->full_description !!}</p>
          @if ($profession->specialties()->count())
            <h2>Связанные специальности</h2>
            @foreach ($profession->specialties as $specialty)
              <div class="item">
                  <div>
                      <a href="{{ route('specialties.show', $specialty) }}" class="header" title="{{ $specialty->title }}">
                        <i class="small teal travel middle aligned icon"></i> {{ $specialty->title }}
                      </a>
                  </div>
              </div>
            @endforeach
          @endif
      </div>
  </div>
@endsection
