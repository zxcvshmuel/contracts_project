<div
    x-data="{
        error: undefined,
        state: <?php echo \Illuminate\Support\Js::from((bool) $getState())->toHtml() ?>,
        isLoading: false
    }"
    x-init="
        $watch('state', () => $refs.button.dispatchEvent(new Event('change')))
    "
    <?php echo e($attributes->merge($getExtraAttributes())->class([
        'filament-tables-toggle-column',
    ])); ?>

>
    <button
        role="switch"
        aria-checked="false"
        x-bind:aria-checked="state.toString()"
        x-on:click="! isLoading && (state = ! state)"
        x-ref="button"
        x-on:change="
            isLoading = true
            response = await $wire.updateTableColumnState(<?php echo \Illuminate\Support\Js::from($getName())->toHtml() ?>, <?php echo \Illuminate\Support\Js::from($recordKey)->toHtml() ?>, state)
            error = response?.error ?? undefined
            isLoading = false
        "
        x-tooltip="error"
        x-bind:class="{
            'opacity-70 pointer-events-none': isLoading,
            '<?php echo e(match ($getOnColor()) {
                'danger' => 'bg-danger-500',
                'secondary' => 'bg-gray-500',
                'success' => 'bg-success-500',
                'warning' => 'bg-warning-500',
                default => 'bg-primary-600',
            }); ?>': state,
            '<?php echo e(match ($getOffColor()) {
                'danger' => 'bg-danger-500',
                'primary' => 'bg-primary-500',
                'success' => 'bg-success-500',
                'warning' => 'bg-warning-500',
                default => 'bg-gray-200',
            }); ?> <?php if(config('forms.dark_mode')): ?> dark:bg-white/10 <?php endif; ?>': ! state,
        }"
        <?php echo $isDisabled() ? 'disabled' : null; ?>

        type="button"
        class="relative inline-flex shrink-0 ml-4 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 outline-none focus:ring-1 focus:ring-offset-1 focus:ring-primary-500 disabled:opacity-70 disabled:cursor-not-allowed disabled:pointer-events-none"
    >
        <span
            class="pointer-events-none relative inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 ease-in-out transition duration-200"
            x-bind:class="{
                'translate-x-5 rtl:-translate-x-5': state,
                'translate-x-0': ! state,
            }"
        >
            <span
                class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity"
                aria-hidden="true"
                x-bind:class="{
                    'opacity-0 ease-out duration-100': state,
                    'opacity-100 ease-in duration-200': ! state,
                }"
            >
                <?php if($hasOffIcon()): ?>
                    <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $getOffIcon()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\Support\Arr::toCssClasses([
                            'h-3 w-3',
                            match ($getOffColor()) {
                                'danger' => 'text-danger-500',
                                'primary' => 'text-primary-500',
                                'success' => 'text-success-500',
                                'warning' => 'text-warning-500',
                                default => 'text-gray-400',
                            },
                        ])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
                <?php endif; ?>
            </span>

            <span
                class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity"
                aria-hidden="true"
                x-bind:class="{
                    'opacity-100 ease-in duration-200': state,
                    'opacity-0 ease-out duration-100': ! state,
                }"
            >
                <?php if($hasOnIcon()): ?>
                    <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $getOnIcon()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-cloak' => true,'class' => \Illuminate\Support\Arr::toCssClasses([
                            'h-3 w-3',
                            match ($getOnColor()) {
                                'danger' => 'text-danger-500',
                                'secondary' => 'text-gray-400',
                                'success' => 'text-success-500',
                                'warning' => 'text-warning-500',
                                default => 'text-primary-500',
                            },
                        ])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
                <?php endif; ?>
            </span>
        </span>
    </button>
</div>
<?php /**PATH /var/www/html/contracts/vendor/filament/tables/src/../resources/views/columns/toggle-column.blade.php ENDPATH**/ ?>