@if (isset($postImages))
@foreach ($postImages as $postImage)
<img src="{{ asset('storage/images/posts/' . $postImage) }}">
@endforeach
@endif
