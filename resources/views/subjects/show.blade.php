@extends ('layouts.base')

@section ('title')
    {{ $subject->title . ' | Выпускник.kz'  }}
@endsection

@section ('styles')
    <link rel="stylesheet" href="/css/blueberry.css">
@endsection


@section('content')
        
    <div id="subject_block">
        <div id="subject_title">
            <div id="subject_name">
                <h1>{{ $subject->title }}</h1> 
            </div>
            {{-- <button class="ui orange button">Сдать тест</button> --}}
        </div>
        <hr size="1" color="#ff831f">
        <hr size="1" color="#ff5500">
        <hr size="1" color="#ffb47a">
            <div id="subject_docs">
<div class="ui pointing secondary menu">
    @if ($subject->is_profile)
        <a class="item active" data-tab="specialties">Специальности</a>
    @endif
    
    @foreach ($subject->fileCategories as $category)
        <a class="item" data-tab="{{ $category->id }}-tab">{{ $category->display_title }}</a>
    @endforeach
</div>
  
  @if ($subject->is_profile)
    <div class="ui tab segment active t" data-tab="specialties" style="width: 717px;">
      <table class="ui celled padded table">
		  <thead>
			<tr>
				<th class="single line">Специальность</th>
				<th>Второй предмет</th>
			 </tr>
		  </thead>
		  <tbody>
		   @foreach ($subject->getSpecialties() as $speciality)
			 <tr>
			    
			  <td class="single line">
			      <a href="{{ route('specialities.show', $speciality) }}">{{ $speciality->title }}</a>
			  </td>
			  <td>
			      <a href="{{ route('subject.show', $speciality->subjects->where('id', '!=', $subject->id)->where('id', '!=', $subject->parent_id)->first()) }}">
			          
			          {{ $speciality->subjects->where('id', '!=', $subject->id)->where('id', '!=', $subject->parent_id)->first()->title }}
			      </a>
			  </td>
			  
			</tr>
		   @endforeach
		  </tbody>
		</table>
    </div>
  @endif
    @foreach ($subject->fileCategories as $category)
      <div class="ui tab segment t" data-tab="{{ $category->id }}-tab" style="width: 717px;">
        @foreach ($subject->files->where('category_id', $category->id) as $file)
            <div id='doc'>
                <div id="doc_icon">
                  <a href="{{ $file->path }}" target="_blank">
                      @if (file_exists(public_path('/img/icons/file-icons/' . $file->extension() . '.svg')))
                        <img src="{{ '/img/icons/file-icons/' . $file->extension() . '.svg' }}" width='40' alt="doc">
                      @else
                        <img src="/img/icons/file-icons/file.svg">
                      @endif
                  </a>
                </div>
                <div id="doc_title">
                  <p><a href="{{ $file->path }}" target="_blank"><b style="color:#194f67;">{{ $file->display_name }}</b><br></p>
                  </a>
                </div>
            </div>
        @endforeach
      </div>
    @endforeach
</div>
</div>
<div id = "com">
    <div class="blueberry">
                      <ul class="slides">
                        <li><img src="/img/advert.jpg" alt="Вузы"></li>
                        <li><img src="/img/advert.jpg" alt="Вузы"></li>
                        <li><img src="/img/advert.jpg" alt="Вузы"></li>
                        <li><img src="/img/advert.jpg" alt="Вузы"></li>
                      </ul>
                </div>
</div>
{{-- <div id ="seealso">
<b>С предметом Физика также сдают</b><br><br>
  <a href="#">Математика</a><br>
  <a href="#">Математика</a><br>
  <a href="#">Математика</a>
</div> --}}
    </div>

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>

<script>
    $('.menu .item').tab();
</script>
     <script src="jquery.blueberry.js">
            
        </script>
        <script>
            $(window).load(function() {
                $('.blueberry').blueberry();
            });
        </script>
@endsection