@if (count($specialties))
  <div class="ui large celled very relaxed selection list" >
      @foreach ($specialties as $specialty)
        <div class="university item" style="cursor: default;">
            <div class="content">
              <a class="header" href="{{ route('specialties.show', $specialty) }}">
               <i class="teal student icon"></i>
               {{ $specialty->getNameWithCodeOrName() }}
              </a><br>
              {{ ! $specialty->direction->is_default ? $specialty->direction->title : '' }}
            </div>
          </div>
      @endforeach
  </div>
  {{ $specialties->links() }}
@endif
