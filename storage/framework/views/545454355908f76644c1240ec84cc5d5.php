<?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $getFieldWrapperView()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => $getId(),'label' => $getLabel(),'label-sr-only' => $isLabelHidden(),'helper-text' => $getHelperText(),'hint' => $getHint(),'hint-action' => $getHintAction(),'hint-color' => $getHintColor(),'hint-icon' => $getHintIcon(),'required' => $isRequired(),'state-path' => $getStatePath()]); ?>
    <textarea
        <?php echo ($autocapitalize = $getAutocapitalize()) ? "autocapitalize=\"{$autocapitalize}\"" : null; ?>

        <?php echo ($autocomplete = $getAutocomplete()) ? "autocomplete=\"{$autocomplete}\"" : null; ?>

        <?php echo $isAutofocused() ? 'autofocus' : null; ?>

        <?php echo ($cols = $getCols()) ? "cols=\"{$cols}\"" : null; ?>

        <?php echo $isDisabled() ? 'disabled' : null; ?>

        id="<?php echo e($getId()); ?>"
        dusk="filament.forms.<?php echo e($getStatePath()); ?>"
        <?php echo ($placeholder = $getPlaceholder()) ? "placeholder=\"{$placeholder}\"" : null; ?>

        <?php echo ($rows = $getRows()) ? "rows=\"{$rows}\"" : null; ?>

        <?php echo e($applyStateBindingModifiers('wire:model')); ?>="<?php echo e($getStatePath()); ?>"
        <?php if(! $isConcealed()): ?>
            <?php echo filled($length = $getMaxLength()) ? "maxlength=\"{$length}\"" : null; ?>

            <?php echo filled($length = $getMinLength()) ? "minlength=\"{$length}\"" : null; ?>

            <?php echo $isRequired() ? 'required' : null; ?>

        <?php endif; ?>
        <?php echo e($attributes
                ->merge($getExtraAttributes())
                ->merge($getExtraInputAttributeBag()->getAttributes())
                ->class([
                    'filament-forms-textarea-component block w-full transition duration-75 rounded-lg shadow-sm outline-none focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500 disabled:opacity-70',
                    'dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:border-primary-500' => config('forms.dark_mode'),
                    'border-gray-300' => ! $errors->has($getStatePath()),
                    'border-danger-600 ring-danger-600' => $errors->has($getStatePath()),
                    'dark:border-danger-400 dark:ring-danger-400' => $errors->has($getStatePath()) && config('forms.dark_mode')
                ])); ?>

        <?php if($shouldAutosize()): ?>
            x-data="textareaFormComponent()"
            x-on:input="render()"
            style="height: 150px"
            <?php echo e($getExtraAlpineAttributeBag()); ?>

        <?php endif; ?>
    ></textarea>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php /**PATH /home/sdevcoi1/public_html/contracts/vendor/filament/forms/src/../resources/views/components/textarea.blade.php ENDPATH**/ ?>