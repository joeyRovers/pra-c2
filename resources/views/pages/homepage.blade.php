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

    {{-- Alleen je naam tonen --}}
    <div class="alert alert-info">
        Welkom, {{ $name }}!
    </div>


    @if(isset($topManuals) && count($topManuals) > 0)
    <h2 class="text-center">Populair manuals</h2>
    <ul class="list-unstyled text-center">
        @foreach($topManuals as $manual)
            <li>
                <a href="/{{ $manual->brand->id }}/{{ $manual->brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/">{{ $manual->brand->name }}: {{ $manual->name }}</a>
                <small>({{ $manual->views }} views)</small>
            </li>
        @endforeach
    </ul>
    @endif



    <div class="brands-container">
        @foreach($brandsByCategory as $categoryName => $brands)
            <div class="category-dropdown">
                <div class="category-header" onclick="toggleCategory('{{ Str::slug($categoryName) }}')">
                    <h2 class="category-title">
                        {{ $categoryName }}
                        <span class="brand-count">({{ count($brands) }} brands)</span>
                        <i class="dropdown-arrow" id="arrow-{{ Str::slug($categoryName) }}">▼</i>
                    </h2>
                </div>

                <div class="category-content" id="content-{{ Str::slug($categoryName) }}">
                    <?php
                    $size = count($brands);
                    $columns = 3;
                    $chunk_size = ceil($size / $columns);
                    ?>

                    <div class="row">
                        @foreach($brands->chunk($chunk_size) as $chunk)
                            <div class="col-md-4">
                                <ul class="list-unstyled">
                                    @foreach($chunk as $brand)
                                        <li class="text-center">
                                            <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function toggleCategory(categorySlug) {
            const content = document.getElementById('content-' + categorySlug);
            const arrow = document.getElementById('arrow-' + categorySlug);
            const header = arrow.closest('.category-header');

            if (content.style.display === 'none' || content.style.display === '') {
                // Open this category
                content.style.display = 'block';
                arrow.innerHTML = '▲';
                arrow.classList.add('expanded');
                header.classList.add('active');

                // Smooth scroll to category if not in view
                setTimeout(() => {
                    header.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }, 100);
            } else {
                // Close this category
                content.style.display = 'none';
                arrow.innerHTML = '▼';
                arrow.classList.remove('expanded');
                header.classList.remove('active');
            }
        }

        // Add expand/collapse all functionality
        function toggleAllCategories(expand = true) {
            const contents = document.querySelectorAll('.category-content');
            const arrows = document.querySelectorAll('.dropdown-arrow');
            const headers = document.querySelectorAll('.category-header');

            contents.forEach((content, index) => {
                if (expand) {
                    content.style.display = 'block';
                    arrows[index].innerHTML = '▲';
                    arrows[index].classList.add('expanded');
                    headers[index].classList.add('active');
                } else {
                    content.style.display = 'none';
                    arrows[index].innerHTML = '▼';
                    arrows[index].classList.remove('expanded');
                    headers[index].classList.remove('active');
                }
            });
        }

        // Initialize all dropdowns as collapsed
        document.addEventListener('DOMContentLoaded', function() {
            const contents = document.querySelectorAll('.category-content');
            contents.forEach(function(content) {
                content.style.display = 'none';
            });

            // Add keyboard support
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    toggleAllCategories(false);
                }
            });
        });
    </script>
</x-layouts.app>
