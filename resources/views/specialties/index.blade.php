@extends ('layouts.base')

@section ('title')
  Специальности направления {{ $direction->title }}
@endsection

@section('content')
  <div id="subpage" style="padding-bottom: 30px;">
      <h1>Спецальности по направлению "{{ $direction->title }}"</h1>
      <hr size="1" color="#ff831f">
      <hr size="1" color="#ff5500">
      <hr size="1" color="#ffb47a">
      @include ('specialties/partials/list')
  </div>
@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
  <script>
      $('.menu .item').tab();
  </script>
@endsection
