<nav <?php echo e($attributes->class([
    'filament-tabs flex overflow-x-auto items-center p-1 space-x-1 rtl:space-x-reverse text-sm text-gray-600 bg-gray-500/5 rounded-xl',
    'dark:bg-gray-500/20' => config('filament.dark_mode'),
])); ?>>
    <?php echo e($slot); ?>

</nav>
<?php /**PATH /var/www/html/contracts/resources/views/vendor/filament/components/tabs/index.blade.php ENDPATH**/ ?>