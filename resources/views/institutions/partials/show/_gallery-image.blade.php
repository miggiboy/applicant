<a href="{{ route('home') }}/">
    <img alt="{{ $image->name }}"
         src="{{ $image->getUrl('thumb') }}"
         data-image="{{ $image->getUrl() }}"
         data-description="{{ $image->name }}"
         style="display:none">
</a>
