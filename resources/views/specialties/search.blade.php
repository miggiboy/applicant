@extends ('layouts.base')

@section ('title')
  Поиск по специальностям
@endsection

@section('content')
  <div id="subpage" style="padding-bottom: 30px;">
      @include ('specialties/partials/search_form_with_page_title')
      @include ('specialties/partials/list')
  </div>
@endsection
