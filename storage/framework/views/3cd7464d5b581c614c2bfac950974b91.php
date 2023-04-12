<div
    <?php echo $getId() ? "id=\"{$getId()}\"" : null; ?>

    <?php echo e($attributes->merge($getExtraAttributes())->class([
        'filament-forms-card-component p-6 bg-white rounded-xl border border-gray-300',
        'dark:border-gray-600 dark:bg-gray-800' => config('forms.dark_mode'),
    ])); ?>

>
    <?php echo e($getChildComponentContainer()); ?>

</div>
<?php /**PATH /var/www/html/contracts/vendor/filament/forms/src/../resources/views/components/card.blade.php ENDPATH**/ ?>