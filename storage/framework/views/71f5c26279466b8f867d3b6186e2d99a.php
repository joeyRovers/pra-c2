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


    <?php if(isset($topManuals) && count($topManuals) > 0): ?>
    <h2 class="text-center">Popular manuals</h2>
    <ul class="list-unstyled text-center">
        <?php $__currentLoopData = $topManuals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="/<?php echo e($manual->brand->id); ?>/<?php echo e($manual->brand->getNameUrlEncodedAttribute()); ?>/<?php echo e($manual->id); ?>/"><?php echo e($manual->brand->name); ?>: <?php echo e($manual->name); ?></a>
                <small>(<?php echo e($manual->views); ?> views)</small>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <?php endif; ?>


    <?php
    $size = count($brands);
    $columns = 3;
    $chunk_size = ceil($size / $columns);
    ?>

    <div class="brands-container text-center">
        <div class="row">

            <?php $__currentLoopData = $brands->chunk($chunk_size); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">

                    <ul class="list-unstyled">
                        <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

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
                                <a href="/<?php echo e($brand->id); ?>/<?php echo e($brand->getNameUrlEncodedAttribute()); ?>/"><?php echo e($brand->name); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                </div>
                <?php
                unset($header_first_letter);
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\4s_manuals\resources\views/pages/homepage.blade.php ENDPATH**/ ?>