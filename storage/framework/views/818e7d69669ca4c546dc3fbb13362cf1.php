<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'color' => 'primary',
    'darkMode' => false,
    'disabled' => false,
    'form' => null,
    'icon' => null,
    'iconPosition' => 'before',
    'keyBindings' => null,
    'size' => 'md',
    'tag' => 'a',
    'tooltip' => null,
    'type' => 'button',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'color' => 'primary',
    'darkMode' => false,
    'disabled' => false,
    'form' => null,
    'icon' => null,
    'iconPosition' => 'before',
    'keyBindings' => null,
    'size' => 'md',
    'tag' => 'a',
    'tooltip' => null,
    'type' => 'button',
]); ?>
<?php foreach (array_filter(([
    'color' => 'primary',
    'darkMode' => false,
    'disabled' => false,
    'form' => null,
    'icon' => null,
    'iconPosition' => 'before',
    'keyBindings' => null,
    'size' => 'md',
    'tag' => 'a',
    'tooltip' => null,
    'type' => 'button',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $linkClasses = [
        'filament-link inline-flex items-center justify-center gap-0.5 font-medium outline-none hover:underline focus:underline',
        'opacity-70 cursor-not-allowed pointer-events-none' => $disabled,
        'text-sm' => $size === 'sm',
        'text-lg' => $size === 'lg',
        'text-primary-600 hover:text-primary-500' => $color === 'primary',
        'text-danger-600 hover:text-danger-500' => $color === 'danger',
        'text-gray-600 hover:text-gray-500' => $color === 'secondary',
        'text-success-600 hover:text-success-500' => $color === 'success',
        'text-warning-600 hover:text-warning-500' => $color === 'warning',
        'dark:text-primary-500 dark:hover:text-primary-400' => $color === 'primary' && $darkMode,
        'dark:text-danger-500 dark:hover:text-danger-400' => $color === 'danger' && $darkMode,
        'dark:text-gray-300 dark:hover:text-gray-200' => $color === 'secondary' && $darkMode,
        'dark:text-success-500 dark:hover:text-success-400' => $color === 'success' && $darkMode,
        'dark:text-warning-500 dark:hover:text-warning-400' => $color === 'warning' && $darkMode,
    ];

    $iconClasses = \Illuminate\Support\Arr::toCssClasses([
        'filament-link-icon',
        'w-4 h-4' => $size === 'sm',
        'w-5 h-5' => $size === 'md',
        'w-6 h-6' => $size === 'lg',
        'mr-1 rtl:ml-1' => $iconPosition === 'before',
        'ml-1 rtl:mr-1' => $iconPosition === 'after'
    ]);

    $hasLoadingIndicator = filled($attributes->get('wire:target')) || filled($attributes->get('wire:click')) || (($type === 'submit') && filled($form));

    if ($hasLoadingIndicator) {
        $loadingIndicatorTarget = html_entity_decode($attributes->get('wire:target', $attributes->get('wire:click', $form)), ENT_QUOTES);
    }
?>

<?php if($tag === 'a'): ?>
    <a
        <?php if($keyBindings || $tooltip): ?>
            x-data="{}"
        <?php endif; ?>
        <?php if($keyBindings): ?>
            x-mousetrap.global.<?php echo e(collect($keyBindings)->map(fn (string $keyBinding): string => str_replace('+', '-', $keyBinding))->implode('.')); ?>

        <?php endif; ?>
        <?php if($tooltip): ?>
            x-tooltip.raw="<?php echo e($tooltip); ?>"
        <?php endif; ?>
        <?php echo e($attributes->class($linkClasses)); ?>

    >
        <?php if($icon && $iconPosition === 'before'): ?>
            <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $icon] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => $iconClasses]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
        <?php endif; ?>

        <?php echo e($slot); ?>


        <?php if($icon && $iconPosition === 'after'): ?>
            <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $icon] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => $iconClasses]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
        <?php endif; ?>
    </a>
<?php elseif($tag === 'button'): ?>
    <button
        <?php if($keyBindings): ?>
            x-mousetrap.global.<?php echo e(collect($keyBindings)->map(fn (string $keyBinding): string => str_replace('+', '-', $keyBinding))->implode('.')); ?>

        <?php endif; ?>
        <?php if($tooltip): ?>
            x-tooltip.raw="<?php echo e($tooltip); ?>"
        <?php endif; ?>
        type="<?php echo e($type); ?>"
        <?php echo $disabled ? 'disabled' : ''; ?>

        <?php if($keyBindings || $tooltip): ?>
            x-data="{}"
        <?php endif; ?>
        <?php echo e($attributes->class($linkClasses)); ?>

    >
        <?php if($iconPosition === 'before'): ?>
            <?php if($icon): ?>
                <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $icon] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:loading.remove.delay' => $hasLoadingIndicator,'wire:target' => $hasLoadingIndicator ? $loadingIndicatorTarget : false,'class' => $iconClasses]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if($hasLoadingIndicator): ?>
                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-support::components.loading-indicator','data' => ['xCloak' => true,'wire:loading.delay' => true,'wire:target' => $loadingIndicatorTarget,'class' => $iconClasses]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-support::loading-indicator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-cloak' => true,'wire:loading.delay' => true,'wire:target' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($loadingIndicatorTarget),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($iconClasses)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php echo e($slot); ?>


        <?php if($iconPosition === 'after'): ?>
            <?php if($icon): ?>
                <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $icon] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:loading.remove.delay' => $hasLoadingIndicator,'wire:target' => $hasLoadingIndicator ? $loadingIndicatorTarget : false,'class' => $iconClasses]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if($hasLoadingIndicator): ?>
                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-support::components.loading-indicator','data' => ['xCloak' => true,'wire:loading.delay' => true,'wire:target' => $loadingIndicatorTarget,'class' => $iconClasses]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-support::loading-indicator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-cloak' => true,'wire:loading.delay' => true,'wire:target' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($loadingIndicatorTarget),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($iconClasses)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </button>
<?php endif; ?>
<?php /**PATH /home/sdevcoi1/public_html/contracts/vendor/filament/support/src/../resources/views/components/link.blade.php ENDPATH**/ ?>