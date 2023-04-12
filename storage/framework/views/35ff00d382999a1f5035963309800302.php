<div <?php echo e($attributes->class([
    'border border-gray-300 shadow-sm bg-white rounded-xl filament-tables-container',
    'dark:bg-gray-800 dark:border-gray-700' => config('tables.dark_mode'),
])); ?>>
    <?php echo e($slot); ?>

</div>
<?php /**PATH /var/www/html/contracts/vendor/filament/tables/src/../resources/views/components/container.blade.php ENDPATH**/ ?>