@extends ('layouts.base')


@section ('content')
    
<form class="ui form" action="{{ route('vuz_search') }}" method="post">
        {{ csrf_field() }}

        <div class="fields">

            <div class="four wide field">
                <label for="query">Название</label>
                <input type="text" name="query" id="query">
            </div>

            <two class="three wide field">
                <div class="ui dropdown">
              <i class="filter icon"></i>
              <span class="text">Filter Posts</span>
              <div class="menu">
                <div class="divider"></div>

                <div class="header">
                  <i class="tags icon"></i> Города
                </div>

                <div class="menu">
                
                  <div class="item">
                    <label for="cities">Города</label>
                    <select name="cities[]" id="cities" multiple="" class="ui search dropdown">
                      <option value="">Города</option>
                      @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->title }}</option>
                      @endforeach
                    </select>
                  </div>

                </div>
              </div>
            </div
            </two>

            <div class="six wide field">
                <label for="cities">Города</label>
                <select name="cities[]" id="cities" multiple="" class="ui search dropdown">
                  <option value="">Города</option>
                  @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->title }}</option>
                  @endforeach
                </select>
            </div>

            <div class="six wide field">
            </div>
        </div>
        <button type="submit" class="ui button">Submit</button>
    </form>

@endsection

@section('script')

<script>
$('.max.example .ui.special.dropdown').dropdown({
    useLabels: false
  });
</script>

@endsection