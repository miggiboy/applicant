@extends ('layouts.base')

@section ('title')
    {{ $institution->title }}
@endsection

@section ('styles')
    <link rel="stylesheet" href="/css/blueberry.css">
    <link rel='stylesheet' href='/vendor/unitegallery/package/unitegallery/css/unite-gallery.css'>
@endsection

@section('content')
<div id="profile">
    @include ('institutions/partials/show/_institution-information')
    @include ('institutions/partials/show/_institution-specialties')
</div>
<div id="do_ent" style="padding-top:15px;">
    @if($institution->map)
        {!! $institution->map->source_code !!}
    @else
        <iframe
            id="map"
            width="315"
            height="201"
            frameborder="0"
            style="border:0"
            src="//www.google.com/maps/embed/v1/place?key=AIzaSyAuimn2D7g29WfQTKxfhCYmCuPomoZTNRk&q={{ $institution->addressQuery() }}"
            style="margin:10px; height: 201px"
            allowfullscreen>
        </iframe>
    @endif
</div>
<div id="do_ent" style="margin-top: 20px; padding-top: 11px; padding-left: 28px; padding-right: 28px;">
    <p>
        <b style="color:#194f67;">Контакты колледжа</b><br>
    </p>
    <hr size="1" color="#ff831f">
    <hr size="1" color="#ff5500">
    <hr size="1" color="#ffb47a">
    <br>
    @if ($institution->phone_number)
        <p style="color:#565554;margin:0px;">
            <i class="call icon" style="color: #565554;"></i> {{ $institution->phone_number }}
        </p>
    @endif
    @isset($institution->reception->email)
        <p style="color:#565554;margin:0px;">
            <i class="at icon" style="color: #565554;"></i>{{ $institution->reception->email }}
        </p>
    @endisset
    @if ($institution->web_site_url)
        <p style="color:#565554;margin:0px;">
            <i class="world icon" style="color: #565554;"></i>
            <a href="{{ $institution->web_site_url }}" target="_blank">
                {{ $institution->getBaseUrl() }}
            </a>
        </p>
    @endif
    <p>
        г. {{ $institution->city->title }}
        @if ($institution->address)
        , {{ $institution->address }}
        @endif
    </p>
</div>
@isset($institution->reception)
    <div id="do_ent" style="margin-top: 20px;padding-top: 11px;padding-left: 28px;padding-right: 28px;">
        <p>
            <b style="color:#194f67;">
            Контакты приемной комиссии
            </b>
            <br>
        </p>
        <hr size="1" color="#ff831f">
        <hr size="1" color="#ff5500">
        <hr size="1" color="#ffb47a">
        <br>
        @if($institution->reception->phone)
            <p style="color:#565554;margin:0px;">
                <i class="call icon"></i>{{ $institution->reception->phone }}
            </p>
        @endif
        @if($institution->reception->phone_2)
            <p style="color:#565554;margin:0px;">
                <i class="call icon"></i>{{ $institution->reception->phone_2 }}
            </p>
        @endif
        <br>
        @if ($institution->reception->email)
            <p style="color:#565554;margin:0px;">
                <i class="at icon" ></i>{{ $institution->reception->email }}
            </p>
            <br>
        @endif
        @if ($institution->reception->address)
            <p style="color:#565554;margin:0px;">
                <i class="marker icon" ></i>{{ $institution->reception->address }}
            </p>
        @endif
    </div>
@endisset
@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js"></script>
<script src='/vendor/unitegallery/package/unitegallery/js/unitegallery.min.js'></script>
<script src='/vendor/unitegallery/package/unitegallery/themes/tilesgrid/ug-theme-tilesgrid.js'></script>
<script>
    $('#gallery').unitegallery({
      tile_width:200,
      tile_height:200,
      grid_num_rows:1,
      lightbox_type: "compact"
    });
</script>
<script src="/js/vendor/readmore/readmore.min.js"></script>
<script>
    $('article').readmore({
    collapsedHeight: 175,
    speed: 500,
    moreLink: '<a href="#">Подробнее</a>',
    lessLink: '<a href="#">Свернуть</a>'
    });
</script>
<script>
    $('.menu .item').tab();
</script>
@endsection
