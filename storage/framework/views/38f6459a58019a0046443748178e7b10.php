<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'breadcrumbs' => [],
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'breadcrumbs' => [],
]); ?>
<?php foreach (array_filter(([
    'breadcrumbs' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<header <?php echo e($attributes->class([
    'filament-main-topbar sticky top-0 z-10 flex h-16 w-full shrink-0 items-center border-b bg-white',
    'dark:bg-gray-800 dark:border-gray-700' => config('filament.dark_mode'),
])); ?>>
    <div class="flex items-center w-full px-2 sm:px-4 md:px-6 lg:px-8">
        <button
            x-cloak
            x-data="{}"
            x-bind:aria-label="$store.sidebar.isOpen ? '<?php echo e(__('filament::layout.buttons.sidebar.collapse.label')); ?>' : '<?php echo e(__('filament::layout.buttons.sidebar.expand.label')); ?>'"
            x-on:click="$store.sidebar.isOpen ? $store.sidebar.close() : $store.sidebar.open()"
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'filament-sidebar-open-button shrink-0 flex items-center justify-center w-10 h-10 text-primary-500 rounded-full outline-none hover:bg-gray-500/5 focus:bg-primary-500/10',
                'lg:mr-4 rtl:lg:mr-0 rtl:lg:ml-4' => config('filament.layout.sidebar.is_collapsible_on_desktop'),
                'lg:hidden' => ! (config('filament.layout.sidebar.is_collapsible_on_desktop') && (config('filament.layout.sidebar.collapsed_width') === 0)),
            ]) ?>"
        >
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>

        <div class="flex items-center justify-between flex-1">
            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.layouts.app.topbar.breadcrumbs','data' => ['breadcrumbs' => $breadcrumbs]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::layouts.app.topbar.breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['breadcrumbs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($breadcrumbs)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>

            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('filament.core.global-search')->html();
} elseif ($_instance->childHasBeenRendered('i0jPQzS')) {
    $componentId = $_instance->getRenderedChildComponentId('i0jPQzS');
    $componentTag = $_instance->getRenderedChildComponentTagName('i0jPQzS');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('i0jPQzS');
} else {
    $response = \Livewire\Livewire::mount('filament.core.global-search');
    $html = $response->html();
    $_instance->logRenderedChild('i0jPQzS', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('filament.core.notifications')->html();
} elseif ($_instance->childHasBeenRendered('XHHmpoF')) {
    $componentId = $_instance->getRenderedChildComponentId('XHHmpoF');
    $componentTag = $_instance->getRenderedChildComponentTagName('XHHmpoF');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('XHHmpoF');
} else {
    $response = \Livewire\Livewire::mount('filament.core.notifications');
    $html = $response->html();
    $_instance->logRenderedChild('XHHmpoF', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.layouts.app.topbar.user-menu','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::layouts.app.topbar.user-menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        </div>
    </div>
</header>
<?php /**PATH /var/www/html/contracts/resources/views/vendor/filament/components/topbar.blade.php ENDPATH**/ ?>