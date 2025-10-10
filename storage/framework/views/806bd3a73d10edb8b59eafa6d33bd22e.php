<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

     <?php $__env->slot('introduction_text', null, []); ?> 
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100"><?php echo e(__('introduction_texts.homepage_line_1')); ?></p>
        <p><?php echo e(__('introduction_texts.homepage_line_2')); ?></p>
        <p><?php echo e(__('introduction_texts.homepage_line_3')); ?></p>
     <?php $__env->endSlot(); ?>

    <h1>
         <?php $__env->slot('title', null, []); ?> 
            <?php echo e(__('misc.all_brands')); ?>

         <?php $__env->endSlot(); ?>
    </h1>

    
    <div class="alert alert-info">
        Welkom, <?php echo e($name); ?>!
    </div>


    <?php if(isset($topManuals) && count($topManuals) > 0): ?>
    <h2 class="text-center">Populair manuals</h2>
    <ul class="list-unstyled text-center">
        <?php $__currentLoopData = $topManuals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="/<?php echo e($manual->brand->id); ?>/<?php echo e($manual->brand->getNameUrlEncodedAttribute()); ?>/<?php echo e($manual->id); ?>/"><?php echo e($manual->brand->name); ?>: <?php echo e($manual->name); ?></a>
                <small>(<?php echo e($manual->views); ?> views)</small>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <?php endif; ?>



    <div class="brands-container">
        <?php $__currentLoopData = $brandsByCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryName => $brands): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="category-dropdown">
                <div class="category-header" onclick="toggleCategory('<?php echo e(Str::slug($categoryName)); ?>')">
                    <h2 class="category-title">
                        <?php echo e($categoryName); ?>

                        <span class="brand-count">(<?php echo e(count($brands)); ?> brands)</span>
                        <i class="dropdown-arrow" id="arrow-<?php echo e(Str::slug($categoryName)); ?>">▼</i>
                    </h2>
                </div>

                <div class="category-content" id="content-<?php echo e(Str::slug($categoryName)); ?>">
                    <?php
                    $size = count($brands);
                    $columns = 3;
                    $chunk_size = ceil($size / $columns);
                    ?>

                    <div class="row">
                        <?php $__currentLoopData = $brands->chunk($chunk_size); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4">
                                <ul class="list-unstyled">
                                    <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="text-center">
                                            <a href="/<?php echo e($brand->id); ?>/<?php echo e($brand->getNameUrlEncodedAttribute()); ?>/"><?php echo e($brand->name); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\laravel101\pra-c2\resources\views/pages/homepage.blade.php ENDPATH**/ ?>