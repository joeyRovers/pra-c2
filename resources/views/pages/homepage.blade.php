<x-layouts.app>


    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>


    @if(isset($topManuals) && count($topManuals) > 0)
    <h2 class="text-center">Popular manuals</h2>
    <ul class="list-unstyled text-center">
        @foreach($topManuals as $manual)
            <li>
                <a href="/{{ $manual->brand->id }}/{{ $manual->brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/">{{ $manual->brand->name }}: {{ $manual->name }}</a>
                <small>({{ $manual->views }} views)</small>
            </li>
        @endforeach
    </ul>
    @endif


    <?php
    $size = count($brands);
    $columns = 3;
    $chunk_size = ceil($size / $columns);
    ?>

    <div class="brands-container text-center">
        <div class="row">

            @foreach($brands->chunk($chunk_size) as $chunk)
                <div class="col-md-4">

                    <ul class="list-unstyled">
                        @foreach($chunk as $brand)

                            <?php
                            $current_first_letter = strtoupper(substr($brand->name, 0, 1));

                            if (!isset($header_first_letter) || (isset($header_first_letter) && $current_first_letter != $header_first_letter)) {
                                echo '</ul>
						<h2 class="text-center">' . $current_first_letter . '</h2>
						<ul class="list-unstyled">';
                            }
                            $header_first_letter = $current_first_letter
                            ?>

                            <li class="text-center">
                                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a>
                            </li>
                        @endforeach
                    </ul>

                </div>
                <?php
                unset($header_first_letter);
                ?>
            @endforeach

        </div>
    </div>
</x-layouts.app>
