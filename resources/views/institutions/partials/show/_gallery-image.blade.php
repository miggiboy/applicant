<a href="{{ route('home') }}/">
    <img alt="{{ $image->file_name }}"
         src="{{ $image->getUrl('thumb') }}"
         data-image="{{ $image->getUrl() }}"
         data-description="{{ $image->file_name }}"
         style="display:none">
</a>
