@extends ('layouts.base')

@section ('title')
  Профессии по направлению "{{ $category->title }}"
@endsection

@section('content')
  <div id="subpage">
    <h1><a href="{{ url('/professions/categories') }}">Профессии</a> по направлению "{{ $category->title }}"</h1>
    <hr size="1" color="#ff831f">
    <hr size="1" color="#ff5500">
    <hr size="1" color="#ffb47a">
    @if (count($professions))
      <div class="ui large celled very relaxed selection list">
          @foreach ($professions as $profession)
          <div class="item" style="cursor: default;">
              <div class="content">
                  <a class="header" href="{{ route('professions.show', $profession) }}" style="font-size: 15px;">
                    <i class="teal student icon"></i> {{ $profession->title }}
                  </a>
              </div>
          </div>
          @endforeach
      </div>
      {{ $professions->links() }}
      <br>
      <br>
      <br>
    @endif
  </div>
@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
  <script>
      $('.menu .item').tab();
  </script>
@endsection
