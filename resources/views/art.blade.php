@extends ('layouts.base')

@section ('title', 'Специальности')


@section('content')
		<div id="subpage">
      <h1>Спецальности по направлению "Искуство"</h1>  
      <p>Чтобы просмотреть специальности для колледжа выбирите вкладку "Колледж"</p>
        <hr size="1" color="#ff831f">
        <hr size="1" color="#ff5500">
        <hr size="1" color="#ffb47a">
      <div class="ui pointing secondary menu">
            <a class="item g active" data-tab="first">ВУЗ (бакалавриат)</a>
            <a class="item g" data-tab="second">Колледж</a>
          </div>
          <div class="ui tab segment t active" data-tab="first">
            @if (count($specialities))
          <div class="ui large celled very relaxed selection list">
          @foreach ($specialities as $speciality)
                <div class="university item" style="cursor: default;">
                  <div class="ui right pointing right floated icon dropdown basic button content" style="left: 0px; width: 940px;">
                    

                  
                  <div class="content">
                    <a class="header" href="{{--{{ route('specialities.show', [$speciality->id]) }}--}}"><i class="teal student icon"></i>{{ $speciality->getNameWithCodeOrName() }}</a>
                  </div>
                </div>
                </div>
          @endforeach
          </div>
      @endif
          
          <br>

            {{ $specialities->appends(request()
                ->except('page', '_token'))
                ->links('vendor.pagination.default')
            }}
            <br>
             <br>
            </div>
          <div class="ui tab segment t" data-tab="second">
            @if (count($specialitiesC))
          <div class="ui large celled very relaxed selection list">
          @foreach ($specialitiesC as $speciality)
                <div class="university item" style="cursor: default;">
                  <div class="ui right pointing right floated icon dropdown basic button content" style="left: 0px; width: 940px;">
                    <div class="content">
                    <a class="header" href="{{--{{ route('specialities.show', [$speciality->id]) }}--}}"><i class="teal student icon"></i>{{ $speciality->getNameWithCodeOrName() }}</a>
                  </div>
                </div>
                </div>
          @endforeach
          </div>
      @endif
          
          <br>

            {{ $specialities->appends(request()
                ->except('page', '_token'))
                ->links('vendor.pagination.default')
            }}
            <br>
             <br>
          </div>
    </div>
	

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>

<script>
    $('.menu .item').tab();
</script>
@endsection