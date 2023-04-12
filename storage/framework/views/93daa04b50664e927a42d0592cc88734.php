<?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $getFieldWrapperView()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => $getId(),'label' => $getLabel(),'label-sr-only' => $isLabelHidden(),'helper-text' => $getHelperText(),'hint' => $getHint(),'hint-icon' => $getHintIcon(),'required' => $isRequired(),'state-path' => $getStatePath()]); ?>
    <?php
        $containers = $getChildComponentContainers();

        $isCloneable = $isCloneable();
        $isItemCreationDisabled = $isItemCreationDisabled();
        $isItemDeletionDisabled = $isItemDeletionDisabled();
        $isItemMovementDisabled = $isItemMovementDisabled();
        $headers = $getHeaders();
        $columnWidths = $getColumnWidths();
        $breakPoint = $getBreakPoint();
        $hasContainers = count($containers) > 0;
        $hasHiddenHeader = $shouldHideHeader();

        $hasActions = (! $isItemMovementDisabled) || (! $isItemDeletionDisabled) || $isCloneable;
    ?>

    <div <?php echo e($attributes->merge($getExtraAttributes())->class([
        'filament-table-repeater-component space-y-6 relative',
        match ($breakPoint) {
            'sm' => 'break-point-sm',
            'lg' => 'break-point-lg',
            'xl' => 'break-point-xl',
            '2xl' => 'break-point-2xl',
            default => 'break-point-md',
        }
    ])); ?>>

        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'filament-table-repeater-container rounded-xl bg-gray-50 relative dark:bg-gray-500/10',
            'border border-gray-300 dark:border-gray-700' => $hasContainers,
            'sm:border sm:border-gray-300 dark:sm:border-gray-700' => ! $hasContainers && $breakPoint === 'sm',
            'md:border md:border-gray-300 dark:md:border-gray-700' => ! $hasContainers && $breakPoint === 'md',
            'lg:border lg:border-gray-300 dark:lg:border-gray-700' => ! $hasContainers && $breakPoint === 'lg',
            'xl:border xl:border-gray-300 dark:xl:border-gray-700' => ! $hasContainers && $breakPoint === 'xl',
            '2xl:border 2xl:border-gray-300 dark:2xl:border-gray-700' => ! $hasContainers && $breakPoint === '2xl',
        ]) ?>">
            <table class="w-full">
                <thead class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'sr-only' => $hasHiddenHeader,
                    'filament-table-repeater-header rounded-t-xl overflow-hidden' => ! $hasHiddenHeader,
                    'border-b border-gray-300 dark:border-gray-700' => ! $hasHiddenHeader,
                ]) ?>">
                    <tr class="md:divide-x md:rtl:divide-x-reverse md:divide-gray-300 dark:md:divide-gray-700 text-sm">
                        <?php $__currentLoopData = $headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th
                                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'filament-table-repeater-header-column px-3 py-2 font-medium text-left text-gray-600 dark:text-gray-300 bg-gray-200/50 dark:bg-gray-900/60',
                                    'ltr:rounded-tl-xl rtl:rounded-tr-xl' => $loop->first,
                                    'ltr:rounded-tr-xl rtl:rounded-tl-xl' => $loop->last && ! $hasActions,
                                ]) ?>"
                                <?php if($columnWidths && isset($columnWidths[$key])): ?>
                                    style="width: <?php echo e($columnWidths[$key]); ?>"
                                <?php endif; ?>
                            >
                                <?php echo e($header); ?>

                            </th>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($hasActions): ?>
                            <th class="filament-table-repeater-header-column p-2 bg-gray-200/50 dark:bg-gray-900/60 w-px ltr:rounded-tr-xl rtl:rounded-tl-xl">
                                <div class="flex items-center md:justify-center">
                                    <?php if (! ($isItemMovementDisabled)): ?>
                                        <div class="w-8"></div>
                                    <?php endif; ?>

                                    <?php if($isCloneable): ?>
                                        <div class="w-8"></div>
                                    <?php endif; ?>

                                    <?php if (! ($isItemDeletionDisabled)): ?>
                                        <div class="w-8"></div>
                                    <?php endif; ?>

                                    <span class="sr-only">
                                        <?php echo e(__('filament-table-repeater::components.repeater.row_actions.label')); ?>

                                    </span>
                                </div>
                            </th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody
                    wire:sortable
                    wire:end.stop="dispatchFormEvent('repeater::moveItems', '<?php echo e($getStatePath()); ?>', $event.target.sortable.toArray())"
                    class="filament-table-repeater-rows-wrapper divide-y divide-gray-300 dark:divide-gray-700"
                >
                    <?php if(count($containers)): ?>
                        <?php $__currentLoopData = $containers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uuid => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr
                                wire:key="<?php echo e($this->id); ?>.<?php echo e($row->getStatePath()); ?>.item"
                                wire:sortable.item="<?php echo e($uuid); ?>"
                                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'filament-table-repeater-row md:divide-x md:rtl:divide-x-reverse md:divide-gray-300',
                                    'dark:md:divide-gray-700' => config('forms.dark_mode')
                                ]) ?>"
                            >
                                <?php $__currentLoopData = $row->getComponents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(! $cell instanceof \Filament\Forms\Components\Hidden && ! $cell->isHidden()): ?>
                                        <td
                                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                'filament-table-repeater-column p-2',
                                                'has-hidden-label' => $cell->isLabelHidden(),
                                            ]) ?>"
                                            <?php if($columnWidths && isset($columnWidths[$cell->getName()])): ?>
                                                style="width: <?php echo e($columnWidths[$cell->getName()]); ?>"
                                            <?php endif; ?>
                                        >
                                            <?php echo e($cell); ?>

                                        </td>
                                    <?php else: ?>
                                        <?php echo e($cell); ?>

                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if($hasActions): ?>
                                    <td class="filament-table-repeater-column p-2 w-px">
                                        <div class="flex items-center md:justify-center">
                                            <?php if (! ($isItemMovementDisabled)): ?>
                                                <button
                                                    title="<?php echo e(__('forms::components.repeater.buttons.move_item.label')); ?>"
                                                    x-on:click.stop
                                                    wire:sortable.handle
                                                    wire:keydown.prevent.arrow-up="dispatchFormEvent('repeater::moveItemUp', '<?php echo e($getStatePath()); ?>', '<?php echo e($uuid); ?>')"
                                                    wire:keydown.prevent.arrow-down="dispatchFormEvent('repeater::moveItemDown', '<?php echo e($getStatePath()); ?>', '<?php echo e($uuid); ?>')"
                                                    type="button"
                                                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                        'flex items-center justify-center flex-none w-8 h-8 text-gray-400 transition hover:text-gray-500',
                                                        'dark:border-gray-700' => config('forms.dark_mode'),
                                                    ]) ?>"
                                                >
                                                    <span class="sr-only">
                                                        <?php echo e(__('forms::components.repeater.buttons.move_item.label')); ?>

                                                    </span>

                                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-switch-vertical'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 md:!w-4 md:!h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                                </button>
                                            <?php endif; ?>

                                            <?php if($isCloneable): ?>
                                                <button
                                                    title="<?php echo e(__('forms::components.repeater.buttons.clone_item.label')); ?>"
                                                    wire:click="dispatchFormEvent('repeater::cloneItem', '<?php echo e($getStatePath()); ?>', '<?php echo e($uuid); ?>')"
                                                    type="button"
                                                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                        'flex items-center justify-center flex-none w-8 h-8 text-gray-400 transition hover:text-gray-500',
                                                        'dark:border-gray-700' => config('forms.dark_mode'),
                                                    ]) ?>"
                                                >
                                                    <span class="sr-only">
                                                        <?php echo e(__('forms::components.repeater.buttons.clone_item.label')); ?>

                                                    </span>

                                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-duplicate'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 md:!w-4 md:!h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                                </button>
                                            <?php endif; ?>

                                            <?php if (! ($isItemDeletionDisabled)): ?>
                                                <button
                                                    title="<?php echo e(__('forms::components.repeater.buttons.delete_item.label')); ?>"
                                                    wire:click.stop="dispatchFormEvent('repeater::deleteItem', '<?php echo e($getStatePath()); ?>', '<?php echo e($uuid); ?>')"
                                                    type="button"
                                                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                        'flex items-center justify-center flex-none w-8 h-8 text-danger-600 transition hover:text-danger-500',
                                                        'dark:text-danger-500 dark:hover:text-danger-400' => config('forms.dark_mode'),
                                                    ]) ?>"
                                                >
                                                    <span class="sr-only">
                                                        <?php echo e(__('forms::components.repeater.buttons.delete_item.label')); ?>

                                                    </span>

                                                    <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 md:!w-4 md:!h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                <?php endif; ?>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'filament-table-repeater-row md:divide-x md:rtl:divide-x-reverse md:divide-gray-300',
                                'dark:md:divide-gray-700' => config('forms.dark_mode')
                            ]) ?>"
                        >
                            <td colspan="<?php echo e(count($headers) + intval($hasActions)); ?>" class="filament-table-repeater-column p-4 w-px text-center italic">
                                <?php echo e($getEmptyLabel() ?? __('filament-table-repeater::components.repeater.empty.label')); ?>

                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if(! $isItemCreationDisabled): ?>
            <div class="relative flex justify-center">
                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'forms::components.button','data' => ['wire:click' => 'dispatchFormEvent(\'repeater::createItem\', \'' . $getStatePath() . '\')','size' => 'sm','type' => 'button']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('dispatchFormEvent(\'repeater::createItem\', \'' . $getStatePath() . '\')'),'size' => 'sm','type' => 'button']); ?>
                    <?php echo e($getCreateItemButtonLabel()); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php /**PATH /home/sdevcoi1/public_html/contracts/vendor/awcodes/filament-table-repeater/src/../resources/views/components/repeater-table.blade.php ENDPATH**/ ?>