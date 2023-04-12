<div
    x-data="{

        tab: null,

        init: function () {
            this.$watch('tab', () => this.updateQueryString())

            this.tab = this.getTabs()[<?php echo \Illuminate\Support\Js::from($getActiveTab())->toHtml() ?> - 1]
        },

        getTabs: function () {
            return JSON.parse(this.$refs.tabsData.value)
        },

        updateQueryString: function () {
            if (! <?php echo \Illuminate\Support\Js::from($isTabPersistedInQueryString())->toHtml() ?>) {
                return
            }

            const url = new URL(window.location.href)
            url.searchParams.set(<?php echo \Illuminate\Support\Js::from($getTabQueryStringKey())->toHtml() ?>, this.tab)

            history.pushState(null, document.title, url.toString())
        },

    }"
    x-cloak
    <?php echo $getId() ? "id=\"{$getId()}\"" : null; ?>

    <?php echo e($attributes->merge($getExtraAttributes())->class([
        'filament-forms-tabs-component rounded-xl shadow-sm border border-gray-300 bg-white',
        'dark:bg-gray-800 dark:border-gray-700' => config('forms.dark_mode'),
    ])); ?>

    <?php echo e($getExtraAlpineAttributeBag()); ?>

>
    <input
        type="hidden"
        value='<?php echo e(collect($getChildComponentContainer()->getComponents())
                ->filter(static fn (\Filament\Forms\Components\Tabs\Tab $tab): bool => ! $tab->isHidden())
                ->map(static fn (\Filament\Forms\Components\Tabs\Tab $tab) => $tab->getId())
                ->values()
                ->toJson()); ?>'
        x-ref="tabsData"
    />

    <div
        <?php echo $getLabel() ? 'aria-label="' . $getLabel() . '"' : null; ?>

        role="tablist"
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'filament-forms-tabs-component-header rounded-t-xl flex overflow-y-auto bg-gray-100',
            'dark:bg-gray-700' => config('forms.dark_mode'),
        ]) ?>"
    >
        <?php $__currentLoopData = $getChildComponentContainer()->getComponents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button
                type="button"
                aria-controls="<?php echo e($tab->getId()); ?>"
                x-bind:aria-selected="tab === '<?php echo e($tab->getId()); ?>'"
                x-on:click="tab = '<?php echo e($tab->getId()); ?>'"
                role="tab"
                x-bind:tabindex="tab === '<?php echo e($tab->getId()); ?>' ? 0 : -1"
                class="filament-forms-tabs-component-button flex items-center gap-2 shrink-0 p-3 text-sm font-medium"
                x-bind:class="{
                    'text-gray-500 <?php if(config('forms.dark_mode')): ?> dark:text-gray-400 <?php endif; ?>': tab !== '<?php echo e($tab->getId()); ?>',
                    'filament-forms-tabs-component-button-active bg-white text-primary-600 <?php if(config('forms.dark_mode')): ?> dark:bg-gray-800 <?php endif; ?>': tab === '<?php echo e($tab->getId()); ?>',
                }"
            >
                <?php if($icon = $tab->getIcon()): ?>
                    <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $icon] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
                <?php endif; ?>

                <span><?php echo e($tab->getLabel()); ?></span>

                <?php if($badge = $tab->getBadge()): ?>
                    <span
                        class="inline-flex items-center justify-center ml-auto rtl:ml-0 rtl:mr-auto min-h-4 px-2 py-0.5 text-xs font-medium tracking-tight rounded-xl whitespace-normal"
                        x-bind:class="{
                            'bg-gray-200 <?php if(config('forms.dark_mode')): ?> dark:bg-gray-600 <?php endif; ?>': tab !== '<?php echo e($tab->getId()); ?>',
                            'bg-primary-500/10 font-medium': tab === '<?php echo e($tab->getId()); ?>',
                        }"
                    >
                        <?php echo e($badge); ?>

                    </span>
                <?php endif; ?>
            </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php $__currentLoopData = $getChildComponentContainer()->getComponents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($tab); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /home/sdevcoi1/public_html/contracts/vendor/filament/forms/src/../resources/views/components/tabs.blade.php ENDPATH**/ ?>