<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'user' => \Filament\Facades\Filament::auth()->user(),
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'user' => \Filament\Facades\Filament::auth()->user(),
]); ?>
<?php foreach (array_filter(([
    'user' => \Filament\Facades\Filament::auth()->user(),
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div
    <?php echo e($attributes->class([
        'w-20 h-20 bg-gray-200 bg-cover bg-center',
        'dark:bg-gray-900' => config('filament.dark_mode'),
    ])); ?>

    
    <?php if($user->logo_url !== null): ?>
        style="background-image: url('<?php echo e(\Illuminate\Support\Facades\Storage::url('/') . $user->logo_url); ?>')"
    <?php else: ?>
        style="background-image: url('<?php echo e(\Filament\Facades\Filament::getUserAvatarUrl($user)); ?>')"
    <?php endif; ?>
></div>
<?php /**PATH /home/sdevcoi1/public_html/contracts/resources/views/vendor/filament/components/user-avatar.blade.php ENDPATH**/ ?>