<?php
    $state = $getFormattedState();

    $descriptionAbove = $getDescriptionAbove();
    $descriptionBelow = $getDescriptionBelow();

    $icon = $getIcon();
    $iconPosition = $getIconPosition();
    $iconClasses = 'w-4 h-4';

    $isCopyable = $isCopyable();
?>

<div
    <?php echo e($attributes->merge($getExtraAttributes())->class([
        'filament-tables-text-column',
        'px-4 py-3' => ! $isInline(),
        'text-primary-600 transition hover:underline hover:text-primary-500 focus:underline focus:text-primary-500' => $getAction() || $getUrl(),
        match ($getColor()) {
            'danger' => 'text-danger-600',
            'primary' => 'text-primary-600',
            'secondary' => 'text-gray-500',
            'success' => 'text-success-600',
            'warning' => 'text-warning-600',
            default => null,
        } => ! ($getAction() || $getUrl()),
        match ($getColor()) {
            'secondary' => 'dark:text-gray-400',
            default => null,
        } => (! ($getAction() || $getUrl())) && config('tables.dark_mode'),
        match ($getSize()) {
            'sm' => 'text-sm',
            'lg' => 'text-lg',
            default => null,
        },
        match ($getWeight()) {
            'thin' => 'font-thin',
            'extralight' => 'font-extralight',
            'light' => 'font-light',
            'medium' => 'font-medium',
            'semibold' => 'font-semibold',
            'bold' => 'font-bold',
            'extrabold' => 'font-extrabold',
            'black' => 'font-black',
            default => null,
        },
        match ($getFontFamily()) {
            'sans' => 'font-sans',
            'serif' => 'font-serif',
            'mono' => 'font-mono',
            default => null,
        },
        'whitespace-normal' => $canWrap(),
    ])); ?>

>
    <?php if(filled($descriptionAbove)): ?>
        <div class="text-sm text-gray-500">
            <?php echo e($descriptionAbove instanceof \Illuminate\Support\HtmlString ? $descriptionAbove : \Illuminate\Support\Str::of($descriptionAbove)->markdown()->sanitizeHtml()->toHtmlString()); ?>

        </div>
    <?php endif; ?>

    <div class="inline-flex items-center space-x-1 rtl:space-x-reverse">
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

        <span
            <?php if($isCopyable): ?>
                x-on:click="
                    window.navigator.clipboard.writeText(<?php echo \Illuminate\Support\Js::from($state)->toHtml() ?>)
                    $tooltip(<?php echo \Illuminate\Support\Js::from($getCopyMessage())->toHtml() ?>, { timeout: <?php echo \Illuminate\Support\Js::from($getCopyMessageDuration())->toHtml() ?> })
                "
            <?php endif; ?>
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'cursor-pointer' => $isCopyable,
            ]) ?>"
        >
            <?php echo e($state); ?>

        </span>

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
    </div>

    <?php if(filled($descriptionBelow)): ?>
        <div class="text-sm text-gray-500">
            <?php echo e($descriptionBelow instanceof \Illuminate\Support\HtmlString ? $descriptionBelow : \Illuminate\Support\Str::of($descriptionBelow)->markdown()->sanitizeHtml()->toHtmlString()); ?>

        </div>
    <?php endif; ?>
</div>
<?php /**PATH /home/sdevcoi1/public_html/contracts/vendor/filament/tables/src/../resources/views/columns/text-column.blade.php ENDPATH**/ ?>