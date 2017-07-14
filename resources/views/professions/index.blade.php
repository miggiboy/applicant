@extends ('layouts.base')

@section ('title', 'Выпускник')

@section ('styles')
    <link rel="stylesheet" href="/css/blueberry.css">
@endsection

@section ('content')
<br><br>
<div class="ui grid">

  <div class="thirteen wide column">
    <div class="ui very padded segment">
      <form class="ui small form" action="{{ route('professions.search') }}" method="GET">

          <div class="three fields">

            <div class="eight wide field">
              <div class="ui fluid professions search">
                <div class="ui right icon input">
                  <input type="text" name = "query" value="{{ old('query') }}" class="prompt" placeholder="Начните вводить название профессии ...">
                  <i class="search icon"></i>
                </div>
              </div>
            </div>

            <div class="four wide field">
                <select class="ui selection search dropdown" name="direction">
                  <option value="">Проф-направление</option>
                  <option value=" ">Не выбрано</option>
                   @foreach ($profDirections as $profDirection)
                     <option value="{{ $profDirection->id }}"
                             {{ (old('direction') == $profDirection->id) ? 'selected' : '' }}>
                       {{ $profDirection->title }}
                     </option>
                   @endforeach
                </select>
              </div>

              <div class="four wide field">
                <input type="submit" value="Поиск" class="ui small basic button">
              </div>
          </div>

          <p>{{ Profession::getGrammaticallyCorrectCount($professions->total()) }}</p>
      </form>

      <br>
      @if (count($professions))
          <div class="ui large celled very relaxed list">
          @foreach ($professions as $profession)
                <div class="university item" style="cursor: default;">
                  <div class="ui right pointing right floated icon dropdown basic button content">
                    <i class="ellipsis vertical icon"></i>
                    
                  </div>

                  <i class="teal travel icon"></i>
                  <div class="content">
                    <a class="header" href="{{ route('profession.show', $profession) }}">
                      {{ $profession->title }}
                    </a><br>
                    {{ $profession->profDirection->title }}
                  </div>
                </div>
          @endforeach
          </div>
      @endif
      <br>
      </div>
  </div>

  <div class="three wide column">
      <div class="ui vertical teal menu">
        <div class="item">
          <div class="header">Проф-направелния</div>
          <div class="menu">
            @foreach ($profDirections as $profDirection)
              <a href="{{ route('professions.search', ['direction' => $profDirection->id]) }}"
                 class="item">
                {{ $profDirection->title }}
              </a>
            @endforeach
          </div>
        </div>
      </div>
  </div>
</div>
<br>

{{ $professions->appends(request()
    ->except('page', '_token'))
    ->links('vendor.pagination.default')
}}
<br><br>

@endsection
