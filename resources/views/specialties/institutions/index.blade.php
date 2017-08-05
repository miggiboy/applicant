@extends ('layouts.base')

@section ('title')
  {{ translate($institutionType, 'i', 'p', true) . ' с ' . translate($specialty->type, 't', 's') . $specialty->title }}
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
          {{ translate($institutionType, 'i', 'p', true) . ' с ' . translate($specialty->type, 't', 's') }} <br>
          <a href="{{ route('specialties.show', $specialty) }}">
            {{ str_limit($specialty->title, 50) }}
          </a>
      </h2>
      <form id="poi"
            class="ui small form"
            action="{{ route('specialties.institutions.index', [$institutionType, $specialty]) }}"
            method="get">

          <div class="ui action input">
              @if ($institutionType == 'college' && $specialty->typeIs('specialty'))
                <select class="ui compact selection dropdown" id="select" name="qualification" style="width: 200px;">
                    <option value=" " selected="selected">Все Квалификации</option>
                    @foreach ($specialty->qualifications as $qualification)
                      <option value="{{ $qualification->id }}"
                              {{ request('qualification') == $qualification->id ? 'selected' : '' }}>
                        {{ $qualification->title }}
                      </option>
                    @endforeach
                </select>
              @endif

              <select class="ui compact selection dropdown" id="select" name="city" style="width: 200px;">
                  <option value=" " selected="selected">Все города</option>
                  @foreach ($cities as $city)
                    <option value="{{ $city->id }}"
                            {{ request('city') == $city->id ? 'selected' : '' }}>
                      {{ $city->title }}
                    </option>
                  @endforeach
              </select>

              <select class="ui compact selection dropdown" id="select" name="study_form" style="width: 162px;">
                  <option value=" " selected="selected">Форма обучения</option>
                  @foreach (Specialty::studyForms() as $form)
                    <option value="{{ $form }}"
                            {{ request('study_form') == $form ? 'selected' : '' }}>
                      {{ translate($form, 'i', 's', true) }}
                    </option>
                  @endforeach
              </select>
              <input type="submit"
                     form="poi"
                     class="ui button"
                     style="left: 0px;height: 43px;background: #ff8a21;color: white;width:165px;"
                     value="Поиск">
          </div>
      </form>
      @if ($specialty->institutions->count())
        <table class="ui celled striped table">
            <thead>
                <th style="width: 400px;">Учебное заведение</th>
                <th style="width: 120px;">Форма обучения</th>
                <th style="width: 120px;">Цена за год</th>
                <th style="width: 120px;">Срок обучения</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($specialty->institutions as $institution)
                  <tr>
                      <td>
                          <h4 class="ui header">
                              <div class="content">
                                  <a href="{{ route('institutions.show', [str_plural($institution->type), $institution]) }}">
                                    {{ $institution->title }}
                                  </a>
                                  <div class="sub header"> {{ $institution->city->title }}</div>
                              </div>
                          </h4>
                      </td>
                      <td>
                          {{ translate($institution->pivot->form, 'i', 's', true) }}
                      </td>
                      <td>
                          @if (isset($institution->pivot->study_price))
                            @if ($institution->pivot->study_price == 0)
                              <b style="color:#ff831f">Бюджет</b>
                            @elseif ($institution->pivot->study_price>1)
                              {{ $institution->pivot->study_price }} тг
                            @endif
                          @endif
                      </td>
                      <td class="right aligned collapsing">{{ $institution->pivot->study_period }}</td>
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
