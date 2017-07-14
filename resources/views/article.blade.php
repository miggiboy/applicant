@extends ('layouts.base')

@section ('title', 'Самые востребованные профессии в мире 2017')



@section ('content')
       <div id="subpage">
                   <h1>{{ $article->title }}</h1>
                  <p>{{ $article->short_description }}</p>
                  <p id="edit-area">{!! $article->full_description !!}</p>
             
            
               
                </div>
       </div>
@endsection
    
  
  