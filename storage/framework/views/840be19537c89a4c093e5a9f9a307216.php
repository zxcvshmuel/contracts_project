<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'activeManager',
    'form' => null,
    'formTabLabel' => null,
    'managers',
    'ownerRecord',
    'pageClass',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'activeManager',
    'form' => null,
    'formTabLabel' => null,
    'managers',
    'ownerRecord',
    'pageClass',
]); ?>
<?php foreach (array_filter(([
    'activeManager',
    'form' => null,
    'formTabLabel' => null,
    'managers',
    'ownerRecord',
    'pageClass',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="filament-resources-relation-managers-container space-y-2">
    <?php if((count($managers) > 1) || $form): ?>
        <div class="flex justify-center">
            <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.tabs.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::tabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php
                    $tabs = $managers;

                    if ($form) {
                        $tabs = array_replace([null => null], $tabs);
                    }
                ?>

                <?php $__currentLoopData = $tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tabKey => $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $activeManager = strval($activeManager);
                        $tabKey = strval($tabKey);
                    ?>

                    <button
                        wire:click="$set('activeRelationManager', <?php echo e(filled($tabKey) ? "'{$tabKey}'" : 'null'); ?>)"
                        <?php if($activeManager === $tabKey): ?>
                            aria-selected
                        <?php endif; ?>
                        role="tab"
                        type="button"
                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'flex whitespace-nowrap items-center h-8 px-5 font-medium rounded-lg whitespace-nowrap outline-none focus:ring-2 focus:ring-primary-600 focus:ring-inset',
                            'hover:text-gray-800 focus:text-primary-600' => $activeManager !== $tabKey,
                            'dark:text-gray-400 dark:hover:text-gray-300 dark:focus:text-gray-400' => ($activeManager !== $tabKey) && config('filament.dark_mode'),
                            'text-primary-600 shadow bg-white' => $activeManager === $tabKey,
                            'dark:text-white dark:bg-primary-600' => ($activeManager === $tabKey) && config('filament.dark_mode'),
                        ]) ?>"
                    >
                        <?php if(filled($tabKey)): ?>
                            <?php echo e($manager instanceof \Filament\Resources\RelationManagers\RelationGroup ? $manager->getLabel() : $manager::getTitleForRecord($ownerRecord)); ?>

                        <?php elseif($form): ?>
                            <?php echo e($formTabLabel); ?>

                        <?php endif; ?>
                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if(filled($activeManager) && isset($managers[$activeManager])): ?>
        <div
            <?php if(count($managers) > 1): ?>
                id="relationManager<?php echo e(ucfirst($activeManager)); ?>"
                role="tabpanel"
                tabindex="0"
            <?php endif; ?>
            class="space-y-4 outline-none"
        >
            <?php if($managers[$activeManager] instanceof \Filament\Resources\RelationManagers\RelationGroup): ?>
                <?php $__currentLoopData = $managers[$activeManager]->getManagers(ownerRecord: $ownerRecord); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupedManager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount(\Livewire\Livewire::getAlias($groupedManager, $groupedManager::getName()), ['ownerRecord' => $ownerRecord])->html();
} elseif ($_instance->childHasBeenRendered($groupedManager)) {
    $componentId = $_instance->getRenderedChildComponentId($groupedManager);
    $componentTag = $_instance->getRenderedChildComponentTagName($groupedManager);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($groupedManager);
} else {
    $response = \Livewire\Livewire::mount(\Livewire\Livewire::getAlias($groupedManager, $groupedManager::getName()), ['ownerRecord' => $ownerRecord]);
    $html = $response->html();
    $_instance->logRenderedChild($groupedManager, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <?php
                    $manager = $managers[$activeManager];
                ?>

                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount(\Livewire\Livewire::getAlias($manager, $manager::getName()), ['ownerRecord' => $ownerRecord, 'pageClass' => $pageClass])->html();
} elseif ($_instance->childHasBeenRendered($manager)) {
    $componentId = $_instance->getRenderedChildComponentId($manager);
    $componentTag = $_instance->getRenderedChildComponentTagName($manager);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($manager);
} else {
    $response = \Livewire\Livewire::mount(\Livewire\Livewire::getAlias($manager, $manager::getName()), ['ownerRecord' => $ownerRecord, 'pageClass' => $pageClass]);
    $html = $response->html();
    $_instance->logRenderedChild($manager, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php endif; ?>
        </div>
    <?php elseif($form): ?>
        <?php echo e($form); ?>

    <?php endif; ?>
</div>
<?php /**PATH /home/sdevcoi1/public_html/contracts/resources/views/vendor/filament/components/resources/relation-managers/index.blade.php ENDPATH**/ ?>