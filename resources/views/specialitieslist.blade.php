@extends ('layouts.base')

@section ('title', 'Специальности')


@section('content')
	<div id="subpage" style="padding-bottom: 30px;">
      <h1>Спецальности по направлению "{{ $direction->title }}"</h1>  
        <hr size="1" color="#ff831f">
        <hr size="1" color="#ff5500">
        <hr size="1" color="#ffb47a">
        {{-- @if (count($specialities))
          <div class="ui large celled very relaxed selection list">
          @foreach ($specialities as $speciality)
                <div class="university item" style="cursor: default;">
                    <div class="ui right pointing right floated icon dropdown basic button content" style="left: 0px; width: 940px;">
                      <div class="content">
                        <a class="header" href="{{ route('specialities.show', $speciality) }}"><i class="teal student icon"></i>{{ $speciality->getNameWithCodeOrName() }}</a>
                      </div>
                    </div>
                </div>
          @endforeach
          </div> --}}
          
          @if (count($specialities))
    	    <div class="ui large celled very relaxed selection list" >
        	    @foreach ($specialities as $specialty)
        	          <div class="university item" style="cursor: default;">
        	            <div class="content" style="margin-bottom: 13px;">
        					<a  href="{{ route('specialities.show', $specialty) }}">
        		              	<i class="teal student icon"></i>&nbsp;{{ $specialty->title }}
        		            </a>
        	            </div>
        	          </div>
        	    @endforeach
    	    </div>
	
          {{ $specialities->links() }}
          
        @endif
    </div>
	

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>

<script>
    $('.menu .item').tab();
</script>
@endsection