<div class="ui-block">
    <div class="ui-block-title">
        <h6 class="title">@lang('Last Photos')</h6>
    </div>
    <div class="ui-block-content">

        <!-- W-Latest-Photo -->

        <ul class="widget w-last-photo js-zoom-gallery">
            @foreach ($postImages as $image)
                <li>
                    <a href="{{ asset('storage/images/posts/' . $image) }}">
                        <img class="last-photos" src="{{ asset('storage/images/posts/' . $image) }}" alt="photo">
                    </a>
                </li>
            @endforeach
        </ul>
        <!-- .. end W-Latest-Photo -->
    </div>
</div>
