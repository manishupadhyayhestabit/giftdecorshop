@unless ($breadcrumbs->isEmpty())

    <p>
        @foreach ($breadcrumbs as $breadcrumb)

            @if (!is_null($breadcrumb->url) && !$loop->last)
                <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a> /
            @else
                {{ $breadcrumb->title }}
            @endif

        @endforeach
    </p>

@endunless