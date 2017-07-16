@extends ('layouts.base')

@section ('title')
    {{ $article->title }}
@endsection

@section ('content')
   <div id="subpage">
        <h1>{{ $article->title }}</h1>
          <p>{{ $article->short_description }}</p>
          <p>{!! $article->full_description !!}</p>
        </div>
   </div>
@endsection
