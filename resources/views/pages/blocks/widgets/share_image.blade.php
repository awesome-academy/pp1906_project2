<div class="post-block-photo js-zoom-gallery">
    @php
        $images = json_decode($post->image);
    @endphp

    @foreach ($images as $key => $postImage)
        @if (count($images) <= 4)
            <a class="
            @if (count($images) == 2 || count($images) == 4 || $key != 0) 
                half-width
            @else
                full-width
            @endif 
            no-event">
                <img src="{{ asset('storage/images/posts/' . $postImage) }}" alt="photo">
            </a>
        @elseif (count($images) > 4)
            <a class="
            @if ($key < 3) 
                half-width
            @elseif ($key == 3)
                half-width more-photos
            @else
                half-width display-none
            @endif no-event">
                <img src="{{ asset('storage/images/posts/'. $postImage) }}" alt="photo">
                @if ($key == 3)
                    <span class="h2">+{{ count($images) - 3 }}</span>
                @endif
            </a>
        @endif
    @endforeach
</div>