@extends ('layouts.base')

@section ('title')
  {{ $subject->title }}
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
              @if ($subject->hasFilesIn($category))
                <a class="item" data-tab="{{ $category->id }}-tab">
                  {{ $category->display_title }}
                </a>
              @endif
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
                      @foreach ($specialties as $specialty)
                      <tr>
                          <td class="single line">
                              <a href="{{ route('specialties.show', $specialty) }}">
                                {{ $specialty->title }}
                              </a>
                          </td>
                          <td>
                              @php
                                  $secondSubject = $specialty->getAnother($subject);
                              @endphp

                              @if ($secondSubject)
                                  <a href="{{ route('subjects.show',  $secondSubject) }}">
                                      {{ $secondSubject->title }}
                                  </a>
                              @endif
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
        @endif
        @foreach ($subject->fileCategories as $category)
          @php
              $files_in_category = $subject->getMedia($category->title);
          @endphp

          @if (count($files_in_category))
            <div class="ui tab segment t" data-tab="{{ $category->id }}-tab" style="width: 717px;">
              @foreach ($files_in_category as $file)
                <div id='doc'>
                  <div id="doc_icon">
                      <a href="{{ $file->path }}" download>
                        @if (file_exists($path = "/img/icons/file-icons/{$file->extension}.svg"))
                          <img src="{{ $path }}" width='40' alt="doc">
                        @else
                          <img src="/img/icons/file-icons/file.svg">
                        @endif
                      </a>
                  </div>
                  <div id="doc_title">
                      <p>
                        <a href="{{ $file->getUrl() }}" download>
                          <b style="color:#194f67;">{{ $file->name }}</b><br>
                        </a>
                      </p>
                  </div>
                </div>
              @endforeach
          </div>
          @endif
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
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
<script>
    $('.menu .item').tab();
</script>
<script src="jquery.blueberry.js"></script>
<script>
    $(window).load(function() {
        $('.blueberry').blueberry();
    });
</script>
@endsection
