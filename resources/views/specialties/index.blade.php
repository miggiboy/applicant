@extends ('layouts.master')

@section ('title')
  Специальности | Edukey
@endsection

@section ('content')
<br>
<div class="ui grid">

  <div class="thirteen wide column">
    <div class="ui very padded segment">
      <form class="ui small form" action="{{ route('specialities.search') }}" method="get">
          <div class="three fields">

            <div class="eight wide field">
              <div class="ui fluid search specialities">
                <div class="ui right icon input">
                  <input type="text" name = "query" value="{{ old('query') }}" class="prompt" placeholder="Начните вводить название или код специальности ...">
                  <i class="search icon"></i>
                </div>
              </div>
            </div>

            <div class="six wide field">
                <select class="ui selection search dropdown" name="direction">
                  <option value="">Направление</option>
                  <option value=" ">Не выбрано</option>
                    @foreach (Direction::getByInstitution(request('inst')) as $direction)
                      <option value="{{ $direction->id }}" 
                              {{ (old('direction') == $direction->id) ? 'selected' : '' }}>
                        {{ $direction->title }}
                      </option>
                    @endforeach
                </select>
            </div>

            <div class="four wide field">
              <input type="submit" value="Поиск" class="ui small basic button">
            </div>
          </div>

          <input type="hidden" name="inst" value="{{ request('inst') }}">

          <div class="three fields" style="margin-bottom: 17px;">
            <div class="three wide field" style="margin-top: 7px;">
              <div class="ui checkbox">
                <input type="checkbox" 
                       name="without_subjects"
                       value="1"
                       tabindex="0" 
                       class="hidden"
                       {{ (request('without_subjects') == "1") ? 'checked' : '' }}>
                <label>Без предметов</label>
              </div>
            </div>

            <div class="three wide field" style="margin-top: 7px;">
              <div class="ui checkbox">
                <input type="checkbox" 
                       name="without_description"
                       value="1"
                       tabindex="0" 
                       class="hidden"
                       {{ (request('without_description') == "1") ? 'checked' : '' }}>
                <label>Без описания</label>
              </div>
            </div>

            <div class="field" style="margin-top: 7px;">
              <div class="ui checkbox">
                <input type="checkbox" 
                       name="without_direction"
                       value="1"
                       tabindex="0" 
                       class="hidden"
                       {{ (request('without_direction') == "1") ? 'checked' : '' }}>
                <label>Без направления</label>
              </div>
            </div>

          </div>

          <p>{{ Speciality::getGrammaticallyCorrectCount($specialities->total()) }}</p>
      </form>
      <br>

      @if (count($specialities))
          <div class="ui large celled very relaxed selection list">
          @foreach ($specialities as $speciality)
                <div class="university item" style="cursor: default;">
                  <div class="ui right pointing right floated icon dropdown basic button content">
                    <i class="ellipsis vertical icon"></i>
                    <div class="menu">
                      <div class="header"><i class="tags icon"></i>  Опции </div>
                      <div class="divider"></div>
                      <a href="{{ route('specialities.edit', [$speciality->id, 'inst' => request('inst')]) }}" class="item">
                        <i class="blue edit icon"></i>  Редактировать 
                      </a>
                      <div class="divider"></div>
                      <a href="{{ route('specialities.destroy', [$speciality->id, 'inst' => request('inst')]) }}" 
                         class="item">
                         <i class="red delete icon"></i>  Удалить 
                      </a>
                    </div>
                  </div>

                  <i class="teal student icon"></i>
                  <div class="content">
                    <a class="header" href="{{ route('specialities.show', [$speciality, 'inst' => request('inst')]) }}">
                      {{ $speciality->getNameWithCodeOrName() }}
                    </a><br>
                    {{ $speciality->direction->title }}
                  </div>
                </div>
          @endforeach
          </div>
      @endif
      </div>
  </div>

  <div class="three wide column">
    <div class="ui vertical teal menu">
        <div class="item">
          <div class="header">Направления</div>
          <div class="menu">
            @foreach ($directions as $direction)
              <a href="{{ route('specialities.search', ['inst' => (bool) request('inst'), 'direction' => $direction->id]) }}" class="item">
                {{ $direction->title }}
              </a>
            @endforeach
          </div>
        </div>
      </div>
  </div>

</div>

<br>

{{ $specialities->appends(request()
    ->except('page', '_token'))
    ->links('vendor.pagination.default')
}}
<br><br>

@endsection