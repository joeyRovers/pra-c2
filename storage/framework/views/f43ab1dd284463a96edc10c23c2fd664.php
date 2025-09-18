<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

     <?php $__env->slot('head', null, []); ?> 
        <meta name="robots" content="index, nofollow">
     <?php $__env->endSlot(); ?>

     <?php $__env->slot('breadcrumb', null, []); ?> 
        <li><a href="/<?php echo e($brand->id); ?>/<?php echo e($brand->getNameUrlEncodedAttribute()); ?>/" alt="Manuals for '<?php echo e($brand->name); ?>'" title="Manuals for '<?php echo e($brand->name); ?>'"><?php echo e($brand->name); ?></a></li>
     <?php $__env->endSlot(); ?>


    <h1><?php echo e($brand->name); ?></h1>

    <p><?php echo e(__('introduction_texts.type_list', ['brand'=>$brand->name])); ?></p>


        <?php $__currentLoopData = $manuals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if($manual->locally_available): ?>
                <a href="/<?php echo e($brand->id); ?>/<?php echo e($brand->getNameUrlEncodedAttribute()); ?>/<?php echo e($manual->id); ?>/" alt="<?php echo e($manual->name); ?>" title="<?php echo e($manual->name); ?>"><?php echo e($manual->name); ?></a>
                (<?php echo e($manual->filesize_human_readable); ?>)
            <?php else: ?>
                <a href="<?php echo e($manual->url); ?>" target="new" alt="<?php echo e($manual->name); ?>" title="<?php echo e($manual->name); ?>"><?php echo e($manual->name); ?></a>
            <?php endif; ?>

            <br />
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\laravel101\pra-c2\resources\views/pages/manual_list.blade.php ENDPATH**/ ?>