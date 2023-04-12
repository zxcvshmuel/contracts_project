<?php
    $affixLabelClasses = [
        'whitespace-nowrap group-focus-within:text-primary-500',
        'text-gray-400' => ! $errors->has($getStatePath()),
        'text-danger-400' => $errors->has($getStatePath()),
    ];
?>

<?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $getFieldWrapperView()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => $getId(),'label' => $getLabel(),'label-sr-only' => $isLabelHidden(),'has-nested-recursive-validation-rules' => true,'helper-text' => $getHelperText(),'hint' => $getHint(),'hint-action' => $getHintAction(),'hint-color' => $getHintColor(),'hint-icon' => $getHintIcon(),'required' => $isRequired(),'state-path' => $getStatePath()]); ?>
    <div <?php echo e($attributes->merge($getExtraAttributes())->class(['filament-forms-select-component flex items-center space-x-1 rtl:space-x-reverse group'])); ?>>
        <?php if(($prefixAction = $getPrefixAction()) && (! $prefixAction->isHidden())): ?>
            <?php echo e($prefixAction); ?>

        <?php endif; ?>

        <?php if($icon = $getPrefixIcon()): ?>
            <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $icon] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
        <?php endif; ?>

        <?php if($label = $getPrefixLabel()): ?>
            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses($affixLabelClasses) ?>">
                <?php echo e($label); ?>

            </span>
        <?php endif; ?>

        <div class="flex-1 min-w-0">
            <?php if (! ($isSearchable() || $isMultiple())): ?>
                <select
                    <?php echo $isAutofocused() ? 'autofocus' : null; ?>

                    <?php echo $isDisabled() ? 'disabled' : null; ?>

                    id="<?php echo e($getId()); ?>"
                    <?php echo e($applyStateBindingModifiers('wire:model')); ?>="<?php echo e($getStatePath()); ?>"
                    dusk="filament.forms.<?php echo e($getStatePath()); ?>"
                    <?php if(! $isConcealed()): ?>
                        <?php echo $isRequired() ? 'required' : null; ?>

                    <?php endif; ?>
                    <?php echo e($attributes->merge($getExtraInputAttributes())->merge($getExtraAttributes())->class([
                        'text-gray-900 block w-full transition duration-75 rounded-lg shadow-sm outline-none focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500 disabled:opacity-70',
                        'dark:bg-gray-700 dark:text-white dark:focus:border-primary-500' => config('forms.dark_mode'),
                        'border-gray-300' => ! $errors->has($getStatePath()),
                        'dark:border-gray-600' => (! $errors->has($getStatePath())) && config('forms.dark_mode'),
                        'border-danger-600 ring-danger-600' => $errors->has($getStatePath()),
                        'dark:border-danger-400 dark:ring-danger-400' => $errors->has($getStatePath()) && config('forms.dark_mode'),
                    ])); ?>

                >
                    <?php if (! ($isPlaceholderSelectionDisabled())): ?>
                        <option value=""><?php echo e($getPlaceholder()); ?></option>
                    <?php endif; ?>

                    <?php $__currentLoopData = $getOptions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option
                            value="<?php echo e($value); ?>"
                            <?php echo $isOptionDisabled($value, $label) ? 'disabled' : null; ?>

                        >
                            <?php echo e($label); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            <?php else: ?>
                <div
                    x-data="selectFormComponent({
                        isHtmlAllowed: <?php echo \Illuminate\Support\Js::from($isHtmlAllowed())->toHtml() ?>,
                        getOptionLabelUsing: async () => {
                            return await $wire.getSelectOptionLabel(<?php echo \Illuminate\Support\Js::from($getStatePath())->toHtml() ?>)
                        },
                        getOptionLabelsUsing: async () => {
                            return await $wire.getSelectOptionLabels(<?php echo \Illuminate\Support\Js::from($getStatePath())->toHtml() ?>)
                        },
                        getOptionsUsing: async () => {
                            return await $wire.getSelectOptions(<?php echo \Illuminate\Support\Js::from($getStatePath())->toHtml() ?>)
                        },
                        getSearchResultsUsing: async (search) => {
                            return await $wire.getSelectSearchResults(<?php echo \Illuminate\Support\Js::from($getStatePath())->toHtml() ?>, search)
                        },
                        isAutofocused: <?php echo \Illuminate\Support\Js::from($isAutofocused())->toHtml() ?>,
                        isMultiple: <?php echo \Illuminate\Support\Js::from($isMultiple())->toHtml() ?>,
                        hasDynamicOptions: <?php echo \Illuminate\Support\Js::from($hasDynamicOptions())->toHtml() ?>,
                        hasDynamicSearchResults: <?php echo \Illuminate\Support\Js::from($hasDynamicSearchResults())->toHtml() ?>,
                        loadingMessage: <?php echo \Illuminate\Support\Js::from($getLoadingMessage())->toHtml() ?>,
                        maxItems: <?php echo \Illuminate\Support\Js::from($getMaxItems())->toHtml() ?>,
                        maxItemsMessage: <?php echo \Illuminate\Support\Js::from($getMaxItemsMessage())->toHtml() ?>,
                        noSearchResultsMessage: <?php echo \Illuminate\Support\Js::from($getNoSearchResultsMessage())->toHtml() ?>,
                        options: <?php echo \Illuminate\Support\Js::from($getOptionsForJs())->toHtml() ?>,
                        optionsLimit: <?php echo \Illuminate\Support\Js::from($getOptionsLimit())->toHtml() ?>,
                        placeholder: <?php echo \Illuminate\Support\Js::from($getPlaceholder())->toHtml() ?>,
                        position: <?php echo \Illuminate\Support\Js::from($getPosition())->toHtml() ?>,
                        searchDebounce: <?php echo \Illuminate\Support\Js::from($getSearchDebounce())->toHtml() ?>,
                        searchingMessage: <?php echo \Illuminate\Support\Js::from($getSearchingMessage())->toHtml() ?>,
                        searchPrompt: <?php echo \Illuminate\Support\Js::from($getSearchPrompt())->toHtml() ?>,
                        state: $wire.<?php echo e($applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')')); ?>,
                    })"
                    x-on:keydown.esc="select.dropdown.isActive && $event.stopPropagation()"
                    wire:ignore
                    <?php echo e($attributes->merge($getExtraAttributes())->merge($getExtraAlpineAttributes())); ?>

                    x-bind:class="{
                        'choices--error': (<?php echo \Illuminate\Support\Js::from($getStatePath())->toHtml() ?> in $wire.__instance.serverMemo.errors),
                    }"
                >
                    <select
                        x-ref="input"
                        id="<?php echo e($getId()); ?>"
                        <?php echo $isDisabled() ? 'disabled' : null; ?>

                        <?php echo $isMultiple() ? 'multiple' : null; ?>

                        <?php echo e($getExtraInputAttributeBag()); ?>

                    ></select>
                </div>
            <?php endif; ?>
        </div>

        <?php if($label = $getSuffixLabel()): ?>
            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses($affixLabelClasses) ?>">
                <?php echo e($label); ?>

            </span>
        <?php endif; ?>

        <?php if($icon = $getSuffixIcon()): ?>
            <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $icon] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
        <?php endif; ?>

        <?php if(($suffixAction = $getSuffixAction()) && (! $suffixAction->isHidden())): ?>
            <?php echo e($suffixAction); ?>

        <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/contracts/vendor/filament/forms/src/../resources/views/components/select.blade.php ENDPATH**/ ?>