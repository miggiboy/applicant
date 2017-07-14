@extends ('layouts.base')

@section ('title', 'Специальности')


@section('content')
    <div id="subpage">
      <h1>Спецальности высшего и средне-специального образования</h1>  
      <p>Результаты поиска по запросу: "{{ old('query') }}"</p>
      <hr size="1" color="#ff831f">
        <hr size="1" color="#ff5500">
        <hr size="1" color="#ffb47a">
      <form action="{{ route('specialties.search') }}" method="get"><p><div class="ui icon input" style="height: 43px;">
        <input type="text" name = "query" value="{{ old('query') }}" class="prompt" placeholder="Введите название или код специальности ..."  style="width: 864px;margin-right: 12px;">
        <i class="search icon"></i>
        <input type="submit" value="Найти">
      </div></p>
      </form>
      <hr size="1" color="#ff831f">
        <hr size="1" color="#ff5500">
        <hr size="1" color="#ffb47a">
        @if (count($specialities))
          <div class="ui large celled very relaxed selection list">
          @foreach ($specialities as $speciality)
                <div class="university item" style="cursor: default;">
                 
                  <div class="content">
                    <a class="header" href="{{ route('specialities.show', [$speciality, 'inst' => request('inst')]) }}">
                     <i class="teal student icon"></i>
                     {{ $speciality->getNameWithCodeOrName() }}
                    </a><br>
                    {{ $speciality->direction->title }}
                  </div>
                </div>
          @endforeach
          </div>
      @endif
      {{ $specialities->appends(request()
    ->except('page', '_token'))
    ->links('vendor.pagination.default')
}}
    </div>
	

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>

<script>
    $('.menu .item').tab();
</script>
@endsection