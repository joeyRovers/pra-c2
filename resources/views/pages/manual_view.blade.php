<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="View manual for '{{$brand->name}}'" title="View manual for '{{$brand->name}}'">View</a></li>
    </x-slot:breadcrumb>

    <h1>{{ $brand->name }} - {{ $manual->name }}</h1>

    @if ($manual->locally_available)
        <iframe src="{{ $manual->url }}" width="780" height="600" frameborder="0" marginheight="0" marginwidth="0">
        Iframes are not supported<br />
        <button class="manual-btn" onclick="window.open('{{ $manual->url }}', '_blank')">Download de handleiding</button>
        </iframe>
    @else
        <button class="manual-btn" onclick="window.open('{{ $manual->url }}', '_blank')">Download de handleiding</button>
    @endif

</x-layouts.app>
