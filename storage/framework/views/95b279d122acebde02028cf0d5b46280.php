<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['title','description']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['title','description']); ?>
<?php foreach (array_filter((['title','description']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div <?php echo e($attributes->class(["grid grid-cols-2 gap-6 filament-breezy-grid-section"])); ?>>

    <div class="col-span-2 sm:col-span-1 flex justify-between">
        <div class="px-4 sm:px-0">
            <h3 class="<?php echo \Illuminate\Support\Arr::toCssClasses(['text-lg font-medium text-gray-900 filament-breezy-grid-title','dark:text-white'=>config('filament.dark_mode')]) ?>"><?php echo e($title); ?></h3>

            <p class="<?php echo \Illuminate\Support\Arr::toCssClasses(['mt-1 text-sm text-gray-600 filament-breezy-grid-description','dark:text-gray-100'=>config('filament.dark_mode')]) ?>">
                <?php echo e($description); ?>

            </p>
        </div>
    </div>

    <?php echo e($slot); ?>


</div>
<?php /**PATH /home/sdevcoi1/public_html/contracts/resources/views/vendor/filament-breezy/components/grid-section.blade.php ENDPATH**/ ?>