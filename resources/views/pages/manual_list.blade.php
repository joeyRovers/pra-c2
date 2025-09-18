<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>


    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand'=>$brand->name]) }}</p>


	@if(isset($topManuals) && count($topManuals) > 0)
		<h2 class="text-center">Populaire handleidingen</h2>
		<ul class="list-unstyled">
		@foreach($topManuals as $manual)
			<li>
				<a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/">{{ $manual->name }}</a>
				<small>({{ $manual->views }} views)</small>
			</li>
		@endforeach
		</ul>
	@endif


        @foreach ($manuals as $manual)

            <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>
            ({{$manual->filesize_human_readable}})

            <br />
        @endforeach

</x-layouts.app>
