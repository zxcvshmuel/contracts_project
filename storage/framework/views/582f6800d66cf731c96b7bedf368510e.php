<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'indicators' => [],
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'indicators' => [],
]); ?>
<?php foreach (array_filter(([
    'indicators' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if(count($indicators)): ?>
    <div <?php echo e($attributes->class(['filament-tables-filter-indicators bg-gray-500/5 gap-x-4 px-4 py-1 text-sm flex'])); ?>>
        <div class="flex flex-1 items-center flex-wrap gap-y-1 gap-x-2">
            <span class="font-medium dark:text-gray-200">
                <?php echo e(__('tables::table.filters.indicator')); ?>

            </span>

            <?php $__currentLoopData = $indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter => $filterIndicators): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $filterIndicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $indicator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $field = is_numeric($field) ? null : $field;
                    ?>

                    <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'filament-tables-filter-indicator inline-flex items-center justify-center min-h-6 px-2 py-0.5 text-xs font-medium tracking-tight rounded-xl text-gray-700 bg-gray-500/10 whitespace-normal',
                        'dark:text-gray-300 dark:bg-gray-500/20' => config('tables.dark_mode'),
                    ]) ?>">
                        <?php echo e($indicator); ?>


                        <button
                            wire:click="removeTableFilter('<?php echo e($filter); ?>'<?php echo e($field ? ' , \'' . $field . '\'' : null); ?>)"
                            wire:loading.attr="disabled"
                            wire:loading.class="cursor-wait"
                            wire:target="removeTableFilter"
                            type="button"
                            class="ml-1 -mr-2 rtl:mr-1 rtl:-ml-2 p-1 -my-1 hover:bg-gray-500/10 rounded-full"
                        >
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-x'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>

                            <span class="sr-only">
                                <?php echo e(__('tables::table.filters.buttons.remove.label')); ?>

                            </span>
                        </button>
                    </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="flex-shrink-0">
            <button
                wire:click="removeTableFilters"
                type="button"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    '-mb-1.5 -mt-0.5 -mr-2 p-1.5 text-gray-600 hover:bg-gray-500/10 rounded-full hover:text-gray-700',
                    'dark:text-gray-400 dark:hover:text-gray-300 dark:hover:bg-gray-500/20' => config('tables.dark_mode'),
                ]) ?>"
            >
                <div class="w-5 h-5 flex items-center justify-center">
                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-x'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-tooltip.raw' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('tables::table.filters.buttons.remove_all.tooltip')),'wire:loading.remove.delay' => true,'wire:target' => 'removeTableFilters,removeTableFilter','class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-support::components.loading-indicator','data' => ['wire:loading.delay' => true,'wire:target' => 'removeTableFilters,removeTableFilter','class' => 'w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-support::loading-indicator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:loading.delay' => true,'wire:target' => 'removeTableFilters,removeTableFilter','class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                </div>

                <span class="sr-only">
                    <?php echo e(__('tables::table.filters.buttons.remove_all.label')); ?>

                </span>
            </button>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/sdevcoi1/public_html/contracts/vendor/filament/tables/src/../resources/views/components/filters/indicators.blade.php ENDPATH**/ ?>