<div
    <?php echo e($attributes
            ->merge($getExtraAttributes())
            ->class([
                'flex',
                match ($getFromBreakpoint()) {
                    'sm' => 'flex-col gap-1 sm:gap-3 sm:items-center sm:flex-row',
                    'md' => 'flex-col gap-1 md:gap-3 md:items-center md:flex-row',
                    'lg' => 'flex-col gap-1 lg:gap-3 lg:items-center lg:flex-row',
                    'xl' => 'flex-col gap-1 xl:gap-3 xl:items-center xl:flex-row',
                    '2xl' => 'flex-col gap-1 2xl:gap-3 2xl:items-center 2xl:flex-row',
                    default => 'gap-3 items-center',
                },
            ])); ?>

>
    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'tables::components.columns.layout','data' => ['components' => $getComponents(),'record' => $getRecord(),'recordKey' => $recordKey,'rowLoop' => $getRowLoop()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::columns.layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['components' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getComponents()),'record' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getRecord()),'record-key' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($recordKey),'row-loop' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getRowLoop())]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
</div>
<?php /**PATH /var/www/html/contracts/vendor/filament/tables/src/../resources/views/columns/layout/split.blade.php ENDPATH**/ ?>