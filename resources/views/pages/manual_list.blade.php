<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>


    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>


        @foreach ($manuals as $manual)
            <div class="manual-item">
                @if ($manual->locally_available)
                    <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="{{ $manual->name }}" title="{{ $manual->name }}" class="manual-btn">{{ $manual->name }}</a>
                    <span class="manual-size">({{$manual->filesize_human_readable}})</span>
                @else
                    <a href="{{ $manual->url }}" target="_blank" alt="{{ $manual->name }}" title="{{ $manual->name }}" class="manual-btn">{{ $manual->name }}</a>
                @endif
            </div>
        @endforeach

</x-layouts.app>
