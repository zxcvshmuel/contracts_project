<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'active' => false,
    'activeIcon',
    'badge' => null,
    'badgeColor' => null,
    'icon',
    'shouldOpenUrlInNewTab' => false,
    'url',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'active' => false,
    'activeIcon',
    'badge' => null,
    'badgeColor' => null,
    'icon',
    'shouldOpenUrlInNewTab' => false,
    'url',
]); ?>
<?php foreach (array_filter(([
    'active' => false,
    'activeIcon',
    'badge' => null,
    'badgeColor' => null,
    'icon',
    'shouldOpenUrlInNewTab' => false,
    'url',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['filament-sidebar-item overflow-hidden', 'filament-sidebar-item-active' => $active]) ?>">
    <a
        href="<?php echo e($url); ?>"
        <?php echo $shouldOpenUrlInNewTab ? 'target="_blank"' : ''; ?>

        x-on:click="window.matchMedia(`(max-width: 1024px)`).matches && $store.sidebar.close()"
        <?php if(config('filament.layout.sidebar.is_collapsible_on_desktop')): ?>
            x-data="{ tooltip: {} }"
            x-init="
                Alpine.effect(() => {
                    if (Alpine.store('sidebar').isOpen) {
                        tooltip = false
                    } else {
                        tooltip = {
                            content: <?php echo e(\Illuminate\Support\Js::from($slot->toHtml())); ?>,
                            theme: Alpine.store('theme') === 'light' ? 'dark' : 'light',
                            placement: document.dir === 'rtl' ? 'left' : 'right',
                        }
                    }
                })
            "
            x-tooltip.html="tooltip"
        <?php endif; ?>
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'flex items-center justify-center gap-3 px-3 py-2 rounded-lg font-medium transition',
            'hover:bg-gray-500/5 focus:bg-gray-500/5' => ! $active,
            'dark:text-gray-300 dark:hover:bg-gray-700' => (! $active) && config('filament.dark_mode'),
            'bg-primary-500 text-white' => $active,
        ]) ?>"
    >
        <?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => ($active && $activeIcon) ? $activeIcon : $icon] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5 shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>

        <div class="flex flex-1"
            <?php if(config('filament.layout.sidebar.is_collapsible_on_desktop')): ?>
                x-show="$store.sidebar.isOpen"
            <?php endif; ?>
        >
            <span>
                <?php echo e($slot); ?>

            </span>
        </div>

        <?php if(filled($badge)): ?>
            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.layouts.app.sidebar.badge','data' => ['badge' => $badge,'badgeColor' => $badgeColor,'active' => $active]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::layouts.app.sidebar.badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['badge' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($badge),'badge-color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($badgeColor),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($active)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        <?php endif; ?>
    </a>
</li>
<?php /**PATH /var/www/html/contracts/resources/views/vendor/filament/components/layouts/app/sidebar/item.blade.php ENDPATH**/ ?>