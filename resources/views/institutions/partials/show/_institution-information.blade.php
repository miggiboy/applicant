<div id="vusik">
    <div  style="width:650px;height:50px;float:left;position:relative;">
        @if ($institution->hasLogo())
            <img src="{{ $institution->logo()->getUrl('thumb') }}"
                style=" width:30px;
                height:30px;
                float:left;
                position:relative;
                margin:7px;
                margin-top:9px;">
        @endif

        <h4 style="color:#194f67;"> {{ $institution->title }}
            @if ($institution->abbreviation)
                ({{ $institution->abbreviation }})
            @endif
        </h4>
    </div>
    <br><br><br>
    <hr size="1" color="#ff831f">
    <hr size="1" color="#ff5500">
    <hr size="1" color="#ffb47a">
    <div id="vuz_info">
        <p>{!! $institution->description !!}</p>
        @if ($institution->foundation_year)
            <p>Основан в {{ $institution->foundation_year }} г.</p>
        @endif
    </div>
    @if (isset($institution->has_dormitory) || isset($institution->has_military_dep))
        <div id="vuz_info_2">
            @isset ($institution->has_dormitory )
                @if ($institution->has_dormitory == true)
                    <i class="add circle icon" style="color: #ff831f;"  title="Есть общежитие"></i>
                @else
                    <i class="minus circle icon" style="color: #194f67;"  title="Нет общежития"></i>
                @endif
                <b style="color:#565554;">Общежитие</b>
            @endisset

            @isset($institution->has_military_dep)
                @if ($institution->has_military_dep == true)
                    <i class="add circle icon" style="color: #ff831f;"  title="Есть военная кафедра"></i>
                @else
                    <i class="minus circle icon" style="color: #194f67;"  title="Нет военной кафедры"></i>
                @endif
                <b style="color:#565554;">Военная кафедра</b>
            @endisset
        </div>
    @endif

    @if($institution->is_paid)
        @if ($institution->getMedia('*')->count())
            <div style="width:690px;float:left;position:relative;">
                <div id="gallery" style="display:none;">
                    @if ($logo = $institution->getMedia('logo'))
                        @include ('institutions/partials/show/_gallery-image', [
                            'image' => $logo
                        ])
                    @endif
                    @if ($media = $institution->getMedia('images'))
                        @each ('institutions/partials/show/_gallery-image', $media, 'image')
                    @endif
                </div>
            </div>
        @endif
        <div style="width: 666px; float: left; position: relative; margin-left: 25px;">
            <article>
                <p>{!! $institution->extra_description !!}</p>
            </article>
        </div>
    @endif
    <br>
    <div id="vuz_info1">
        @isset($institution->reception)
            <b><br>Приемная комисссия</b><br>
            <p>{!! $institution->reception->info !!}</p>
        @endisset
    </div>
</div>
