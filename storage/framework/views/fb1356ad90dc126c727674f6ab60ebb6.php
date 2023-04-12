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

        $isCollapsible = $isCollapsible();
        $isItemCreationDisabled = $isItemCreationDisabled();
        $isItemDeletionDisabled = $isItemDeletionDisabled();
        $isItemMovementDisabled = $isItemMovementDisabled();

        $columnLabels = $getColumnLabels();

    ?>

    <div
        
        x-data="{ isCollapsed: <?php echo \Illuminate\Support\Js::from($isCollapsed())->toHtml() ?> }"
        x-on:repeater-collapse.window="$event.detail === '<?php echo e($getStatePath()); ?>' && (isCollapsed = true)"
        x-on:repeater-expand.window="$event.detail === '<?php echo e($getStatePath()); ?>' && (isCollapsed = false)"

        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            "bg-white border border-gray-300 shadow-sm rounded-xl relative",
            "dark:bg-gray-800 dark:border-gray-600"  => config('forms.dark_mode'),
        ]) ?>"
    >

        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'filament-tables-header',
            'flex items-center h-10 overflow-hidden border-b bg-gray-50 rounded-t-xl',
            'dark:bg-gray-800 dark:border-gray-700' => config('forms.dark_mode'),
        ]) ?>">

            <div class="flex-1"></div>
            <?php if($isCollapsible): ?>
                <div>
                    <button
                        x-on:click="isCollapsed = !isCollapsed"
                        type="button"
                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'flex items-center justify-center flex-none w-10 h-10 text-gray-400 transition hover:text-gray-300',
                            'dark:text-gray-400 dark:hover:text-gray-500' => config('forms.dark_mode'),
                        ]) ?>"
                    >
                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-minus-sm'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4','x-show' => '! isCollapsed']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>

                        <span class="sr-only" x-show="! isCollapsed">
                            <?php echo e(__('forms::components.repeater.buttons.collapse_item.label')); ?>

                        </span>

                        <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-plus-sm'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4','x-show' => 'isCollapsed','x-cloak' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>

                        <span class="sr-only" x-show="isCollapsed" x-cloak>
                            <?php echo e(__('forms::components.repeater.buttons.expand_item.label')); ?>

                        </span>
                    </button>
                </div>
            <?php endif; ?>
        </div>

        <div class="px-4">
            <table class="w-full text-left rtl:text-right table-auto mx-4 filament-table-repeater" x-show="! isCollapsed">
                <thead>
                    <tr>

                        <?php $__currentLoopData = $columnLabels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $columnLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($columnLabel['display']): ?>
                            <th class="p-2 filament-table-repeater-header-cell">
                                <span>
                                    <?php echo e($columnLabel['name']); ?>

                                </span>
                            </th>
                            <?php else: ?>
                            <th style="display: none"></th>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<?php if(!$isItemMovementDisabled || !$isItemDeletionDisabled): ?>
                        	<th class="w-10"></th>
						<?php endif; ?>
                    </tr>
                </thead>

                <tbody
                    wire:sortable
                    wire:end.stop="dispatchFormEvent('repeater::moveItems', '<?php echo e($getStatePath()); ?>', $event.target.sortable.toArray())"
                >

                    <?php $__currentLoopData = $containers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uuid => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr
                            x-data="{ isCollapsed: <?php echo \Illuminate\Support\Js::from($isCollapsed())->toHtml() ?> }"
                            x-on:repeater-collapse.window="$event.detail === '<?php echo e($getStatePath()); ?>' && (isCollapsed = true)"
                            x-on:repeater-expand.window="$event.detail === '<?php echo e($getStatePath()); ?>' && (isCollapsed = false)"
                            wire:key="<?php echo e($item->getStatePath()); ?>"
                            wire:sortable.item="<?php echo e($uuid); ?>"
                        >

                            <?php $__currentLoopData = $item->getComponents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <td
                                <?php if($component->isHidden() || ($component instanceof \Filament\Forms\Components\Hidden)): ?>style="display:none"<?php endif; ?>
                            >
                                <?php echo e($component); ?>

                            </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

							<?php if(!$isItemMovementDisabled || !$isItemDeletionDisabled): ?>
								<td class="w-10 flex">
									<?php if(!$isItemMovementDisabled): ?>
										<button
											wire:sortable.handle
											wire:keydown.prevent.arrow-up="dispatchFormEvent('repeater::moveItemUp', '<?php echo e($getStatePath()); ?>', '<?php echo e($uuid); ?>')"
											wire:keydown.prevent.arrow-down="dispatchFormEvent('repeater::moveItemDown', '<?php echo e($getStatePath()); ?>', '<?php echo e($uuid); ?>')"
											type="button"
											class="<?php echo \Illuminate\Support\Arr::toCssClasses([
												'flex items-center justify-center flex-none text-gray-400 w-5 h-10 transition hover:text-gray-300',
												'dark:text-gray-400 dark:hover:text-gray-500' => config('forms.dark_mode'),
											]) ?>"
										>
											<span class="sr-only">
												<?php echo e(__('forms::components.repeater.buttons.move_item_down.label')); ?>

											</span>

											<?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-switch-vertical'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
										</button>
									<?php endif; ?>

									<?php if(!$isItemDeletionDisabled): ?>
										<button
											wire:click="dispatchFormEvent('repeater::deleteItem', '<?php echo e($getStatePath()); ?>', '<?php echo e($uuid); ?>')"
											type="button"
											class="<?php echo \Illuminate\Support\Arr::toCssClasses([
												'flex items-center justify-center flex-none w-5 h-10 text-danger-600 transition hover:text-danger-500',
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
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
										</button>
									<?php endif; ?>
								</td>
							<?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>

            <div class="p-2 text-xs text-center text-gray-400" x-show="isCollapsed" x-cloak>
                <?php echo e(__('forms::components.repeater.collapsed')); ?>

            </div>
        </div>

        <?php if(!$isItemCreationDisabled): ?>
            <div class="relative flex justify-center py-2">
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
<?php /**PATH /var/www/html/contracts/vendor/icetalker/filament-table-repeater/src/../resources/views/table-repeater.blade.php ENDPATH**/ ?>